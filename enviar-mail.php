<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
//Server settings
try {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '1326bc173ee6e9@inbox.mailtrap.io';
    $phpmailer->Password = 'd078802bdfcf25';                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('1326bc173ee6e9@inbox.mailtrap.io', 'pruebaMAil');
    $mail->addAddress('1326bc173ee6e9@inbox.mailtrap.io', 'Recibiendo');     //Add a recipient
    //    $mail->addAddress('ellen@example.com');               //Name is optional
    //    $mail->addReplyTo('info@example.com', 'Information');
    //    $mail->addCC('cc@example.com');
    //    $mail->addBCC('bcc@example.com');

    //Attachments
    //    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Muy importante';
    $mail->Body    = '<h1> <marquee>se envio bien el correo</h1>';
    //   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
} catch (\Throwable $th) {
    echo $th;
}
