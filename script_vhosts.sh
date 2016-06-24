#!/bin/bash
# mettre server name dans une variable
# $1 => créer ou supprimer ; $2 => nom organisateur : $3 => nom évènement



source /var/www/eventizi.itinet.fr/scripts/source.sh

if [ $# != 3 ]
then
sudo bash -c "echo 'missing arguments'"
exit
fi 

sl=0
sa=0

if [ -f "/etc/nginx/sites-available/$3" ]
then
	sa=1
fi

if [ -L "/etc/nginx/sites-enabled/$3" ]
then
	sl=1
fi


case $1 in 
	1) # créer vhost

	if [ -d $www$2 ]
	then
	mkdir $www$2/$3
	else
	mkdir $www$2
	sudo chown $2:www-data $www$2
	mkdir $www$2/$3
	fi


	sudo chown -R www-data:www-data $www$2/$3
	edquota -p tournoi $2
	#touch /var/www/$2/index.html
	#echo 'Ca marche toujours' >> /var/www/$2/index.html # A supprimer
	cd /etc/nginx/sites-available
	sudo touch $3
	sudo bash -c "echo -e 'server {

       	server_name $3.$dname;

       	root $www$2/$3;
      	index index.html index.php;

       	location / {
               try_files \$uri \$uri/ =404;
       }
	location ~ \.php$ {
               include snippets/fastcgi-php.conf;
               fastcgi_pass unix:/var/run/php5-fpm.sock;
        }
	}' >> /etc/nginx/sites-available/$3"
	sudo ln -s /etc/nginx/sites-available/$3 /etc/nginx/sites-enabled/
	;;
	
	2) # supprimer vhost
	if [ $sl = 1 ] && [ $sa = 1 ]
        then
		sudo rm /etc/nginx/sites-enabled/$3
		sudo rm /etc/nginx/sites-available/$3
		sudo rm -r $www/$2/$3 
	else
		sudo bash -c "echo 'Error : One or several files dont exist'"
	fi
	;;

	3) # activer vhost
	 if [ $sa = 1 ] && [ $sl=0 ]
         then
		sudo ln -s /etc/nginx/sites-available/$3 /etc/nginx/sites-enabled/
	else
		sudo bash -c "echo 'Error : vhost doesnt exist or symbolic link already does'"
	fi
	;;

	4) # désactiver vhost
	 if [ $sl = 1 ] && [ $sa=1 ]
         then

		 sudo rm /etc/nginx/sites-enabled/$3
	else
		sudo bash -c "echo 'Error : vhost or symbolic link doenst exist'"
	fi
	 ;;
esac

sudo nginx -s reload
sudo service nginx restart





	

