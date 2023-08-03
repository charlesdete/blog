<?php



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['submit'])){
    $name =$_POST['Name'];
    $subject =$_POST['subject'];
    $mailFrom =$_POST['mail'];
    $message =$_POST['Message'];
   
 //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'charlesdete52@gmail.com';                     //SMTP username
    $mail->Password   = 'lrkxkwvmisnyptrp';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('charlesdete52@gmail.com', 'charles');
    $mail->addAddress($email,'charles');     //Add a recipient
   
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);
    //Set email format to HTML
    
    $mail->Subject = $subject;
    $mail->Body    = $message;
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      
    $mail->send();
    echo 'Message has been sent';

}}

?>