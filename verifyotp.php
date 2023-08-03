<!-- <!DOCTYPE html>
<head>
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>OTP</title>
<link rel="stylesheet" href="style2.css">
</head>
<body>
     <div class="container">
        <div class="jumbotron">
            <h1>Verify OTP </h1>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">

                    <form action="" method="POST">

                    <div class="form-group">
                        <label for="exampleinputPassword1">OTP Number</label>
                        <input type="number" class="form-control" id="otpnumber" name="verification_code" placeholder="Enter verification code">
                    </div>
                    <button type="submit" name="verifyotp" class="btn btn-success">Verify OTP </button>
                    </form>
                    </div>
                </div>
            </di;v>
        </div>
     </div>

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth - Registration</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div clas="col-md-6">
            <div class="card2">
        <div class="card-header">
            <h5>Verify OTP</h5>
        </div>
        <form action="" method="POST">
           <div class="form-group">
           <label>OTP</label>
               <input type="number" name="verification_code" id="otpnumber" placeholder="OTP" class="input-style">
        
                 </br>
                 
                <button type="submit" name="verifyotp" class="button">Verify OTP</button>
          </div>
         </form>
             </div>
               </div>
                 </div>    
                   </div>
                     </div>
</body>
</html>

<?php
session_start();
$servername = "localhost";
$dbname = "project_x";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}


if (isset($_POST['verifyotp'])){

$verification_code=$_POST['verification_code'];

$sql="UPDATE users SET verification_code = NOW() WHERE  verification_code ='$verification_code'";
$result =mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) == 0)
{
    die("verification code failed.");
}else{
echo "<p>You can login now.</p>";
header('location:index.php');
}
}
?>