<?php
// le session start permet de récuperer les variables de séssions il est donc important.
session_start();
require_once File::build_path(array('model', 'Model.php'));

// si il y a un id dans l'url et si il est supérieur à 0( parceque ya pas de id 0 dans notre BDD)
if(isset($_GET['id']) AND $_GET['id']>0){
	// retourne la valeur entière numérique de l'id pour éviter que des petits malin essayent de mettre plein de texte dans l'id dans l'url.
	$getid = intval($_GET['id']);

	$info_userRequete = $pdo->prepare('SELECT * FROM _S3_User WHERE id=?');
	$info_userRequete->execute(array($getid));
	$info_user = $info_userRequete->fetch();


?>


<html>
		<head>
			<title>
				
			</title>
			<meta charset="utf-8">
		</head>
		<body>
			<div align="center">
				<h2>Bienvenue dans votre Espace personnel <?php  echo $info_user['login'];?> </h2>
				<br>
				<br>

				<br>
				
				<?php
				// quand le profil correspond au profil de connexion on peut afficher les liens vers l'édition de post ou de déconnexion

					if(isset($_SESSION['id']) AND  $info_user['id'] == $_SESSION['id']){
				?>
					<br>
					<!--   le lien vers la page de déconnexion est mis en mode yolo mais vas surement devoir remodeler ça-->
					<a href="deconnexion.php">Se déconnecter</a>

					<!-- lien pour éditer son profil -->
					<a href="editerProfil.php"> Editer son Profil</a>

					<!--   de plus on veut mettre une vue avec les post et une espace vide ( maybe formulaire ) pour générer un post donc à completer encore -->
				<?php 
				}
				?>
			</div>
		</body>

</html>

<?php
}
?>
