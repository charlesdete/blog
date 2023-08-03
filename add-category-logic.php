<?php
require('check-sess-cookies.php');
 $_SERVER['REQUEST_METHOD'] ==='POST';
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
    //get form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

 if(!$title){
    $_SESSION['add-category'] = "Enter title";

 }elseif(!$description){
    $_SESSION['add-category'] = "Enter description";
 }

 //redirect back to add category page with form data if there was an invalid input
 if(isset($_SESSION['add-category'])){
    $_SESSION['add-category-data']=$_POST;
    header('location:add-category.php');
    die();
 }else{
    //insert into categories
    $query ="INSERT INTO categories (title, description) VALUES ('$title', '$description')";
    $result= mysqli_query($conn,$query);

    if(mysqli_errno($conn)){
        $_SESSION['add-category'] = "couldn`t add category";
        header('location:add-category.php');
        die();
    }else{$_SESSION['add-category'] = "Category $title added successfully";
          header('location:manage-categories.php'); 
    }
 }
}
?>