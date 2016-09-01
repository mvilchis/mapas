#!/bin/bash
service postgresql start
export PGUSER=postgres
unzip db.out.zip

sudo -u postgres psql -f db.out postgres
