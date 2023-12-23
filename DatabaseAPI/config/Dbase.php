<?php

class Dbase
{
	private $host="localhost";
	private $dbname="hotel";
	private $username="root";
	private $password="";
	private $connect;
	
			public function getConnection()
			{
				$this->connect = null;
			
		
			try
			{
				$this->connect = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);
			}
			catch(PDOException $e)
			{
				echo "ERROR connection:".$e->getMessage();
			}
			return $this->connect;
			}
}
?>