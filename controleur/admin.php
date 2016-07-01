<?php


include_once("modele/admin.php");
include_once("modele/connexion_bdd.php");

unset($info);
if (isset($_SESSION['admin'])) {
	if (isset($_POST['id'])){
		remove_user_complete($_POST['id']);
		$info = "Utilisateur et site(s) relié(s) supprimés";
	}
	if (isset($_POST['envoyer'])) {
		if ($_POST['envoyer']==1) {
			activate_event($_POST['id_event']);
			$name = url_transform($_POST['event_name']);
			$ac_event = './script_vhosts.sh 3 '. $_POST['user_name'].$name;
			exec($ac_event);
			$info = 'Evenement bien activé';
		} elseif ($_POST['envoyer'] == 0) {
			desactivate_event($_POST['id_event']);
			$name = url_transform($_POST['event_name']);
			$desac_event = './script_vhosts.sh 4 '. $_POST['user_name'].$name;
			exec($desac_event);
			$info = 'Evenement bien désactivé';
		}
	}
			$users = get_users();
		
			include_once('vue/admin.php');

} else {
	include("controleur/connexion_admin.php");
}
