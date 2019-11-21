<?php

require_once File::build_path(array('model', 'ModelUser.php'));

class ControllerUser {
	public static function readAll(){

		$controller='user';
		$view='list';
		$pagetitle ='Liste des Users';

		$tab_v = $tab_v = ModelUser::getAllUser();     //appel au modèle pour gerer la BD
		require_once File::build_path(array('view', 'view.php'));
	}


	public static function read() {
    	$id = $_GET['id'];
      $v = ModelUser::getUserById($id);     //appel au modèle pour gerer la BD
      $controller='user';

   		if ($v == false) {
        $view='error';
        $pagetitle='Erreur d\'id';

        require_once File::build_path(array('view', 'view.php'));

   		} else {
          $view='detail';
          $pagetitle='Détails de l\'User';

          require_once File::build_path(array('view', 'view.php'));
	 	}
	}

	public static function create() {
        $controller='user';
        $view='subscribe';
        $pagetitle='Création de User ';

        require_once File::build_path(array('view', 'view.php'));
    }

    public static function created() {

      if($_GET["password"] == $_GET["password2"]) {
        $user = new ModelUser($_GET);
        $user->save();
        ControllerPost::readAll();//on redirifera plus tard l'utlisateur sur sa page perso
      }else{
        self::create();
      }
    }

    public static function error() {
      $controller='user';
      $view='error';
      $pagetitle='Page d\'erreur';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function delete() {
        $id = $_GET['id'];
        $v = ModelUser::deleteById($id);
        $controller='user';

        if ($v == false) {
          $view='error';
          $pagetitle='Erreur d\'id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $view='deleted';
          $pagetitle='Délétion de User';

          require_once File::build_path(array('view', 'view.php'));
      	}
    }

    public static function update() {
      $id = $_GET['id'];
      $v = ModelUser::getUserById($id); 


      $controller='User';
      $view='update';
      $pagetitle='Mise à jour des User';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function updated() {
      $id = $_GET['id'];
      $controller='user';
      $v=ModelUser::getUserById($id);

        if ($v->update($_GET) == false) {
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $view='updated';
          $pagetitle='User Mis à jour !';

          require_once File::build_path(array('view', 'view.php'));
        }
    }
}
