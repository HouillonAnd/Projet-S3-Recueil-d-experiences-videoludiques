<?php
require_once File::build_path(array('model', 'Model.php'));

if(isset($_POST['formulaireConnexion'])){
	$emailConnexion = htmlspecialchars($_POST['emailConnexion']);
	$passwordConnexion = sha1($_POST['passwordConnexion']);
	if(!empty($emailConnexion) AND !empty($passwordConnexion)){
		$verif_email = $pdo->prepare("SELECT * From _S3_User WHERE email = ? AND password = ?")
		$verif_email->execute(array($emailConnexion, $passwordConnexion));
		$email_exist = $verif_email->rowCount();
		if($email_exist == 1){

		}
		else{
			$error = "L'adresse email ou le mot de passe est erroné."
		}
	}
	else{
		$error="Tout les champs ne sont pas remplis. Veuillez remplir tout les champs."
	}
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
				<h2>Connexion à l'espace personnel : </h2>
				<br>
				<br>
				<br>
				<form method="POST" action=""> 
					<input type="email" name="emailConnexion" placeholder="email" />
					<input type="password" name="passwordConnexion" placeholder="Mot de passe" />
					<input type="submit" name="formulaireConnexion"  value="Se connecter." />
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