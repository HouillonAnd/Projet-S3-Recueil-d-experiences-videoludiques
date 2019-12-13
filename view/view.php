<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?php echo $pagetitle; ?></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>


<header>
  <div class="shadow p-3 mb-5 bg-white rounded">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php?controller=post&action=readAll">REV</a>
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
            }  ?>
      </ul>
    </div>
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
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
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Lien pour un discord? </a>
  </div>
  <div class="card-footer text-muted">
    © <?php echo date("Y"); ?> REV
  </div>
</div>
<!--
  <div class="card bg-dark text-white">
  <img src="image/footer.jpg" class="card-img" alt="AC">
  <div class="card-img-overlay">
    <h5 class="card-title"> Content</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <!--
    <ul>
          <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </ul>
        -->
    
      <!--
        <div class="container">
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      
    </div>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>
-->
  <!--
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
  <header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">REV</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php
          if (isset($_SESSION["login"])) {
            echo ("<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php?controller=user&action=read\">Profil</a>
                    </li>" .
                                  "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php?action=create\">Poster</a>
                    </li>" .
                                  "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php?controller=user&action=deconnect\" tabindex=\"-1\">Logout</a>
                    </li>");
                              } else {
                                echo ("<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php?controller=user&action=create\">Inscription</a>
                    </li>" .
                                  "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php?controller=user&action=connect\" tabindex=\"-1\">Login</a>
                    </li>");
          }  ?>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

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

    © <?php //echo date("Y"); ?> REV
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
-->

</footer>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- revoir pourquoi le builtpath ne fonctionne pas  -->
    <!-- <script src="<?php echo File::build_path(array('view','autocomplet.js'))?>"></script> -->
    <script src="view/autocomplet.js"></script>
</body>

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