<?php

header("Access-Control-Allow-Origin: *");
header("content-type:application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE,OPTIONS");
header("Access-Control-Max-Age:600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization");

include_once '../config/DB.php';
include_once '../object/studentInfo.php';

$database = new Database();

$db = $database->getConnection();

$student = new Student($db);

$statement = $student->read();
$count = $statement->rowCount();

if($count>0)
{
	$array = array();
	$array["records"]=array();
	
		while($row=$statement->fetch(PDO::FETCH_ASSOC))
		{
				extract($row);
					
					$list=array(
					"id"=>$id,
					"name"=>$name,
					"age"=>$age,
					"email"=>$email
					);
					
					array_push($array["records"],$list);
		}
		echo json_encode($array);
}
					

?>