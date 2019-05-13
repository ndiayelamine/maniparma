<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../config/database.php';
include_once '../objects/news.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare news object
$news = new News($db);
 
// get news id
$data = json_decode(file_get_contents("php://input"));
 
// set news id to be deleted
$news->news_id = $data->news_id;
 
$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/news/read_one.php?id=".$news->news_id));

if($check_id !== NULL){
	// delete the news
	if($news->delete()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "news was deleted."));
	}
	 
	// if unable to delete the news
	else{
	 
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to delete news."));
	}
}else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "news with id = ".$news->news_id." not found!"));
}
?>