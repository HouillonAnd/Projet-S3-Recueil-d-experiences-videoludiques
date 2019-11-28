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
      $controller='jeu';

   		if ($v == false) {
        $view='error';
        $pagetitle='Erreur d\'id';

        require_once File::build_path(array('view', 'view.php'));

   		} else {
          $view='detail';
          $pagetitle='Détails du jeu';

          require_once File::build_path(array('view', 'view.php'));
   		}


    }

    public static function create() {
        $controller='jeu';
        $view='create';
        $pagetitle='Création d\'un jeu';

        require_once File::build_path(array('view', 'view.php'));
    }

    public static function created() {
      $controller='jeu';
      $view='created';
      $pagetitle='Jeu crée !';

    	$jeu = new ModelJeu($_GET);
      $jeu->save();
      self::readAll();

      require_once File::build_path(array('view', 'view.php'));

      self::readAll();
    }

    public static function error() {
      $controller='jeu';
      $view='error';
      $pagetitle='Page d\'erreur';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function delete() {
        $id = $_GET['id'];
        $v = ModelJeu::deleteById($id);
        $controller='jeu';

        if ($v == false) {
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $view='deleted';
          $pagetitle='Délétion de jeu';

          require_once File::build_path(array('view', 'view.php'));
      }
    }

    public static function update() {
      $id = $_GET['id'];
      $v = ModelJeu::getJeuById($id); 


      $controller='jeu';
      $view='update';
      $pagetitle='Mise à jour de jeu';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function updated() {
      $id = $_GET['id'];
      $controller='jeu';
      $v=ModelJeu::getJeuById($id);

        if ($v->update($_GET) == false) {
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $view='updated';
          $pagetitle='Jeu mis à jour !';

          require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function search(){
      $tab_title = ModelJeu::search($_GET["title"]);
      echo  json_encode($tab_title);
    }
}