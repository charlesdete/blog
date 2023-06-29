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
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from users where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo'deleted successfull';
    }else{
        die(mysqli_error($conn));
    }
    header('location:display.php');
}

?>