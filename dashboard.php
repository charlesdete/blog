<?PHP
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
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device width, intial-scale=1.0">
        <link rel="stylesheet"href="style1.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
        <title>TEMBEA NASI</title>
        <link rel="shortcut icon" href="{{asset(assets/images/logo.png)}}">
       
    </head>
    <body>
        <section id="sidebar">
     
            <a href="#" class='brand'>           
            <i class="bx bxs-smile"></i>
            <span class="text">AdminHub</span>
            </a>
            <ul class="side-menu top">

                <li>
                    <a href="">
                        <i class="bx bxs-dashboard"></i>
                        <span class="text">Admin</span>
                    </a>
                </li><br/>
               
                <li>
                    <a href="add-post.php">
                        <i class="bx bxs-pen"></i>
                        <span class="text">Add Post</span>
                    </a>
                </li><br/>
                <li>
                    <a href="manage-post.php">
                        <i class="bx bxs-edit"></i>
                        <span class="text">Manage Posts</span>
                    </a>
                </li><br/>
                <li>
                    <a href="chart.html">
                        <i class="bx bxs-doughnut-chart"></i>
                        <span class="text">Analytics</span>
                    </a>
                </li><br/>
                <li>
                    <a href="add-category.php">
                        <i class="bx bxs-edit"></i>
                        <span class="text">Categories</span>
                    </a>
                </li><br/>
                <li>
                    <a href="manage-categories.php">
                        <i class="bx bxs-user-circle"></i>
                        <span class="text"> Manage Categories</span>
                    </a>
                </li><br/>
                <li>
                    <a href="user.php">
                        <i class="bx bxs-user-plus"></i>
                        <span class="text">Add Users</span>
                         
                    </a>
                </li>
                <br/><br/>
                <br/><br/>
                <br/><br/>
                <br/><br/>
                <br/>
                <li>
                    <a href="#">
                        <i class="bx bxs-cog"></i>
                        <span class="text">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="logout">
                        <i class="bx bxs-log-out-circle"></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </section>
    
      <section id="content">
        <div class="content-space">
       <nav>
           <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Catergories</a>
          <form action="">
            <div  class="form-input">
                <div class="card1">
                      <input type="search" name="search"class="input-style" placeholder="search">
                    <button type="submit" name="search" class="button"></button>
</di>
                </div> 

         </form>
         <a href="#" class="Notification">
        <i class="bx bxs-bell"></i>
        <span class="num"></span>
         </a>
         <a href="#" class="profile">
            <img src="img/people.png" alt="">
       </nav>
       <main>
        <div class="head-title">
            <div class="left">
          <h1>TEMBEA NASI</h1>
          <ul class="breadcrumb">
             <li>
               <a href="#">Wildlife</a>  
             </li>
             <li><i class='bx bx-chevron-right'></i></li>
             <li>
               <a class="active" href="#">Home</a>  
             </li> 
            </ul>
        </div>
         <a href="download.php" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
         </a>
        </div>
        <canvas id="chart"></canvas>
     
    </main>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="script.js"></script>
    </body>
</html>
