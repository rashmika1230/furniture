<?php

include "connection.php";
include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
    $n = $rs->num_rows;

    if ($n == 1) {

        $code = uniqid();
        Database::iud("UPDATE `user` SET `v_code` = '" . $code . "' WHERE `email` = '" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rashmika6145@gmail.com';
        $mail->Password = 'vpco sfle sydo snwu';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('rashmika6145@gmail.com', 'Reset Password');
        $mail->addReplyTo('rashmika6145@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Shehan Furniture Forgot password Verification Code';
        $bodyContent = '<h1 style="color:green;">Your Verification Code is ' . $code . '</h1>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed.';
        } else {
            echo 'Success';
        }
    } else {
        echo ("Invalid Email Address.");
    }

