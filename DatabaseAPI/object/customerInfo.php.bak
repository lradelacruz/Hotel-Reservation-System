<?php

 class customerInfo
 {
	private $connect;
	private $table = "Customer";
	
	public $CustID;
	public $CustName;
	public $Email;
	public $SchedDate;
	public $ReservedDate;
	
			public function __construct($db)
			{
				$this->connect = $db;
			}
			
	function insertRecords()
	{
		$query = "insert into ".$this->table. " set CustID=:CustID,CustName=:CustName,Email=:Email,SchedDate=:SchedDate,ReservedDate=:ReservedDate";
		
		$statement = $this->connect->prepare($query);
		
		$this->CustID = htmlspecialchars(strip_tags($this->CustID));
		$this->CustName = htmlspecialchars(strip_tags($this->CustName));
		$this->Email = htmlspecialchars(strip_tags($this->Email));
		$this->SchedDate = htmlspecialchars(strip_tags($this->SchedDate));
		$this->ReservedDate = htmlspecialchars(strip_tags($this->ReservedDate));
		
		$statement->bindParam(":CustID",$this->CustID);
		$statement->bindParam(":CustName",$this->CustName);
		$statement->bindParam(":Email",$this->Email);
		$statement->bindParam(":SchedDate",$this->SchedDate);
		$statement->bindParam(":ReservedDate",$this->ReservedDate);
		
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
               CustID=:CustID,CustName=:CustName,Email=:Email,SchedDate=:SchedDate,ReservedDate=:ReservedDate
            WHERE
                CustID = :CustID";
  
    $statement = $this->connect->prepare($query);
		$this->CustID = htmlspecialchars(strip_tags($this->CustID));
		$this->CustName = htmlspecialchars(strip_tags($this->CustName));
		$this->Email = htmlspecialchars(strip_tags($this->Email));
		$this->SchedDate = htmlspecialchars(strip_tags($this->SchedDate));
		$this->ReservedDate = htmlspecialchars(strip_tags($this->ReservedDate));
  
		$statement->bindParam(":CustID",$this->CustID);
		$statement->bindParam(":CustName",$this->CustName);
		$statement->bindParam(":Email",$this->Email);
		$statement->bindParam(":SchedDate",$this->SchedDate);
		$statement->bindParam(":ReservedDate",$this->ReservedDate);
  
    if($statement->execute()){
        return true;
    }
  
    return false;
}

function delete(){
  
    $query = "DELETE FROM " . $this->table . " WHERE CustID = ?";
  
    $statement = $this->connect->prepare($query);
  
    $this->CustID=htmlspecialchars(strip_tags($this->CustID));
  
    $statement->bindParam(1, $this->CustID);
  
    if($statement->execute()){
        return true;
    }
  
    return false;
	}


}
	
?>