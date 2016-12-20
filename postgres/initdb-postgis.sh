#!/bin/bash
set -e
    
export PGUSER=postgres
export PGDATA=$PGDATA
unzip db.out.zip
sudo -u postgres psql -f db.out postgres

