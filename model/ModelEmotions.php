<?php
	require_once File::build_path(array('model','Model.php'));

	class ModelEmotions
	{
		private $id;
		private $tristesse;
		private $joie;
		private $colere;
		private $peur;
		private $surprise;
		private $degout;

	    //getter      
	    public function getId() {
	        return $this->id;  
	    }
	    public function getTristesse() {
	        return $this->tristesse;  
	    }
	    public function getJoie() {
	        return $this->joie;  
	    }
	    public function getColere() {
	        return $this->colere;  
	    }
	    public function getPeur() {
	        return $this->peur;  
	    }
	     public function getSurprise() {
	        return $this->surprise;  
	    }
	    public function getDegout() {
	        return $this->degout;  
	    }

	    //setter 
	    public function setId($id2) {
	        $this->id = $id2;
	    } 
	    public function setTristesse($tristesse2) {
	        $this->tristesse =$tristesse2;
	    }
	    public function setJoie($joie2) {
	       	$this->joie = $joie2;
	    }
	    public function setColere($colere2) {
	        $this->colere = $colere2;
	    } 
	    public function setPeur($peur2) {
	        $this->peur = $peur2;
	    }
	    public function setSurprise($surprise2) {
	        $this->surprise = $surprise2;
	    }
	    public function setDegout($degout2) {
	        $this->degout = $degout2;
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

      public static function getAllEmotions(){

        $satement = "SELECT * FROM _S3_Emotions";
        $rep = Model::$pdo -> query($satement);
        
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelEmotions');
        $tab_em = $rep->fetchAll();

        return $tab_em;

      }

    public static function getEmotionById($id) {
      $sql = "SELECT * from _S3_Emotions WHERE id=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "nom_tag" => $id,
          //nomdutag => valeur, ...
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);

      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEmotions');
      $tab_em = $req_prep->fetchAll();
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab_em)){
          return false;
        }
      return $tab_em[0];
    }

    //Cette fonction permet de récupérer l'émotion la plus récente dans la base de donner peut être remplacer par lastinsertid)
    public static function getRecentEmotionId(){
      $sql = "SELECT MAX(id) as id FROM _S3_Emotions";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);

      // On exécute la requête   
      $req_prep->execute();

      //On récupère le résultat
      $req_prep->setFetchMode(PDO::FETCH_ASSOC);
      $tab = $req_prep->fetchAll();
      return $tab[0]['id'];
    }

    public static function deleteById($id)
    {
      try {
        $sql = "DELETE from _S3_Emotions WHERE id=:nom_tag";
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
    
      $statement ="INSERT INTO _S3_Emotions(id, tristesse,joie, colere,peur, surprise, degout) VALUES(:id, :tristesse, :joie, :colere,:peur, :surprise, :degout)";
      $req_prep = Model::$pdo->prepare($statement);

      $values = array(
        "id" => $this->id,
        "tristesse" => $this->tristesse,
        "joie" => $this->joie,
        "colere" => $this->colere,
        "peur" => $this->peur,
        "surprise" => $this->surprise,
        "degout" => $this->degout,
      );    

      $req_prep->execute($values); 
    }

    public function update($data) {
      try {
        $sql = "UPDATE _S3_Emotions SET tristesse=:tristesse , joie=:joie , colere=:colere , peur=:peur , surprise=:surprise , degout=:degout WHERE id=:id";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
             "id" =>$this->id,
             "tristesse" => $data['tristesse'],
             "joie" => $data['joie'],
             "colere" => $data['colere'],
             "peur" => $data['peur'],
             "surprise" => $data['surprise'],
             "degout" => $data['degout']
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête   
        $req_prep->execute($values);

        return true;  
      }catch (PDOException $e) {
        return false;
      }
    }
		public static function getMoyenneEmotionFromJeu($idJeu){

      try{
        $sql ="SELECT AVG(tristesse),AVG(joie),AVG(colere),AVG(peur),AVG(surprise),AVG(degout) From `_S3_Emotions` E JOIN `_S3_Post` P on E.id=P.emotion_id JOIN `_S3_Jeu` J on P.jeu_id = J.id Where J.id = :id";
      
            $req_prep = Model::$pdo->prepare($sql);
            $values = array( "id" => $idJeu );
            $req_prep->execute($values);
            $tab = $req_prep->fetchAll();
            return $tab;
      
            
          }
          catch (PDOException $e) {
        //return false;
      }



    }
	}
	
?>
