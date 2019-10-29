<?php 
session_start();
$_SESSION = array();

session_destroy();
//renvoi à la page de connexion mais dans un second temps on pourrait simpler renvoyer vers la page d'acceuil.
header("Location : connexion.php")

?>