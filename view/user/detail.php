<?php

	require_once File::build_path(array('model', 'ModelJeu.php'));
	require_once File::build_path(array('model', 'ModelEmotions.php'));
	require_once File::build_path(array('model', 'ModelPost.php'));
    
    echo $login;
    echo "<br><a href=index.php?controller=user&action=update&login=" . rawurlencode($v->getLogin()) . '>' . 'MODIFIER' . '</a>'.'<br>';

    if (empty($tab_p)) {
    	echo("Vous n'avez rien posté jusqu'a maintenant.");
    }
    else{
		echo("<h4> Vos Post : </h4>");

		foreach ($tab_p as $p){
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
	
			$emotion=ModelEmotions::getEmotionById($emotion_id);
			echo ("<div class=\"shadow-sm p-3 mb-5 bg-white rounded\">");
			echo ("<div class=\"card\"> <div class=\"card-header\">".htmlspecialchars($titre)."</div>");
			echo("<div class=\"card-body\"> <h5 class=\"card-title\">".htmlspecialchars($titre_jeu)."</h5> 
				<p class=\"card-text\">".htmlspecialchars($contenu)."</p> 
	
				
				<button type=\"button\" class=\"btn btn-outline-secondary\">tristesse ".htmlspecialchars($emotion->getTristesse())."</button>
				<button type=\"button\" class=\"btn btn-outline-success\">joie ".htmlspecialchars($emotion->getJoie())."</button>
				<button type=\"button\" class=\"btn btn-outline-danger\">colère ".htmlspecialchars($emotion->getColere())."</button>
				<button type=\"button\" class=\"btn btn-outline-warning\">peur ".htmlspecialchars($emotion->getPeur())."</button>
				<button type=\"button\" class=\"btn btn-outline-info\">surprise ".htmlspecialchars($emotion->getSurprise())."</button>
				<button type=\"button\" class=\"btn btn-outline-dark\">dégout ".htmlspecialchars($emotion->getDegout())."</button>");
			
	
			echo("<div class=\"card-footer\">");
			echo("<div class=\"row\"><div class=\"col-sm-6\"> <div class=\"card\">Upvote : ".htmlspecialchars($nbUpvote)." <button type=\"button\" name=\"btn\" class=\"btn btn-primary btn-sm\" data-toggle=\"button\" aria-pressed=\"false\" id=\"$id\">Upvote </button></div></div>");
	
			echo("<div class=\"col-sm-6\"> <div class=\"card\">Auteur : ".htmlspecialchars($auteur_id)."</div></div></div>");
			if(isset($_SESSION["login"]) && $_SESSION["login"] == $auteur_id){
				echo("<br><a href=index.php?action=update&id=" . rawurlencode($p->getId()) . '>' . 'MODIFIER' . '</a>');
			}
			echo("</div></div></div></div>");
		}

    }
?>
