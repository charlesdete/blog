<?php 
//  require('check-sess-cookies.php');
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
$query ="SELECT * FROM categories";
$categories =mysqli_query($conn,$query);
?>  
             
                
              <link rel="stylesheet" href="style2.css"> 
              <body>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div clas="col-md-6"> 
                 <div class="card2">
                    <div class="card-header">
                    <h2>Add Post</h2>
                </div>
                    <form action="add-post-logic.php" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                    <input type="text" name="title"   placeholder="Title" class="input-style">
                    </br>
                    <select name="category" class="input-style">
                    <p>
                    <?php  while ($category_id = mysqli_fetch_assoc($categories)) :?>
                    <option value="<?= $category_id['id'] ?>"><?= $category_id['title']?></option> 
                     <?php endwhile ?>
                    </p>
                    </select>
                    </br>
                    <textarea rows="8" name="body" placeholder="body" class="input-style"></textarea>
                    
                    <input type="checkbox"  name="is_featured" value="1" id="is_featured" checked >
                    <label for="is_featured">Featured</label>
                    <label for="thumbnail">Add thumbnail</label></br>
                     <input type="file" class="input-style" name="thumbnail" id="thumbnail">
            
                    </br>
                    <button type="submit" name="submit" class="button">Add Post</button>
                    </div>   
                </form>
                    </div>
                    </div>    
                   </div>
                     </div>
</body>
            
         
 




         