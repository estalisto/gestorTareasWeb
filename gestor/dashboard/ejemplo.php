<html>
<head>
<title>PHPMailer - SMTP basic test with authentication</title>
</head>
<body>

<?php
require_once 'librerias/PHPMailer_5.2.4/class.phpmailer.php';
//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = file_get_contents('contents.html');
$body             = preg_replace('/[\]/','',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.cimait.com.ec"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.cimait.com.ec"; // sets the SMTP server
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server  cel 465
$mail->Username   = "banton"; // SMTP account username
$mail->Password   = "cima2012";        // SMTP account password

$mail->SetFrom('prueba@cimait.com.ec', 'First Last');

$mail->AddReplyTo("banton@cimait.com.ec","First Last");

$mail->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "banton@cimait.com.ec";
$mail->AddAddress($address, "");


if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>

</body>
</html>
