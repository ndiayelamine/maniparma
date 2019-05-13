<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
// instantiate progetti_media object
include_once '../objects/progetti_media.php';
 
$database = new Database();
$db = $database->getConnection();
 
$progetti_media = new ProgettiMedia($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(!empty($data->title) && !empty($data->video_url) &&
   !empty($data->video_url) && !empty($data->image_url) &&){
   !empty($data->progetti_id) && !empty($data->position) &&){
   !empty($data->media_type)){
 
    // set progetti_media property values
	$progetti_media->title = $data->title;
	$progetti_media->video_url = $data->video_url;
	$progetti_media->image_url = $data->image_url;
	$progetti_media->progetti_id = $data->progetti_id;
	$progetti_media->position = $data->position;
	$progetti_media->media_type = $data->media_type;
	
    //$progetti_media->created = date('Y-m-d H:i:s');
 
    // create the progetti_media
    if($progetti_media->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "progetti_media was created."));
    }
 
    // if unable to create the progetti_media, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create progetti_media."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create progetti_media. Data is incomplete."));
}
?>