<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/partners.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare partners object
$partners = new Partners($db);
 
// get id of partners to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of partners to be edited
$partners->id = $data->id;

$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/partners/read_one.php?id=".$partners->id));
//$check_id = json_decode(file_get_contents("./read_one.php?id=".$partners->id, true));

if($check_id !== NULL){
	// set partners property values	
	$partners->column_position = $data->column_position;
	$partners->column_title = html_entity_decode($data->column_title);
	$partners->column_link = $data->column_link;
	$partners->column_link_open = $data->column_link_open;
	$partners->img_url = $data->img_url;
	 
	// update the partners
	if($partners->update()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "partners was updated."));
	}else{
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to update partners."));
	}
}
// if unable to update the partners, tell the user
else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "partners with id = ".$partners->id." not found!"));
}
?>