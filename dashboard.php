<?PHP
?><!DOCTYPE html>
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
                    <a href="#">
                        <i class="bx bxs-dashboard"></i>
                        <span class="text">Admin</span>
                    </a>
                </li><br/>
               
                <li>
                    <a href="#">
                        <i class="bx bxs-shopping-bag-alt"></i>
                        <span class="text">Project</span>
                    </a>
                </li><br/>
                <li>
                    <a href="chart.html">
                        <i class="bx bxs-doughnut-chart"></i>
                        <span class="text">Analytics</span>
                    </a>
                </li><br/>
                <li>
                    <a href="#">
                        <i class="bx bxs-message-dots"></i>
                        <span class="text">Message</span>
                    </a>
                </li><br/>
                <li>
                    <a href="user.php">
                        <i class="bx bxs-group"></i>
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
    <!--sidebar-->
    <!--content-->
      <section id="content">
       <nav>
           <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Catergories</a>
          <form action="#">
            <div  class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class="bx bx-search"></i></button>
            </div> 
         </form>
         <a href="#" class="Notification">
        <i class="bx bxs-bell"></i>
        <span class="num">8</span>
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
         <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
         </a>
        </div>
        <ul class="box-info">
        <li>
        <i class='bx bxs-binoculars'></i>

            <span class="text">
            
                <p>WILDLIFE</p>
            </span> 
        </li> 
        <li>
        <i class="bx bxs-ship"></i>
            <span class="text">
            
                <p>Waterbodies</p>
            </span> 
        </li> 
        <li>
        <i class="bx bxs-tree"></i>
            <span class="text">
                <p> Terrain</p>
            </span> 
        </li> 
        </ul>
         
        <div class="table-data">
            <div class="order">
                <div class="head">
                <h3>Recent orders </h3>
                <i class="bx bx-search"></i>
                <i clas="bx bx-filter"></i>
                </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                           <img src="img/people.png">
                           <p>Charles Dete</p> 
                        </td>
                        <td>07-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                           <img src="img/people.png">
                           <p>John Doe</p> 
                        </td>
                        <td>06-10-2021</td>
                        <td><span class="status process">Process</span></td>
                    </tr>
                    <tr>
                        <td>
                           <img src="">
                           <p>Joseph Dete</p> 
                        </td>
                        <td>05-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                           <img src="">
                           <p>Gavin Njoroge</p> 
                        </td>
                        <td>04-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>
                           <img src="img/people.png">
                           <p>Calvin Klein</p> 
                        </td>
                        <td>03-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
            <div class="todo">
                <div class="head">
                <h3>Wild Animals </h3>
                <i class="bx bx-plus"></i>
                <i clas="bx bx-filter"></i>
            </div>
             <ul class="todo-list">
            <li class="completed"> 
                <p>Giraffe</p>
                <i class="bx bx-dots-vertical-rounded"></i>
            </li>
            <li class="completed"> 
                <p>Lions</p>
                <i class="bx bx-dots-vertical-rounded"></i>
            </li>
            <li  class="not-completed"> 
                <p>Rhinos</p>
                <i class="bx bx-dots-vertical-rounded"></i>
            </li>
            <li class="completed"> 
                <p>Elephant</p>
                <i class="bx bx-dots-vertical-rounded"></i>
            </li>
        
       </div>
</div>
      </main>
    </section>
    <!--content-->
        <script src="script.js"></script>
    </body>
</html>
