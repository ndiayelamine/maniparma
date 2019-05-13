<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/contatti.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and contatti object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$contatti = new Contatti($db);
 
// query contattis
$stmt = $contatti->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // contattis array
    $contattis_arr=array();
    $contattis_arr["records"]=array();
    $contattis_arr["paging"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $contatti_item=array(
            "id" => $id,
            "column_position" => $column_position,
            "contact_name" => html_entity_decode($contact_name),
            "contact_address" => $contact_address,
            "contact_role" => $contact_role,
            "contact_phone" => $contact_phone,
            "contact_secondary_phone" => $contact_secondary_phone,
            "contact_mail" => $contact_mail,
            "contact_secondary_mail" => $contact_secondary_mail
        );
 
        array_push($contattis_arr["records"], $contatti_item);
    }
 
 
    // include paging
    $total_rows=$contatti->count();
    $page_url="{$home_url}contatti/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $contattis_arr["paging"]=$paging;
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($contattis_arr);
}
 
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user contattis does not exist
    echo json_encode(
        array("message" => "No contattis found.")
    );
}
?>