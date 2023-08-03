<?php 
session_start();
require('check-sess-cookies.php');
$servername = "localhost";
$dbname = "project_x";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}

if(isset($_POST['login_btn']))
{

if(!empty(trim($_POST['Email'])) && !empty(trim($_POST['password'])))
    {
    $email = mysqli_real_escape_string($conn,$_POST['Email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
   
    $login_query ="SELECT * FROM users WHERE  Email= '$email' AND password='$password' LIMIT 1";
    $login_query_run =mysqli_query($conn,$login_query);

    if(mysqli_num_rows($login_query_run) > 0){
 $row = mysqli_fetch_array($login_query_run);
 echo $row['verify_status'];
    }else{
        $_SESSION['status'] ="invalid Email or Password";
        header('location:login.php');
        exit(0);
    }
    }else{
    $_SESSION['status'] ="All fields are mandatory";
    header('location:login.php');
    exit(0);
    }
}

?>