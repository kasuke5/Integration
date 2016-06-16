<?php
include ('header.php');
if (isset($info)) {
	echo $info;
}
?>

<div class="container">
<h3>Gestion des services réseaux</h3>
<form method="post">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Service</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Postfix</td>
				<td><button name="postfix">Relancer</button></td>
			</tr>
			<tr>
				<td>Nginx</td>
				<td><button name="nginx">Relancer</button></td>
			</tr>
			<tr>
				<td>Mysql</td>
				<td><button name="mysql">Relancer</button></td>
			</tr>
		</tbody>
	</table>
<h3>Gestion des utilisateurs</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom utilisateur</th>
				<th>Compte chat</th>
				<th>Mail lié aux evenements</th>
				<th>Supp.</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Kebab78</td>
				<td>kebab.jappix</td>
				<td>eventKebab@eventizi.itinet.fr</td>
				<td><button class="btn-danger"><i class="fa fa-trash"></i></button></td>
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
</form>
</div>

<?php
include ('footer.php');
