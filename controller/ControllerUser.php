<?php

require_once File::build_path(array('model', 'ModelUser.php'));
require_once File::build_path(array('lib', 'Session.php'));

class ControllerUser {
	public static function readAll(){

		$controller='user';
		$view='list';
		$pagetitle ='Liste des Users';

		$tab_v = $tab_v = ModelUser::getAllUser();     //appel au modèle pour gerer la BD
		require_once File::build_path(array('view', 'view.php'));
	}


	public static function read() {
    	$login = $_SESSION['login'];
      $v = ModelUser::getUserByLogin($login);     //appel au modèle pour gerer la BD
      $controller='user';

   		if ($v == false) {
        $view='error';
        $pagetitle='Erreur d\'id';

        require_once File::build_path(array('view', 'view.php'));

   		} else {
          $view='detail';
          $pagetitle='Profile utilisateur';

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


      $controller='user';
      $view='generalUpdate';
      $pagetitle='Mise à jour des User';

      $login = $v->getLogin();
      $email = $v->getEmail();
      $password = $v->getPassword();

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function updated() {
      $id = $_GET['id'];
      $controller='user';
      $v = ModelUser::getUserById($id);
      $login = $v->getLogin();

      if(Session::is_user($login)){
        if ($v->update($_GET) == false) {
          $_SESSION['login'] = $_GET['login'];
          $view='error';
          $pagetitle='Erreur d\'Id';

          echo $_SESSION['login'];

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $view='detail';
          $pagetitle='User Mis à jour !';

          require_once File::build_path(array('view', 'view.php'));
        }
      }
    }

    public static function updatePassword() {
      $id = $_GET['id']; 
      $login = $_GET['login'];

      $controller='user';
      $view='passwordUpdate';
      $pagetitle='change password';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function updatedPassword() {
      $v = ModelUser::getUserById($_GET['id']);  
      $login = $v->getLogin();

      $controller='user';
      $pagetitle='change passwored';

      if(Session::is_user($login)){
        if(ModelUser::checkPassword($login, Security::chiffrer($_GET["oldpassword"]))){
          if($_GET['password'] == $_GET['password2']){
            $v->updatepassword($_GET);
            $view='detail';
            require_once File::build_path(array('view', 'view.php'));
          }
          ControllerUser::updatePassword();
        }
        ControllerUser::updatePassword();
      }
    }

    public static function connect(){
      $controller='user';
      $view='connect';
      $pagetitle='Connexion';

      require_once File::build_path(array('view', 'view.php'));
    }

    public static function connected(){
      $password = $_GET["password"];
      $login = $_GET["login"];

      if(ModelUser::checkPassword($login,Security::chiffrer($password))){
        $_SESSION['login'] = $login;
        ControllerPost::readAll();
      }else{
        self::connect();
      }
    }

    public static function deconnect(){
      session_unset();     // unset $_SESSION variable for the run-time
      session_destroy();   // destroy session data in storage
      setcookie(session_name(),'',time()-1); // deletes the session cookie containing the session ID
      ControllerPost::readAll();
    }
}
