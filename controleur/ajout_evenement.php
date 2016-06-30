<?php
	

include_once("modele/events.php");
include_once("modele/membre.php");
include_once("modele/co_in.php");
include_once("modele/connexion_bdd.php");

$categories = get_categories();
$message = "";


function verif_champs($champs){
	$erreur = 0;
	if(strlen($champs["nom"])<3 || strlen($champs["nom"])>15){
		$erreur = 1;
	}
	if(strlen($champs["adresse"])<2 || strlen($champs["adresse"])>60){
		$erreur = 1;
	}
	if(strlen($champs["description"])>100){
		$erreur = 1;
	}
	return $erreur;
}


function verif_upload($image){
	if($image["size"] == 0){
		$erreur = -1;
	}else{
		$erreur = 1;
		if($image['error'] > 0){ 
			var_dump($image['error']);
			$erreur = 0;
		}
		if($image['size'] > 2222345){
			$erreur = 0;
		}
	}
	return $erreur;
}


function move_file($image,$existe){
	if($existe > 0){
			$chemin = "img/".$_SESSION["login_user"];
		if(is_dir($chemin)){
			mkdir($chemin."/".$_POST["nom"]);
		}else{
			mkdir("img/".$_SESSION["login_user"]);
			mkdir($chemin."/".$_POST["nom"]);
		}


		$newImage = imagecreatefromjpeg($image['tmp_name']);
		$taille = getimagesize($image['tmp_name']);
		$hauteur = 300;
		$reduction = ( ($hauteur * 100)/$taille[1] );
		$largeur = ( ($taille[0] * $reduction)/100 );
		$image_redim = imagecreatetruecolor($largeur, $hauteur) or die ("Erreur");;
		imagecopyresampled($image_redim, $newImage, 0,0,0,0, $largeur, $hauteur, $taille[0], $taille[1]);
		imagedestroy($newImage);
		$resultat = imagejpeg($image_redim,$chemin."/".$_POST["nom"]."/event.jpg",100);
	}else{
		$resultat = 1;
	}
	
	return $resultat;
}

if(isset($_SESSION["id_user"])){

	if(isset($_POST["action"])){
		if(!verif_champs($_POST)){
			$verif = verif_upload($_FILES["photo"]);
			if($verif){
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
						if(move_file($_FILES["photo"],$verif)){
							add_events($_POST,$site);
							add_tags($_POST);
							if($role == 0){
										$commande_mss = "./script_mss.sh 1 ".$_SESSION["login_user"];
										exec($commande_mss); 
									}
									$name=url_transform($_POST["nom"]);
							switch($site){
								case 1:
									$commande_web = "./script_web.sh 1 ".$name." 2 ".$name." ".$_SESSION["login_user"];
									$commande_bdd = "./script_bdd.sh 1 ".$name;
									$commande_chat = "./script_orga.sh 1 ".$_SESSION["login_user"];
									exec($commande_bdd);
									break;
								case 2:
									$commande_web = "./script_web.sh 1 ".$name." 1 ".$name." ".$_SESSION["login_user"];
									$commande_chat = "./script_orga.sh 1 ".$_SESSION["login_user"];
									break;
								case 3:
									$commande_web = "./script_web.sh 1 ".$name." 1 ".$name." ".$_SESSION["login_user"];
									$commande_bdd = "./script_bdd.sh 1 ".$name;
									$commande_chat = "./script_orga.sh 1 ".$_SESSION["login_user"];
									exec($commande_bdd);
									break;
							}
							exec($commande_web);
							exec($commande_chat);
							include("controleur/tableau_bord.php");
						}else{
						$message = "erreur fichier";
						include"vue/ajout_evenement.php";
						}
					}else{
						$message = "erreur existe déjà";
						include"vue/ajout_evenement.php";
					}
				

				
				
				}else{
					$message = "erreur";
				include_once("vue/ajout_evenement.php");
				}
			}else{
				$message = "Vérifiez la longueur des champs";
				include_once("vue/ajout_evenement.php");
			}
		
	}else{
		include_once("vue/ajout_evenement.php");
	}
}else{
	$message = "Connectez-vous pour accéder à cette page";
	include_once("vue/connexion.php");
}
?>