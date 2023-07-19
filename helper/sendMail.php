<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

include("C:/xampp/htdocs/tpc/vendor/autoload.php");
Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../')->load();



$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = base64_decode($_ENV["GMAIL_USERNAME"]);
$mail->Password = base64_decode($_ENV["GMAIL_APP_KEY"]);
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('admin@tpc.com', 'Admin');
$mail->isHTML(true);

function sendMail($email, $subject, $body)
{
    global $mail;
    $mail->Subject = $subject;
    $mail->addAddress($email);
    $mail->Body = $body;
    $mail->isHTML(true);
    if (!$mail->send()) {
        echo "ERROR : $mail->ErrorInfo";
    }
    $mail->clearAllRecipients();
    $mail->clearAddresses();
}

