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

$statement = $customer->read();
$count = $statement->rowCount();

if($count>0)
{
	$array = array();
	$array["records"]=array();
	
		while($row=$statement->fetch(PDO::FETCH_ASSOC))
		{
				extract($row);
					
					$list=array(
					"CustID"=>$CustID,
					"CustName"=>$CustName,
					"Email"=>$Email,
					"SchedDate"=>$SchedDate,
					"ReservedDate"=>$ReservedDate
					);
					
					array_push($array["records"],$list);
		}
		echo json_encode($array);
}
					

?>