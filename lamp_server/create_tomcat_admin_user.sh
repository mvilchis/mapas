#!/bin/bash
if [ -f /.tomcat_admin_created ]; then
echo "Tomcat 'admin' user already created"
exit 0
fi
#generate password
PASS=${TOMCAT_PASS:-$(pwgen -s 12 1)}
_word=$( [ ${TOMCAT_PASS} ] && echo "preset" || echo "random" )
echo "=> Creating and admin user with a ${_word} password in Tomcat"
sed -i -r 's/<\/tomcat-users>//' ${MY_HOME}/conf/tomcat-users.xml
echo '<role rolename="manager-gui"/>' >> ${MY_HOME}/conf/tomcat-users.xml
echo '<role rolename="manager-script"/>' >> ${MY_HOME}/conf/tomcat-users.xml
echo '<role rolename="manager-jmx"/>' >> ${MY_HOME}/conf/tomcat-users.xml
echo '<role rolename="admin-gui"/>' >> ${MY_HOME}/conf/tomcat-users.xml
echo '<role rolename="admin-script"/>' >> ${MY_HOME}/conf/tomcat-users.xml
echo "<user username=\"admin\" password=\"${PASS}\" roles=\"manager-gui,manager-script,manager-jmx,admin-gui, admin-script\"/>" >> ${MY_HOME}/conf/tomcat-users.xml
echo '</tomcat-users>' >> ${MY_HOME}/conf/tomcat-users.xml
echo "=> Done!"
touch /.tomcat_admin_created
echo "========================================================================"
echo "You can now configure to this Tomcat server using:"
echo ""
echo " admin:${PASS}"
echo ""
echo "========================================================================"
