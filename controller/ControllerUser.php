<?php

require_once File::build_path(array('model', 'ModelUser.php'));
require_once File::build_path(array('model', 'ModelPost.php'));
require_once File::build_path(array('lib', 'Session.php'));

class ControllerUser
{
  public static function readAll()
  {
    $controller = 'user';

    if(Session::is_admin()){
      $view = 'list';
      $pagetitle = 'Liste des Users';

      $tab_v = $tab_v = ModelUser::getAllUser();     //appel au modèle pour gerer la BD
      require_once File::build_path(array('view', 'view.php'));
    }else{
      $message = "Vous n'avez pas accès à cette page";
      $view = 'error';
      $pagetitle = 'erreur d\'accès';
      require_once File::build_path(array('view', 'view.php'));
    }
  }

  
  public static function read()  {
    
    $controller = 'user';
    if (isset($_SESSION)) {
      $login = $_SESSION['login'];
      $v = ModelUser::getUserByLogin($login);  
      $tab_p = ModelPost::getAllPostByAuteur($login);
      if ($v == false) {
        $message = "Cette Utilisateur n'existe pas";
        $view = 'error';
        $pagetitle = 'Erreur d\'id';

        require_once File::build_path(array('view', 'view.php'));
      } else {
        $view = 'detail';
        $pagetitle = 'Profile utilisateur';

        require_once File::build_path(array('view', 'view.php'));
      }
    }else{
      $login='';
      $view = 'connect';
      $pagetitle = 'veuillez vous connecter';
      require_once File::build_path(array('view', 'view.php'));
    }
    
  }

  public static function create()
  {
    $controller = 'user';
    $view = 'subscribe';
    $pagetitle = 'Création de User ';

    // premet de garder en mémoire les infos si l'utilisateur se trompe dans le mot de passe
    if (isset($_GET["login"])) {
      $login = $_GET["login"];
      $email = $_GET["email"];
      $email2 = $_GET["email2"];
    } else {
      $login = "";
      $email = "";
      $email2 = "";
    }

    require_once File::build_path(array('view', 'view.php'));
  }

  public static function created()
  {
    if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
      if ($_GET["password"] == $_GET["password2"]) {
        $user = new ModelUser($_GET);
        $user->save();
        self::connect(); //on redirifera plus tard l'utlisateur sur sa page perso
      } else {
        self::create();
      }
    }else{
      self::create();
    }
  }

  public static function error()
  {
    $message = "Vous n'avez pas accès à cette page";
    $controller = 'user';
    $view = 'error';
    $pagetitle = 'Page d\'erreur';

    require_once File::build_path(array('view', 'view.php'));
  }

  public static function delete()
  {
    $login = $_GET['login'];
    $v = ModelUser::deleteByLogin($login);
    $controller = 'user';

    if(Session::is_user($login) || Session::is_admin()){
      if ($v == false) {
        $message = "Cette utilisateur n'existe pas";
        $view = 'error';
        $pagetitle = 'Erreur d\'id';
        require_once File::build_path(array('view', 'view.php'));
      } else {
        if(Session::is_user($login)){
          self::deconnect();
          $view = 'connect';
          $pagetitle = 'Délétion de User';
        }else{
          $view = 'connect';
          $pagetitle = 'Supression compte';
        }
        require_once File::build_path(array('view', 'view.php'));
      }
    }
  }

  public static function update()
  {
    $login = $_GET['login'];
    $v = ModelUser::getUserByLogin($login);

    $controller = 'user';
    

    $login = $v->getLogin();
    $email = $v->getEmail();
    $password = $v->getPassword();
    $admin = $v->getAdmin();

    if(Session::is_user($login) || Session::is_admin()){
      $view = 'generalUpdate';
      $pagetitle = 'Mise à jour des User';
      require_once File::build_path(array('view', 'view.php'));
    }else{
      $message = "Vous n'avez pas accès à cette page";
      $view = 'error';
      $pagetitle = 'Erreur';
      require_once File::build_path(array('view', 'view.php'));
    }
  }
    

  public static function updated()
  {
    $login = $_GET['login'];
    $controller = 'user';
    $v = ModelUser::getUserByLogin($login);
    $login = $v->getLogin();

    if (Session::is_user($login) || Session::is_admin()) {
      if ($v->update($_GET) == false) {
        $message = "Erreur au cours de la mise à jour";
        $view = 'error';
        $pagetitle = 'Erreur de mise à jour';

        require_once File::build_path(array('view', 'view.php'));
      } else {
        
        $v = ModelUser::getUserByLogin($login);
        $view = 'detail';
        $pagetitle = 'User Mis à jour !';

        require_once File::build_path(array('view', 'view.php'));
      }
    }else{
      $message = "Vous avez pas accès à cette page";
      $view = 'error';
      $pagetitle = 'Erreur d\'accès';

      require_once File::build_path(array('view', 'view.php'));
    }
  }

  public static function updatePassword()
  {
    $login = $_GET['login'];

    $controller = 'user';
    $view = 'passwordUpdate';
    $pagetitle = 'change password';
    if(Session::is_user($login)){
      require_once File::build_path(array('view', 'view.php'));
    }else{
      $message = "Vous avez pas accès à cette page";
      $view = 'error';
      $pagetitle = 'pas accès';
      require_once File::build_path(array('view', 'view.php'));
    }
    
  }

  public static function updatedPassword()
  {
    $v = ModelUser::getUserByLogin($_GET['login']);
    $login = $v->getLogin();

    $controller = 'user';
    $pagetitle = 'change passwored';

    if (Session::is_user($login) || Session::is_admin()) {
      if (ModelUser::checkPassword($login, Security::chiffrer($_GET["oldpassword"]))) {
        if ($_GET['password'] == $_GET['password2']) {
          $v->updatepassword($_GET);
          $view = 'detail';
          require_once File::build_path(array('view', 'view.php'));
        }
        ControllerUser::updatePassword();
      }
      ControllerUser::updatePassword();
    }else{
      $message = "Vous avez pas accès à cette page";
      $view = 'error';
      $pagetitle = 'pas accès';
      require_once File::build_path(array('view', 'view.php'));
    }
  }

  public static function connect()
  {
    $controller = 'user';
    $view = 'connect';
    $pagetitle = 'Connexion';

    if (isset($_GET["login"])) {
      $login = $_GET["login"];
    } else {
      $login = "";
    }

    require_once File::build_path(array('view', 'view.php'));
  }

  public static function connected()
  {
    $password = $_GET["password"];
    $login = $_GET["login"];

    if (ModelUser::checkPassword($login, Security::chiffrer($password))) {
      $_SESSION['login'] = $login;
      $v = ModelUser::getUserByLogin($login);
      if($v->getAdmin() == 1){
        $_SESSION['admin'] = true; 
      }
      ControllerPost::readAll();
    } else {
      self::connect();
    }
  }

  public static function deconnect()
  {
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    setcookie(session_name(), '', time() - 1); // deletes the session cookie containing the session ID
    ControllerPost::readAll();
  }


  //à sécuriser
  public static function putAdmin(){
    if(Session::is_admin()){
      $user = ModelUser::getUserByLogin($_GET["login"]);
      if($user->updateAdmin() == true){
        self::readAll();
      }else{
        $controller = 'user';
        $view = 'error';
        $pagetitle = 'Erreur';
        require_once File::build_path(array('view', 'view.php'));
      }
    }else{
      $message = "Vous avez pas accès à cette fonction";
      $controller = 'user';
      $view = 'error';
      $pagetitle = 'Erreur d\'accès';
      require_once File::build_path(array('view', 'view.php'));
    }
  }

}


