<?php
include("Connect.php");
session_start();
echo "Checking the login";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      echo "Passing the Username and Password";
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      echo "Checking the DB";
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         echo "Session Created";
         header("location: redirected.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

