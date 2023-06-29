<!DOCTYPE html>
<html>
<head> 
    <title>EDIT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Assuming you have already started the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated name and ID from the form
    $updatedName = $_POST['Name'];
    $email = $_POST['Email'];
  

    // Assign the updated name and ID to session variables
    $_SESSION['Name'] = $updatedName;
    $_SESSION['Email'] = $email;
    

    // Database connection details
    $host = 'localhost';
    $dbname = 'project_x';
    $username = 'charlie';
    $password = 'root123@';

    try {
        // Create a new PDO instance
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to update the user's name
        $sql = "UPDATE users SET Name =:Name WHERE Email =:Email";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':Name', $_SESSION['Name']);
        $stmt->bindParam(':Email', $_SESSION['Email']);

        // Execute the statement
        $stmt->execute();

        echo "User information updated successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

    <div id class="home">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h2>UPDATE PROFILE</h2>
            &nbsp;<label> Name</label>
            <input type="text" name="Name" placeholder="">
             &nbsp;<label> Email</label>
            <input type="email" name="Email" placeholder="">
             &nbsp;<label> Phone number</label>
            <input type="text" name="phone" placeholder="">
             &nbsp;<label> Password</label>
            <input type="password" name="password" placeholder="">
            <br/>
            
            <div class="updatebtn">
                <button type="submit" class="registerbtn">update </button>
</div>
        </form>  
      </div>  
   </body>
</html>
