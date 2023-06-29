<?php
session_start();
$servername = "localhost";
$dbname = "project_x";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
// echo"Connected successfully";
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 //Load Composer's autoloader
 require 'vendor/autoload.php';
 function sendemail_verify($user_name,$email,$verify_token)
 {
 //Create an instance; passing `true` enables exceptions
 $mail = new PHPMailer(true);

     //Server settings
     //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
     $mail->isSMTP();                                          //Send using SMTP
     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
     $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
     $mail->Username   = 'charlesdete52@gmail.com';            //SMTP username
     $mail->Password   = 'charlesdete7800@';                            //SMTP password
     $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
     $mail->Port       = 587;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

     //Recipients
     $mail->setFrom($email , $user_name);
          //Add a recipient
     $mail->addAddress($email);  
     //Name is optional
     //Content
     $mail->isHTML(true);            
     //Set email format to HTML
     $mail->Subject = 'Email verification from blog web';
     $email_template="
     <h2> you have registered with charlie</h2>
     <h3>Verify your email address to login with the below given link</h3>
     <br/>
    <a href='http://localhost:3040/verify-email.php?token=$verify_token'>Click Me</a>";
   $mail->Body = $email_template;
   $mail->send();  
   echo 'Message has been sent';

 }
  if(isset($_POST['registerbtn'])){
      $user_name = $_POST['Name'];
      $email = $_POST['Email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];
     $verify_token = md5(rand());

     sendemail_verify("$user_name","$email","$verify_token");
  
   
     //  Email exists or not
//   $check_email_query ="SELECT Email FROM users WHERE Email='$email'LIMIT 1";
//   $check_email_query_run =mysqli_query($conn,$check_email_query);
//   if(mysqli_num_rows($check_email_query_run) > 0){
//      $_SESSION['status']="Email id already exist";
//      header("location:registration.php");
//    }
//    else
//    {
//    //insert user / registered user data
//    $query ="INSERT INTO users(Name,phone,Email,password,verify_token) VALUES ('$user_name','$phone','$email','$password','$verify_token')";
//    $query_run =mysqli_query($conn,$query);

//      if($query_run){
//          sendemail_verify("$user_name","$email","$verify_token");

//         $_SESSION['status']= "Registration successfull. Please verify your email address";
//          header('location:registration.php');

//  }else{
//         $_SESSION['status']= "Registration failed";
//         header('location:registration.php');  
//     }
  // }
  }

?>