<?php

include_once("modele/membre.php");
include_once("modele/events.php");
include_once("modele/connexion_bdd.php");
include("modele/co_in.php");

if(isset($_SESSION["id_user"])){
	$categories = get_categories();
	$tags = get_tags();
	$events = get_events();

	if(isset($_POST["nom"])){
	echo "Recherche ok".$_POST["nom"];
	}elseif (isset($_POST["stags"])) {
	$events = get_events_by_tags($_POST["tags"]);
	}
	include_once("vue/recherche.html");
}else{
	$message = "Connectez-vous pour accéder à cette page";
	include_once("vue/connexion.php");
}


