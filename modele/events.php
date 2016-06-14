<?php

function add_events($details){
		global $bdd;
		$role = 0;
		$categorie = 1; // A modifier
		$organisateur = 30; // A modifier
				$req = $bdd->prepare('INSERT INTO t_event (event_title, event_description, Categories_idCategories, event_date_debut, event_date_fin, event_adresse, event_organisateur) VALUES(:nom, :description, :categorie, :debut, :fin, :adresse, :organisateur)');
				$req->execute(array(
				'nom' => $details["nom"],
    			'description' => $details["description"],
    			'categorie' => $categorie,
    			'debut' => $details["debut"],
    			'fin' => $details["fin"],
    			'adresse' => $details["adresse"],
    			'organisateur' => $organisateur
    			)) or die ( print_r($req->errorInfo()) );
				
			/*	$event_id = id_events($details["nom"])["event_id"];
				$req = $bdd->prepare('INSERT INTO Users_has_Events (Users_idUsers, Events_idEvents, role) VALUES (:user_id, :event_id, :role)');    		
   				$req->execute(array(
    			'user_id' => $organisateur,
    			'event_id' => $event_id,
    			'role' => 1	)) or die ( print_r($req->errorInfo()) );*/

}


function id_events($name){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT event_id FROM t_event WHERE event_title = ?');
	$req->execute(array($name));
	$donnees = $req->fetch();
	return $donnees;
}
