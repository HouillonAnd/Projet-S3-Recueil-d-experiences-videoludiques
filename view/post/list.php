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

		echo ("<div class=\"card\"> <div class=\"card-header\">".htmlspecialchars($titre)."</div>");
		echo("<div class=\"card-body\"> <h5 class=\"card-title\">".htmlspecialchars($titre_jeu)."</h5> <p class=\"card-text\">".htmlspecialchars($contenu)."</p> <p>place pour les emotions</p> </div>");
		echo("<div class=\"card-footer\">");
		echo("<div class=\"row\"><div class=\"col-sm-6\"> <div class=\"card\">Upvote : ".htmlspecialchars($nbUpvote)."</div></div>");
		echo("<div class=\"col-sm-6\"> <div class=\"card\">Auteur : ".htmlspecialchars($auteur_id)."</div></div></div>");
		if(isset($_SESSION["login"]) && $_SESSION["login"]== $auteur_id){
			echo("<br><a href=index.php?action=update&id=" . rawurlencode($p->getId()) . '>' . 'MODIFIER' . '</a>');
		}
		echo("</div></div> <br>");


/*			    '<div> jeu: '.htmlspecialchars($titre_jeu).'<div>'.htmlspecialchars($contenu).'</div>';
			    	echo'//place pour les emotions</div>');

		echo'nbUpvote: '.htmlspecialchars($nbUpvote).' auteur '. htmlspecialchars($auteur_id);
		echo "<br><a href=index.php?action=update&id=" . rawurlencode($p->getId()) . '>' . 'MODIFIER' . '</a>'.'</div>
		<br>';

		<div class="card">
  <div class="card-header">Featured</div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
*/
/*
	    echo '<div> titre: '.htmlspecialchars($titre).
	    '<div> jeu: '.htmlspecialchars($titre_jeu).'<div>'.htmlspecialchars($contenu).'</div>';
	    	echo'//place pour les emotions</div>';

		echo'nbUpvote: '.htmlspecialchars($nbUpvote).' auteur '. htmlspecialchars($auteur_id);
		echo "<br><a href=index.php?action=update&id=" . rawurlencode($p->getId()) . '>' . 'MODIFIER' . '</a>'.'</div>
		<br>';*/
		
    }
?>

<!-- //webinfo.iutmontp.univ-montp2.fr/~houillona/REV -->
<!-- //Projet-S3-Recueil-d-experiences-videoludiques -->