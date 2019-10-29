<?php
require_once File::build_path(array('controller','ControllerVoiture.php'));
// On recupère l'action passée dans l'URL (à modifier methode POST)
$action = $_GET['action'];	
ControllerVoiture::$action(); 
?>