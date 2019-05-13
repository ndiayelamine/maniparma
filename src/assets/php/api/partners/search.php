<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/partners.php';
 
// instantiate database and partners object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$partners = new Partners($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query partnerss
$stmt = $partners->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // partnerss array
    $partnerss_arr=array();
    $partnerss_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $partners_item=array(
			"id" =>  $id,
			"column_position" => $column_position,
			"column_title" => html_entity_decode($column_title),
			"column_link" => $column_link,
			"column_link_open" => $column_link_open,
			"img_url" => $img_url
        );
 
        array_push($partnerss_arr["records"], $partners_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show partnerss data
    echo json_encode($partnerss_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no partnerss found
    echo json_encode(
        array("message" => "No partnerss found.")
    );
}
?>