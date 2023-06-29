<?php
$servername = "localhost";
$dbname = "project_x";
$dbusername = "charlie";
$dbpassword = "root123@";
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
$id=$_GET['updateid'];
$sql="SELECT*from users where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$user_name= $row['Name'];
$email=$row['Email'];
 $phone=$row['phone'];

if(isset($_POST['submit'])){
    $user_name= $_POST['Name'];
    $email=$_POST['Email'];
    $phone=$_POST['phone'];

 $sql="update users set  Id=$id, Name ='$user_name',Email='$email'  WHERE Id=$id";
 $result= mysqli_query($conn,$sql);
 if($result){
    echo'user details updated successfully';
 }else{
    die(mysqli_error($conn));
 }
 header('location:display.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <section class="user">
 <div class=" user_container "> 
 <form action="" method="POST">
      <h2>Update user details!</h2>
         <?php ?>
         <div class="form-group">
               &nbsp;<label>Name</label>
               <input type="text" name="Name" placeholder="Enter your name" value=<?php
               echo $user_name;?>>
               <div class="form-group">
               &nbsp;<label> Email</label>
               <input type="email" name="Email"placeholder="Enter your email" value=<?php
               echo $email;?>>
               <div class="form-group">
               &nbsp;<label> Phone </label>
               <input type="phone number" name="phone"placeholder="Enter your mobile number" value=<?php
               echo $phone;?>>
               <div class="form-group"> 
       <br/> </br>
  <div class='userbtn'>
<button type="submit" name="submit" class="btn btn-primary">Update</button>
  </div>
 </form> 
 </div>
</section>
</body>
</html>