<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/trasparenza.php';
 
// instantiate database and trasparenza object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$trasparenza = new Trasparenza($db);

// query trasparenzas
$stmt = $trasparenza->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // trasparenzas array
    $trasparenzas_arr=array();
    $trasparenzas_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $trasparenza_item=array(
            "trasparenzaId" => $trasparenzaId,
            "title" => $title,
            "docLink" => $docLink,
            "docIcon" => $docIcon
        );
 
        array_push($trasparenzas_arr["records"], $trasparenza_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show trasparenzas data in json format
    echo json_encode($trasparenzas_arr);
} else {
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no trasparenzas found
    echo json_encode(
        array("message" => "No trasparenza found.")
    );
}
