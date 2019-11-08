<?php
	require_once File::build_path(array('model', 'ModelJeu.php'));
	require_once File::build_path(array('model', 'ModelEmotions.php'));
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

    echo '<p> Post '.htmlspecialchars($id) .' auteur '. htmlspecialchars($auteur_id) .' (date '. htmlspecialchars($date_publication).' ) jeu: '.htmlspecialchars($titre_jeu).'</p>
    titre: '.htmlspecialchars($titre).
    '<br>
    contenu: '.htmlspecialchars($contenu).
    '<br>';
    	
	foreach($emotion as $e) {
    	var_dump($e);
    }
	
	echo'nbUpvote: '.htmlspecialchars($nbUpvote);

  
?>
