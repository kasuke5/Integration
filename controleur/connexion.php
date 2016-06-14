<?php

// =>  Contrôleur

include_once("modele/co_in.php");
include_once("modele/connexion_bdd.php");


if(isset($_POST["action"])){
		if(isset($_POST["login"]) AND isset($_POST["pass"])){
			echo "ok";
			$id_user = connexion($_POST["login"],$_POST["pass"]);
			echo $id_user;
			if($id_user == 0 ){
				include_once("vue/connexion.php"); // Ajouter un message sur la page
			}else{
				$_SESSION["id_user"] = $id_user;
				//include_once("../vue/accueil_membre.html");
				echo "Vous êtes connecté ! ".$id_user;
			}
		}else{
				include_once("vue/connexion.php"); // Ajouter un message sur la page
			}
}else{
	include_once("vue/connexion.php");
}
	
