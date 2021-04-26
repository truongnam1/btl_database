<?php


use PHPMailer\PHPMailer\PHPMailer;


//Load Composer's autoloader
// require $_SERVER['CONTEXT_DOCUMENT_ROOT'] .'/btl_database/mail/src/class.PHPMailer.php';

require_once 'PHPMailer.php';
require_once 'SMTP.php';
require_once 'Exception.php';



$mail = new PHPMailer();
echo "ok 4<br>";
 

// set mailer to use SMTP
$mail->IsSMTP();
$mail->CharSet="UTF-8";
 

$mail->Host = "restaurantvip.xyz";  // specify main and backup server
 
$mail->SMTPAuth = true;     // turn on SMTP authentication
 
// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: contact@domain.com
// pass: password
$mail->Username = "admin@restaurantvip.xyz";  // SMTP username
$mail->Password = "_XNn*b[ui-ee"; // SMTP password


$mail->Port = 465;
$mail->SMTPSecure = "ssl";

$mail->isHTML(true);
$mail->setFrom("admin@restaurantvip.xyz", "đây là tên"); // tên hiện thị trong hộp thư

$mail->addAddress("namtao100@gmail.com"); // địa chỉ muốn gửi đến
$mail->Subject = "tiêu đề test";
$mail->Body = "than bai";

 

 
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
 
echo "Message has been sent";


?>