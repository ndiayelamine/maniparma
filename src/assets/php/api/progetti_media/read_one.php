<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/progetti_media.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare progetti_media object
$progetti_media = new ProgettiMedia($db);
 
// set ID property of record to read
$progetti_media->media_id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of progetti_media to be edited
$progetti_media->readOne();
 
if($progetti_media->media_id!=null){
    // create array
	//"video_url" => html_entity_decode($video_url),
	
	$progetti_media_arr=array(
		"media_id" => $progetti_media->media_id,
		"title" => $progetti_media->title,
		"video_url" => $progetti_media->video_url,
		"image_url" => $progetti_media->image_url,
		"progetti_id" => $progetti_media->progetti_id,
		"position" => $progetti_media->position,
		"media_type" => $progetti_media->media_type
	);
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($progetti_media_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user progetti_media does not exist
    echo json_encode(array("message" => "progetti_media does not exist."));
}
?>