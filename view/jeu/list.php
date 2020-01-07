<?php
	require_once File::build_path(array('model', 'ModelJeu.php'));
	echo ("<div class=\"row\">
			<div class=\"col-sm\">");
				echo(" Les jeux enregistrés : <br>");

				foreach ($tab_jeu as $j){

					$titre = $j->getTitre();
					$id = $j->getId();

					echo(htmlspecialchars($titre."    "));
					echo("<a href=index.php?controller=emotions&action=MoyenneEmotionPourJeu&id=" . rawurlencode($id) . '>' . '       Voir les Moyennes des jouers' . "</a><br>");
				}
		echo ("</div>
			<div class=\"col-sm\">");
			echo(" Les jeux à valider : <br>");

			$tab_jeu_nonce=ModelJeu::getJeuWithNonce();

			foreach ($tab_jeu_nonce as $jn) {
				$titre = $jn->getTitre();
				$id = $jn->getId();
				echo('
				<li class="list-group-item">
	                <div class="container">
	                    <div class="row justify-content-between">
	                        <div class="col-1">'.htmlspecialchars($titre).'</i></div>
	                        <div class="col-2"><a href="index.php?controller=jeu&action=deleteNonce&id='.htmlspecialchars($id).'">Valider</a></div>
	                        <div class="col-2"><a href="index.php?controller=jeu&action=delete&id='.htmlspecialchars($id).'">Supprimer</a></div>
	                    </div>
	                </div>
	            </li>
	            ');
			}


?>
