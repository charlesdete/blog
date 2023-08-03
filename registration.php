
<?php
session_start();
if( empty($_SESSION['Email'])){
    header('location:home.php');
    exit();
} 

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