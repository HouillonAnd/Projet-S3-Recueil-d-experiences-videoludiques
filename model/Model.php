<?php
require_once File::build_path(array('model', 'Model.php'));

if(isset($_Post['forminscription'])){
	// htmlspecialchars trie les éléments html pour eviter les injections
		$login = htmlspecialchars($_POST['login']);
		$email = htmlspecialchars($_POST['email']);
		$email2 = htmlspecialchars($_POST['email2']);
		// sha1 = hachage du mot de passe , pour eviter si qqun pénêtre la bdd de récupérer le mdp ( bref c une sécurité)
		$password = sha1($_POST['password']);
		$password2 = sha1($_POST['password2']);

	// Placer l'initialisation des varaibles avant la vérification permet de toutes les avoirs même si il y a des erreurs on aura quand même des variables nulles qui seront directement signalées par le if en dessous.
	if(!empty($_Post['login']) AND !empty($_Post['email']) AND !empty($_Post['email2']) AND !empty($_Post['password']) AND !empty($_Post['password2']))
	{
		// stockage de la taille du login dans une variable
		$taillelogin = strlen($login);

		//vérifier que le login ne dépasse pas la taille maximum pensée
		if ($taillelogin <=50){
			// vérifier que l'email et l'email de confirmation correspondent
			if($email == $email2){
				// FILTER_VALIDATE_EMAIL fonction qui valide si le texte rentré dans la case Email est bien un email.
				// si les deux email correspondent il suffit d'en valider qu'une.
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					// On fait une requete préparée qui retourne tout dans la table user qui possede déjà cet email.
					$verif_mail = $pdo->prepare("SELECT * FROM _S3_User WHERE email=?");
					$verif_mail->execute(array($email));
					$mail_exist = $verif_mail->rowCount();
					// on compte le nombre de fois où l'email apparait dans la table ainsi on vérifie si l'email est déjà utilisé.
					if($mail_exist ==0){
						// vérifier que le mot de passe et le mot de passe de confirmation correspondent.
						if($password==$password2){
							// requete préparée
							$insertmbr = $pdo->prepare("INSERT INTO _S3_User(login, password, email) VALUES(?, ?, ?)");
							// execution de la requete préparée.
                     		$insertmbr->execute(array($login, $password, $email));
                     		echo("Le compte a été crée!");

						}
						else{
							$error = "Vos mot de passes ne correspondent pas. Veuillez rentrer les même mot de passe."
						}
					}
					else{
						$error = "L'adresse email est déjà utilisée."
					}
				}
				else{
					$error="L'adresse email n'est pas valide. Veuillez rentrer une adresse email."

				}
			}
			else{
				$error = "Les adresses email ne correspondent pas. Veuillez rentrer la même adresse email"
			}
		}
		else {
			$error="Le pseudo ne peut être plus grand que 50 caractères.";
		}
	}
	else{
		$error ="Champs non remplis! Remplissez tous les champs pour l'insription.";
	} // message d'éreur stocké dysplay à la suite du bouton submit si les champs ne sont pas tous remplis.
}

?>


<html>
		<head>
			<title>
				
			</title>
			<meta charset="utf-8">
		</head>
		<body>
			<div align="center">
				<h2>Inscription</h2>
				<br>
				<br>
				<br>
				<form method="POST" action=""> 
					<table>
						<tr>
							<td align="right">
								<label for="login">Login :  </label>
							</td>
							<td align="right">
								<input type="text" placeholder="Votre login" id="login" name="login"/>
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for="email">Email :  </label>
							</td>
							<td align="right">
								<input type="email" placeholder="Votre email" id="email" name="email"/>
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for="email2">Confirmation du Email :  </label>
							</td>
							<td align="right">
								<input type="email" placeholder="Confirmez votre email" id="email2" name="email2"/>
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for="password">Mot de Passe :  </label>
							</td>
							<td align="right">
								<input type="password" placeholder="Votre Mot de Passe" id="password" name="password"/>
							</td>
						</tr>
						<tr>
		                  	<td align="right">
		                    	<label for="password2">Confirmation du mot de passe :</label>
			                </td>
			                <td>
		                     <input type="password" placeholder="Confirmez votre Mot de Passe" id="password2" name="password2" />
		                    </td>
		                </tr>
		                <tr>
                  			<td></td>
                  			<td align="center">
                     		<br />
                     		<input type="submit" name="forminscription" value="Je m'inscris" />
                 			</td>
              			</tr>
					</table>
				</form>
				<?php
					if(isset($error)){
						echo($error);
					}
					// le méssage d'érreur est initialisé differement selon l'erreur présente dans le formulaire ainsi elle est automatiquement dysplay si elle est initialisée.

				?>
			</div>
		</body>

</html>
