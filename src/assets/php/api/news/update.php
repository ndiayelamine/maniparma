<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/news.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare news object
$news = new News($db);
 
// get id of news to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of news to be edited
$news->news_id = $data->news_id;

$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/news/read_one.php?id=".$news->news_id));
//$check_id = json_decode(file_get_contents("./read_one.php?id=".$news->news_id, true));

if($check_id !== NULL){
	// set news property values
	$news->news_id = $data->news_id;
	$news->title = $data->title;
	$news->seo_title = html_entity_decode($data->seo_title);
	$news->long_content = $data->long_content;
	$news->data = $data->data;
	$news->news_link = $data->news_link;
	$news->news_link_open = $data->news_link_open;
	 
	// update the news
	if($news->update()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "news was updated."));
	}else{
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to update news."));
	}
}
// if unable to update the news, tell the user
else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "news with id = ".$news->news_id." not found!"));
}
?>