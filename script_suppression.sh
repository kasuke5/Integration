#!/bin/bash

# $1 -> nom membre $2 -> mot de passe 
source /var/www/eventizi.itinet.fr/scripts/source.sh

sudo ./script_mail.sh 2 $1 
sudo ./script_mss.sh 2 $1 

mysql --user=$mysql_login --password=$mysql_pass << EOF
DROP USER '$1'@'localhost';
EOF

sudo rm -r /var/www/$2
