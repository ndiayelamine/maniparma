<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/chi_siamo.php';
 
// instantiate database and chi_siamo object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$chi_siamo = new ChiSiamo($db);

// query chi_siamos
$stmt = $chi_siamo->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // chi_siamos array
    $chi_siamos_arr=array();
    $chi_siamos_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $chi_siamo_item=array(
            "id" => $id,
            "column_position" => $column_position,
            "column_title" => strip_tags(html_entity_decode($column_title)),
            "column_content" => html_entity_decode($column_content),
            "img_url_big" => $img_url_big
        );
 
        array_push($chi_siamos_arr["records"], $chi_siamo_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show chi_siamos data in json format
    echo json_encode($chi_siamos_arr);
} else {
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no chi_siamos found
    echo json_encode(
        array("message" => "No chi_siamos found.")
    );
}
