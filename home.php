<!DOCTYPE html>
<html lang="en">
    <head>
      <title>HOME PAGE</title>
      <link rel="stylesheet" href="style3.css">
</head>
<body>
   <div class="main">
    <div class="navbar">
     <div class="icon">
       <h2 class="logo">TEMBEA NASI</h2>
         </div>
           <div class="menu">
            <!-- <ul>
              <li><a href="about.html">ABOUT</a></li>
              <li><a href="services.html">SERVICES</a></li>
              <li><a href="contact.html">CONTACT</a></li>
            </ul> -->
           </div>

           <div class="search">
            <input class="srch" type="search" name="" placeholder="Type...">
            <button class="bttn">Search</button>
          </div>

         </div>
         <div class="content">
          <h1>Spectacular<br><span>Views </span> <br>Blog </h1>
        <p  class="par"> views that capture moments as they last in a time zone of epic essence</p>
      
        <span>JOIN US</span><br>
      
      <button class="cn" onclick="openPopup()">Sign in</button>
      <br>
      <button class="cn" onclick="openPopup_reg()">Create an account</button>
      </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <!-- <div class="container">
<button  type="submit" name="login" onclick="openPopup()" class="button">login</button>
</div>   -->
<div class="popup" id="popup">
    <div class="close-btn" onclick="closePopup()">&times;</div>
    <div class="card2">
<div class="card-header">
        <h1>LOGIN</h1>
    <form action="" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post">
         <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET ['error'];?></p> 
       <?php  } ?>  
            <label>Email</label>
        <input type="email" name="Email" placeholder="Email" class="input-style"  required value="<?php if(isset($_COOKIE['Email'])){
            echo $_COOKIE['Email'];};?>">
            <label>Password</label>
        <input type="password" name="password"  placeholder="Password" class="input-style">
            <div class="remember">
        <p><label for="rememeber-me">Remember me</label>
            <input type="checkbox" name="remember"></p>
        <button  type="submit" name="login" onlick="closePopup()" class="button">login</button>
        <br/>
        <p><a href="registration.php"> Create an account </a></br>
        <a href="./reset-password.php">Forgotten Password?</a>
    
         </form>
            </div>
               </div>
                 </div>
        </div>
</body>
<script>
 let popup =document.getElementById("popup");
  function openPopup(){
    popup.classList.add("open-popup");
  }
  function closePopup(){
    popup.classList.remove("open-popup");
  }
  
 </script>   
</html>



<?php
session_start();
 if(isset($_COOKIE['Email'])){
         $email = $_COOKIE['Email'];
     echo "<script>
         document.getElementByID('Email').value = 'Email';
     </script>";
 }
if($_SERVER['REQUEST_METHOD'] ==='POST'){
    require('db_conn.php');
    // set DB connections configs
    $servername = "localhost";
    $dbname = "project_x";
    $dbusername = "charlie";
    $dbpassword = "root123@";
    // clean the data/ remove special characters
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // declare the post variables from form input
    $password = validate($_POST['password']);
    $email = validate($_POST['Email']);

    if(empty($email)){
        header('Location:login.php?error=Email is required');
    }

    if(empty($password)){
    header('Location:login.php?error=Password is required');
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // query if user exists in DB
            $sql = "SELECT * FROM users WHERE (Email=:Email)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // email was found
            if ($result) {
                // User with provided email found, verify password
                $hashedPassword = $result['password'];

                if (password_verify($password, $hashedPassword)) {
                    echo 'login success';
                    // TODO login was successfull.. proceed with setting cookies and sessions and redirecting
                    if(!empty($_POST['remember'])){
                        $set_remember = $_POST['remember'];
                        $user_email = $_POST['Email'];
                        // set session
                        $_SESSION['Email']=$email;
                        $_SESSION['Id']=$id;
                        //set cookie that will be used to auto login a user.
                        setcookie('Email',md5($user_email),time()+3600);
                        setcookie('user_id', md5($result['Id']),time()+3600);
                    
                    }
                    
                    //set session
                    $_SESSION['Email'] = $user_email;
                
                    // redirect logged in user to homepage
                    header('Location:index.php');
                } else {
                    // Password doesn't match
                    header('Location:login.php?error=Wrong credentials');
                }
                return;
            // No user with provided email found
            } else {
                header('Location:login.php?error=Email was not found');
            }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
 
  ?>


<?php
//  require('check-sess-cookies.php');
if($_SERVER['REQUEST_METHOD'] ==='POST'){
   
    //db connection configs
    $servername= "localhost";
    $dbname = "project_x";
    $dbusername = "charlie";
    $dbpassword = "root123@";
    //cleaning up the data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 //declare th e post variables from the form input
                 // Validate username
                    $user_name = $_POST['Name'];
                    function validateName($user_name) {
                        if (preg_match('/^[a-z]\w{2,23}[^_]$/i', $user_name)) {
                            return true;
                        }
                        return false;
                    }

                    // Validate email
                    $email = $_POST["Email"];
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }

                    // Validate phone
                    $phone = $_POST['phone'];
                    if (empty($phone)) {
                        throw new Exception("Phone number cannot be empty");
                    }

                    $password = $_POST['password'];

                    // Hash password
                    $hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $sql ="INSERT INTO users (Name,Email,password,phone) VALUES (:Name,:Email,:password,:phone)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Name',$user_name,PDO::PARAM_STR);
        $stmt->bindParam(':Email',$email,PDO::PARAM_STR);
        $stmt->bindParam(':password',$hash,PDO::PARAM_STR);
        $stmt->bindParam(':phone',$phone,PDO::PARAM_STR);

        $stmt->execute();
        } catch (PDOException $e) {
            echo "Error registering user: " . $e->getMessage();
        
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        header('Location:verifyotp.php');
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>SIGN UP  HERE! </title>
        <link rel="stylesheet" href="style2.css">
    </head>
<body>
 <div id class="registration">
    <div class="alert">
        <?php 
        if(isset($_SESSION['status']))
        {
          echo"<h4>".$_SESSION['status']."</h4>";  
          unset($_SESSION['status']);
        }
        ?>
        <div class="popup_reg" id="popup_reg">
        <div class="close-btn" onclick="closePopup_reg()">&times;</div>
 <div class="card2">
 <form action="email-verify.php" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?> method="POST">
      <div class="card-header">
      <h2>Sign up here!</h2>
    </div>
         <?php ?>
         <div class="form-group ">
               <label>Name</label>
               <input type="text" name="Name" placeholder="Name" class="input-style"></br>
                &nbsp;<label> Email</label>
               <input type="email" name="Email" placeholder="Email" class="input-style">
                &nbsp;<label> Phone number </label>
               <input type="phone number" name="phone"placeholder="phone number" class="input-style">
                &nbsp;<label> Password </label>
               <input type="password" name="password"placeholder="Password" class="input-style">
               <br/>
        
               </br>
              <div class='registerbtn'>
               <button type="submit" name="registerbtn" onlick="closePopup_reg()" class="button">Register </button>
             </div>  
            </div>
          </form> 
         </div> 
      </div>  
    </body>
    <script>
 let popup_reg =document.getElementById("popup_reg");
  function openPopup_reg(){
    popup_reg.classList.add("open-popup_reg");
  }
  function closePopup_reg(){
    popup_reg.classList.remove("open-popup_reg");
  }
 </script> 
</html>