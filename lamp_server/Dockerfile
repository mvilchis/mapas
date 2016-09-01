FROM ubuntu:latest

#
RUN apt-get -y update
#-------------Instalacion de prerequisitos  ------------------------
RUN apt-get install -y --no-install-recommends\
  unzip\ 
  openjdk-8-jdk\
  vim\
  python-software-properties\
  wget\
  pwgen\
  software-properties-common\
#------------ Instalacion de apache y php   ------------------------
  apache2 \
  php\
  libapache2-mod-php\
  php-mcrypt&&\
  apt-get clean && rm -rf /var/lib/apt/lists/*

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2 


#-------------- Postgres y postgis ----------------
RUN echo "deb http://apt.postgresql.org/pub/repos/apt/ precise-pgdg main" >> /etc/apt/list.source 
RUN wget --quiet -O - http://apt.postgresql.org/pub/repos/apt/ACCC4CF8.asc |  apt-key add -
RUN apt-get -y update 

RUN apt-get install -yf \
     postgresql\
     postgresql-contrib\
     postgresql-9.5-postgis-2.1\
     postgis\
     pgadmin3\
     postgresql-contrib-9.5

USER postgres
RUN    /etc/init.d/postgresql start &&\
    psql --command "CREATE EXTENSION adminpack;CREATE USER docker WITH SUPERUSER PASSWORD 'docker';" &&\
    createdb -O docker docker

RUN echo "listen_addresses='*'" >> /etc/postgresql/9.5/main/postgresql.conf

USER root

ADD postgis_run.sh /postgis_run.sh

#-------------- TOMCAT  ----------------------------
ENV MY_HOME /opt/tomcat7
ENV TOMCAT_MAJOR_VERSION 7
ENV TOMCAT_MINOR_VERSION 7.0.55

#RUN apt-get install -y --no-install-recommends tomcat7 tomcat7-admin
#RUN mkdir ${MY_HOME}
RUN wget -q https://archive.apache.org/dist/tomcat/tomcat-${TOMCAT_MAJOR_VERSION}/v${TOMCAT_MINOR_VERSION}/bin/apache-tomcat-${TOMCAT_MINOR_VERSION}.tar.gz && \
wget -qO- https://archive.apache.org/dist/tomcat/tomcat-${TOMCAT_MAJOR_VERSION}/v${TOMCAT_MINOR_VERSION}/bin/apache-tomcat-${TOMCAT_MINOR_VERSION}.tar.gz.md5 | md5sum -c - && \
   tar zxf apache-tomcat-*.tar.gz && \
   rm apache-tomcat-*.tar.gz && \
   mv apache-tomcat* ${MY_HOME}

ADD create_tomcat_admin_user.sh /create_tomcat_admin_user.sh
ADD tomcat_run.sh /tomcat_run.sh

#------------- Geoserver ----------------------------------------------------
RUN apt-get install -y maven git 
RUN mkdir /tmp/resources 
ENV GEOSERVER_VERSION 2.6.2
RUN if [ ! -f /tmp/resources/geoserver.war.zip ]; then \
      wget -c http://sourceforge.net/projects/geoserver/files/GeoServer/${GEOSERVER_VERSION}/geoserver-${GEOSERVER_VERSION}-war.zip -O /tmp/resources/geoserver.war.zip; \
   fi; \
   unzip /tmp/resources/geoserver.war.zip -d /tmp/resources/geoserver && \
   mkdir /tmp/webapps && \
   unzip /tmp/resources/geoserver/geoserver.war -d /tmp/webapps/geoserver 

#add plugins
RUN wget -c http://sourceforge.net/projects/geoserver/files/GeoServer/${GEOSERVER_VERSION}/extensions/geoserver-${GEOSERVER_VERSION}-app-schema-plugin.zip -O /tmp/resources/geoserver-app-schema-plugin.zip && \
   unzip /tmp/resources/geoserver-app-schema-plugin.zip -d /tmp/webapps/geoserver/WEB-INF/lib

#move geoserver to webapps
RUN mv /tmp/webapps/geoserver ${MY_HOME}/webapps 

ENV GEOSERVER_DATA_DIR  /opt/geoserver_data

ADD geoserver_data  ${GEOSERVER_DATA_DIR}

ENV MAPAS /srv/www/
ADD mapas {$MAPAS}
#RUN mv /tmp/resources/resources/apache2/sites-enabled /etc/apache2/sites-enabled
#RUN mv /tmp/resources/resources/apache2/sites-available /etc/apache2/sites-available

#---- Locales
RUN apt-get  install -y language-pack-en-base

RUN chmod +x /*.sh
EXPOSE 8080 5432 80
CMD /tomcat_run.sh & /postgis_run.sh & /usr/sbin/apache2ctl -D FOREGROUND
