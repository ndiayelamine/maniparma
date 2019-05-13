<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
// instantiate cosa_facciamo object
include_once '../objects/cosa_facciamo.php';
 
$database = new Database();
$db = $database->getConnection();
 
$cosa_facciamo = new CosaFacciamo($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(!empty($data->column_position) && !empty($data->column_title) &&
   !empty($data->column_content) && !empty($data->img_url_big)){
 
    // set cosa_facciamo property values
	$cosa_facciamo->column_position = $data->column_position;
	$cosa_facciamo->column_title = $data->column_title;
	$cosa_facciamo->column_content = $data->column_content;
	$cosa_facciamo->img_url_big = $data->img_url_big;
 
    // create the cosa_facciamo
    if($cosa_facciamo->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "cosa_facciamo was created."));
    }
 
    // if unable to create the cosa_facciamo, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create cosa_facciamo."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create cosa_facciamo. Data is incomplete."));
}
?>