<form method="POST" action="./index.php">
				<label>Donnez un titre à votre post : </label>
				<input type ="text" name="post_titre" placeholder="Titre" value="<?=$edit_article['titre'] ?>"/><br/>

				<!-- Faudrait faire un menu déroulant qui propose déjà les tittres instanciés dans notre bdd selon ce qui est rentré  par l'utilisateur -->
				<label>Titre du jeu concerné</label>
				<input type ="text" name="jeu_titre" placeholder="Titre du jeu"/> <br/>
				<label>Que pensez vous de ce Jeu ?: </label>
				<textarea name="post_contenu" placeholder="Écrivez ici"> <?=$edit_article['contenu'] ?> </textarea><br/>

				<!-- Expression des emotions sous forme d'entrée de valeurs.-->
				<label>Sur une échelle de 0 à 100 mesurez: </label><br/>
				<label>-la tristesse procurée par le jeu :  </label>
				<input type="number" name="tristesse_jeu" min=0 max=100 value="0"/><br/>
				<label>-la joie procurée par le jeu :  </label>
				<input type="number" name="joie_jeu" min=0 max=100 value="0"/><br/>
				
				<label>-la colère procurée par le jeu :  </label>
				<input type="number" name="colere_jeu" min=0 max=100 value="0"/><br/>
				<label>-la peur procurée par le jeu :  </label>
				<input type="number" name="peur_jeu" min=0 max=100 value="0"/><br/>
				<label>-la surprise procurée par le jeu :  </label>
				<input type="number" name="surprise_jeu" min=0 max=100 value="0"/><br/>
				<label>-le dégout procurée par le jeu :  </label>
				<input type="number" name="degout_jeu" min=0 max=100  value="0"/><br/>

				<input type ="submit" value="Votre Post"/><br/>
			</form>
