<?php
session_start();
#echo $_SERVER["REQUEST_URI"];
if($_SERVER["REQUEST_URI"] == "/"){
        include_once("controleur/accueil.php");
}elseif($_SERVER["REQUEST_URI"] == "/inscription"){
        include_once("controleur/inscription.php");
}elseif($_SERVER["REQUEST_URI"] == "/connexion"){
        include_once("controleur/connexion.php");
}elseif($_SERVER["REQUEST_URI"] == "/recherche"){
	include_once("controleur/recherche.php");
}elseif($_SERVER["REQUEST_URI"] =="/events"){
	include_once("controleur/events.php");
}elseif($_SERVER["REQUEST_URI"] =="/ajout_evenement"){
	include_once("controleur/ajout_evenement.php");
}elseif($_SERVER["REQUEST_URI"] =="/admin"){
	include_once("controleur/admin.php");
}elseif($_SERVER["REQUEST_URI"] =="/tableau_bord"){
	include_once("controleur/tableau_bord.php");
}elseif($_SERVER["REQUEST_URI"] =="/deconnexion"){
	include_once("controleur/deconnexion.php");
}elseif($_SERVER["REQUEST_URI"] =="/actions"){
	include_once("controleur/actions.php");
}else{
        include_once("vue/erreur404.php");
}
?>
