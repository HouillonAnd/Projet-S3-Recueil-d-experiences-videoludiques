<? php
  require_once File::build_path(array('model','Model.php'));
  
	class ModelUpvote
	{
		private $user_id;
		private $post_id;


	    //getter      
	    public function getUser_id() {
	        return $this->user_id;  
	    }
	    public function getPost_id() {
	        return $this->post_id;  
	    }

	       
	    //setter 
	    public function setUser_id($user_id2) {
	        $this->user_id = $user_id2;
	    } 
	    public function setPost_id($login2) {
	        $this->post_id =$post_id2;
	    }


	    public function __construct($u = NULL, $p = NULL) {
		    if (!is_null($u) && !is_null($p)) {
		        $this->user_id = $u;
		        $this->post_id = $p;

		    }
		}

    public static function getAllUpvote(){

      $satement = "SELECT * FROM _S3_Upvote";
      $rep = Model::$pdo -> query($satement);
      
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUpvote');
      $tab_us = $rep->fetchAll();

      return $tab_us;

    }

    public static function getUpvoteByUser_id($user_id) {
      $sql = "SELECT * from _S3_Upvote WHERE user_id=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "nom_tag" => $user_id,
          //nomdutag => valeur, ...
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);

      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUpvote');
      $tab_up = $req_prep->fetchAll();
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab_up)){
          return false;
        }
      return $tab_up[0];
    }

    public static function getUpvoteByPost_id($post_id) {
      $sql = "SELECT * from _S3_Upvote WHERE post_id=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "nom_tag" => $post_id,
          //nomdutag => valeur, ...
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);

      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUpvote');
      $tab_up = $req_prep->fetchAll();
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab_up)){
          return false;
        }
      return $tab_up[0];
    }

    public static function deleteByUser_id($user_id)
    {
      try {
        $sql = "DELETE from _S3_Upvote WHERE user_id=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $user_id,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête   
        $req_prep->execute($values);
        return true;
      } catch (PDOException $e) {
        return false;
      }
    }

    public static function deleteByPost_id($post_id)
    {
      try {
        $sql = "DELETE from _S3_Upvote WHERE post_id=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $post_id,
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
    
      $statement ="INSERT INTO _S3_Upvote(user_id,post_id) VALUES(:user_id,:post_id)";
      $req_prep = Model::$pdo->prepare($statement);

      $values = array(
        "user_id" => $this->user_id,
        "post_id" => $this->post_id,
      );    

      $req_prep->execute($values); 
    }

	}
	
?>