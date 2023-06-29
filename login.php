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
                        //set cookie that will be used to auto login a user.
                        setcookie('email',md5($user_email),time()+3600*24);
                        setcookie('user_id', md5($result['Id']),time()+3600*24);
                    
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth - Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id class="login">
        <h1>LOGIN</h1>
    <form action="" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post">
         <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET ['error'];?></p> 

       <?php  } ?>  
    <div>
            
        <div>
            <label>Email</label>
        <input type="email" name="Email" placeholder="" class="input-field"  required value="<?php if(isset($_COOKIE['Email'])){
            echo $_COOKIE['Email'];};?>">
        </div>

        <div>
            <label>Password</label>
        <input type="password" name="password"  placeholder="" class="input-field">
        </div>
        
            <div id class="remember">
            
        <p>remember me<input type="checkbox" name="remember"></p>
</div>
        <div id class='button'>
            <button type="submit" name="login_btn">login</button>
        </div><br/>
        
        <p><a href="registration.php"> create an account </a>
</div>
    </form>
    <div class="form-sub-msg"><a href="./reset-password.php">Forgotten Password?</a></div>
</body>
</html>