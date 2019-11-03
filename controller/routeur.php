<?php
	require_once (File::build_path(array("controller","ControllerPost.php")));
	
	// On recupère l'action passée dans l'URL
	
	$class_methods = get_class_methods('ControllerPost');

	if (isset($_GET['action'])){

		if (in_array($_GET['action'],$class_methods)) {
			// On recupère l'action passée dans l'URL
			$action = $_GET['action'];
			// Appel de la méthode statique $action de ControllerVoiture
			ControllerPost::$action();

		}else{
			ControllerPost::error();
		}
	}
?>