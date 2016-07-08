<?php

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=Event1z1;charset=utf8', 'root', 'Event1z1GFJ2016');


}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}



include("../modele/events.php");

function afficher_participation($id_user,$id_event){
	$val = check_participation($id_user,$id_event);
		if($val == -1){
			$inscription =  "<button type='submit'  class='btn btn-default inscrire'value='".$id_event."'>S'inscrire</button>";
		}elseif ($val == 1) {
			$inscription = "Vous êtes l'organisateur de cet évènement.";
		}else{
			$inscription = "Vous êtes inscrit à cet évènement.";
		}
		return $inscription;
}


if(isset($_GET["term"])){
	$flag = 1;
	$term = $_GET['term'];
}else{
	$flag = 0;
	$term = $_GET['query'];
}
	if( isset($_GET["tags"]) AND strlen($_GET["tags"])>2){
		$tags = json_decode($_GET["tags"]);
		$requete = "SELECT * FROM t_event e WHERE event_id IN";
		$nb = count($tags);
		for($i=0;$i<$nb;$i++){
			if($i != $nb-1){
	 			$requete = $requete." (SELECT Events_idEvents FROM Events_has_Tags WHERE Tags_idTags =".$tags[$i].") AND event_id IN";
	 		}else{
	 			$requete = $requete." (SELECT Events_idEvents FROM Events_has_Tags WHERE Tags_idTags =".$tags[$i].")";
	 		}	
		}
		$requete = $requete." AND (event_title LIKE :term OR event_description LIKE :term)";

		if($_GET["categorie"] !=0){
			$requete = $requete." AND e.Categories_idcategories = :c";
			echo($requete);	
			$requete = $bdd->prepare($requete);
			$requete->execute(array('term' => '%'.$term.'%','c' => $_GET["categorie"]));
		}else{
			$requete = $bdd->prepare($requete);
			$requete->execute(array('term' => '%'.$term.'%'));
		}

	}elseif($_GET["categorie"] !=0){
		$requete = $bdd->prepare('SELECT * FROM t_event e WHERE (event_title LIKE :term OR event_description LIKE :term) AND e.Categories_idcategories = :c');
		$requete->execute(array('term' => '%'.$term.'%','c' => $_GET["categorie"]));
	}else{

	$requete = $bdd->prepare('SELECT * FROM t_event WHERE event_title LIKE :term OR event_description LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE

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
				$nom = url_transform($renvoyer[$i]["event_title"]);
	            echo"<div class='row'>
	            <div class='col-md-7'>
	                <a href='#''>
	                    <img class='img-responsive' src='".$renvoyer[$i]["image"]."' alt=''>
	                </a>
	            </div>
	            <div class='col-md-13'>
	                <h4>".$renvoyer[$i]["event_title"]."</h4>
	                <h3>Cet évènement commence le ".$renvoyer[$i]["event_date_debut"]."</h3>
	                <p>".$renvoyer[$i]["event_description"]."</p>
	                <a class='btn btn-primary' href='http://".$nom.".eventizi.itinet.fr' target='_blank' >View Project <span class='glyphicon glyphicon-chevron-right'></span></a>
	                ".afficher_participation($_GET["id"],$renvoyer[$i]["event_id"])."
	            </div>
	        </div>
	        <!-- /.row -->

	        <hr>";
	        }

		}
	}


?>
