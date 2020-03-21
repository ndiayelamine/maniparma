<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    // header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

      $formdata = json_decode(file_get_contents('php://input'));

      if(!empty($formdata)) {

          $email = $formdata->email;
          $name = $formdata->name;
          $phone = $formdata->phone;
          $message = $formdata->message;

          $to = 'maniparma@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
          $email_subject = "Messaggio da:  $name";
          $email_body = "Ciao, \nHai ricevuto un messaggio tramite il sito web.\n\n".
                        "Questi sono i dettagli del messaggio:\n\n".
                        "Nome: $name\n".
                        "Email: $email\n".
                        "Telefono: $phone\n".
                        "Messaggio:\n$message";
          $headers = "From: ".$email."\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
          //$headers .= "Reply-To: $email";
          
          $secure_check = sanitize_my_email($to);
          if ($secure_check == true){
            mail($to, $email_subject, $email_body, $headers);
            $response = array('success' => 'true');
          }else
            $response = array('success' => 'false');
      }
      else {
          $response = array('success' => 'false');
      }
      
      echo json_encode($response);
      
      function sanitize_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
      }
?>