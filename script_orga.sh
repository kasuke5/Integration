#!/bin/bash

# $1 1:Ajout 2:Supression
# $2 Nom de l'évenement
source /var/www/eventizi.itinet.fr/Integration/source.sh
case $1 in 

		1)
				var=`cut -d '}' -f 1 /etc/prosody/prosody.cfg.lua |grep admins`
                a=$(echo $var | sed 's/[ \t]*$//');
                # echo $a
                b=$(echo $a | grep $2@$dname);
                if [ -z $a ] then 

                        var2=",\"$2@$dname\""
                        result="$a$var2"
                # echo $result
                        sudo sed -i.bak 's/^'"$a"'/'"$result"'/' /etc/prosody/prosody.cfg.lua
                else exit 1
                fi       
        ;;

        2)
                if [ -n $2 ] then 
				
                                sudo sed -i 's/'"\,\"$2@$dname\""'//' /etc/prosody/prosody.cfg.lua
                else exit 1
               fi  
        ;;

esac           

