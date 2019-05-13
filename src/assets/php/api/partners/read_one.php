<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/partners.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare partners object
$partners = new Partners($db);
 
// set ID property of record to read
$partners->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of partners to be edited
$partners->readOne();
 
if($partners->id!=null){
    // create array
    $partners_arr = array(
        "id" =>  $partners->id,
		"column_position" => $partners->column_position,
		"column_title" => html_entity_decode($partners->column_title),
		"column_link" => $partners->column_link,
		"column_link_open" => $partners->column_link_open,
		"img_url" => $partners->img_url
 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($partners_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user partners does not exist
    echo json_encode(array("message" => "partners does not exist."));
}
?>