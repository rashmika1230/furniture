<?php

use PHPMailer\PHPMailer\PHPMailer;

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$ms = $_POST["m"];

// echo ($fname);

if (empty($fname)) {
    echo ("Please Enter First Name");
} else if (empty($lname)) {
    echo ("Please Enter Last Name");
} else if (empty($email)) {
    echo ("Please Enter Email");
} else if (empty($ms)) {
    echo ("Please Enter Message");

} else {

    $mail = new PHPMailer(true);

  try {
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $mail->Username = 'rashmika6145@gmail.com';                     //SMTP username
      $mail->Password = 'jiybhwxefzeyoupg';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('rashmika6145@gmail.com', $fname);
      $mail->addAddress($email);     //Add a recipient
      $mail->addReplyTo('info@example.com', 'Information');

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Contact us';
      $mail->Body = $ms;

      $mail->send();
      echo 'success';
  } catch (Exception $email) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}



?>