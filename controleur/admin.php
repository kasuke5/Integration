<?php

if (isset($_POST['nginx'])){
	exec('service nginx restart');
	$info = 'service nginx a été redémarré';
} elseif ($_POST['postfix']) {
	exec('service postfix restart');
	$info = 'service postfix a été redémarré';
} else {
	include_once('vue/admin.php');
}