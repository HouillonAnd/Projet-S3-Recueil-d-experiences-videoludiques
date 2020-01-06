<?php
	require_once File::build_path(array('model', 'ModelJeu.php'));

	echo(" Les jeux enregistrés : <br>");

	foreach ($tab_jeu as $j){

		$titre = $j->getTitre();
		$id = $j->getId();

		echo(htmlspecialchars($titre."    "));
		echo("<a href=index.php?controller=emotions&action=MoyenneEmotionPourJeu&id=" . rawurlencode($id) . '>' . '       Voir les Moyennes des jouers' . "</a><br>");


	}


?>
