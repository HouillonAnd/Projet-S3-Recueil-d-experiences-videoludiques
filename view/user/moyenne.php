<?php
	

	$tristesse=$tab_e[0][0];
	$joie=$tab_e[0][1];
	$colere=$tab_e[0][2];
	$peur=$tab_e[0][3];
	$surprise=$tab_e[0][3];
	$degout=$tab_e[0][4];
	$jeu=ModelJeu::getJeuById($idJeu);
	$titre=$jeu->getTitre();
	$nbPost=$jeu->getNbPost();


	echo ("<div class=\"card\"> <div class=\"card-header\" id=\"titre\"><h3>".ucfirst(htmlspecialchars($titre))."</h3></div>");
	echo("<div class=\"card-body\">
			<p class=\"container\">Moyenne faite sur ".$nbPost." post.</p> 
		
			<div>Tristesse<br>
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
		</div>
	</div>
	");
?>