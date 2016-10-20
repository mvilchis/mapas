#Version of ubuntu server 
FROM ubuntu:14.04

#
RUN apt-get -y update
#-------------Instalacion de prerequisitos  ------------------------
RUN apt-get install -y --no-install-recommends\
  unzip\
  vim\
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
  mysql-server\
  php5-mysql\
  php5 libapache2-mod-php5 php5-mcrypt
##-------------- TOMCAT  ----------------------------
RUN apt-get -y update
RUN apt-get install -y default-jdk
RUN apt-get install -y tomcat7
RUN apt-get install -y --no-install-recommends\
   tomcat7-docs\
   tomcat7-admin\
   tomcat7-examples
ADD tomcat_run.sh /servidor/tomcat_run.sh
#
##------------- Geoserver ----------------------------------------------------
RUN wget http://sourceforge.net/projects/geoserver/files/GeoServer/2.7.1/geoserver-2.7.1-war.zip
RUN mv  geoserver-2.7.1-war.zip /var/lib/tomcat7/webapps/
RUN cd /var/lib/tomcat7/webapps/; unzip geoserver-2.7.1-war.zip
RUN rm /var/lib/tomcat7/webapps/geoserver-2.7.1-war.zip
#
##-------------- Postgres y postgis ----------------
RUN  gpasswd -a root sudo
RUN apt-get install -y php5-pgsql
RUN apt-get install -yf \
      postgresql-9.3-postgis-2.1

ADD postgis_run.sh /servidor/postgis_run.sh


#### Move all files from old server to docker 
### Move /var/lib/tomcat7/webapps/geoserver/data
ENV DATA_DIR /var/lib/tomcat7/webapps/geoserver/data
COPY data $DATA_DIR
### Move /srv/www/mapas 
ENV MAPAS_DIR /srv/www/mapas/
COPY mapas $MAPAS_DIR

## Move /etc/apache2
ENV APACHE_DIR /etc/apache2
RUN rm -r /etc/apache2
COPY /apache2 /etc/apache2



EXPOSE 8080 5432 80
CMD /servidor/tomcat_run.sh & /servidor/postgis_run.sh & /usr/sbin/apache2ctl -D FOREGROUND
