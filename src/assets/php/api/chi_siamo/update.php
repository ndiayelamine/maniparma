<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/chi_siamo.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare chi_siamo object
$chi_siamo = new ChiSiamo($db);
 
// get id of chi_siamo to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of chi_siamo to be edited
$chi_siamo->id = $data->id;

$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/chi_siamo/read_one.php?id=".$chi_siamo->id));
//$check_id = json_decode(file_get_contents("./read_one.php?id=".$chi_siamo->id, true));

if($check_id !== NULL){
	// set chi_siamo property values
	$chi_siamo->column_position = $data->column_position;
	$chi_siamo->column_title = html_entity_decode($data->column_title);
	$chi_siamo->column_content = $data->column_content;
	$chi_siamo->img_url_big = $data->img_url_big;
	 
	// update the chi_siamo
	if($chi_siamo->update()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "chi_siamo was updated."));
	}else{
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to update chi_siamo."));
	}
}
// if unable to update the chi_siamo, tell the user
else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "chi_siamo with id = ".$chi_siamo->id." not found!"));
}
?>