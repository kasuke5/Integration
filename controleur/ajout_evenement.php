<?php
	

include_once("modele/events.php");
include_once("modele/membre.php");
include_once("modele/co_in.php");
include_once("modele/connexion_bdd.php");

$categories = get_categories();


function verif_upload($image){
	$erreur = 0;
	if($image['error'] > 0){ 
		$erreur = 1;
	}
	if($image['size'] > 12345){
		$erreur = 1;
	}
	// faire d'autres test
	var_dump($erreur);
	return $erreur;
}


function move_file($image){
	$chemin = "img/".$_SESSION["login_user"];
	if(is_dir($chemin)){
		mkdir($chemin."/".$_POST["nom"]);
	}else{
		mkdir("img/".$_SESSION["login_user"]);
		mkdir($chemin."/".$_POST["nom"]);
	}
	$resultat = move_uploaded_file($image['tmp_name'],$chemin."/".$_POST["nom"]."/event.jpg");
	return $resultat;
}



if(isset($_POST["action"])){
	//var_dump($_FILES,$_POST);
	if(verif_upload($_FILES["photo"])){
		$infos_user = GetLoginById($_SESSION["id_user"]);
		$login = $infos_user["user_login"];
		$password = $infos_user["user_password"];
		$role = $infos_user["user_role"];


		if($_POST["choix"] == "wordpress"){
			$site = 1;
		}elseif ($_POST["choix"]=="importer") {
			$site = 2;
			if(isset($_POST["bdd"])){
				$site = 3;
			}
		}
			if(!get_event_by_name($_POST["nom"])){
				if(move_file($_FILES["photo"])){
					add_events($_POST,$site);
					switch($site){
						case 1:
							$commande_web = "./script_web.sh 1 ".$_POST["nom"]." 2 ".$_POST["nom"] $_SESSION["login_user"];
							$commande_bdd = "./script_bdd.sh 1 ".$_POST["nom"];
							exec($commande_bdd);
							break;
						case 2:
							$commande_web = "./script_web.sh 1 ".$_POST["nom"]." 1 ".$_POST["nom"] $_SESSION["login_user"];
							if($role == 0){
								$commande_mss = "./script_mss.sh 1 ".$_SESSION["login_user"];
								exec($commande_mss); 
							}
							break;
						case 3:
							$commande_bdd = "./script_bdd.sh 1 ".$_POST["nom"];
							exec($commande_bdd);
							break;
						exec($commande_web);
				}else{
				echo "erreur fichier";
				}
			}else{
				echo"erreur existe déjà";
			}
		

		
		
	}else
	include_once("vue/ajout_evenement.php");
	
}else
	include_once("vue/ajout_evenement.php");


?>