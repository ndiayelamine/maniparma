<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Origin, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, X-Auth-Token");

// Check for empty fields
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$email = $request->email;
$name = $request->name;
$phone = $request->phone;
$message = $request->message;
	
// Create the email and send the message
$to = 'maniparma@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Messaggio da:  $name";
$email_body = "Hai ricevuto un messaggio tramite il sito web.\n\n"."Questi sono i dettagli del messaggio:\n\nNome: $name\n\nEmail: $email\n\nTelefono: $phone\n\nMessaggio:\n$message";
$headers = "From: noreply@maniparma.it\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";	
mail($to, $email_subject, $email_body, $headers);
echo json_encode(array("success" => "true"));	
?>
