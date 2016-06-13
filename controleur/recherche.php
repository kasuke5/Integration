<?php

include_once("../modele/membre.php");
include_once("../modele/connexion_bdd.php");

$categories = get_categories();
$tags = get_tags();

if(isset($_POST["nom"])){
	echo "Recherche ok".$_POST["nom"];
}elseif (isset($_POST["stags"])) {
$events = get_events_by_tags($_POST["tags"]);
}
include_once("../vue/recherche.html");