<?php
	
	echo "<p>La demande a été transmise aux administateur.</p>";
	$tab_post = ModelPost::getAllPost(); 
	require_once (File::build_path(array("view","post","list.php")));

?>