<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/progetti.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare progetti object
$progetti = new Progetti($db);
 
// get id of progetti to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of progetti to be edited
$progetti->progetti_id = $data->progetti_id;

$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/progetti/read_one.php?id=".$progetti->progetti_id));
//$check_id = json_decode(file_get_contents("./read_one.php?id=".$progetti->progetti_id, true));

if($check_id !== NULL){
	// set progetti property values
	$progetti->progetti_id = $data->progetti_id;
	$progetti->column_position = $data->column_position;
	$progetti->title = html_entity_decode($data->title);
	$progetti->location = $data->location;
	$progetti->short_description = $data->short_description;
	$progetti->long_description = $data->long_description;
	$progetti->image_url = $data->image_url;
	$progetti->progetti_date = $data->progetti_date;
	$progetti->seo_title = $data->seo_title;
	 
	// update the progetti
	if($progetti->update()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "progetti was updated."));
	}else{
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to update progetti."));
	}
}
// if unable to update the progetti, tell the user
else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "progetti with id = ".$progetti->progetti_id." not found!"));
}
?>