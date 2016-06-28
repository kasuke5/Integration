<?php
include ('header.php');
if (isset($info)) {
	echo $info;
}
?>

<h3>Gestion des utilisateurs</h3>

	<table class="table table-striped" style="margin-top:80px">
		<thead>
			<tr>
				<th>Nom utilisateur</th>
				<th>Compte chat</th>
				<th>Evenement</th>
				<th>Mail lié aux evenements</th>
				<th>Supp.</th>
			</tr>
		</thead>
		<tbody>
					<?php
          for($i=0;$i<count($users);$i++){;
			echo "<tr>

             <td>".$users[$i]["user_login"]."</td>
                  <td>".$users[$i]["user_chat"]."</td>
                  <td>".$users[$i]["event_title"]."</td>
                  <td>".$users[$i]["event_mail"]."</td>
                  <td><form method='post'>
                  	<button class='btn-danger' name='id' value='".$users[$i]["user_id"]."'><i class='fa fa-trash'></i></button>
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
				<th>Supp.</th>
			</tr>
		</thead>
		<tbody>
		<?php
          for($j=0;$j<count($users);$j++){;
			echo"<tr>
			
              <td>".$users[$j]["event_title"]."</td>
                  <td>".$users[$j]["event_mail"]."</td>
                  <td>".$users[$j]["user_login"]."</td>
                  <td><form method='post'>
                  	<button class='btn-danger' name='event_id' value='".$users[$j]["event_id"]."'><i class='fa fa-trash'></i></button>
                  	</form></td>
			</tr>";
			  }
            ?>
		</tbody>
	</table>


<?php
include ('footer.php');
