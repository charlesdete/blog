<?php
session_start();
$servername = "localhost";
$dbname = "project_x";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
if(isset($_GET['token'])){
    $token =$_GET['token'];
    $verify_query ="SELECT verify_token,verify_status FROM users WHERE verify_token='$token' LIMIT 1";
    $verify_query_run =mysqli_query($conn,$verify_query);

    if(mysqli_num_rows($verify_query_run) > 0){
        $row= mysqli_fetch_array($verify_query_run);
        echo $row['verify_token'] ;
      
         if($row['verify_token']== "0"){
             $clicked_token =$row['verify_token'];
              $update_query= "UPDATE users SET verify_status='1' WHERE verify_status='$clicked_token' LIMIT 1";
              $update_query_run= mysqli_query($conn,$update_query);

         if($update_query_run){
           $_SESSION['status'] ="Your account has been verified";
    header('location:login.php'); 
           exit(0);
         }else{
         $_SESSION['status'] ="verification failed";
   header('location:login.php'); 
        exit(0);
          }
        }else{
            $_SESSION['status']= "Email already verified.please login";
   header('location:login.php');
             exit(0);
        }
    }
     else{
        $_SESSION['status'] ="this token does not exist";
  header('location:login.php');
     }
  }else{
      $_SESSION['status'] ="Not allowed";
 header('location:login.php'); 
 }

?>
