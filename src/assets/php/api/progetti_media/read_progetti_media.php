<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/progetti_media.php';
 
// instantiate database and progetti_media object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$progetti_media = new ProgettiMedia($db);

// set ID property of record to read
$progetti_media->progetti_id = isset($_GET['idProgetto']) ? $_GET['idProgetto'] : die();

// query progetti_medias
$stmt = $progetti_media->readProgettiMedia();

$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // progetti_medias array
    $progetti_medias_arr=array();
    $progetti_medias_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $progetti_media_item=array(
            "media_id" => $media_id,
            "title" => $title,
            "video_url" => html_entity_decode($video_url),
            "image_url" => $image_url,
            "progetti_id" => $progetti_id,
            "position" => $position,
            "media_type" => $media_type
        );
 
        array_push($progetti_medias_arr["records"], $progetti_media_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show progetti_medias data in json format
    echo json_encode($progetti_medias_arr);
} else {
 
    // set response code - 404 Not found
    // http_response_code(404);
 
    // tell the user no progetti_medias found
    echo json_encode(
        array("message" => "No progetti_medias found.")
    );
}