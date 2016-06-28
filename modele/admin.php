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