<form method="get" action="./index.php">
	<?php echo $_SESSION["login"]?>
	<input type="hidden" name="action" value = "<?php echo $action?>">
	<?php if($id != ""){echo "<input type=\"hidden\" name=\"id\" value = $id >";} 
	if($date_publication != ""){echo "<input type=\"hidden\" name=\"date_publication\" value = $date_publication >";} ?>
	<input type="hidden" name="auteur_id" value = <?php echo $auteur_id?>>
	<input type="hidden" name="emotion_id" value = <?php echo $emotion_id?>>
	<input type="hidden" name="nbUpvote" value = <?php echo $nbUpvote?>>
	<input type="hidden" name="jeu_id" value = "<?php echo $jeu_id?>"> 

	<label>Donnez un titre à votre post : </label>
	<input type ="text" name="titre" placeholder="Titre" value= "<?php echo $titre?>" $option><br>

	<label>Titre du jeu</label>
	<input type ="text" name="jeu_titre"  id="gametitle" placeholder="Titre du jeu" autocomplete="off" <?php echo "$option=true"." value=".($jeu == false? " ":$jeu->getTitre())?>><br>

	<div id="search-result">
	</div>
	
	<label>Que pensez vous de ce Jeu ?: </label>
	<textarea name="contenu" placeholder="Description" required><?php echo $contenu?></textarea><br>

	<!-- Expression des emotions sous forme d'entrée de valeurs.-->
	<label>Sur une échelle de 0 à 100 mesurez: </label><br>
	<label>-la tristesse procurée par le jeu :  </label>
	<input type="range" list="tickmarks" name="tristesse" min=0 max=100 value= "<?php echo($emotion == false?"0":$emotion->getTristesse())?>" required><br>
	<label>-la joie procurée par le jeu :  </label>
	<input type="range" list="tickmarks" name="joie" min=0 max=100 value= "<?php echo($emotion == false?"0":$emotion->getJoie())?>" required><br>
	<label>-la colère procurée par le jeu :  </label>
	<input type="range" list="tickmarks" name="colere" min=0 max=100 value= "<?php echo($emotion == false?"0":$emotion->getColere())?>" required><br>
	<label>-la peur procurée par le jeu :  </label>
	<input type="range" list="tickmarks" name="peur" min=0 max=100 value= "<?php echo($emotion == false?"0":$emotion->getPeur())?>" required><br>
	<label>-la surprise procurée par le jeu :  </label>
	<input type="range" list="tickmarks" name="surprise" min=0 max=100 value= "<?php echo($emotion == false?"0":$emotion->getSurprise())?>" required><br>
	<label>-le dégout procurée par le jeu :  </label>
	<input type="range" list="tickmarks" name="degout" min=0 max=100  value= "<?php echo($emotion == false?"0":$emotion->getDegout())?>" required><br>

	<input type="range" list="tickmarks">

	<datalist id="tickmarks">
	  <option value="0">
	  <option value="10">
	  <option value="20">
	  <option value="30">
	  <option value="40">
	  <option value="50">
	  <option value="60">
	  <option value="70">
	  <option value="80">
	  <option value="90">
	  <option value="100">
	</datalist>

	
	<input type ="submit" value="Post"><br>
</form>


