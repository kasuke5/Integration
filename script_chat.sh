#!/bin/bash

# $1 1:Ajout 2:Supression
# $2 Nom de machine
# $3 Mot de passe

source /var/www/eventizi.itinet.fr/scripts/source.sh

case $1 in

	1) sudo prosodyctl register $2 $dname $3 ;;

	2) sudo prosodyctl deluser $2@$dname ;;

esac
