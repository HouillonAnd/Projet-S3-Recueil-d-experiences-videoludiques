<? php
	require_once 'Model.php';

	class ModelUser
	{
		private $id;
		private $login;
		private $password;
		private $email;
		private $date_enregistrement;

	    //getter      
	    public function getId() {
	        return $this->id;  
	    }
	    public function getLogin() {
	        return $this->login;  
	    }
	    public function getPassword() {
	        return $this->password;  
	    }
	    public function getEmail() {
	        return $this->email;  
	    }
	    public function getDate_enregistrement() {
	        return $this->date_enregistrement;  
	    }
	       
	    //setter 
	    public function setId($id2) {
	        $this->id = $id2;
	    } 
	    public function setLogin($login2) {
	        $this->login =$login2;
	    }
	    public function setPassword($password2) {
	       	$this->password = $password2;
	    }
	    public function setEmail($email2) {
	        $this->email = $email2;
	    } 
	    public function setDate_enregistrement($date_enregistrement2) {
	        $this->date_enregistrement = $date_enregistrement2;
	    }

	    public function __construct($i = NULL, $l = NULL, $p = NULL, $e = NULL, $d = NULL) {
		    if (!is_null($i) && !is_null($l) && !is_null($p) && !is_null($e) && !is_null($d)) {
		        $this->id = $i;
		        $this->login = $l;
		        $this->password = $p;
		        $this->email = $e;
		        $this->date_enregistrement = $d;
		    }
		}

    public static function getAllUser(){

      $satement = "SELECT * FROM _S3_User";
      $rep = Model::$pdo -> query($satement);
      
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
      $tab_us = $rep->fetchAll();

      return $tab_us;

    }

    public static function getUserById($id) {
      $sql = "SELECT * from _S3_User WHERE id=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "nom_tag" => $id,
          //nomdutag => valeur, ...
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);

      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
      $tab_us = $req_prep->fetchAll();
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab_us)){
          return false;
        }
      return $tab_us[0];
    }

    public static function deleteById($id)
    {
      try {
        $sql = "DELETE from _S3_User WHERE id=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $id,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête   
        $req_prep->execute($values);
        return true;
      } catch (PDOException $e) {
        return false;
      }
    }
    

    public function save() {
    
      $statement ="INSERT INTO _S3_User(id, login,password, email,date_enregistrement) VALUES(:id, :login, :password, :email,:date_enregistrement)";
      $req_prep = Model::$pdo->prepare($statement);

      $values = array(
        "id" => $this->id,
        "login" => $this->login,
        "password" => $this->password,
        "email" => $this->email,
        "date_enregistrement" => $this->date_enregistrement
      );    

      $req_prep->execute($values); 
    }

    public function update($data) {
      try {
        $sql = "UPDATE _S3_User SET login=:login , password=:password , email=:email , date_enregistrement=:date_enregistrement WHERE id=:id";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
             "id" =>$this->id,
             "login" => $data['login'],
             "password" => $data['password'],
             "email" => $data['email'],
             "date_enregistrement" => $data['date_enregistrement']
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête   
        $req_prep->execute($values);

        return true;  
      }catch (PDOException $e) {
        return false;
      }
    } 
	}
	
?>