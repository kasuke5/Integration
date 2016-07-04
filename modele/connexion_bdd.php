<?php

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=Event1z1;charset=utf8', 'root', 'narutogamer');


}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}
