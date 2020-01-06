<?php

require_once File::build_path(array('model', 'ModelEmotions.php'));

class ControllerEmotions {
    public static function readAll() {

        $controller='emotions';
        $view='list';
        $pagetitle='Liste des Emotions';

        $tab_v = ModelEmotions::getAllEmotions();     //appel au modèle pour gerer la BD
        
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function read() {
    	$id = $_GET['id'];
      $v = ModelEmotions::getEmotionById($id);     //appel au modèle pour gerer la BD
      $controller='emotions';

   		if ($v == false) {
        $view='error';
        $pagetitle='Erreur d\'id';

        require_once File::build_path(array('view', 'view.php'));

   		} else {
          $view='detail';
          $pagetitle='Détails de l\'émotion';

          require_once File::build_path(array('view', 'view.php'));
 		}


    }

    public static function create() {
        $controller='emotions';
        $view='create';
        $pagetitle='Création d\'émotions ';

        require_once File::build_path(array('view', 'view.php'));
    }

    public static function created() {
      $controller='emotions';
      $view='created';
      $pagetitle='Émotion créée !';

    	$emotion = new ModelEmotion($_GET);
      $emotion->save();
      self::readAll();

      require_once File::build_path(array('view', 'view.php'));

      self::readAll();
    }

    public static function error() {
      $controller='emotions';
      $view='error';
      $pagetitle='Page d\'erreur';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function delete() {
        $id = $_GET['id'];
        $v = ModelEmotions::deleteById($id);
        $controller='emotions';

        if ($v == false) {
          $view='error';
          $pagetitle='Erreur d\'idd';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $view='deleted';
          $pagetitle='Délétion d\'émotions';

          require_once File::build_path(array('view', 'view.php'));
      }
    }

    public static function update() {
      $id = $_GET['id'];
      $v = ModelEmotions::getEmotionById($id); 


      $controller='Emotions';
      $view='update';
      $pagetitle='Mise à jour d\' émotions';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function updated() {
      $id = $_GET['id'];
      $controller='emotions';
      $v=ModelEmotions::getEmotionById($id);

        if ($v->update($_GET) == false) {
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $view='updated';
          $pagetitle='Émotions Mise à jour !';

          require_once File::build_path(array('view', 'view.php'));
        }
    }
    
    public static function MoyenneEmotionPourJeu(){
    	$idJeu = $_GET['id'];
    	$controller = 'user';

    	$tab_e = ModelEmotions::getMoyenneEmotionFromJeu($idJeu);

      $view='moyenne';
          $pagetitle='Moyenne de l\'emotion';

          require_once File::build_path(array('view', 'view.php'));
    	/*if ($tab_e->getMoyenneEmotionFromJeu($_GET) == false) {
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          
        }*/
    }
}
?>
