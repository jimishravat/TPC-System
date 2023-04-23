<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../tpc/phpmailer/src/Exception.php";
require '../tpc/phpmailer/src/PHPMailer.php';
require '../tpc/phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jimishravat28@gmail.com';
$mail->Password = 'evksojeawqopyuno';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('jimishravat28@gmail.com');
$mail->isHTML(true);

function sendMail($email, $subject, $body)
{
    global $mail;
    $mail->Subject = $subject;
    $mail->addAddress($email);
    $mail->Body = $body;
    $mail->isHTML(true);
    $mail->send();
    $mail->clearAllRecipients();
    $mail->clearAddresses();
}
