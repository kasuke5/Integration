<?php

session_start();
//echo $_SERVER["REQUEST_URI"];
if($_SERVER["REQUEST_URI"] == "/"){
        include_once("controleur/accueil.php");
}elseif($_SERVER["REQUEST_URI"] == "/inscription"){
        include_once("controleur/inscription.php");
}elseif($_SERVER["REQUEST_URI"] == "/connexion"){
        include_once("controleur/connexion.php");
}else{
        include_once("vue/erreur404.html");
}
?>