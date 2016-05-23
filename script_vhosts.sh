#!/bin/bash
# mettre server name dans une variable

source /var/www/eventizi.itinet.fr/scripts/source.sh

if [ $# != 2 ]
then
sudo bash -c "echo "missing arguments""
exit
fi 

dr=0
sl=0
sa=0

if [ -d $www$2 ]
then
	dr=1
fi

if [ -f "/etc/nginx/sites-available/$2" ]
then
	sa=1
fi

if [ -L "/etc/nginx/sites-enabled/$2" ]
then
	sl=1
fi


case $1 in 
	1) # créer vhost
	if [ $dr = 0 ] && [ $sl = 0 ]  && [ $sa=0 ]
	then
	
	mkdir $www$2
	sudo chown -R www-data:createur $www$2
	#touch /var/www/$2/index.html
	#echo 'Ca marche toujours' >> /var/www/$2/index.html # A supprimer
	cd /etc/nginx/sites-available
	sudo touch $2
	sudo bash -c "echo -e 'server {
       	listen 80;

       	server_name $2.$dname;

       	root $www$2;
      	index index.html;

       	location / {
               try_files $uri $uri/ =404;
       }
	location ~ \.php$ {
               include snippets/fastcgi-php.conf;
               fastcgi_pass unix:/var/run/php5-fpm.sock;
        }
	}' >> /etc/nginx/sites-available/$2"
	sudo ln -s /etc/nginx/sites-available/$2 /etc/nginx/sites-enabled/
	else
	sudo bash -c "echo 'Error : One or several files already exist'"
	fi
	;;
	
	2) # supprimer vhost
	if [ $dr = 1 ] && [ $sl = 1 ] && [ $sa = 1 ]
        then
		sudo rm /etc/nginx/sites-enabled/$2
		sudo rm /etc/nginx/sites-available/$2
		sudo rm -r $www/$2 
	else
		sudo bash -c "echo "Error : One or several files don\'t exist""
	fi
	;;

	3) # activer vhost
	 if [ $sa = 1 ] && [ $sl=0 ]
         then
		sudo ln -s /etc/nginx/sites-available/$2 /etc/nginx/sites-enabled/
	else
		sudo bash -c "echo "Error : vhost doesn\'t exist or symbolic link already does""
	fi
	;;

	4) # désactiver vhost
	 if [ $sl = 1 ] && [ $sa=1 ]
         then

		 sudo rm /etc/nginx/sites-enabled/$2
	else
		sudo bash -c "echo "Error : vhost or symbolic link doens\'t exist""
	fi
	 ;;
esac

sudo nginx -s reload
sudo service nginx restart





	

