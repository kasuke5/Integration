#!/bin/bash

# 1er param : 1 => ajouter ; 2 => supprimer
# 2e param : nom 
# 3e param :  1 => importe son propre site ; 2 => utilise wordpress
# 4e param : mot de passe de la boîte mail

source /var/www/eventizi.itinet.fr/scripts/source.sh

if [ $# != 4 ]
then
sudo bash -c "echo 'missing arguments'"
exit
fi

sudo script_vhosts.sh $1 $2
sudo script_fqdn.sh $1 $2
sudo script_bdd.sh $1 $2
sudo script_mail.sh $1 $2 $4
if [ $3 = 1 ] 
then
	sudo script_mss.sh $1 $2

else
	if [ $1 = 1 ]
	then
		sudo cp -a /var/www/eventizi.itinet.fr/wordpress/wordpress/* /var/www/$2
		sed -i "s/identifiant/$2/g" /var/www/$2/wp-config.php
		sed -i "s/mdp/$2/g" /var/www/$2/wp-config.php

	else
		exit
	fi
fi

