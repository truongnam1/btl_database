<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;

// function sendEmail($title, $body, $emailFrom)
// {

//     // use PHPMailer\PHPMailer\PHPMailer;

//     require_once '../phpmailer/src/PHPMailer.php';
//     require_once '../phpmailer/src/SMTP.php';
//     require_once '../phpmailer/src/Exception.php';

//     include_once './back_end/dashboard/code_status.php';



//     $mail = new PHPMailer();
//     echo "ok 5<br>";


//     // set mailer to use SMTP
//     $mail->IsSMTP();
//     $mail->CharSet = "UTF-8";


//     $mail->Host = "restaurantvip.xyz";  // specify main and backup server

//     $mail->SMTPAuth = true;     // turn on SMTP authentication

//     $mail->Username = "admin@restaurantvip.xyz";  // SMTP username
//     $mail->Password = "_XNn*b[ui-ee"; // SMTP password


//     $mail->Port = 465;
//     $mail->SMTPSecure = "ssl";

//     $mail->isHTML(true);
//     $mail->setFrom("admin@restaurantvip.xyz", "Trương Nam"); // tên hiện thị trong hộp thư

//     $mail->addAddress($emailFrom); // địa chỉ muốn gửi đến
//     $mail->Subject = $title;
//     $mail->Body = $body;




//     if (!$mail->Send()) {
//         echo "Message could not be sent. <p>";
//         echo "Mailer Error: " . $mail->ErrorInfo;
//         $_SESSION["code"] = getCode(32);
//         $_SESSION["statusEmail"] = false;
//         return false;
//     }

//     echo "Message has been sent";
//     $_SESSION["code"] = getCode(31);
//     $_SESSION["statusEmail"] = true;
//     return true;
// }


class SendMail
{
    private $title, $body, $emailFrom;

    function __construct($title, $body, $emailFrom)
    {
        $this->title = $title;
        $this->body = $body;
        $this->emailFrom = $emailFrom;
    }

    public function send()
    {
        require_once '../phpmailer/src/PHPMailer.php';
        require_once '../phpmailer/src/SMTP.php';
        require_once '../phpmailer/src/Exception.php';

        include_once './back_end/dashboard/code_status.php';



        $mail = new PHPMailer();

        // set mailer to use SMTP
        $mail->IsSMTP();
        $mail->CharSet = "UTF-8";


        $mail->Host = "restaurantvip.xyz";  // specify main and backup server

        $mail->SMTPAuth = true;     // turn on SMTP authentication

        $mail->Username = "admin@restaurantvip.xyz";  // SMTP username
        $mail->Password = "_XNn*b[ui-ee"; // SMTP password


        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        $mail->isHTML(true);
        $mail->setFrom("admin@restaurantvip.xyz", "Restaurant Vip"); // tên hiện thị trong hộp thư

        $mail->addAddress($this->emailFrom); // địa chỉ muốn gửi đến
        $mail->Subject = $this->title;
        $mail->Body = $this->body;




        if (!$mail->Send()) {
            // echo "Message could not be sent. <p>";
            // echo "Mailer Error: " . $mail->ErrorInfo;

            return false;
        }

        echo "Message has been sent";

        return true;
    }
}


// $title ='Reset pass';
// $body = '<i>09987 is code verify<i>';
// $emailForm = "namtao100@gmail.com";
// sendEmail($title, $body, $emailForm);
