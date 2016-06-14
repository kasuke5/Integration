<?php

try {
	$bdd = new PDO('mysql:host=localhost;dbname=Event1z1', 'root', 'Event1z1GFJ2016');
}catch (Exception $e) {
	die('erreur : '.$e->getMessage());
}





    $term = $_GET['term'];
    //$term='g';

if($_GET["recherche"] !=0){
	$requete = $bdd->prepare('SELECT event_title FROM t_event e WHERE event_title LIKE :term AND e.Categories_idcategories = :c');
	$requete->execute(array('term' => '%'.$term.'%','c' => $_GET["recherche"]));
}else{

$requete = $bdd->prepare('SELECT event_title FROM t_event WHERE event_title LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE

$requete->execute(array('term' => '%'.$term.'%'));
}


$array = array(); // on créé le tableau


while($donnees = $requete->fetch()) // on effectue une boucle pour obtenir les données

{

    array_push($array,$donnees['event_title']); // et on ajoute celles-ci à notre tableau

}


echo json_encode($array); // il n'y a plus qu'à convertir en JSON

 
?>
