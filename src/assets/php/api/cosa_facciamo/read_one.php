<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/cosa_facciamo.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare cosa_facciamo object
$cosa_facciamo = new CosaFacciamo($db);
 
// set ID property of record to read
$cosa_facciamo->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of cosa_facciamo to be edited
$cosa_facciamo->readOne();
 
if($cosa_facciamo->id!=null){
    // create array
    $cosa_facciamo_arr = array(
        "id" =>  $cosa_facciamo->id,
        "column_position" => $cosa_facciamo->column_position,
        "column_title" => $cosa_facciamo->column_title,
        "column_content" => $cosa_facciamo->column_content,
        "img_url_big" => $cosa_facciamo->img_url_big 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($cosa_facciamo_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user cosa_facciamo does not exist
    echo json_encode(array("message" => "cosa_facciamo does not exist."));
}
?>