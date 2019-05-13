<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../config/database.php';
include_once '../objects/cosa_facciamo.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare cosa_facciamo object
$cosa_facciamo = new CosaFacciamo($db);
 
// get cosa_facciamo id
$data = json_decode(file_get_contents("php://input"));
 
// set cosa_facciamo id to be deleted
$cosa_facciamo->id = $data->id;
 
$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/cosa_facciamo/read_one.php?id=".$cosa_facciamo->id));

if($check_id !== NULL){
	// delete the cosa_facciamo
	if($cosa_facciamo->delete()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "cosa_facciamo was deleted."));
	}
	 
	// if unable to delete the cosa_facciamo
	else{
	 
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to delete cosa_facciamo."));
	}
}else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "cosa_facciamo with id = ".$cosa_facciamo->id." not found!"));
}
?>