<?php
	require_once File::build_path(array('model','Model.php'));

	class ModelPost
	{
		private $id;
		private $auteur_id;
		private $date_publication;
		private $contenu;
		private $jeu_id;
		private $titre;
		private $emotion_id;
		private $nbUpvote;

	    //getter      
	    public function getId() {
	        return $this->id;  
	    }
	    public function getAuteur_id() {
	        return $this->auteur_id;  
	    }
	    public function getDate_publication() {
	        return $this->date_publication;  
	    }
	    public function getContenu() {
	        return $this->contenu;  
	    }
	    public function getJeu_id() {
	        return $this->jeu_id;  
	    }
	    public function getTitre() {
	        return $this->titre;  
	    }
	    public function getEmotion_id() {
	        return $this->emotion_id;  
	    }
	    public function getnbUpvote() {
	        return $this->nbUpvote;  
	    }
	       
	    //setter 
	    public function setId($id2) {
	        $this->id = $id2;
	    } 
	    public function setAuteur_id($auteur_id2) {
	        $this->auteur_id =$auteur_id2;
	    }
	    public function setDate_publication($date_publication2) {
	       	$this->date_publication = $date_publication2;
	    }
	    public function setContenu($contenu2) {
	        $this->contenu = $contenu2;
	    }
	    public function setJeu_id($jeu_id2) {
	        $this->jeu_id = $jeu_id2;
	    }
	    public function setTitre($titre2) {
	        $this->titre = $titre2;
	    }
	    public function setEmotion_id($emotion_id2) {
	        $this->emotion_id = $emotion_id2;
	    }
	    public function setnbUpvote($nbUpvote) {
	        $this->nbUpvote = $nbUpvote;
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

    public static function getAllPost(){

      $satement = "SELECT * FROM _S3_Post";
      $rep = Model::$pdo -> query($satement);
      
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelPost');
      $tab_post = $rep->fetchAll();

      return $tab_post;

    }

    public static function getPostById($id) {
      $sql = "SELECT * from _S3_Post WHERE id=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "nom_tag" => $id,
          //nomdutag => valeur, ...
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);

      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelPost');
      $tab_post = $req_prep->fetchAll();
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab_post)){
          return false;
        }
      return $tab_post[0];
    }

    public static function deleteById($id)
    {
      try {
        $sql = "DELETE from _S3_Post WHERE id=:nom_tag";
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
    
      $statement ="INSERT INTO _S3_Post(id, auteur_id,date_publication, contenu,jeu_id, titre, emotion_id, nbUpvote) VALUES(:id, :auteur_id, :date_publication, :contenu,:jeu_id, :titre, :emotion_id, :nbUpvote)";
      $req_prep = Model::$pdo->prepare($statement);

      $values = array(
        "id" => $this->id,
        "auteur_id" => $this->auteur_id,
        "date_publication" => $this->date_publication,
        "contenu" => $this->contenu,
        "jeu_id" => $this->jeu_id,
        "titre" => $this->titre,
        "emotion_id" => $this->emotion_id,
        "nbUpvote" => $this->nbUpvote
      );    

      $req_prep->execute($values); 
    }

    public function update($data) {
      try {
        $sql = "UPDATE _S3_Post SET auteur_id=:auteur_id , date_publication=:date_publication , contenu=:contenu , jeu_id=:jeu_id , titre=:titre , emotion_id=:emotion_id, nbUpvote=:nbUpvote WHERE id=:id";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
             "id" =>$this->id,
             "auteur_id" => $data['auteur_id'],
             "date_publication" => $data['date_publication'],
             "contenu" => $data['contenu'],
             "jeu_id" => $data['jeu_id'],
             "titre" => $data['titre'],
             "emotion_id" => $data['emotion_id'],
             "nbUpvote" => $data['nbUpvote']
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
