<?php
	include("modele/co_in.php");
	include("modele/events.php");

	if($_POST["action"] == "supprimer"){
	$event = get_event_by_id($_POST["id"]);
	remove_event($_POST["id"],$_SESSION["id_user"]);
	$name = url_transform($event["event_title"]);
	if($event["site"] ==1){
		$commande_web = "./script_web.sh 2 ".$name." 2 ".$_SESSION["pass_user"]." ".$_SESSION["login_user"];
		$commande_bdd = "./script_bdd.sh 2 ".$name." ".$_SESSION["login_user"]." ".$_SESSION["pass_user"];
		exec($commande_bdd);
	}elseif ($event["site"] ==2) {
		$commande_web = "./script_web.sh 2 ".$name." 1 ".$_SESSION["pass_user"]." ".$_SESSION["login_user"];
	}elseif ($event["site"] ==3) {
		$commande_web = "./script_web.sh 2 ".$name." 1 ".$_SESSION["pass_user"]." ".$_SESSION["login_user"];
		$commande_bdd = "./script_bdd.sh 2 ".$name." ".$_SESSION["login_user"];
		exec($commande_bdd);
	}
	exec($commande_web);
	include "controleur/tableau_bord.php";
}elseif($_POST["action"] == "inscrire"){
	inscription_event($_SESSION["id_user"],$_POST["query"]);
}elseif ($_POST["action"] =="desinscrire") {
	desinscription($_POST["id"],$_SESSION["id_user"]);
	include "controleur/tableau_bord.php";
}
