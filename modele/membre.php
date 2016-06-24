<?php

function infos_membres($id){
	$id = intval($id);
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT user_login, user_role FROM t_user WHERE user_id = ?');
	$req->execute(array($id));
	$donnees = $req->fetch();
	return $donnees;
}

function user_skills($id){
	$id = intval($id);
	global $bdd;
	$donnees = 0;
	$i=0;
	$renvoyer = [];
	$req = $bdd->prepare('SELECT skill_nom FROM t_skill s JOIN t_skill_has_t_user sk ON s.skill_id = sk.t_skill_skill_id AND sk.t_user_user_id = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}



function get_categories(){
	global $bdd;
	$donnees = 0;
	$i=0;
	$renvoyer = [];
	$req = $bdd->query('SELECT categorie_id, categorie_name FROM t_categorie');
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}

function get_tags(){
	global $bdd;
	$donnees = 0;
	$i=0;
	$renvoyer = [];
	$req = $bdd->query('SELECT tag_id, tag_name FROM t_tag');
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}



function get_events_by_tags($tags){
	global $bdd;
	$renvoyer = [];
	$i=1;

	$requete = "SELECT e.event_title, e.event_description FROM t_event e WHERE event_id IN";
	foreach ($tags as $cle => $value) {
			if($i < count($tags)){
	 			$requete = $requete." (SELECT Events_idEvents FROM Events_has_Tags WHERE Tags_idTags =".$value.") AND event_id IN";
	 		}else{
	 			$requete = $requete." (SELECT Events_idEvents FROM Events_has_Tags WHERE Tags_idTags =".$value.")";
	 		}	
	 		$i++;
	 }
	 $req = $bdd->query($requete);
	 $i=0;
	 while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}

function url_transform($str)
{
  		$str    =       preg_replace('#[^\\p{L}\d]+#u', '-', $str);
        $str    =       trim($str, '-');
        $str    =       iconv(mb_detect_encoding($str), 'us-ascii//TRANSLIT', $str);
        $str    =       strtolower($str);
        $str    =       preg_replace('#[^-\w]+#', '', $str);
        return  $str;
}
