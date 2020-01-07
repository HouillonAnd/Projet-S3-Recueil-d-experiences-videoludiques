<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?php echo $pagetitle; ?></title>
  
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://kit.fontawesome.com/8cc73e8345.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
  <link href="./view/style.css" rel="stylesheet"> 

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

<header>
  <div class="shadow p-3 mb-5 rounded">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div id="logo">
      <a class="navbar-brand" href="index.php?controller=post&action=readAll"><img src="image/REV_finale.png" class="img-fluid" alt="Responsive image"></a>
      </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?controller=post&action=readAll">Menu <span class="sr-only">(current)</span></a>
        </li>
        <?php 

        if(isset($_SESSION["login"])) {
          echo(
              "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?controller=user&action=read\">Profil</a>
              </li>".
              "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?action=create\">Poster</a>
              </li>".
              "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?controller=user&action=deconnect\" tabindex=\"-1\" aria-disabled=\"true\">Logout</a>
              </li>");

              }
              else{
                echo(
              "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?controller=user&action=create\">Inscription</a>
              </li>".
              "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?controller=user&action=connect\" tabindex=\"-1\" aria-disabled=\"true\">Login</a>
              </li>"
            );
            }  
            if(Session::is_admin()){
              echo "<li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"index.php?controller=user&action=readAll\"  aria-disabled=\"true\">Utilisateurs</a>
                    </li>";
              echo "<li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"index.php?controller=jeu&action=readValide\" tabindex=\"-1\" aria-disabled=\"true\">Gestion des jeux</a>
                    </li>";
            }
            ?>
      </ul>
    </div>

    <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
  </nav>

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
  <div class="card text-center">
    <div class="card-header">
      Footer
    </div>
    <div class="card-body">
      <h5 class="card-title">Déjà la fin?!</h5>
      <p class="card-text">Merci d'avoir visité REV. n'hesitez pas vous aussi a laisser un post sur votre jeux vidéo favori .</p>
      <a href="https://extragames.fr/" class="btn btn-primary">Site principal </a>
    </div>
    <div class="card-footer text-muted">
      © <?php echo date("Y"); ?> REV
    </div>
  </div>


  
</footer>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- revoir pourquoi le builtpath ne fonctionne pas  -->
    <!-- <script src="<?php echo File::build_path(array('view','autocomplet.js'))?>"></script> -->
    <script src="view/autocomplet.js"></script>

    <!--
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
  -->


  <!-- bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- revoir pourquoi le builtpath ne fonctionne pas  -->
  <!-- <script src="<?php echo File::build_path(array('view', 'autocomplet.js')) ?>"></script> -->
  <script src="view/autocomplet.js"></script>
</body>

</html>
