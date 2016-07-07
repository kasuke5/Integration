<?php
include ('header.php');
if (isset($info)) {
	echo $info;
}
?>
<div class="tabcontainer">
<h3>Gestion des utilisateurs</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Nom utilisateur</th>
				<th>Mail utilisateur</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $users = get_users(); ?>
		<?php foreach ($users as $user): 
			$events = get_events_by_user($user['user_id']); ?> 
			<tr class="user info" >
				<td><?= $user['user_login'] ?></td>
				<td><?= $user['user_email'] ?></td>
				<td>
				<div class="btn-group">
					<button class="btn btn-primary user-show-events glyphicon glyphicon-eye-open" target="#user-<?=$user['user_id']?>-events"> Voir les evenements de l'utilsateur</button>
					<form method='post'>
              			<button class='btn btn-danger glyphicon glyphicon-trash' name='id' value='<?=$user['user_id']?>'></button>
              		</form>
              	</div>
              	</td>
			</tr>
			<tr class="events success" style="display: none;" id="user-<?=$user['user_id']?>-events">
				<td colspan="3">
				<?php if ($events) :?>
					<table id="<?= $user['user_id'] ?>" class="table">
						<thead>
							<tr class="success">
								<th colspan="3" class='events-title text-center'>Evenements de l'utilisateur <?= $user['user_login']?></th>
							</tr>
							<tr class="success">
								<th>Nom du site</th>
								<th>Mail associé</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($events as $event): ?>

							<tr class="event success">
								<td><?= $event['event_title']; ?></td>
								<td><?= $event["event_mail"] ?></td>
								<td>
									<form method='post' action='/admin'>
										<input type='hidden' name='id_event' value="<?= $event['event_id'] ?>">
										<?php if ($event['event_active'] == 1) {
											$bouton = "<button type='submit' name='envoyer' value='0' class='btn btn-danger glyphicon glyphicon-remove'> Desactiver";
										} else {
											$bouton = "<button type='submit' name='envoyer' value='1' class='btn btn-success glyphicon glyphicon-ok'> Activer";
										}
										  echo $bouton;?>
										
									</form>
								</td>

							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				<?php else: ?>
					Cet utilisateur n'a pas encore ajoute d'evenements.
				<?php endif;?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		</div>


<script type="text/javascript">
$(document).ready(function(){
    
	$('.user-show-events').click(function(e){
		 var target = $(this).attr('target');
		 $(target).slideToggle();
	});

});
</script>
<?php
include ('footer.php');
