<?php

// => Contrôleur

include_once("modele/co_in.php");
include_once("modele/connexion_bdd.php");
//$_SESSION["erreur"] = "khjkhjkhj";
$message = "";
if(isset($_POST["action"])){
	if(isset($_POST["login"]) AND isset($_POST["pass1"]) AND isset($_POST["pass2"]) AND isset($_POST["mail"])){
		if($_POST["pass1"] == $_POST["pass2"]){
			$retour = inscription($_POST["login"],$_POST["pass1"],$_POST["mail"]);
			if (is_numeric($retour)){
				$_SESSION["id_user"] = $retour;
				//include_once("../vue/accueil_membre.html");
				echo "Vous êtes inscrit ! ";
			}else{
				
				$message = $retour;
				include_once("vue/inscription.php"); // Ajouter le message de $retour
			}
		}else{
			$message = "Les deux mots de passe ne sont pas identiques";
			include("vue/inscription.php"); // Ajouter un message
		}
	}else{
		$message = "Vous devez remplir tous les champs";
		include_once("vue/inscription.php"); // Ajouter un message
	}
}else{
	include_once("vue/inscription.php");

}
