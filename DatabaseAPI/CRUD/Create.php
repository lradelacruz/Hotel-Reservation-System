<?php

header("Access-Control-Allow-Origin: *");
header("content-type:application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE,OPTIONS");
header("Access-Control-Max-Age:600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization");

include '../config/Dbase.php';
include '../object/customerInfo.php';

$dbase = new Dbase();

$db = $dbase->getConnection();

$customer = new customerInfo($db);

$content = file_get_contents("data.json");


$data = json_decode($content);


if(!empty($data->CustID)&&!empty($data->CustName)&&!empty($data->Email)&&!empty($data->SchedDate)&&!empty($data->ReservedDate))
{	

	$customer->CustID=$data->CustID;
	$customer->CustName=$data->CustName;
	$customer->Email=$data->Email;
	$customer->SchedDate=$data->SchedDate;
	$customer->ReservedDate=$data->ReservedDate;
	
if($customer->insertRecords())
{
		echo json_encode(array("message"=>"Customer info was created"));
}
else
{
		echo json_encode(array("message"=>"Unable to create customer info"));
}
}
else
{
		echo json_encode(array("message"=>"Unable to insert new record"));
}
?>