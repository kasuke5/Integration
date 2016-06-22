<?php

	include("modele/connexion_bdd.php");
	include("modele/events.php");

	if($_POST["action"] == "supprimer"){
	$event = get_event_by_id($_POST["id"]);
	remove_event($_POST["id"],$_SESSION["id_user"]);
	if($event["site"] ==1){
		$commande_web = "./script_web.sh 2 ".$event["event_title"]." 2 ".$event["event_title"]." ".$_SESSION["login_user"];
		$commande_bdd = "./script_bdd.sh 2 ".$event["event_title"]." ".$_SESSION["login_user"]." 1";
		exec($commande_bdd);
	}elseif ($event["site"] ==2) {
		$commande_web = "./script_web.sh 2 ".$event["event_title"]." 1 ".$event["event_title"]." ".$_SESSION["login_user"];
	}elseif ($event["site"] ==3) {
		$commande_web = "./script_web.sh 2 ".$event["event_title"]." 1 ".$event["event_title"]." ".$_SESSION["login_user"];
		$commande_bdd = "./script_bdd.sh 2 ".$event["event_title"]." ".$_SESSION["login_user"]." 1";
		exec($commande_bdd);
	}
	exec($commande_web);
}

include "controleur/tableau_bord.php";
