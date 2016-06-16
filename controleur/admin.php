<?php

if (isset($_POST['nginx'])){
	exec('sudo service nginx restart');
	$info = 'service nginx a été redémarré';
} elseif ($_POST['postfix']) {
	exec('sudo service postfix restart');
	$info = 'service postfix a été redémarré';
} else {
	include_once('vue/admin.php');
}