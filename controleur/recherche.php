<?php

include_once("modele/membre.php");
include_once("modele/events.php");
include_once("modele/connexion_bdd.php");
include_once("modele/co_in.php");

function afficher_participation($id_user,$id_event){
	$val = check_participation($id_user,$id_event);
		if($val == -1){
			$inscription =  "<button type='submit'  class='btn btn-default inscrire'value='".$id_event."'>S'inscrire</button>";
		}elseif ($val == 1) {
			$inscription = "Vous êtes l'organisateur de cet évènement.";
		}else{
			$inscription = "Vous êtes inscrit à cet évènement.";
		}
		return $inscription;
}


if(isset($_SESSION["id_user"])){
	$categories = get_categories();
	$tags = get_tags();
	$events = get_events();
	include_once("vue/recherche.html");
	
}else{
	$message = "Connectez-vous pour accéder à cette page";
	include_once("vue/connexion.php");
}