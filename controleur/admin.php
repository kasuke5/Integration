<?php

include_once("modele/admin.php");
include_once("modele/connexion_bdd.php");
include("modele/co_in.php");
//if(isset($_SESSION["id_user"])){
	$users = get_users();
	include_once("vue/admin.php");
/*}else{
	$info = "Connectez-vous pour accéder à cette page";
	include_once("controleur/connexion.php");
}