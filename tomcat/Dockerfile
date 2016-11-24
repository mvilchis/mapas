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
   ca-certificates \
   software-properties-common\
   libgdal1-dev\
   libproj-dev
                                   
RUN mkdir tomcat_servidor
WORKDIR tomcat_servidor
ENV TOMCAT_MAJOR_VERSION 7
ENV TOMCAT_MINOR_VERSION 7.0.55
ENV CATALINA_HOME /var/lib/tomcat7

RUN wget -q https://archive.apache.org/dist/tomcat/tomcat-${TOMCAT_MAJOR_VERSION}/v${TOMCAT_MINOR_VERSION}/bin/apache-tomcat-${TOMCAT_MINOR_VERSION}.tar.gz && \
    wget -qO- https://archive.apache.org/dist/tomcat/tomcat-${TOMCAT_MAJOR_VERSION}/v${TOMCAT_MINOR_VERSION}/bin/apache-tomcat-${TOMCAT_MINOR_VERSION}.tar.gz.md5 | md5sum -c - && \
    tar zxf apache-tomcat-*.tar.gz && \
    rm apache-tomcat-*.tar.gz && \
    mv apache-tomcat* /var/lib/tomcat7

ADD create_tomcat_admin_user.sh /create_tomcat_admin_user.sh
ADD run.sh /run.sh
RUN chmod +x /*.sh
##-------------- TOMCAT  ----------------------------
RUN apt-get -y update
RUN apt-get install -y default-jdk
#RUN apt-get install -y tomcat7
#RUN apt-get install -y --no-install-recommends\
#    tomcat7-docs\
#    tomcat7-admin\
#    tomcat7-examples
ADD tomcat_run.sh /tomcat_servidor/tomcat_run.sh

# ##-------------Geoserver ----------------------------------------------------
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

EXPOSE 8080

CMD /run.sh
