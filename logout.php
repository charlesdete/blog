<?php
   session_start();
 if(!empty($_SESSION['user_id']))
 {
   unset($_SESSION['user_id']);
 }
   unset( $_SESSION['Email']);
      echo 'You have logged out';
   header('Refresh: 2; URL = login.php');
?>