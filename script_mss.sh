#!/bin/bash

source /var/www/eventizi.itinet.fr/scripts/source.sh

if [ $# != 2 ]
then
sudo bash -c "echo "missing arguments""
exit
fi

case $1 in
        1) 
	mdp=`openssl passwd $2`
	sudo useradd --home /home/$2 --shell /usr/bin/mysecureshell -g www-data -p $mdp $2
	sudo chown -R $2:www-data $www$2 ;;
		2)
	sudo userdel $2 ;;
	esac	
