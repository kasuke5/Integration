<?php
include ('header.php');
if (isset($info)) {
	echo $info;
}
?>
<div class="tabcontainer">
<h3>Gestion des utilisateurs</h3>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom utilisateur</th>
				<th>Compte chat</th>
				<th>Nombre d'évenement</th>
				<th>Mail lié aux evenements</th>
				<th>Supp.</th>
			</tr>
		</thead>
		<tbody>
		
		<?php
			$utilisateurs = get_user();
		  foreach ($utilisateurs as $utilisateur => $value) {
		  			echo "<tr>

             	  <td>".$value['user_login']."</td>
                  <td>".$value['user_chat']."</td>
                  <td>".nb_event_user($value['user_id'])."</td>
                  <td>".$value['user_email']."</td>
                  <td><form method='post'>
                  	<button class='btn btn-danger glyphicon glyphicon-trash' name='id' value='".$value['user_id']."'></button>
                  	</form></td>
                  
          
            </tr>";
		  		}		
            ?>
		</tbody>
	</table>
	<h3>Gestion des sites</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom du site</th>
				<th>Mail associé</th>
				<th>Auteur</th>
				<th>Modification</th>
			</tr>
		</thead>
		<tbody>
		<?php
          for($j=0;$j<count($users);$j++){;
          	if ($users[$j]["event_active"] == 0) {
          		$bouton = "<button type='submit' name='envoyer' value='1' class='btn btn-success glyphicon glyphicon-ok'> Activer";
          	} else {
          		$bouton = "<button type='submit' name='envoyer' value='0' class='btn btn-danger glyphicon glyphicon-remove'> Desactiver";
          	}
			echo"<tr>
			
              <td>".$users[$j]["event_title"]."</td>
                  <td>".$users[$j]["event_mail"]."</td>
                  <td>".$users[$j]["user_login"]."</td>
                  <td><form method='post' action='/admin'>
                  ".$bouton."
                  	<input type='hidden' name='id_event' value='".$users[$j]["event_id"]."'>
                  	<input type='hidden' name='event_name' value='".$users[$j]["event_title"]."'>
                  	<input type='hidden' name='user_name' value='".$users[$j]["user_login"]."'>
                  	</form></td>

			</tr>";
			  }
            ?>
		</tbody>
	</table>
</div>
<?php
include ('footer.php');
