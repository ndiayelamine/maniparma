<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
// instantiate news object
include_once '../objects/news.php';
 
$database = new Database();
$db = $database->getConnection();
 
$news = new News($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(!empty($data->title) && !empty($data->seo_title) &&
   !empty($data->long_content) && !empty($data->data) && )
   !empty($data->news_link) && !empty($data->news_link_open)){
 
    // set news property values
	$news->title = $data->title;
	$news->seo_title = html_entity_decode($data->seo_title);
	$news->long_content = $data->long_content;
	$news->data = $data->data;
	$news->news_link = $data->news_link;
	$news->news_link_open = $data->news_link_open;
 
    // create the news
    if($news->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "news was created."));
    }
 
    // if unable to create the news, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create news."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create news. Data is incomplete."));
}
?>