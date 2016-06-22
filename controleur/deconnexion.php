<?php

        session_destroy();
	unset($_SESSION["id_user"]);
        unset($_SESSION["login_user"]);

        include("vue/index.php");

?>

