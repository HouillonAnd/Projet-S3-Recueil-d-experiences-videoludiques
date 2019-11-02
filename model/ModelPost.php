<? php
	require_once 'Model.php';

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

	    public function __construct($i = NULL, $a = NULL, $d = NULL, $c = NULL, $j = NULL, $t = NULL, $e = NULL) {
		    if (!is_null($i) && !is_null($a) && !is_null($d) && !is_null($c) && !is_null($j) && !is_null($t) && !is_null($e)) {
		        $this->id = $i;
		        $this->auteur_id = $a;
		        $this->date_publication = $d;
		        $this->contenu = $c;
		        $this->jeu_id = $j;
		        $this->titre = $t;
		        $this->emotion_id = $e;
		        $this->nbUpvote = 0;
		    }
		} 
	}
	
?>