#!/bin/bash

# vérifier que la bdd existe

# 1-> ajouter/supprimer 2-> évènement 3-> organisateur 4-> mdp

source /var/www/eventizi.itinet.fr/scripts/source.sh

#mysql_login=root
#mysql_pass=Event1z1GFJ2016

if [ $# != 4 ]
then
echo "missing arguments"
exit
fi

if [ $1 = 1 ]
then

requete=$(mysql --user=$mysql_login --password=$mysql_pass -e "SELECT user FROM mysql.user WHERE user='$3';")
nom=`echo $requete | awk '{ print $2}'`
echo $nom



	if [ ! -z $nom ]
		then
		mysql --user=$mysql_login --password=$mysql_pass << EOF
		CREATE DATABASE IF NOT EXISTS $2;
		GRANT ALL PRIVILEGES ON $2.* TO '$3'@'localhost';
EOF
	else
		mysql --user=$mysql_login --password=$mysql_pass << EOF 
		CREATE USER '$3'@'localhost' IDENTIFIED BY '$4'; 
		GRANT USAGE ON *.* TO '$3'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
		CREATE DATABASE IF NOT EXISTS $2;
		GRANT ALL PRIVILEGES ON $2.* TO '$3'@'localhost';
EOF
	fi
else

mysql --user=$mysql_login --password=$mysql_pass << EOF
DROP DATABASE $2;
EOF
fi

