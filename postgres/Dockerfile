FROM postgres:9.6

ENV POSTGIS_MAJOR 2.3
ENV POSTGIS_VERSION 2.3.1+dfsg-1.pgdg80+1

RUN apt-get update 
RUN apt-get install -y --no-install-recommends \
    postgresql-$PG_MAJOR-postgis-$POSTGIS_MAJOR=$POSTGIS_VERSION \
    postgis=$POSTGIS_VERSION 
RUN rm -rf /var/lib/apt/lists/*
    
RUN apt-get -y update && \
    apt-get install -y \
    unzip sudo
                                            
RUN mkdir -p /docker-entrypoint-initdb.d &&\
      mkdir -p /data

COPY ./initdb-postgis.sh /docker-entrypoint-initdb.d/postgis.sh
ADD db.out.zip /

ENTRYPOINT ["/docker-entrypoint.sh"]
                                                      
EXPOSE  5432
CMD ["postgres"]
