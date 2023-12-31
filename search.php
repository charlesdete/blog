<?php
session_start();

$email=$_SESSION['Email'];
 if( empty($_SESSION['Email'])){
    header('location:home.php');
    exit();
}
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
 
 if(isset($_GET['submit'])){

    $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 2";
    $posts = mysqli_query($conn, $query); 
    $search=mysqli_num_rows($posts);

    if($search > 0){
        while ($row = mysqli_fetch_assoc($posts))
        {
            echo"<div>
           <h3>".$row['title']."</h3>
           <h3>".$row['body']." 
           </div>";
        }
    }
}else{
//      header('location:blog.php');
//      die();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Blog Website</title>
        <link rel="stylesheet"  href="style2.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Monserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
    <body>
          <nav> 
            <div class="container nav_container">
                <a href="index.php" class="nav_logo">SPECTACULAR VIEWS</a>
             <ul class="nav_items">
               <li><a href="blog.php">Blog</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="services.php">Services</a></li>
               <li><a href="contact.php">Contact</a></li>
               <li><a href="registration.php">Signin</a></li>
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="./images/<?= $featured['thumbnail'] ?>">
                    </div>
                    
                </div>
              
                </li>
            </ul>
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>

          <section>
            <form class="container search_bar-container" action="search.php" method="GET">
                <div class="">
                    <i class="uil uil-search"></i>
                    <input type="search" name="search" class="input-style" placeholder="search">
                    </div></br></br>
                    <button type="submit" name="submit" class="buton">Search</button>
            </form>
            <?php 
            
            ?>
           </section>
<?php  if(mysqli_num_rows($posts) > 0) : ?>
<section class="posts section_extra-margin' ?>">
          <div class="container posts_container">
             <?php while ($post = mysqli_fetch_assoc($posts)): ?> 
               <article class="posts">
                 <div class="post_thumbnail">
                    <img src="images<?= $post['thumbnail'] ?>">
                 </div>
                 <div class="post_info">
                    <a href="category-post.html" class="category_button">Wild life</a>
                    <h3 class="post_title">
                        <a href="post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                    </h3>
                    <p clas="post_body">
                    <?=substr( $post['body'],0, 300) ?>...
                    </p>
                    <div class="post_author">
                        <div class="post_author-avatar">
                            <img src="images<?= $post['thumbnail'] ?>">
                        </div>
                        <div class="post_author-info">
                            <h5>by:<?$author['Name'] ?></h5>
                            <small>
                            <?= date("M d, Y = H:i",strtotime($post['date_time'])) ?>
                            </small>
                        </div>
                    </div>
                 </div>
               </article>
               <?php endwhile ?> 
          </div>
          </section>
          <?php else : ?>
            <div class="alert_message error lg">
          <p>No posts found for this search</p>
         
            </div>
             <?php endif ?>

<!-- end o posts --> 

<section class="category_button">
            <div class="container category_button-container">
                <?php 
              $all_categories_query= "SELECT * FROM categories";
              $all_categories = mysqli_query($conn,$all_categories_query);
                ?>
                <?php while($category = mysqli_fetch_assoc($all_categories)): ?>
                <a href="category-post.php?id=<?=$category_id['id'] ?>" class="category_button"><?= $category['title'] ?></a> 
                <?php endwhile ?>
            </div>
          </section>
<!--end of category button-->

<footer>
            <div class="footer_socials">
                <a href="https://youtube.com/egatortutorials" target="_blank"><i class="uil uil-youtube"></i></a>
                <a href="https://facebook.com/egatortutorials" target="_blank"><i class="uil uil-facebook-f"></i></a>
                <a href="https://instagram.com/egatortutorials" target="_blank"><i class="uil uil-instagram-alt"></i></a>
                <a href="https://linkedin.com/egatortutorials" target="_blank"><i class="uil uil-linkedin"></i></a>
                <a href="https://twitter.com/egatortutorials" target="_blank"><i class="uil uil-twitter"></i></a>
            </div> 
            <div class="container footer_container">
                <article>
                    <h4>Categories</h4 >
                        <ul>
                            <li><a href="art.html">Art</a></li>
                            <li><a href="wildlife.html">Wild Life</a></li>
                            <li><a href="">Travel</a></li>
                            <li><a href="">Music</a></li>
                            <li><a href="">Science & Technology</a></li>
                            <li><a href="food.html">Food</a></li>
                        </ul>
                </article>
                <article>
                    <h4>Support</h4 >
                        <ul>
                            <li><a href="">Online Support</a></li>
                            <li><a href="">Call Numbers</a></li>
                            <li><a href="">Email</a></li>
                            <li><a href="">Social Numbers</a></li>
                            <li><a href="">Social Support</a></li>
                            <li><a href="">Location</a></li>
                        </ul>
                </article>
                <article>
                    <h4>Blog</h4 >
                        <ul>
                            <li><a href="">Safety</a></li>
                            <li><a href="">Repair</a></li>
                            <li><a href="">Recent</a></li>
                            <li><a href="">Popular</a></li>
                            <li><a href="">Categories</a></li>
                            
                        </ul>
                </article>
                <article>
                    <h4>Permalinks</h4 >
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Services</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                </article>
              </div>
              <div class="footer_copyright">
                <small>Copyright &copy;SPECTACULAR VIEWS </small>
              </div>
          </footer>
          <script src="./main.js"></script>
    </body>
</html>
 