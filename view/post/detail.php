<?php
  	$id=$p -> getId();
	$auteur_id=$p -> getAuteur_id();
	$date_publication=$p -> getDate_publication();
	$contenu=$p -> getContenu();
	$jeu_id=$p -> getJeu_id();
	$titre=$p -> getTitre();
	$emotion_id=$p -> getEmotion_id();
	$nbUpvote=$p -> getnbUpvote();

    echo '<p> Post '.htmlspecialchars($id) .' auteur '. htmlspecialchars($auteur_id) .' (date'. htmlspecialchars($date_publication).' )</p>
    titre:'.htmlspecialchars($titre).
    '<br>
    contenu:'.htmlspecialchars($contenu).
    '<br>
    nbUpvote:'.htmlspecialchars($nbUpvote);

  
?>
