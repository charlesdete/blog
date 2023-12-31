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

if(isset($_POST['submit'])){
$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


//validate input
if(!$title || !$description){
    $_SESSION['edit-category'] = "Invalid form input on edit category page";
}else{
    $query = "UPDATE categories SET title='$title',description='$description' WHERE id=$id LIMIT 1";
    $result= mysqli_query($conn,$query);
      
    if(mysqli_errno($conn)){
        $_SESSION['edit-category'] = "couldn`t update category";
    }else{
        $_SESSION['edit-category-success'] = "Category $title updated successfully";
    }
}

}
header('location:manage-categories.php');
die();
?>