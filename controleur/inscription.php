<?php

// => Contrôleur

include_once("modele/co_in.php");
include_once("modele/connexion_bdd.php");
//$_SESSION["erreur"] = "khjkhjkhj";
$message = "";
if(!isset($_SESSION["id_user"])){

	if(isset($_POST["action"])){
		if(strlen($_POST["pass2"])> 3 AND strlen($_POST["pass2"])<9){
			if($_POST["pass1"] == $_POST["pass2"]){
				$retour = inscription($_POST["login"],$_POST["pass1"],$_POST["mail"]);
				if (is_numeric($retour)){
					$_SESSION["id_user"] = $retour;
					$_SESSION["login_user"] = $_POST["login"];
					include_once("controleur/events.php");
				}else{
					
					$message = $retour;
					include_once("vue/inscription.php"); // Ajouter le message de $retour
				}
			}else{
				$message = "Les deux mots de passe ne sont pas identiques";
				include("vue/inscription.php"); // Ajouter un message
			}
		}else{
			$message = "Le mot de passe doit faire entre 4 et 8 caractères";
			include_once("vue/inscription.php"); // Ajouter un message
		}
	}else{
		include_once("vue/inscription.php");

	}
}else
	include_once("controleur/tableau_bord.php");