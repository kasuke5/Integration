<?php

include_once("modele/admin.php");
include_once("modele/connexion_bdd.php");
include("modele/co_in.php");
unset($info);
if(isset($_SESSION["id_user"])){ //ajouter if admin
	
	if ($_POST['id']){
		remove_user_complete($_POST['id_event'],$_POST['id_user']);
		$info = "Utilisateur et site(s) relié(s) supprimés";
	}
	if ($_POST['envoyer']==1) {
		activate_event($_POST['id_event']);
		$info = 'Evenement bien activé';
	} elseif ($_POST['envoyer'] == 0) {
		desactivate_event($_POST['id_event']);
		$info = 'Evenement bien désactivé';
	}
		$users = get_users();

	include_once("vue/admin.php");
}else{
	$info = "Connectez-vous pour accéder à cette page";
	include_once("controleur/connexion.php");
}