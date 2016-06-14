<?php

include_once("modele/membre.php");
include_once("modele/connexion_bdd.php");
	if(isset($_SESSION["id_user"])){
		$infos = infos_membres($_SESSION["id_user"]);
		$skills = user_skills($_SESSION["id_user"]);
		include_once("vue/accueil_membre.php");
	}else
		include_once("vue/index.html");



?>
