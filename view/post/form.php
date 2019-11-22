<form method="get" action="./index.php">
	<?php echo $_SESSION["login"]?>
	<input type="hidden" name="action" value = "<?php echo $action?>">
	<?php if($id != ""){echo "<input type=\"hidden\" name=\"id\" value = $id >";} 
	if($date_publication != ""){echo "<input type=\"hidden\" name=\"date_publication\" value = $date_publication >";} ?>
	<input type="hidden" name="auteur_id" value = <?php echo $auteur_id?>> <!--ici il faut récupérer dans le tableau session l'id du créateur du post-->
	<input type="hidden" name="emotion_id" value = <?php echo $emotion_id?>>
	<input type="hidden" name="nbUpvote" value = <?php echo $nbUpvote?>>
	<input type="hidden" name="jeu_id" value = 1> <!--à changer (seulement pour le test)-->

	<label>Donnez un titre à votre post : </label>
	<input type ="text" name="titre" placeholder="Titre" <?php echo "$option=true"." value = $titre"?>><br>

	<!-- Faudrait faire un menu déroulant qui propose déjà les tittres instanciés dans notre bdd selon ce qui est rentré  par l'utilisateur -->
	<label>Titre du jeu</label>
	<input type ="text" name="jeu_titre"  id="gametitle" placeholder="Titre du jeu" <?php echo "$option=true"." value=".($jeu == false? " ":$jeu->getTitre())?>><br>

	<div>
		<div id="search-result">

		</div>
	</div>
	
	<label>Que pensez vous de ce Jeu ?: </label>
	<textarea name="contenu" placeholder="Description" required><?php echo $contenu?></textarea><br>

	<!-- Expression des emotions sous forme d'entrée de valeurs.-->
	<label>Sur une échelle de 0 à 100 mesurez: </label><br>
	<label>-la tristesse procurée par le jeu :  </label>
	<input type="number" name="tristesse" min=0 max=100 value= <?php echo($emotion == false?"0":$emotion->getTristesse())?> required><br>
	<label>-la joie procurée par le jeu :  </label>
	<input type="number" name="joie" min=0 max=100 value= <?php echo($emotion == false?"0":$emotion->getJoie())?> required><br>
	<label>-la colère procurée par le jeu :  </label>
	<input type="number" name="colere" min=0 max=100 value= <?php echo($emotion == false?"0":$emotion->getColere())?> required><br>
	<label>-la peur procurée par le jeu :  </label>
	<input type="number" name="peur" min=0 max=100 value= <?php echo($emotion == false?"0":$emotion->getPeur())?> required><br>
	<label>-la surprise procurée par le jeu :  </label>
	<input type="number" name="surprise" min=0 max=100 value= <?php echo($emotion == false?"0":$emotion->getSurprise())?> required><br>
	<label>-le dégout procurée par le jeu :  </label>
	<input type="number" name="degout" min=0 max=100  value= <?php echo($emotion == false?"0":$emotion->getDegout())?> required><br>

	<input type ="submit" value="Post"><br>
</form>


