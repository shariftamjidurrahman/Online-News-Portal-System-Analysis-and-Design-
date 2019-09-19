<?php
Class Database{
	public $host   = DB_HOST;
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;
	
	
	public $link;
	public $error;
	
	public function __construct(){
		$this->connectDB();
	}
	
	private function connectDB(){
	$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
	if(!$this->link){
		$this->error ="Connection fail".$this->link->connect_error;
		return false;
	}
 }
	
	
	
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	
	public function insert($query){
	$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($insert_row){
	
		return $resultid= $this->link->insert_id;
		exit();

	} else {
		die("Error :(".$this->link->errno.")".$this->link->error);
	}
	
  }
  	public function insert1($query){
	$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($insert_row){
		return 1;

		exit();
	} else {
		die("Error :(".$this->link->errno.")".$this->link->error);
	}
  }
  
  	public function update($query){
	$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($update_row){
		return 1;
	 
		exit();
	} else {
		die("Error :(".$this->link->errno.")".$this->link->error);
	}
  }
  public function update1($query){
	$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($update_row){
			 return $resultid1= 1;
			 exit();
			

	} else {
		die("Error :(".$this->link->errno.")".$this->link->error);
	}
  }
  
   public function delete($query){
	$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($delete_row){
		return "<span style='color:#fff;'>News Post Deleted Successfully. </span>";
			

          		
		exit();
	} else {
		die("Error :(".$this->link->errno.")".$this->link->error);
	}
  }
   public function delete1($query){
	$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($delete_row){
		return 1;		
		exit();
	} else {
		die("Error :(".$this->link->errno.")".$this->link->error);
	}
  }

 
 
}

