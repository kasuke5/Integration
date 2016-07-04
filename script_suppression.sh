#!/bin/bash

# $1 -> nom membre $2 -> mot de passe 


sudo ./script_mail.sh 2 $1 $2
sudo ./script_mss.sh 2 $1 $2

mysql --user=$mysql_login --password=$mysql_pass << EOF
DROP USER '$1'@'localhost';
EOF

sudo rm -r /var/www/$2
