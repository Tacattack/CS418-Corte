<?php
include("Connect.php");

session_start();
$error = '';

if (isset($_POST('submit')))
{
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        echo $error;
    }
    else
    {
        // Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];

        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        
        echo "I did some password things";
        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query("select * from UserProfile where password='$password' AND username='$username'");
        $rows = mysqli_num_rows($query);
        echo "I created the query";
        if ($rows == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: profile.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
            echo $error;
        }
    }
}
else{
    echo "The first if is broke";
}
?>

