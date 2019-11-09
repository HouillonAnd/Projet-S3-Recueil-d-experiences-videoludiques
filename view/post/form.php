<form method="get" action="./index.php">
	<input type="hidden" name="action" value = "<?php echo $action; var_dump($action)?>">
	<input type="hidden" name="id" value = <?php echo $id ?>> <!--vérifier si quand on passe une chaine de caratère vide à l'id l'auto incrémente ce réalise quand même-->
	<input type="hidden" name="auteur_id" value = 1> <!--ici il faut récupérer dans le tableau session l'id du créateur du post-->
	<input type="hidden" name="emotion_id" value = <?php echo $emotion_id?>>
	<input type="hidden" name="nbUpvote" value = <?php echo $nbUpvote?>>
	<input type="hidden" name="jeu_id" value = 1> <!--à changer (seulement pour le test)-->
	<input type="hidden" name="date_publication" value = <?php echo $date_publication?>> <!--vérifier si quand on passe une chaine de caratère vide à la date de publication l'auto incrémente ce réalise quand même-->
	<label>Donnez un titre à votre post : </label>
	<input type ="text" name="titre" placeholder="Titre" value= <?php echo $titre ?>><br>

	<!-- Faudrait faire un menu déroulant qui propose déjà les tittres instanciés dans notre bdd selon ce qui est rentré  par l'utilisateur -->
	<label>Titre du jeu</label>
	<input type ="text" name="jeu_titre" placeholder="Titre du jeu"><br>
	<label>Que pensez vous de ce Jeu ?: </label>
	<textarea name="contenu" placeholder="Description"><?php echo $contenu?></textarea><br>

	<!-- Expression des emotions sous forme d'entrée de valeurs.-->
	<label>Sur une échelle de 0 à 100 mesurez: </label><br>
	<label>-la tristesse procurée par le jeu :  </label>
	<input type="number" name="tristesse" min=0 max=100 value= <?php if($emotion == false){echo "";}else{echo "$emotion->getTrisstresse()";} ?>><br>
	<label>-la joie procurée par le jeu :  </label>
	<input type="number" name="joie" min=0 max=100 value= <?php if($emotion == false){echo "";}else{echo "$emotion->getJoie()";} ?>><br>

	<label>-la colère procurée par le jeu :  </label>
	<input type="number" name="colere" min=0 max=100 value= <?php if($emotion == false){echo "";}else{echo "$emotion->getColere()";} ?>><br>
	<label>-la peur procurée par le jeu :  </label>
	<input type="number" name="peur" min=0 max=100 value= <?php if($emotion == false){echo "";}else{echo "$emotion->getPeur()";} ?>><br>
	<label>-la surprise procurée par le jeu :  </label>
	<input type="number" name="surprise" min=0 max=100 value= <?php if($emotion == false){echo "";}else{echo "$emotion->getSurprise()";} ?>><br>
	<label>-le dégout procurée par le jeu :  </label>
	<input type="number" name="degout" min=0 max=100  value= <?php if($emotion == false){echo "";}else{echo "$emotion->getDegout()";} ?>><br>

	<input type ="submit" value="Post"><br>
</form>
