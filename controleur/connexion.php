<?php

// =>  Contrôleur
include_once("modele/co_in.php");
include_once("modele/events.php");
include_once("modele/connexion_admin.php");
include_once("modele/connexion_bdd.php");

if(!isset($_SESSION["id_user"])){

	if(isset($_POST["action"])){
				$id_user = connexion($_POST["login"],$_POST["pass"]);
				$admin = get_admin($_POST["login"]);
				if($id_user == 0){
					$info = "Erreur : Login ou Mot de passe incorrect";
					include_once("vue/connexion.php"); // Ajouter un message sur la page
				}elseif($id_user != 0 && $admin == 0) {
					$_SESSION["id_user"] = $id_user;
					$_SESSION["login_user"] = $_POST["login"];
					$_SESSION["pass_user"] = $_POST["pass"];
					include_once("controleur/tableau_bord.php");
				} elseif ($admin){
					$_SESSION['admin'] = 1;
					echo $_SESSION['admin'];
					include_once("controleur/connexion_admin.php");
				}
	} else{
		include_once("vue/connexion.php");
	
	}
}else
	include_once("controleur/tableau_bord.php");
	
?>