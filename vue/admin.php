<?php
include ('header.php');
if (isset($info)) {
	echo $info;
}
?>
<h3>Gestion des services réseaux</h3>
<div class="container">
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
</form>
</div>

<?php
include ('footer.php');
