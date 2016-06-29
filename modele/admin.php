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

function delete_user($id){
	global $bdd;
	$req = $bdd->prepare('DELETE FROM t_user WHERE user_id = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}

function delete_event($id){
	global $bdd;
	$req = $bdd->prepare('DELETE FROM t_event WHERE event_id = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}

