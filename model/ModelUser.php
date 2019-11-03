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
	}
	
?>