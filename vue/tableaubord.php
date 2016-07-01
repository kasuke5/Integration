<?php 
include ('header.php');

$nb_org = count($events_org);
$nb_ins = count($events_ins);

?>

<?php
if($nb_org>0){
  echo'
<div class="tabcontainer">
<h3>Mes évenements</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Nom évènement</th>
        <th>Date/heure début</th>
        <th>Nombre de participants</th>
        <th>Site associé</th>
        <th>Supp.</th>
      </tr>
    </thead>
    <tbody>';
  }else{

    echo"<div class='tabcontainer'><h2> Vous n'organisez pas d'évènement. </h2>";
  }
      
      for($i=0;$i<$nb_org;$i++){
        $fqdn = url_transform($events_org[$i]["event_title"]);
        echo"<tr>
        <td>".$events_org[$i]["event_title"]."</td>
        <td>".$events_org[$i]["event_date_debut"]."</td>
        <td>".$nb_event[$i]."</td>
        <td><a href='http://".$fqdn.".eventizi.itinet.fr' target='_blank'>".$fqdn.".eventizi.itinet.fr</a></td>
        <td><form action='actions' method='post'><input type='hidden' name='id' value='".$events_org[$i]["event_id"]."'><input type='hidden' name='action' value='supprimer'><button class='btn-danger'><i class='fa fa-trash'></i></button></td></tr></form>";
      }
      ?>
    </tbody>
  </table>
  <a href="./ajout_evenement" class="btn"><i class="fa fa-plus"></i></a>


<?php

if($nb_ins>0){
  echo'<h3>Evénements auxquels je suis inscrit</h3>
<table class="table table-striped">
  <tr>
    <th>Nom évenement</th>
    <th>Date/heure début</th>
    <th>Date/heure fin</th>
    <th>Adresse</th>
    <th>Organisateur</th>
    <th> Site associé</th>
    <th> Se désinscrire</th>
  </tr>';
}else{
  echo"<h2> Vous n'êtes inscrit à aucun évènement. </h2>";
}

  for($i=0;$i<$nb_ins;$i++){
    echo"<tr>
            <td>".$events_ins[$i]["event_title"]."</td>
            <td>".$events_ins[$i]["event_date_debut"]."</td>
            <td>".$events_ins[$i]["event_date_fin"]."</td>
            <td>".$events_ins[$i]["event_adresse"]."</td>
            <td>".GetLoginById($events_ins[$i]["event_organisateur"])["user_login"]."</td>
            <td>".$events_ins[$i]["event_title"].".eventizi.itinet.fr</td>
            <td><form action='actions' method='post'><input type='hidden' name='id' value='".$events_ins[$i]["event_id"]."'><input type='hidden' name='action' value='desinscrire'><button class='btn-danger'><i class='fa fa-trash'></i></button></td></tr></form>";
  }
?>


</table>
</div>
<?php
include ('footer.php');
?>