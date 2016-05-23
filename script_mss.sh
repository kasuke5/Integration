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
	sudo useradd --home /home/$2 --shell /usr/bin/mysecureshell -g createur -p $mdp $2
	sudo chown -R $2:createur $www$2
	sudo bash -c "echo '<User $2>
Home /var/www/$2
StayAtHome true
VirtualChroot    true
LimitConnectionByUser 3
LimitConnectionByIP 3
HideNoAccess true
DefaultRights 0604 0705
IgnoreHidden true
</User>

' >> /etc/ssh/sftp_config"
	;;
	2)
	sudo userdel $2
	line=`cat /etc/ssh/sftp_config | grep -n $2 | cut -d : -f 1 | awk 'NR==1 {print $1}'`
	line2=`expr $line + 11`
	sudo sed -i "$line,$line2"'d' /etc/ssh/sftp_config
	#sed "/<User $2>/,/Hidden/d" /etc/ssh/sftp_config
	;;
	esac	
