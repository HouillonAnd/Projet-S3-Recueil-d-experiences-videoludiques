<?php
  require_once File::build_path(array('model','Model.php'));

	class ModelJeu
	{
		private $id;
		private $titre;
		private $nbPost;

	    //getter      
	    public function getId() {
	        return $this->id;  
	    }
	    public function getTitre() {
	        return $this->titre;  
	    }
	    public function getNbPost() {
	        return $this->nbPost;  
	    }
	       
	    //setter 
	    public function setId($id2) {
	        $this->id = $id2;
	    } 
	    public function setTitre($titre2) {
	        $this->titre =$titre2;
	    }
	    public function setNbPost($nbPost2) {
	       	$this->nbPost = $nbPost2;
	       
	    }

	    public function __construct($data = NULL) {
		    if (!is_null($data) && !empty($data)) {
          // Si aucun de $m, $c et $i sont nuls,
          // c'est forcement qu'on les a fournis
          // donc on retombe sur le constructeur à 3 arguments
          foreach ($data as $key => $value) {
            $this->$key = $value;
          }
		    }
		  }

    public static function getAllJeu(){

      $satement = "SELECT * FROM _S3_Jeu";
      $rep = Model::$pdo -> query($satement);
      
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelJeu');
      $tab_jeu = $rep->fetchAll();

      return $tab_jeu;

    }

    public static function getJeuById($id) {
      $sql = "SELECT * from _S3_Jeu WHERE id=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "nom_tag" => $id,
          //nomdutag => valeur, ...
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);

      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelJeu');
      $tab_jeu = $req_prep->fetchAll();
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab_jeu)){
          return false;
        }
      return $tab_jeu[0];
    }

    
    public static function getJeuByTitle($title) {
      $sql = "SELECT * from _S3_Jeu WHERE titre=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "nom_tag" => $title,
          //nomdutag => valeur, ...
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);

      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelJeu');
      $tab_jeu = $req_prep->fetchAll();
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab_jeu)){
          return false;
        }
      return $tab_jeu[0];
    }

    public static function deleteById($id)
    {
      try {
        $sql = "DELETE from _S3_Jeu WHERE id=:nom_tag";
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
    
      $statement ="INSERT INTO _S3_Jeu(id, titre,nbPost) VALUES(:id, :titre, :nbPost)";
      $req_prep = Model::$pdo->prepare($statement);

      $values = array(
        "id" => $this->id,
        "titre" => $this->titre,
        "nbPost" => $this->nbPost
      );    

      $req_prep->execute($values); 
    }

    public function update($data) {
      try {
        $sql = "UPDATE _S3_Jeu SET titre=:titre , nbPost=:nbPost WHERE id=:id";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
             "id" =>$this->id,
             "titre" => $data['titre'],
             "nbPost" => $data['nbPost']
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête   
        $req_prep->execute($values);

        return true;  
      }catch (PDOException $e) {
        return false;
      }
    }

    public static function search($title){
      $sql = "SELECT titre from _S3_Jeu WHERE titre LIKE :nom_tag LIMIT 10";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "nom_tag" => "$title%",
          //nomdutag => valeur, ...
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);

      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_OBJ);
      $tab = $req_prep->fetchAll();
      if(empty($tab)){
        return false;
      }else{
        return $tab;
      }
    }
	}
	
?>