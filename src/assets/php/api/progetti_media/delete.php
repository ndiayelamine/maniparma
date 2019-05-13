<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../config/database.php';
include_once '../objects/progetti_media.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare progetti_media object
$progetti_media = new ProgettiMedia($db);
 
// get progetti_media media_id
$data = json_decode(file_get_contents("php://input"));
 
// set progetti_media media_id to be deleted
$progetti_media->media_id = $data->media_id;
 
$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/progetti_media/read_one.php?id=".$progetti_media->media_id));

if($check_id !== NULL){
	// delete the progetti_media
	if($progetti_media->delete()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "progetti_media was deleted."));
	}
	 
	// if unable to delete the progetti_media
	else{
	 
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to delete progetti_media."));
	}
}else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "progetti_media with id = ".$progetti_media->media_id." not found!"));
}
?>