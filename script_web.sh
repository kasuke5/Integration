#!/bin/bash

# 1er param : 1 => ajouter ; 2 => supprimer
# 2e param : nom évenement
# 3e param :  1 => importe son propre site ; 2 => utilise wordpress
# 4e param : mot de passe de la boîte mail
# 5e param : organisateur 

source /var/www/eventizi.itinet.fr/scripts/source.sh

if [ $# != 5 ]
then
sudo bash -c "echo 'missing arguments'"
exit
fi

sudo ./script_vhosts.sh $1 $5 $2
sudo ./script_fqdn.sh $1 $2
#sudo ./script_bdd.sh $1 $2
#sudo ./script_mail.sh $1 $2 $4


	if [ $1 = 1 ]
	then
		sudo bash -c "echo '$2@eventizi.itinet.fr $5/' >> /etc/postfix/vmailbox"
		sudo postmap etc/postfix/vmailbox
	else
		 sudo sed -i '/'"$2"'/d' /etc/postfix/vmailbox
		 sudo postmap /etc/postfix/vmailbox
	fi


	if [ $1 = 1 ] && [ $3 = 2 ]
	then
		sudo cp -a /var/www/eventizi.itinet.fr/wordpress/wordpress/* $www$5/$2
		sudo chown -R www-data $www$5
		sudo sed -i "s/identifiant_user/$5/g" $www$5/$2/wp-config.php
		sudo sed -i "s/identifiant_bdd/$2/g" $www$5/$2/wp-config.php
		sudo sed -i "s/mdp/$5/g" $www$5/$2/wp-config.php
		sudo chown -R $5:www-data $www$5

	else
		exit
	fi
