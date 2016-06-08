<?php

// => Contrôleur

if(isset($_POST["action"])){
	if(isset($_POST["login"]) AND isset($_POST["pass1"] AND isset($_POST["pass2"])) AND isset($_POST["mail"])){
		if($_POST["pass1"] == $_POST["pass2"]){
			$retour = inscription($_POST["login"],$_POST["pass1"],$_POST["mail"]);
			if (is_int($retour)){
				$_SESSION["id_user"] = $retour;
				include_once("vue/accueil_membre.html");
			}else{
				include_once("vue/inscription.html"); // Ajouter le message de $retour
			}
		}else{
			include_once("vue/inscription.html"); // Ajouter un message
		}
	}else{
		include_once("vue/inscription.html"); // Ajouter un message
	}
}else{
	include_once("vue/inscription.html");

}