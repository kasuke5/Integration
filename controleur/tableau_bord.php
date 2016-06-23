<?php

	include_once("modele/events.php");
	include_once("modele/co_in.php");
	include("modele/connexion_bdd.php");


	$user_id =($_SESSION["id_user"]);
	$events = get_events_by_user($user_id);
	$j=0;
	$k=0;
	$events_org = [];
	$events_ins = [];
	for($i=0;$i<count($events);$i++){
		if($events[$i]["role"] == '1'){
			$events_org[$j] = $events[$i];
			$nb_event[$j] = get_users_by_event($events[$i]["event_id"])[0]["nombre"];
			$j++;
		}else
			$events_ins[$k] = $events[$i];
			$k++;
	}
include_once("vue/tableaubord.php");
