<? php
	require_once 'Model.php';

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

	    public function __construct($i = NULL, $t = NULL, $j = NULL, $c = NULL, $p = NULL, $s = NULL, $d = NULL) {
		    if (!is_null($i) && !is_null($t) && !is_null($j) && !is_null($c) && !is_null($p) && !is_null($s) && !is_null($d)) {
		        $this->id = $i;
		        $this->tristesse = $t;
		        $this->joie = $j;
		        $this->colere = $c;
		        $this->peur = $p;
		        $this->surprise = $s;
		        $this->degout = $d;
		    }
		} 
	}
	
?>