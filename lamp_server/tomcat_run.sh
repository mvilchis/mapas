#!/bin/bash
if [ ! -f /.tomcat_admin_created ]; then
/create_tomcat_admin_user.sh
fi
exec ${MY_HOME}/bin/catalina.sh run
