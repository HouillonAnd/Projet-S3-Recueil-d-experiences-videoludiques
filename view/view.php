<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $pagetitle; ?></title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body>

<header>
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="http://localhost/Projet-S3-Recueil-d-experiences-videoludiques/index.php">Home</a></li>
        <li><a href="http://localhost/Projet-S3-Recueil-d-experiences-videoludiques/index.php?action=create">Poster</a></li>
      </ul>
    </div>
  </nav>
</header>
 
<main>
  <?php
  require File::build_path(array("view", $controller, "$view.php"));
  ?>
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
    <script>
      $(document).ready(function(){
        $('#gametitle').keyup(function(){
          $('#search-result').html('');
          var title = $(this).val();
          if(title != ""){
            $.ajax({
              type: 'GET',
              url: '../Projet-S3-Recueil-d-experiences-videoludiques/index.php?controller=jeu&action=search',
              data: 'title=' + encodeURIComponent(title),
              success: function(data){
                if(data != ""){
                  $('#search-result').html(data);
                }else{
                  $('#search-result').html('Aucun utlisateur'); 
                }
              }
            });
          }
        });
      });
    </script>
</body>

</html>

