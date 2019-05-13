<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/cosa_facciamo.php';
 
// instantiate database and cosa_facciamo object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$cosa_facciamo = new CosaFacciamo($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query cosa_facciamos
$stmt = $cosa_facciamo->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // cosa_facciamos array
    $cosa_facciamos_arr=array();
    $cosa_facciamos_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $cosa_facciamo_item=array(
			"id" =>  $id,
			"column_position" => $column_position,
			"column_title" => $column_title,
			"column_content" => $column_content,
			"img_url_big" => $img_url_big 
        );
 
        array_push($cosa_facciamos_arr["records"], $cosa_facciamo_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show cosa_facciamos data
    echo json_encode($cosa_facciamos_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no cosa_facciamos found
    echo json_encode(
        array("message" => "No cosa_facciamos found.")
    );
}
?>