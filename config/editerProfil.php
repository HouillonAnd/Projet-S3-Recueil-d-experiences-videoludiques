<?php
// le session start permet de récuperer les variables de séssions il est donc important.
session_start();
require_once File::build_path(array('model', 'Model.php'));

// si il y a un id dans l'url et si il est supérieur à 0( parceque ya pas de id 0 dans notre BDD)
if(isset($_SESSION['id'])){ // isset sers a verifier si une personne est connectée.
	$info_userRequete = $pdo->prepare("SELECT * FROM _S3_User WHERE  id = ?");
	$info_userRequete->excute(array($_SESSION['id']));
	$info_user = $info_userRequete->fetch();

	// vérifie l'existence du nouveau login et qu'il est bien different de l'ancien login utilisé
	if(isset($_POST['newLogin']) AND !empty($_POST['newLogin']) AND $_POST['newLogin'] != $info_user['login']){

		// création d'une petite variable qui receuille le login de façon sécurisée pour éviter l'injection dans la BDD.
		$newLogin = htmlspecialchars($_POST['newLogin']);
		$insertLogin = $pdo->prepare("UPDATE _S3_User Set login = ? where id = ?");
		$insertLogin->execute(array($newLogin, $_SESSION['id']));
		// header qui renvoie vers le profil mis à jour.
		header('Location: profil.php?id='.$_SESSION['id']);
	}

	if(isset($_POST['newEmail']) AND !empty($_POST['newEmail']) AND $_POST['newEmail'] != $info_user['email']){

		// création d'une petite variable qui receuille l'email de façon sécurisée pour éviter l'injection dans la BDD.
		$newEmail = htmlspecialchars($_POST['newEmail']);
		$insertEmail = $pdo->prepare("UPDATE _S3_User Set email = ? where id = ?");
		$insertEmail->execute(array($newEmail, $_SESSION['id']));
		// header qui renvoie vers le profil mis à jour.
		header('Location: profil.php?id='.$_SESSION['id']);
	}

	if(isset($_POST['newPassword']) AND !empty($_POST['newPassword']) AND $_POST['newPassword2']) AND !empty($_POST['newPassword2']) AND $_POST['newPassword']==$_POST['newPassword2'] ){
		// création de variables qui vont prendre les mot de passe mais en haché( grace à SHA1)
		$mdp1 = sha1($_POST['newPassword']);
		$mdp2 = sha1($_POST['newPassword2']);

		$insertMdp = $pdo->prepare("UPDATE _S3_User SET password = ? where id=?");
		$insertMdp->execute(array($mdp1, $_SESSION['id']));
		// header qui renvoie vers le profil mis à jour.
		header('Location: profil.php?id='.$_SESSION['id']);
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
				<h2>Edition du profil <?php  echo $_SESSION['login'];?> </h2>
				<div align="center">
				<form method="POST" action="">
					<label>Pseudo : </label>
					<input type="text" name="newLogin" placeholder="Login" value="<?php  echo $info_user['login'];?>"/> <br /><br />
					<label>Email : </label>
					<input type="text" name="newEmail" placeholder="Email" value="<?php  echo $info_user['login'];?>"/> <br /><br />
					<label> Mot de Passe </label>
					<input type="password" name="newPassword" placeholder="Mot de Passe"/> <br /><br />
					<label> Confirmation du mot de passe : </label>
					<input type="password" name="newPassword2" placeholder="Confimation du Mot de Passe"/> <br /><br />
					<input type="submit" value="Mettre à jour mon profil"/> <br /><br />
				</form>
				</div>
			</div>
		</body>
</html>

<?php
}
else{
	// si la personne n'est pas connectée( graçe à la verification du isset on la redirige vers la page de connexion..)
	header("Location : connexion.php");
}
?>