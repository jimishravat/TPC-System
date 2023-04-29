<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("C:/xampp/htdocs/tpc/phpmailer/src/Exception.php");
include('C:/xampp/htdocs/tpc/phpmailer/src/PHPMailer.php');
include('C:/xampp/htdocs/tpc/phpmailer/src/SMTP.php');
include("C:/xampp/htdocs/tpc/vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $_ENV["GMAIL_USERNAME"];
$mail->Password = $_ENV["GMAIL_APP_KEY"];
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom($_ENV["GMAIL_USERNAME"]);
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
