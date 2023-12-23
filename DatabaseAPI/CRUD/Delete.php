<?php

header("Access-Control-Allow-Origin: *");
header("content-type:application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE,OPTIONS");
header("Access-Control-Max-Age:600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization");

include_once '../config/Dbase.php';
include_once '../object/customerInfo.php';

$dbase = new dbase();

$db = $dbase->getConnection();

$customer = new customerInfo($db);

$data = json_decode(file_get_contents("Delete.json"));

$customer->id = $data->id;
	
if($customer->delete())
{
		http_response_code(200);
		echo json_encode(array("message"=>"Info deleted"));
}
else
{
		http_response_code(503);
		echo json_encode(array("message"=>"Unable to delete Info"));
}

?>