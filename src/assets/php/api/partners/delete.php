<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../config/database.php';
include_once '../objects/partners.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare partners object
$partners = new Partners($db);
 
// get partners id
$data = json_decode(file_get_contents("php://input"));
 
// set partners id to be deleted
$partners->id = $data->id;
 
$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/partners/read_one.php?id=".$partners->id));

if($check_id !== NULL){
	// delete the partners
	if($partners->delete()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "partners was deleted."));
	}
	 
	// if unable to delete the partners
	else{
	 
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to delete partners."));
	}
}else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "partners with id = ".$partners->id." not found!"));
}
?>