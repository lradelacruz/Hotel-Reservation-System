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

$content = file_get_contents("updatejson.json");


$data = json_decode($content);

$student->id = $data->id;
	
	$student->name=$data->name;
	$student->age=$data->age;
	$student->email=$data->email;

	
if($student->update())
{
		http_response_code(200);
		echo json_encode(array("message"=>"Student Record was updated"));
}
else
{
		http_response_code(503);
		echo json_encode(array("message"=>"Unable to update StudentRecord"));
}
?>