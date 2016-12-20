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
  libproj-dev\
  php5-pgsql


RUN mkdir servidor
WORKDIR servidor

#------------ Instalacion de apache y php   ------------------------
#------------ Se agrega el repositorio universal ----------------
RUN apt-get install -y --no-install-recommends\
  apache2 \
  mysql-server\
  php5-mysql\
  php5 libapache2-mod-php5 php5-mcrypt

## Move /etc/apache2
ENV APACHE_DIR /etc/apache2
RUN rm -r /etc/apache2
COPY /apache2 /etc/apache2



EXPOSE 80
CMD /usr/sbin/apache2ctl -D FOREGROUND
