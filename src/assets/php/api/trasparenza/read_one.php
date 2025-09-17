<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/trasparenza.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare trasparenza object
$trasparenza = new Trasparenza($db);
 
// set ID property of record to read
$trasparenza->trasparenzaId = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of trasparenza to be edited
$trasparenza->readOne();
 
if($trasparenza->name!=null){
    // create array
    $trasparenza_arr = array(
		"trasparenzaId" => $trasparenza->trasparenzaId,
		"title" => $trasparenza->title,
		"docLink" => $trasparenza->docLink,
		"docIcon" => $trasparenza->docIcon
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($trasparenza_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user trasparenza does not exist
    echo json_encode(array("message" => "trasparenza does not exist."));
}
?>
