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

$content = file_get_contents("Update.json");

$data = json_decode($content);

	$customer->CustID=$data->CustID;
	$customer->CustName=$data->CustName;
	$customer->Email=$data->Email;
	$customer->SchedDate=$data->SchedDate;
	$customer->ReservedDate=$data->ReservedDate;
	
if($customer->update())
{
		http_response_code(200);
		echo json_encode(array("message"=>"Customer Info was updated"));
}
else
{
		http_response_code(503);
		echo json_encode(array("message"=>"Unable to update Customer Info"));
}
?>