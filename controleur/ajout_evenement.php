<?php
	

#include_once("modele/events.php");
#include_once("modele/co_in.php");
#include_once("modele/connexion_bdd.php");

if(isset($_POST["action"])){
	add_events($_POST);
	$login = GetLoginById("3")["user_login"]; // Mettre $_SESSION["id_user"] à la place
	$password = GetLoginById("3")["user_password"];
	if($_POST["choix"] == "wordpress"){
		$commande_web = "./script_web.sh 1 ".$_POST["nom"]." 2 ".$_POST["nom"];
		$commande_bdd = "./script_bdd.sh 1 ".$_POST["nom"];
		exec($commande_bdd);
	}elseif ($_POST["choix"]=="importer") {
		$commande_web = "./script_web.sh 1 ".$_POST["nom"]." 1 ".$_POST["nom"];
		if(isset($_POST["bdd"])){
			echo"blabla";
			$commande_bdd = "./script_bdd.sh 1 ".$_POST["nom"];
			echo exec($commande_bdd);
		}
	}
	echo exec($commande_web);
}else
	include_once("vue/ajout_evenement.php");
