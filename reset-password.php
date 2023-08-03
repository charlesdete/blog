<?php

session_start();
$email=$_SESSION['Email'];
 if( empty($_SESSION['Email'])){
    header('location:home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div clas="col-md-6">
      
    <?php
    if (isset($_SESSION['status'])){
        ?>
        <div class="alert alert-success">
            <h5><?= $_SESSION['status'];?></h5>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>
    <div class="card2">
        <div class="card-header">
            <h5>RESET PASSWORD</h5>
        </div>
        <form action="password-reset-code.php" method="POST">
           <div class="form-group ">
                 <label> Email Address</label>
                 </br>
                 <input type="text" name="Email" class="input-style" placeholder="Enter Email Address">
                    
                <button type="submit" name="Password-reset-otp" class="button">Send Password Reset OTP</button>
          </div>
            
                 </form>
             </div>
               </div>
                 </div>    
                 </div>
                  </div>
    </body>
</html>