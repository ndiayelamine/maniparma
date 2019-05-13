<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/progetti.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare progetti object
$progetti = new Progetti($db);
 
// set ID property of record to read
$progetti->progetti_id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of progetti to be edited
$progetti->readOne();
 
if($progetti->progetti_id!=null){
    // create array
    $progetti_arr = array(
		"progetti_id" => $progetti->progetti_id,
		"column_position" => $progetti->column_position,
		"title" => html_entity_decode($progetti->title),
		"location" => $progetti->location,
		"short_description" => $progetti->short_description,
		"long_description" => $progetti->long_description,
		"image_url" => $progetti->image_url,
		"progetti_date" => $progetti->progetti_date,
		"seo_title" => $progetti->seo_title
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($progetti_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user progetti does not exist
    echo json_encode(array("message" => "progetti does not exist."));
}
?>