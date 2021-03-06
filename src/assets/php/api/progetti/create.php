<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
// instantiate progetti object
include_once '../objects/progetti.php';
 
$database = new Database();
$db = $database->getConnection();
 
$progetti = new Progetti($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(!empty($data->column_position) && !empty($data->title) &&
   !empty($data->location) && !empty($data->short_description) &&)
   !empty($data->long_description) && !empty($data->image_url) &&)
   !empty($data->progetti_date) && !empty($data->seo_title)){
 
    // set progetti property values
	$progetti->column_position = $data->column_position;
	$progetti->title = html_entity_decode($data->title);
	$progetti->location = $data->location;
	$progetti->short_description = $data->short_description;
	$progetti->long_description = $data->long_description;
	$progetti->image_url = $data->image_url;
	$progetti->progetti_date = $data->progetti_date;
	$progetti->seo_title = $data->seo_title;
 
    // create the progetti
    if($progetti->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "progetti was created."));
    }
 
    // if unable to create the progetti, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create progetti."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create progetti. Data is incomplete."));
}
?>