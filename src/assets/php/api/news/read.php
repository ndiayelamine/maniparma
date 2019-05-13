<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/news.php';
 
// instantiate database and news object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$news = new News($db);

// query newss
$stmt = $news->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // newss array
    $newss_arr=array();
    $newss_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $news_item=array(
            "news_id" => $news_id,
            "title" => $title,
            "seo_title" => html_entity_decode($seo_title),
            "long_content" => $long_content,
            "data" => $data,
            "news_link" => $news_link,
            "news_link_open" => $news_link_open
        );
 
        array_push($newss_arr["records"], $news_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show newss data in json format
    echo json_encode($newss_arr);
} else {
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no newss found
    echo json_encode(
        array("message" => "No newss found.")
    );
}