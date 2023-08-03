<?php
require('check-sess-cookies.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['registerbtn'])){
    $email =$_POST['Email']; 
    
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
    $verification_code= substr(number_format(time()* rand(),0,'',''),0,6);
    $mail->Subject = 'Email verification';
    $mail->Body    = '<p> Your verification code is:</br><b style="font-size: 30px;">'.
    $verification_code . '</b></p>';
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      
    $mail->send();
    echo 'Message has been sent';
    
 //CONNECT TO DATABASE
$servername = "localhost";
$dbname = "project_x";
$dbusername = "charlie";
$dbpassword = "root123@";
 
 $conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
     
 //insert into users table
   $email=$_POST['Email']; 
    $user_name=$_POST['Name'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $token =md5(rand());
   
  $hash=password_hash($password,PASSWORD_DEFAULT);

 $sql ="INSERT INTO users (Name, Email,phone, password,verification_code,verify_token ) VALUES('$user_name','$email','$phone','$hash',' $verification_code','$token')";
 mysqli_query($conn,$sql);
 header('location:email-verify.php?email='. $email);
  exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}else{
    header('location:verifyotp.php');
    die('verification code sent to your email.');
    
}

?>