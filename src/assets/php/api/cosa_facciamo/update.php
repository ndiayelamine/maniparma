<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/cosa_facciamo.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare cosa_facciamo object
$cosa_facciamo = new CosaFacciamo($db);
 
// get id of cosa_facciamo to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of cosa_facciamo to be edited
$cosa_facciamo->id = $data->id;

$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/cosa_facciamo/read_one.php?id=".$cosa_facciamo->id));
//$check_id = json_decode(file_get_contents("./read_one.php?id=".$cosa_facciamo->id, true));

if($check_id !== NULL){
	// set cosa_facciamo property values	
	$cosa_facciamo->column_position = $data->column_position;
	$cosa_facciamo->column_title = $data->column_title;
	$cosa_facciamo->column_content = $data->column_content;
	$cosa_facciamo->img_url_big = $data->img_url_big;
	 
	// update the cosa_facciamo
	if($cosa_facciamo->update()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "cosa_facciamo was updated."));
	}else{
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to update cosa_facciamo."));
	}
}
// if unable to update the cosa_facciamo, tell the user
else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "cosa_facciamo with id = ".$cosa_facciamo->id." not found!"));
}
?>