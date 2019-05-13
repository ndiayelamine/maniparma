<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/progetti.php';
 
// instantiate database and progetti object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$progetti = new Progetti($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query progettis
$stmt = $progetti->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // progettis array
    $progettis_arr=array();
    $progettis_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $progetti_item=array(
			"progetti_id" => $progetti_id,
			"column_position" => $column_position,
			"title" => html_entity_decode($title),
			"location" => $location,
			"short_description" => $short_description,
			"long_description" => $long_description,
			"image_url" => $image_url,
			"progetti_date" => $progetti_date,
			"seo_title" => $seo_title
        );
 
        array_push($progettis_arr["records"], $progetti_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show progettis data
    echo json_encode($progettis_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no progettis found
    echo json_encode(
        array("message" => "No progettis found.")
    );
}
?>