<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
// instantiate partners object
include_once '../objects/partners.php';
 
$database = new Database();
$db = $database->getConnection();
 
$partners = new Partners($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(!empty($data->column_position) && !empty($data->column_title) &&
   !empty($data->column_link) && !empty($data->column_link_open)){
 
    // set partners property values
	$partners->column_position = $data->column_position;
	$partners->column_title = html_entity_decode($data->column_title);
	$partners->column_link = $data->column_link;
	$partners->column_link_open = $data->column_link_open;
	$partners->img_url = $data->img_url;
 
    // create the partners
    if($partners->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "partners was created."));
    }
 
    // if unable to create the partners, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create partners."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create partners. Data is incomplete."));
}
?>
