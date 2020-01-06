<?php
class Conf {
   
  static private $databases = array(
    'hostname' => 'webinfo.iutmontp.univ-montp2.fr',  //à modifier comme indiqué selon le Readme
    'database' => 'agussolg',                         //à modifier comme indiqué selon le Readme
    'login' => 'agussolg',                            //à modifier comme indiqué selon le Readme
    'password' => 'AANLLPzq'                          //à modifier comme indiqué selon le Readme
  );
  // la variable debug est un boolean
    static private $debug = True; 
    
    static public function getDebug() {
      return self::$debug;
    }

    static public function getHostname() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['hostname'];
  }

    static public function getDatabase() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['database'];
  }
   
  static public function getLogin() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['login'];
  }

    static public function getPassword() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['password'];
  }
   
}
?>
