<?php
	require_once File::build_path(array('model', 'ModelJeu.php'));
	require_once File::build_path(array('model', 'ModelEmotions.php'));

    foreach ($tab_post as $p){
	    $id=$p -> getId();
		$auteur_id=$p -> getAuteur_id();
		$date_publication=$p -> getDate_publication();
		$contenu=$p -> getContenu();
		$jeu_id=$p -> getJeu_id();
		$titre=$p -> getTitre();
		$emotion_id=$p -> getEmotion_id();
		$nbUpvote=$p -> getnbUpvote();

		$jeu=ModelJeu::getJeuById($jeu_id);
		$titre_jeu=$jeu->getTitre();

		$emotion=ModelEmotions::getEmotionById($emotion_id);

	    echo '<div> titre: '.htmlspecialchars($titre).
	    '<div> jeu: '.htmlspecialchars($titre_jeu).'<div>'.htmlspecialchars($contenu).'</div>';
	    	echo'//place pour les emotions</div>';

		echo'nbUpvote: '.htmlspecialchars($nbUpvote).' auteur '. htmlspecialchars($auteur_id);
		echo "<br><a href=http://webinfo.iutmontp.univ-montp2.fr/~houillona/REV/index.php?action=update&id=" . rawurlencode($p->getId()) . '>' . 'MODIFIER' . '</a>'.'</div>
		<br>';
		
    }
?>