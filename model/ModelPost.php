<? php
	require_once 'Model.php';

	class ModelPost
	{
		private $id;
		private $auteur_id;
		private $date_publication;
		private $contenu;

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

	    public function __construct($i = NULL, $a = NULL, $d = NULL, $c = NULL) {
		    if (!is_null($i) && !is_null($a) && !is_null($d) && !is_null($c)) {
		        $this->id = $i;
		        $this->auteur_id = $a;
		        $this->date_publication = $d;
		        $this->contenu = $c;
		    }
		} 
	}
	
?>