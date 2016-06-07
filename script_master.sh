#!/bin/bash

source /var/www/eventizi.itinet.fr/scripts/source.sh

while :
 do
 	echo "Que voulez-vous faire?
 	1: Tchat
 	2: Base de données
 	3: FQDN
 	4: Mail
 	5: Créer un site évenement
 	6: Vhost
 	7: Importer un site évènement
	0: Sortir"
 	cmd=$PPID

 	read cmd
 	case $cmd in
 		0 )
			break
		;;

		1 )	
			read -p "Taper 1 pour creer 2 pour supprimer " var1
			read -p "Nom d'utilisateur: " var2
			if [[ $var1 = 1 ]]; then
        			read -s -p "Mot de passe: " var3     
			fi
			sudo script_chat.sh $var1 $var2 $var3
 		;;

		2)
			read -p "Tapez 1 pour creer 2 pour supprimer " var1
			read -p "Nom d'utilisateur: " var2
                       
			sudo script_bdd.sh $var1 $var2 
		;;

		3)
			read -p "Tapez 1 pour creer 2 pour supprimer " var1
			read -p "Nom de l'évènement : " var2
			
			sudo script_fqdn.sh $var1 $var2 
		;;

		4)
			read -p "Tapez 1 pour creer 2 pour supprimer " var1
			read -p "Nom de l'évènement : " var2
                        if [[ $var1 = 1 ]]; then
                                read -s -p "Mot de passe: " var3
                        fi
			sudo script_mail.sh $var1 $var2 $var3
		;;

		5)
			read -p "Tapez 1 pour creer 2 pour supprimer " var1
			read -p "Nom de l'évènement : " var2
			read -p "1:Importer son site 2:CMS : " var3
			
			sudo script_web.sh $var1 $var2 $var3
		;;

		6)
			read -p "Tapez 1 pour creer, 2 pour supprimer, 3 pour activer, 4 pour desactiver " var1
			read -p "Nom de machine: " var2
                    
			sudo script_vhosts.sh $var1 $var2 
		;;

		7)
			read -p "Tapez 1 pour creer, 2 pour supprimer " var1
			read -p "Identifiant/nom de machine: " var2
                     
			sudo script_mss.sh $var1 $var2 
		;;

 	esac
done

