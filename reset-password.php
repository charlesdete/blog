<?php
include_once 'db_conn.php';
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
               <li><a href="signin.html">Signin</a></li>
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                    </div>
                    <div class="user">  
                        <span>WELCOME</span>
                    </div>
                </div>
            
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.html">logout</a></li>
                </ul>
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>
          <div class="reset">
<h1 class="header">Reset Password</h1>

<form method="post" action="">
    
<input type="text" name="Email" placeholder="Reset password">
<button type="submit"  name="submit">GO</button>
</form>
</div>
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
                            <li><a href="">Art</a></li>
                            <li><a href="">Wild Life</a></li>
                            <li><a href="">Travel</a></li>
                            <li><a href="">Music</a></li>
                            <li><a href="">Science & Technology</a></li>
                            <li><a href="">Food</a></li>
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