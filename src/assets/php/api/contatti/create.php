<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
// instantiate contatti object
include_once '../objects/contatti.php';
 
$database = new Database();
$db = $database->getConnection();
 
$contatti = new Contatti($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(!empty($data->column_position) && !empty($data->contact_name) &&
   !empty($data->contact_address) && !empty($data->contact_role) &&)
   !empty($data->contact_phone) && !empty($data->contact_mail)){
 
    // set contatti property values
	$contatti->column_position = $data->column_position;
	$contatti->contact_name = html_entity_decode($data->contact_name);
	$contatti->contact_address = $data->contact_address;
	$contatti->contact_role = $data->contact_role;
	$contatti->contact_phone = $data->contact_phone;
	$contatti->contact_secondary_phone = $data->contact_secondary_phone;
	$contatti->contact_mail = $data->contact_mail;
	$contatti->contact_secondary_mail = $data->contact_secondary_mail;
 
    // create the contatti
    if($contatti->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "contatti was created."));
    }
 
    // if unable to create the contatti, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create contatti."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create contatti. Data is incomplete."));
}
?>