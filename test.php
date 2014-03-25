<?php
$email='joanriba@joanriba.net';
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->CharSet = 'UTF-8';
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "mail.joanriba.net"; // SMTP server

$mail->From     = "from@example.com";
$mail->FromName = 'Kinobs';
$mail->AddAddress($email);

$mail->IsHTML(true);

$mail->AddEmbeddedImage('logo-kinobs.png', 'logo-kinobs', 'logo-kinobs.png');
$mail->Subject  = "Preinscripció realitzada correctament";
$mail->Body     = 'Hello, <b>my friend</b>! \n\n This message uses HTML entities!<br><img src="cid:logo-kinobs" />';
$mail->AltBody="Hello, my friend! \n\n This message uses HTML entities, but you prefer plain text !";
$mail->WordWrap = 50;


$path='pdf/19.pdf';

$mail->AddAttachment($path);

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}