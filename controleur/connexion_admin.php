<?php
include('modele/connexion_admin.php');
include_once('modele/connexion_bdd.php');

if(isset($_POST['login_admin']) && isset($_POST['pass_admin'])) {
		$admin = get_admin($_POST['login_admin']);
		if ($admin) {
			$_SESSION['admin'] = 1;
		} else {
			include('vue/connexion_admin.php');
		}
} 
if($_SESSION['admin'] == 1) {
		include('controleur/admin.php');
} else {
	include('vue/connexion_admin.php');
}