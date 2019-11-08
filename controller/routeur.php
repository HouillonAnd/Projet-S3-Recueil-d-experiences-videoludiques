<?php
	require_once File::build_path(array("controller","ControllerPost.php"));	
	
	// On recupère l'action passée dans l'URL

	if(!isset($_GET['action'])) {
		$_GET['action'] = 'readAll';
	}

	if(!isset($_GET['controller'])) {
		$_GET['controller'] = 'post';
	}

	// On recupère l'action et le controleur passée dans l'URL
	$action = $_GET['action'];
	$controller = $_GET['controller'];

	//création du nom de classe
	$controller_class = 'Controller'.ucfirst($controller);
	
	//récupères des méthodes du controller passer dans l'URL
	$methodes = get_class_methods($controller_class);

	//vérification si la class et l'action existe bien
	if(class_exists($controller_class) && in_array($_GET['action'], $methodes)) {
		$controller_class::$action();
	}else {
		$controller_class::error();
	}	
?>