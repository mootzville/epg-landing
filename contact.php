<?php

if(isset($_POST['email'])) {

    $email_to = "info@epgcore.com";
 
    $email_subject = "Message From Website Received";

 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        //echo "These errors appear below.<br /><br />";
 
        //echo $error."<br /><br />";
 
        //echo "Please go back and fix these errors.<br /><br />";

        echo "Please go back and try again, or email us directly at info@epgcore.com<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) || strlen($_POST['name']) <= 1 ||
 
        !isset($_POST['email']) || strlen($_POST['email']) <= 1 ||

        !isset($_POST['tel']) || strlen($_POST['tel']) <= 1 ||
 
        !isset($_POST['message']) || strlen($_POST['message']) <= 1) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['message'];
 
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";

    $email_message .= "Tel: ".clean_string($tel)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";

 
	// create email headers
	 
	$headers = 'From: info@epgcore.com'."\r\n".
	 
	'Reply-To: '.$email."\r\n" .
	 
	'X-Mailer: PHP/' . phpversion();
	 
	@mail($email_to, $email_subject, $email_message, $headers);  


echo file_get_contents( "thanks.html" );
 
}
 
?>