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
		
		$statement = $this->connect->prepare($query);
		
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->age = htmlspecialchars(strip_tags($this->age));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->created = htmlspecialchars(strip_tags($this->created));
		
		$statement->bindParam(":name",$this->name);
		$statement->bindParam(":age",$this->age);
		$statement->bindParam(":email",$this->email);
		$statement->bindParam(":created",$this->created);
		
		if($statement->execute())
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
		$statement = $this->connect->prepare($query);
		$statement->execute();
		
		return $statement;
		
	}
	
function update(){
  
    $query = "UPDATE
                ". $this->table ."
            SET
               name=:name,age=:age,email=:email
            WHERE
                id = :id";
  
    $statement = $this->connect->prepare($query);
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->age = htmlspecialchars(strip_tags($this->age));
		$this->email = htmlspecialchars(strip_tags($this->email));
  
	$statement->bindParam(":name",$this->name);
	$statement->bindParam(":age",$this->age);
	$statement->bindParam(":email",$this->email);
    $statement->bindParam(':id', $this->id);
  
    if($statement->execute()){
        return true;
    }
  
    return false;
}

function delete(){
  
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";
  
    $statement = $this->connect->prepare($query);
  
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    $statement->bindParam(1, $this->id);
  
    if($statement->execute()){
        return true;
    }
  
    return false;
	}


}
	
?>