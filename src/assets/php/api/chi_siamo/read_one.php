<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/chi_siamo.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare chi_siamo object
$chi_siamo = new ChiSiamo($db);
 
// set ID property of record to read
$chi_siamo->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of chi_siamo to be edited
$chi_siamo->readOne();
 
if($chi_siamo->id!=null){
    // create array
    $chi_siamo_arr = array(
		"id" => $chi_siamo->id,
		"column_position" => $chi_siamo->column_position,
		"column_title" => html_entity_decode($chi_siamo->column_title),
		"column_content" => $chi_siamo->column_content,
		"img_url_big" => $chi_siamo->img_url_big
 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($chi_siamo_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user chi_siamo does not exist
    echo json_encode(array("message" => "chi_siamo does not exist."));
}
?>