#!/bin/bash

# vérifier que la bdd existe

source /var/www/eventizi.itinet.fr/scripts/source.sh

#mysql_login=root
#mysql_pass=Event1z1GFJ2016

if [ $# != 2 ]
then
echo "missing arguments"
exit
fi

if [ $1 = 1 ]
then
mysql --user=$mysql_login --password=$mysql_pass << EOF 
CREATE USER '$2'@'localhost' IDENTIFIED BY '$2'; 
GRANT USAGE ON *.* TO '$2'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS $2;
GRANT ALL PRIVILEGES ON $2.* TO '$2'@'localhost';
EOF

else

mysql --user=$mysql_login --password=$mysql_pass << EOF
DROP USER '$2'@'localhost';
DROP DATABASE $2;
EOF
fi

