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

			$emotion=ModelEmotions::getEmotionById($emotion_id);
			$tristesse=$emotion->getTristesse();
			$joie=$emotion->getJoie();
			$colere=$emotion->getColere();
			$peur=$emotion->getPeur();
			$surprise=$emotion->getSurprise();
			$degout=$emotion->getDegout();


			echo ("<div class=\"shadow-sm p-0 mb-5 rounded\" id=\"post\">");
			echo ("<div class=\"card\"> <div class=\"card-header\" id=\"titre\"><h3>".ucfirst(htmlspecialchars($titre))."</h3></div>");
			echo("<div class=\"card-body\"> <h5 class=\"card-title\">".htmlspecialchars($titre_jeu)."</h5> 
				<p class=\"container\">".htmlspecialchars($contenu)."</p> 

				<div>Tristesse<i data-feather=\"circle\"></i><br>
				<div class=\"progress\">
					<div class=\"progress-bar bg-secondary\" role=\"progressbar\" style=\"width:".htmlspecialchars($tristesse)."%;\" aria-valuenow=\"".htmlspecialchars($tristesse)."\" aria-valuemin=\"0\" aria-valuemax=\"100\">".htmlspecialchars($tristesse)."</div>
				</div>
				</div>

				<div>Joie<br>
				<div class=\"progress\">
					<div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: ".htmlspecialchars($joie)."%;\" aria-valuenow=\"".htmlspecialchars($joie)."\" aria-valuemin=\"0\" aria-valuemax=\"100\">".htmlspecialchars($joie)."</div>
				</div>
				</div>

				<div>Colère<br>
				<div class=\"progress\">
					<div class=\"progress-bar bg-danger\" role=\"progressbar\" style=\"width: ".htmlspecialchars($colere)."%;\" aria-valuenow=\"".htmlspecialchars($colere)."\" aria-valuemin=\"0\" aria-valuemax=\"100\">".htmlspecialchars($colere)."</div>
				</div>
				</div>

				<div>Peur<br>
				<div class=\"progress\">
					<div class=\"progress-bar bg-warning\" role=\"progressbar\" style=\"width: ".htmlspecialchars($peur)."%;\" aria-valuenow=\"".htmlspecialchars($peur)."\" aria-valuemin=\"0\" aria-valuemax=\"100\">".htmlspecialchars($peur)."</div>
				</div>
				</div>

				<div>Surprise<br>
				<div class=\"progress\">
					<div class=\"progress-bar bg-info\" role=\"progressbar\" style=\"width: ".htmlspecialchars($surprise)."%;\" aria-valuenow=\"".htmlspecialchars($surprise)."\" aria-valuemin=\"0\" aria-valuemax=\"100\">".htmlspecialchars($surprise)."</div>
				</div>
				</div>

				<div>Dégoût<br>
				<div class=\"progress\">
					<div class=\"progress-bar bg-dark\" role=\"progressbar\" style=\"width: ".htmlspecialchars($degout)."%;\" aria-valuenow=\"".htmlspecialchars($degout)."\" aria-valuemin=\"0\" aria-valuemax=\"100\">".htmlspecialchars($degout)."</div>
				</div>
				</div>
				");

			

			echo("<div class=\"card-footer\">");
			echo("<div class=\"row\"><div class=\"col-sm-6\"> <div class=\"card\">Upvote : ".htmlspecialchars($nbUpvote)." <button type=\"button\" name=\"btn\" class=\"btn btn-primary btn-sm\" data-toggle=\"button\" aria-pressed=\"false\" id=\"$id\">Upvote </button></div></div>");

			echo("<div class=\"col-sm-6\"> <div class=\"card\">Auteur : ".htmlspecialchars($auteur_id)."</div></div></div>");
			if(isset($_SESSION["login"]) && $_SESSION["login"] == $auteur_id){
				echo("<br><a href=index.php?action=update&id=" . rawurlencode($p->getId()) . '>' . 'MODIFIER' . '</a>');
			}
			echo("</div></div></div></div>");
	    }
?>