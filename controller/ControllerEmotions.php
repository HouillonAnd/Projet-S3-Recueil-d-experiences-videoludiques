<?php

require_once File::build_path(array('model', 'ModelEmotions.php'));

class ControllerEmotions {
    public static function readAll() {

        $controller='Emotions';
        $view='list';
        $pagetitle='Liste des Emotions';

        $tab_v = ModelEmotions::getAllEmotions();     //appel au modèle pour gerer la BD
        
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function read() {
    	$id = $_GET['id'];
   		$v = ModelEmotions::getEmotionById($id);     //appel au modèle pour gerer la BD
   		if ($v == false) {
        $controller='Emotions';
        $view='error';
        $pagetitle='Erreur d\'id';

        require_once File::build_path(array('view', 'view.php'));

   		} else {
          $controller='Emotions';
          $view='detail';
          $pagetitle='Détails de l\'émotion';

          require_once File::build_path(array('view', 'view.php'));
 		}


    }

    public static function create() {
        $controller='Emotions';
        $view='create';
        $pagetitle='Création d\'émotions ';

        require_once File::build_path(array('view', 'view.php'));
    }

    public static function created() {
      $controller='Emotions';
      $view='created';
      $pagetitle='Émotion créée !';

    	$id = $_GET['id'];
    	$tristesse = $_GET['tristesse'];
    	$joie = $_GET['joie'];
      $colere = $_GET['colere'];
      $peur = $_GET['peur'];
      $surprise = $_GET['surprise'];
      $degout = $_GET['degout'];
    	$em1 = new ModelEmotions($id, $tristesse, $joie, $colere, $peur, $surprise, $degout);
 		  $em1->save();

      require_once File::build_path(array('view', 'view.php'));

      self::readAll();
    }

    public static function error() {
      $controller='Emotions';
      $view='error';
      $pagetitle='Page d\'erreur';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function delete() {
        $id = $_GET['id'];
        $v = ModelEmotions::deleteById($id);
        if ($v == false) {
          $controller='Emotions';
          $view='error';
          $pagetitle='Erreur d\'idd';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $controller='Emotions';
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
      $tristesse = $_GET['tristesse'];
      $joie = $_GET['joie'];
      $colere = $_GET['colere'];
      $peur = $_GET['peur'];
      $surprise = $_GET['surprise'];
      $degout = $_GET['degout'];
      $v=ModelEmotions::getEmotionById($id);
      $data = array('id' =>$id, 'tristesse' => $tristesse, 'joie' => $joie, 'colere' => $colere, 'peur' => $peur, 'surprise' =>  $surprise, 'degout' => $degout);

        
        if ($v->update($data) == false) {
          $controller='Emotions';
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $controller='Emotions';
          $view='updated';
          $pagetitle='Émotions Mise à jour !';

          require_once File::build_path(array('view', 'view.php'));
        }


    }
}
?>
