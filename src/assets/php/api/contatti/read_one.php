<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/contatti.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare contatti object
$contatti = new Contatti($db);
 
// set ID property of record to read
$contatti->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of contatti to be edited
$contatti->readOne();
 
if($contatti->id!=null){
    // create array
    $contatti_arr = array(	
		"id" => $contatti->id,
		"column_position" => $contatti->column_position,
		"contact_name" => html_entity_decode($contatti->contact_name),
		"contact_address" => $contatti->contact_address,
		"contact_role" => $contatti->contact_role,
		"contact_phone" => $contatti->contact_phone,
		"contact_secondary_phone" => $contatti->contact_secondary_phone,
		"contact_mail" => $contatti->contact_mail,
		"contact_secondary_mail" => $contatti->contact_secondary_mail
 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($contatti_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user contatti does not exist
    echo json_encode(array("message" => "contatti does not exist."));
}
?>