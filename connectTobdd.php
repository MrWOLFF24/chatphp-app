<?php
/********** __ connect to data base __ ***********/
try {
    $bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}