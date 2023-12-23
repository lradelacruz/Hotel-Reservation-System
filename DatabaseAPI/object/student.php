<?php

 class student
 {
	private $connect;
	private $table = "Student";
	
	public $id;
	public $name;
	public $age;
	public $email;
	public $created;
	
			public function __construct($db)
			{
				$this->connect = $db;
			}
			
	function insertRecord()
	{
		$query = "insert into ".$this->table. " set name=:name,age=:age,email=:email,created=:created";
		
		$stmt = $this->connect->prepare($query);
		
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->age = htmlspecialchars(strip_tags($this->age));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->created = htmlspecialchars(strip_tags($this->created));
		
		$stmt->bindParam(":name",$this->name);
		$stmt->bindParam(":age",$this->age);
		$stmt->bindParam(":email",$this->email);
		$stmt->bindParam(":created",$this->created);
		
		if($stmt->execute())
		{ 
	    return true;
		}
		else
		{
		  return false;
		}
	}
	
	
	function read()
	{
		$query = "select * from ".$this->table;
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		
		return $stmt;
		
	}
	
	// update the product
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table . "
            SET
               name=:name,age=:age,email=:email
            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->connect->prepare($query);
  
    // sanitize
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->age = htmlspecialchars(strip_tags($this->age));
		$this->email = htmlspecialchars(strip_tags($this->email));
  
    // bind new values
	$stmt->bindParam(":name",$this->name);
	$stmt->bindParam(":age",$this->age);
	$stmt->bindParam(":email",$this->email);
    $stmt->bindParam(':id', $this->id);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

// delete the product
function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";
  
    // prepare query
    $stmt = $this->connect->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}


 }
	
	?>