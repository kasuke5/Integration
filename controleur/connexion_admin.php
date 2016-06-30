<?php
include('modele/connexion_admin.php');
include_once('modele/connexion_bdd.php');

if(isset($_POST['login_admin']) && isset($_POST['pass_admin'])) {
	$admin = get_admin($_POST['login_admin']);
	echo $admin;
	if ($admin != NULL) {
		$_SESSION['admin'] = 1;
	}
} elseif($_SESSION['admin'] = 1) {
	include('controleur/admin.php');
} else {
	include('vue/connexion_admin.php');
}