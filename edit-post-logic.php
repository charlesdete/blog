<?php
session_start();
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

//fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($conn,$query);
 
 if(isset($_POST['submit'])){
   
    $id=filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name =filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];



//set is_featured to 0 if unchecked
$is_featured =$is_featured == 1 ?: 0;



         //delete exisiting thumbnail if new thumbnail is available 
         if($thumbnail['name']){

            $previous_thumbnail_path = 'images'. $previous_thumbnail_name;
            
        //work on thumbnail
        //rename the image
     $time = time();
     //make each image name unique
     $thumbnail_name = $time . $thumbnail['name'];
     $thumbnail_tmp_name =$thumbnail['tmp_name'];
     $thumbnail_destination_path = 'images' . $thumbnail_name;
     //make sure file is an image
     $allowed_files = ['png','jpg','jpeg'];
     $extension = explode('.', $thumbnail_name);
     $extension = end($extension);
     

     if (in_array($extension, $allowed_files)){
        //make sure image is not too big.
        if ($thumbnail['size'] < 2_000_000 ){

          //upload thumbnail
           move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
        }else {
           $_SESSION['add-post'] = "file size too big.Should be less than 2mb";
        }
       }else{
           $_SESSION['add-post'] = "file should be png ,jpg or jpeg";
       }

         }
    
     //redirect back (with form data) to add-post page if there is any problem
     
      //set is_featured of all posts to 0 if is_featured for this post is 1
      if($is_featured == 1){
         $zero_all_is_featured_query ="UPDATE posts SET is_featured=0";
         $zer0_all_is_featured_result =mysqli_query($conn,$zero_all_is_featured_query);
      }
     
        //set thumbnail name if a new one was uploaded, else keep old thumbnail name
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;
      
    
        $query ="UPDATE posts SET title='$title', body='$body',thumbnail='$thumbnail_to_insert',category_id=$category_id,is_featured=$is_featured  WHERE id=$id LIMIT 1";
        $result= mysqli_query($conn,$query);

        
   
    if(!mysqli_errno($conn)){
     $_SESSION['edit-post-success'] = "New post added successfully";
   
  }   
    
 }
    header('location:manage-post.php');
?> 