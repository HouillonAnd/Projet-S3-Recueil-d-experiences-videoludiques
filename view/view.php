<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $pagetitle; ?></title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->


<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

    
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <?php 

      if(isset($_SESSION["login"])) {
        echo(
            "<li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"index.php?controller=user&action=read\">Profil</a>
            </li>".
            "<li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"index.php?action=create\">Poster</a>
            </li>".
            "<li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"index.php?controller=user&action=deconnect\">Logout</a>
            </li>");

            }
            else{
              echo(
            "<li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"index.php?controller=user&action=create\">Inscription</a>
            </li>".
            "<li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"index.php?controller=user&action=connect\">Login</a>
            </li>"
          );
          }  ?>
    </ul>
  </div>

</header>
 
<main>
  <div class="container">
    <?php
    require File::build_path(array("view", $controller, "$view.php"));
    ?>
  </div>
</main>

<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © <?php echo date("Y"); ?> REV
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- revoir pourquoi le builtpath ne fonctionne pas  -->
    <!-- <script src="<?php echo File::build_path(array('view','autocomplet.js'))?>"></script> -->
    <script src="view/autocomplet.js"></script>
</body>

</html>

