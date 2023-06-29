<?php
session_start();
if(isset($_POST['login'])){
    $user_email =$_POST['Email'];
if($user_email == "Email"){
    if(isset($_POST['remember']));
    
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Blog Website</title>
        <link rel="stylesheet"  href="./style2.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Monserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
    <body>
          <nav>
            <div class="container nav_container">
                <a href="index.html" class="nav_logo">SPECTACULAR VIEWS</a>
             <ul class="nav_items">
               <li><a href="blog.html">Blog</a></li>
               <li><a href="about.html">About</a></li>
               <li><a href="services.html">Services</a></li>
               <li><a href="contact.html">Contact</a></li>
               <li><a href="registration.php">Signin</a></li>
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                    </div>
                    <div class="user">  
                            <span>Welcome <br><?php print_r($_SESSION['Email']);?></span>
                    </div>
                </div>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>
   
          <section class="featured">
            <div class="container post">
                <div class="post_thumbnail">
                    <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                </div>
                <div class="post_info">
                    <a href="category-post.html" class="category_button">Wild life</a>
                    <h2 class="post_title"><a href=""post.html>WILDLIFE!</a></h2>
                <p class="post_body">
                    Wildlife encompasses a diverse range of creatures inhabiting our planet, from majestic elephants and swift cheetahs to intricate insects and vibrant tropical birds. It plays a vital role in maintaining ecological balance, showcasing the incredible beauty and resilience found in nature's intricate tapestry.
                </p>
                <div class="post_author">
                    <div  class="post_author-avatar">
                        <img src="https://thumbs.dreamstime.com/b/solar-energy-panels-wind-turbines-alternative-53900997.jpg">
                    </div>
                    <div class="post_author-info">
                        <h5>by:Mary danso</h5>
                        <small>June 10,2022 -07:23</small>
                    </div>
                </div>
                </div>
            </div>
          </section>
          <section class="posts">
          <div class="container posts_container">
               <article class="posts">
                 <div class="post_thumbnail">
                    <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                 </div>
                 <div class="post_info">
                    <a href="category-post.html" class="category_button">Wild life</a>
                    <h3 class="post_title">
                        <a href="post.html">WILD ANIMALS.</a>
                    </h3>
                    <p clas="post_body">
                       
Wild animals, untamed and awe-inspiring, roam the earth with primal grace. From fierce lions ruling the savannah to agile leopards prowling the jungle, they embody strength, agility, and adaptability. Their existence reminds us of the raw beauty and untamed wonders that nature has to offer. 
                    </p>
                    <div class="post_author">
                        <div class="post_author-avatar">
                            <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                        </div>
                        <div class="post_author-info">
                            <h5>by:John mils</h5>
                            <small>June 23,2022 -10:34</small>
                        </div>
                    </div>
                 </div>
               </article>
               <article class="posts">
                <div class="post_thumbnail">
                   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMwFBPmocMU3bAb8nJ3rLt3at8dII70QeSAbAfx4kOXxGFEuoP_yFs69ZYwntUthM6meI&usqp=CAU">
                </div>
                <div class="post_info">
                   <a href="category-post.html" class="category_button">Wild life</a>
                   <h3 class="post_title">
                       <a href="post.html">lorem ipsum dolor sit amet consectetur adisicing elit.soluta, odit.</a>
                   </h3>
                   <p clas="post_body">
                       lorem ipsum dolor sit amet consectetur adisicing elit.soluta, odit.
                   </p>
                   <div class="post_author">
                       <div class="post_author-avatar">
                           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMwFBPmocMU3bAb8nJ3rLt3at8dII70QeSAbAfx4kOXxGFEuoP_yFs69ZYwntUthM6meI&usqp=CAU">
                       </div>
                       <div class="post_author-info">
                           <h5>by:John mils</h5>
                           <small>June 23,2022 -10:34</small>
                       </div>
                   </div>
                </div>
              </article>
              <article class="posts">
                <div class="post_thumbnail">
                   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXHveRb22xhboyQnWAycF7LFkk3LE3j8gEF9pE7l4QBjROo5JQlsiYQXwLmZ6Ewpm0xHA&usqp=CAU">
                </div>
                <div class="post_info">
                   <a href="category-post.html" class="category_button">Wild life</a>
                   <h3 class="post_title">
                       <a href="post.html">lorem ipsum dolor sit amet consectetur adisicing elit.soluta, odit.</a>
                   </h3>
                   <p clas="post_body">
                       lorem ipsum dolor sit amet consectetur adisicing elit.soluta, odit.
                   </p>
                   <div class="post_author">
                       <div class="post_author-avatar">
                           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXHveRb22xhboyQnWAycF7LFkk3LE3j8gEF9pE7l4QBjROo5JQlsiYQXwLmZ6Ewpm0xHA&usqp=CAU">
                       </div>
                       <div class="post_author-info">
                           <h5>by:John mils</h5>
                           <small>June 23,2022 -10:34</small>
                       </div>
                   </div>
                </div>
              </article>
              <article class="posts">
                <div class="post_thumbnail">
                   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxUJjCgc5af9lAoGZTqp_9QmHWFWRYHtsp8ZIVt31ai7a6bOCdCJ0FlZ8L4zki2MYA-oY&usqp=CAU">
                </div>
                <div class="post_info">
                   <a href="category-post.html" class="category_button">Wild life</a>
                   <h3 class="post_title">
                       <a href="post.html">lorem ipsum dolor sit amet consectetur adisicing elit.soluta, odit.</a>
                   </h3>
                   <p clas="post_body">
                       lorem ipsum dolor sit amet consectetur adisicing elit.soluta, odit.
                   </p>
                   <div class="post_author">
                       <div class="post_author-avatar">
                           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxUJjCgc5af9lAoGZTqp_9QmHWFWRYHtsp8ZIVt31ai7a6bOCdCJ0FlZ8L4zki2MYA-oY&usqp=CAU">
                       </div>
                       <div class="post_author-info">
                           <h5>by:John mils</h5>
                           <small>June 23,2022 -10:34</small>
                       </div>
                   </div>
                </div>
              </article>
          </div>
          </section>

          <section class="category_button">
            <div class="container category_button-container">
              <a href="food.html" class="category_button">Food</a>
              <a href="wildlife.html" class="category_button">Wild Life</a>    
              <a href="" class="category_button">Science & Technology</a> 
              <a href="" class="category_button">Trevel</a> 
              <a href="" class="category_button">Art</a> 
              <a href="" class="category_button">Music</a> 
            </div>
          </section>


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
?>