<? php
	require_once 'Model.php';

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

	    public function __construct($i = NULL, $t = NULL, $n = NULL) {
		    if (!is_null($i) && !is_null($t) && !is_null($n)) {
		        $this->id = $i;
		        $this->titre = $t;
		        $this->nbPost = $n;
		    }
		} 
	}
	
?>