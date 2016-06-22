<?php

// =>  Contrôleur
include_once("modele/co_in.php");
include_once("modele/events.php");
include_once("modele/connexion_bdd.php");

if(!isset($_SESSION["id_user"])){

	if(isset($_POST["action"])){
				$id_user = connexion($_POST["login"],$_POST["pass"]);
				if($id_user == 0 ){
					include_once("vue/connexion.php"); // Ajouter un message sur la page
				}else{
					$_SESSION["id_user"] = $id_user;
					$_SESSION["login_user"] = $_POST["login"];
					include_once("controleur/tableau_bord.php");
				}
	}else{
		include_once("vue/connexion.php");
	}

}else
	include_once("controleur/tableau_bord.php");
	
