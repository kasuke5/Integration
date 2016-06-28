<?php
include ('header.php');
if (isset($info)) {
	echo $info;
}
?>

<h3>Gestion des utilisateurs</h3>

	<table class="table table-striped">
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
			<tr>
			<?php
          for($i=0;$i<count($users);$i++){;
              echo"<td>".$users[$i]["user_login"]."</td>
                  <td>".$users[$i]["user_chat"]."</td>
                  <td>".$users[$i]["event_title"]."</td>
                  <td>".$users[$i]["event_mail"]."</td>"
                  "<form role='post' action=''>
                  	<button class='btn-danger' name='".$users[$i]["user_id"]."'><i class='fa fa-trash'></i></button>
                  	</form>
                  "
                  ;
          }
            ?>
            </tr>
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
			<tr>
				<td>Digidix</td>
				<td>digidix.eventizi.itinet.fr</td>
				<td>Kebab</td>
				<td><button class="btn-danger"><i class="fa fa-trash"></i></button></td>
			</tr>
		</tbody>
	</table>


<?php
include ('footer.php');
