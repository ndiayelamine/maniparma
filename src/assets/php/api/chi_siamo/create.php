<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
// instantiate chi_siamo object
include_once '../objects/chi_siamo.php';
 
$database = new Database();
$db = $database->getConnection();
 
$chi_siamo = new ChiSiamo($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(!empty($data->column_position) && !empty($data->column_title) &&
   !empty($data->column_content) && !empty($data->img_url_big)){
 
    // set chi_siamo property values
	$chi_siamo->column_position = $data->column_position;
	$chi_siamo->column_title = html_entity_decode($data->column_title);
	$chi_siamo->column_content = $data->column_content;
	$chi_siamo->img_url_big = $data->img_url_big;
 
    // create the chi_siamo
    if($chi_siamo->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "chi_siamo was created."));
    }
 
    // if unable to create the chi_siamo, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create chi_siamo."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create chi_siamo. Data is incomplete."));
}
?>