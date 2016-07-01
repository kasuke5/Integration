<?php 
function get_admin($login) {
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM t_user WHERE user_admin = 1 AND user_login = ?');
	$req->execute(array($login)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}