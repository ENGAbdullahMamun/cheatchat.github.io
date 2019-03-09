<?php


class webpage{

	public $host = "localhost";
	public $username = "root";
	public $password = "";
	public $database = "ip";
	public $con;
	
	public function __construct(){
		
		$this->con = new mysqli($this->host,$this->username,$this->password,$this->database);
		if ($this->con){
			
		  echo "";
		}else {
			echo "error";
		}
	}
	
	public function insert($insert){
		
		$insert = $this->con->query($insert);
		if($insert){
			throw new exception;
		}
	}
	public function select($select){
			
	    $select = $this->con->query($select);
	    if($select){
		   return $select;
		}
	 
	}
	
	public function login($login){
			
	    $login = $this->con->query($login);
	    if(mysqli_num_rows($login) == 1){
		   throw new exception;
		}
    }
	
	public function update($update){
			
	    $update = $this->con->query($update);
	    if($update){
		   throw new exception;
		}
    }
	
}

?>