<?php

// =>  Contrôleur

if(isset($_POST["action"])){
		if(isset($_POST["login"]) AND isset($_POST["pass"])){
			$id_user = connexion($_POST["login"],$_POST["pass"]);
			if($id_user == 0 ){
				include_once("vue/co_in.html"); // Ajouter un message sur la page
			}else{
				$_SESSION["id_user"] = $id_user;
				include_once("vue/accueil_membre.html");
			}
		}else{
				include_once("vue/co_in.html"); // Ajouter un message sur la page
			}
}else{
	include_once("vue/co_in.html");
}
	