<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/progetti_media.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and progetti_media object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$progetti_media = new ProgettiMedia($db);
 
// query progetti_medias
$stmt = $progetti_media->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // progetti_medias array
    $progetti_medias_arr=array();
    $progetti_medias_arr["records"]=array();
    $progetti_medias_arr["paging"]=array();
 
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
            "video_url" => $video_url,
            "image_url" => $image_url,
            "progetti_id" => $progetti_id,
            "position" => $position,
            "media_type" => $media_type
        );
 
        array_push($progetti_medias_arr["records"], $progetti_media_item);
    }
 
 
    // include paging
    $total_rows=$progetti_media->count();
    $page_url="{$home_url}progetti_media/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $progetti_medias_arr["paging"]=$paging;
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($progetti_medias_arr);
}
 
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user progetti_media does not exist
    echo json_encode(
        array("message" => "No progetti_media found.")
    );
}
?>