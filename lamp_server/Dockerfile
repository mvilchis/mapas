FROM ubuntu:14.04

#
RUN apt-get -y update
#-------------Instalacion de prerequisitos  ------------------------
RUN apt-get install -y --no-install-recommends\
  unzip\
  #openjdk-8-jdk\
  vim\
  default-jdk\
  python-software-properties\
  wget\
  pwgen\
  sudo \
  software-properties-common\
  libgdal1-dev\
  libproj-dev


RUN mkdir servidor
ADD db.out.zip servidor/
WORKDIR servidor

#------------ Instalacion de apache y php   ------------------------
#------------ Se agrega el repositorio universal ----------------
RUN apt-get install -y --no-install-recommends\
  apache2 \
  libapache2-mod-php5\
  php5\
  php5-mysql\
  php5-pgsql\
  php5-mcrypt&&\
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
     #postgresql-9.3.8-postgis-2.1\
     postgis\
     pgadmin3
     #postgresql-contrib-9.5

USER postgres

RUN    /etc/init.d/postgresql start &&\
    psql --command "CREATE EXTENSION adminpack;CREATE USER docker WITH SUPERUSER PASSWORD 'docker';" &&\
    createdb -O docker docker


#RUN echo "listen_addresses='*'" >> /etc/postgresql/9.5/main/postgresql.conf

USER root

ADD postgis_run.sh /postgis_run.sh

#-------------- TOMCAT  ----------------------------
RUN apt-get install -y --no-install-recommends\
   tomcat7\
   tomcat7-docs\
   tomcat7-admin\
   tomcat7-examples
ADD tomcat_run.sh /tomcat_run.sh


#------------- Geoserver ----------------------------------------------------
RUN apt-get install -y maven git
RUN mkdir /tmp/resources
RUN wget http://sourceforge.net/projects/geoserver/files/GeoServer/2.7.1/geoserver-2.7.1-war.zip
RUN mv  geoserver-2.7.1-war.zip /var/lib/tomcat7/webapps/
RUN cd /var/lib/tomcat7/webapps/; unzip geoserver-2.7.1-war.zip
RUN rm /var/lib/tomcat7/webapps/geoserver-2.7.1-war.zip


#### Move all files from old server to docker 

### Move /var/lib/tomcat7/webapps/geoserver/data
ENV DATA_DIR /var/lib/tomcat7/webapps/geoserver/data
COPY data $DATA_DIR
### Move /srv/www/mapas 
ENV MAPAS_DIR /srv/www/mapas/
COPY mapas $MAPAS_DIR

## Move /etc/apache2
ENV APACHE_DIR /etc/apache2
COPY apache2 $APACHE_DIR


RUN chmod +x /*.sh

EXPOSE 8080 5432 80
CMD /tomcat_run.sh & /postgis_run.sh & /usr/sbin/apache2ctl -D FOREGROUND
