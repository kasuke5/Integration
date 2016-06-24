<?php

function add_events($details,$site){
		global $bdd;
		$role = 0;
		$retour = 1;
		$image = "img/".$_SESSION["login_user"]."/".$details["nom"]."/event.jpg";
		$organisateur = $_SESSION["id_user"];
		

			$req = $bdd->prepare('INSERT INTO t_event (event_title, event_description, Categories_idCategories, event_date_debut, event_date_fin, event_adresse, event_organisateur, image, site) VALUES(:nom, :description, :categorie, :debut, :fin, :adresse, :organisateur, :image, :site)');
			$req->execute(array(
			'nom' => $details["nom"],
			'description' => $details["description"],
			'categorie' => $details["categorie"],
			'debut' => $details["debut"],
			'fin' => $details["fin"],
			'adresse' => $details["adresse"],
			'organisateur' => $organisateur,
			'image' => $image,
			'site' => $site,
			)) or die ( print_r($req->errorInfo()) );
				
				$event_id = id_events($details["nom"])["event_id"];
				$req = $bdd->prepare('INSERT INTO Users_has_Events (Users_idUsers, Events_idEvents, role) VALUES (:user_id, :event_id, :role)');    		
   				$req->execute(array(
    			'user_id' => $organisateur,
    			'event_id' => $event_id,
    			'role' => 1	)) or die ( print_r($req->errorInfo()) );

    			$req = $bdd-> query('UPDATE t_user SET user_role = 1 WHERE user_id = '.$_SESSION["id_user"]);
			}


function id_events($name){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT event_id FROM t_event WHERE event_title = ?');
	$req->execute(array($name));
	$donnees = $req->fetch();
	return $donnees;
}

function get_events(){
	global $bdd;
	$donnees = 0;
	$i=0;
	$renvoyer = [];
	$req = $bdd->query('SELECT * FROM t_event');
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}

function get_event_by_name($name){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT event_id FROM t_event WHERE event_title = ?');
	$req->execute(array($name));
	$donnees = $req->fetch();
	return $donnees;
}

function get_events_by_user($id){
	global $bdd;
	$donnees = 0;
	$i=0;
	$renvoyer = [];
	$req = $bdd->prepare('SELECT * FROM t_event e JOIN Users_has_Events ue ON e.event_id = ue.Events_idEvents AND ue.Users_idUsers = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}


function get_users_by_event($id){
	global $bdd;
	$donnees = 0;
	$i=0;
	$renvoyer = [];
	$req = $bdd->prepare('SELECT user_login, user_id, count(user_login) as nombre FROM t_user u JOIN Users_has_Events ue ON u.user_id = ue.Users_idUsers AND ue.Events_idEvents = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}



/*function GetLoginById($id){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT user_login, user_password FROM t_user WHERE user_id = ?');
	$req->execute(array($id));
	$donnees = $req->fetch();
	return $donnees;
}*/


function get_event_by_id($id){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT * FROM t_event WHERE event_id = ?');
	$req->execute(array($id));
	$donnees = $req->fetch();
	return $donnees;
}


function remove_event($id_event,$id_user){
	global $bdd;
	$req = $bdd->prepare('DELETE FROM Users_has_Events WHERE Events_idEvents = ? AND Users_idUsers = ?');
	$req->execute(array($id_event,$id_user)) or die ( print_r($req->errorInfo()) );
	$req = $bdd->prepare('DELETE FROM t_event WHERE event_id = ?');
	$req->execute(array($id_event)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}