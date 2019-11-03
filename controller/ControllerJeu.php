<?php


require_once File::build_path(array('model', 'ModelJeu.php'));

class ControllerJeu {
    public static function readAll() {

        $controller='Jeu';
        $view='list';
        $pagetitle='Liste des Jeux';

        $tab_jeu = ModelJeu::getAllJeu();     //appel au modèle pour gerer la BD
        
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function read() {
    	$id = $_GET['id'];
   		$v = ModelJeu::getJeuById($id);     //appel au modèle pour gerer la BD
   		if ($v == false) {
        $controller='Jeu';
        $view='error';
        $pagetitle='Erreur d\'id';

        require_once File::build_path(array('view', 'view.php'));

   		} else {
          $controller='Jeu';
          $view='detail';
          $pagetitle='Détails du jeu';

          require_once File::build_path(array('view', 'view.php'));
   		}


    }

    public static function create() {
        $controller='Jeu';
        $view='create';
        $pagetitle='Création d\'un jeu';

        require_once File::build_path(array('view', 'view.php'));
    }

    public static function created() {
      $controller='Jeu';
      $view='created';
      $pagetitle='Jeu crée !';

    	$id = $_GET['id'];
    	$titre = $_GET['titre'];
    	$nbPost = $_GET['nbPost'];
    	$jeu1 = new ModelJeu($id, $titre, $nbPost);
 		  $jeu1->save();

      require_once File::build_path(array('view', 'view.php'));

      self::readAll();
    }

    public static function error() {
      $controller='Jeu';
      $view='error';
      $pagetitle='Page d\'erreur';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function delete() {
        $id = $_GET['id'];
        $v = ModelJeu::deleteById($id);
        if ($v == false) {
          $controller='Jeu';
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $controller='Jeu';
          $view='deleted';
          $pagetitle='Délétion de jeu';

          require_once File::build_path(array('view', 'view.php'));
      }
    }

    public static function update() {
      $id = $_GET['id'];
      $v = ModelJeu::getJeuById($id); 


      $controller='Jeu';
      $view='update';
      $pagetitle='Mise à jour de jeu';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function updated() {
      $id = $_GET['id'];
      $titre = $_GET['titre'];
      $nbPost = $_GET['nbPost'];
      $v=ModelJeu::getJeuById($id);
      $data = array('id' =>$id, 'titre' => $titre, 'nbPost' => $nbPost);

        
        if ($v->update($data) == false) {
          $controller='Jeu';
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $controller='Jeu';
          $view='updated';
          $pagetitle='Jeu mis à jour !';

          require_once File::build_path(array('view', 'view.php'));
        }


    }
}
?>
