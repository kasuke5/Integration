#!/bin/bash 

source /var/www/eventizi.itinet.fr/scripts/source.sh

cd /etc/tinydns/root/
url=$2$fqdn
if [[ $url != $fqdn ]]; then
test=`cat data | grep $url`
case $1 in 
	1) 
		if [ -z $test ]; then
		sudo bash -c "echo "=$2$fqdn:$ip" >> data"
                else 
			exit 1
		fi
;;
	2) 
		if [ -n $test ];  then
			sudo sed -i '/'"$url"'/d' data
                else 
			exit 1
		fi			
;;
esac  
sudo make
sudo ssh -I /root/.ssh/id_rsa root@dedibox.itinet.fr
fi
