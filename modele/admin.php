<?php
function get_users(){
	global $bdd;
	$donnees = 0;
	$i=0;
	$renvoyer = [];
	$req = $bdd->query('SELECT * 
						FROM t_event as e 
							INNER JOIN Users_has_Events as ue
    							ON e.event_id = ue.Events_idEvents
    						INNER JOIN t_user as u
    							ON u.user_id = ue.Users_idUsers');
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}

function nb_event_user($id){
	global $bdd;
	$req = $bdd->prepare('SELECT COUNT(event_id) as nb_event FROM t_event WHERE event_organisateur = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees['nb_event'];	
}

function get_user() {
	global $bdd;
	$req = $bdd->query('SELECT * FROM t_user WHERE user_admin != 1');
	$donnees = $req->fetchAll();
	return $donnees;
}

function delete_user($id){
	global $bdd;
	$req = $bdd->prepare('DELETE FROM t_user WHERE user_id = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}
function remove_user_complete($id_user){
	global $bdd;
	$req = $bdd->prepare('DELETE FROM Users_has_Events WHERE Users_idUsers = ?');
	$req->execute(array($id_event,$id_user)) or die ( print_r($req->errorInfo()) );
	$req = $bdd->prepare('DELETE FROM t_event WHERE event_organisateur = ?');
	$req->execute(array($id_user)) or die ( print_r($req->errorInfo()) );
	$req = $bdd->prepare('DELETE FROM t_user WHERE user_id = ?');
	$req->execute(array($id_user)) or die ( print_r($req->errorInfo()));
	$donnees = $req->fetch();
	return $donnees;
}

function desactivate_event($id){
	global $bdd;
	$req = $bdd->prepare('UPDATE t_event SET event_active = 0 WHERE event_id = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}

function activate_event($id){
	global $bdd;
	$req = $bdd->prepare('UPDATE t_event SET event_active = 1 WHERE event_id = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}
