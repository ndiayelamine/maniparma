<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/contatti.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare contatti object
$contatti = new Contatti($db);
 
// get id of contatti to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of contatti to be edited
$contatti->id = $data->id;

$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/contatti/read_one.php?id=".$contatti->id));
//$check_id = json_decode(file_get_contents("./read_one.php?id=".$contatti->id, true));

if($check_id !== NULL){
	// set contatti property values	
	$contatti->column_position = $data->column_position;
	$contatti->contact_name = html_entity_decode($data->contact_name);
	$contatti->contact_address = $data->contact_address;
	$contatti->contact_role = $data->contact_role;
	$contatti->contact_phone = $data->contact_phone;
	$contatti->contact_secondary_phone = $data->contact_secondary_phone;
	$contatti->contact_mail = $data->contact_mail;
	$contatti->contact_secondary_mail = $data->contact_secondary_mail;
	 
	// update the contatti
	if($contatti->update()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "contatti was updated."));
	}else{
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to update contatti."));
	}
}
// if unable to update the contatti, tell the user
else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "contatti with id = ".$contatti->id." not found!"));
}
?>