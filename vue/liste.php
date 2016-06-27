<?php

try {
	$bdd = new PDO('mysql:host=localhost;dbname=Event1z1', 'root', 'Event1z1GFJ2016');
}catch (Exception $e) {
	die('erreur : '.$e->getMessage());
}




/*if($_GET["recherche"] == "tag"){

$requete = $bdd->prepare('SELECT tag_name FROM t_tag WHERE tag_name LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE

$requete->execute(array('term' => '%'.$term.'%'));
$array = array(); // on créé le tableau


	while($donnees = $requete->fetch()) // on effectue une boucle pour obtenir les données

	{

	    array_push($array,$donnees['tag_name']); // et on ajoute celles-ci à notre tableau

	}*/

if(isset($_GET["term"])){
	$flag = 1;
	$term = $_GET['term'];
}else{
	$flag = 0;
	$term = $_GET['query'];
}



		if($_GET["categorie"] !=0){
		$requete = $bdd->prepare('SELECT * FROM t_event e WHERE event_title LIKE :term AND e.Categories_idcategories = :c');
		$requete->execute(array('term' => '%'.$term.'%','c' => $_GET["categorie"]));
	}else{

	$requete = $bdd->prepare('SELECT * FROM t_event WHERE event_title LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE

	$requete->execute(array('term' => '%'.$term.'%'));
	}

	if($flag){
		$array = array(); // on créé le tableau
		while($donnees = $requete->fetch()) // on effectue une boucle pour obtenir les données

		{

	    array_push($array,$donnees['event_title']); // et on ajoute celles-ci à notre tableau
	  

		}
		  echo json_encode($array); // il n'y a plus qu'à convertir en JSON
	
	}else{
		$renvoyer =[];
		$i=0;
		while($donnees = $requete->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
		}

		$nb = count($renvoyer);
		if($nb == 0){
			echo"Aucun évènement ne correspond à votre recherche";
		}else{
			for($i=0;$i<count($renvoyer);$i++){
	            echo"<div class='row'>
	            <div class='col-md-7'>
	                <a href='#''>
	                    <img class='img-responsive' src='http://placehold.it/700x300' alt=''>
	                </a>
	            </div>
	            <div class='col-md-13'>
	                <h2>".$renvoyer[$i]["event_title"]."</h2>
	                <p>Cet évènement commence le ".$renvoyer[$i]["event_date_debut"]."</p>
	                <p>".$renvoyer[$i]["event_description"]."</p>
	                <a class='btn' style='background-color:orange' href='http://".$renvoyer[$i]["event_title"].".eventizi.itinet.fr''>Voir le site <span class='glyphicon glyphicon-chevron-right'></span></a>
	            </div>
	        </div>
	        <!-- /.row -->

	        <hr>";
	        }

		}
	}


?>
