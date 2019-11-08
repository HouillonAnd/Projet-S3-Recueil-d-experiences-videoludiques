<?php
			// Si $controleur='voiture' et $view='list',
			// alors $filepath="/chemin_du_site/view/voiture/list.php"
			
			$filepath = File::build_path(array("view", $controller, "$view.php"));
			require $filepath;
		?>