<?php
session_start();
$error = '';
echo "This loads at least";
if (isset($_POST('submit')))
{
    echo "You hit the submit button at least";
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        echo $error;
    }
    else
    {
        // Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
        $connection = mysql_connect("localhost", "root", "");
        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        // Selecting Database
        $db = mysql_select_db("QuestionAnswer", $connection);
        echo "I did some password things";
        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query("select * from UserProfile where password='$password' AND username='$username'", $connection);
        $rows = mysqli_num_rows($query);
        echo "I created the query";
        if ($rows == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            echo "You are logged in";
            header("location: ../profile.php"); // Redirecting To Other Page
            echo "I refuse to do anything pass this point";
        } else {
            $error = "Username or Password is invalid";
            echo $error;
        }
    }
}
mysqli_close($connection);
?>

