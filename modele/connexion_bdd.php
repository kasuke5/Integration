<?php

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=event1z1;charset=utf8', 'root', '');


}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}