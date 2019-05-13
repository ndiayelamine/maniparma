<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/progetti_media.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare progetti_media object
$progetti_media = new ProgettiMedia($db);
 
// get media_id of progetti_media to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set media_id property of progetti_media to be edited
$progetti_media->media_id = $data->media_id;

$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/progetti_media/read_one.php?id=".$progetti_media->media_id));
//$check_id = json_decode(file_get_contents("./read_one.php?media_id=".$progetti_media->media_id, true));

if($check_id !== NULL){
	// set progetti_media property values
	$progetti_media->title = $data->title;
	$progetti_media->video_url = $data->video_url;
	$progetti_media->image_url = $data->image_url;
	$progetti_media->progetti_id = $data->progetti_id;
	$progetti_media->position = $data->position;
	$progetti_media->media_type = $data->media_type;
	 
	// update the progetti_media
	if($progetti_media->update()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "progetti_media was updated."));
	}else{
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to update progetti_media."));
	}
}
// if unable to update the progetti_media, tell the user
else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "progetti_media with media_id = ".$progetti_media->media_id." not found!"));
}
?>