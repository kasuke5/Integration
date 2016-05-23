#!/bin/bash

# 1er param : 1 => ajouter ; 2 => supprimer
# 2e param : nom 
# 3e param :  1 => importe son propre site ; 2 => utilise wordpress

source /var/www/eventizi.itinet.fr/scripts/source.sh

if [ $# != 3 ]
then
sudo bash -c "echo 'missing arguments'"
exit
fi

sudo script_vhosts.sh $1 $2
sudo script_fqdn.sh $1 $2
sudo script_bdd.sh $1 $2

if [ $3 = 1 ] 
then
echo "$fqdn"
	sudo script_mss.sh $1 $2

else
	sudo cp -a /var/www/eventizi.itinet.fr/wordpress/wordpress/* /var/www/$2

fi

