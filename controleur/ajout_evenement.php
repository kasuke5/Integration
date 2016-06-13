<?php
	

include_once("../modele/events.php");
include_once("../modele/connexion_bdd.php");

if(isset($_POST["action"])){
	add_events($_POST);
	//$login = GetLoginById(30)["user_lsogin"]; // Mettre $_SESSION["id_user"] à la place
	//$password = GetLoginById(30)["user_password"];
	/*if($_POST["choix"] == "wordpress"){
		$commande_web = "script_web 1 ".$login." 2 ".$password;
	}elseif ($_POST["choix"]=="importer") {
		$commande_web = "script_web 1 ".$login." 1 ".$password;
		if(isset($_POST["bdd"])){
			$commande_bdd = "script_bdd 1 ".$login;
			exec($commande_bdd);
		}
	}
	exec($commande_web);*/
}else
	include_once("../vue/ajout_evenement.php");