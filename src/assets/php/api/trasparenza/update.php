<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/trasparenza.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare trasparenza object
$trasparenza = new Trasparenza($db);
 
// get id of trasparenza to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of trasparenza to be edited
$trasparenza->trasparenzaId = $data->trasparenzaId;

$check_id = json_decode(file_get_contents("http://".$_SERVER['SERVER_NAME']."/mani2019/api/trasparenza/read_one.php?id=".$trasparenza->trasparenzaId));
//$check_id = json_decode(file_get_contents("./read_one.php?id=".$trasparenza->trasparenza_id, true));

if($check_id !== NULL){
	// set trasparenza property values
	$trasparenza->trasparenzaId = $data->trasparenzaId;
	$trasparenza->title = $data->title;
	$trasparenza->docLink = $data->docLink;
	$trasparenza->docIcon = $data->docIcon;
	 
	// update the trasparenza
	if($trasparenza->update()){
	 
		// set response code - 200 ok
		http_response_code(200);
	 
		// tell the user
		echo json_encode(array("message" => "trasparenza was updated."));
	}else{
		// set response code - 503 service unavailable
		http_response_code(503);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to update trasparenza."));
	}
}
// if unable to update the trasparenza, tell the user
else{
    // set response code - 404 not found
    http_response_code(404);
 
    // tell the user
    echo json_encode(array("message" => "trasparenza with id = ".$trasparenza->trasparenzaId." not found!"));
}
?>
