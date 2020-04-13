<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
// instantiate trasparenza object
include_once '../objects/trasparenza.php';
 
$database = new Database();
$db = $database->getConnection();
 
$trasparenza = new Trasparenza($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(!empty($data->title) && !empty($data->docLink) && !empty($data->docIcon)){
 
    // set trasparenza property values
	$trasparenza->title = $data->title;
	$trasparenza->docLink = $data->docLink;
	$trasparenza->docIcon = $data->docIcon;
 
    // create the trasparenza
    if($trasparenza->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "trasparenza was created."));
    }
 
    // if unable to create the trasparenza, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create trasparenza."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create trasparenza. Data is incomplete."));
}
?>
