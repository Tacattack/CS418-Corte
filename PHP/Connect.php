<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbName = "QuestionAnswer";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbName);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            //This will begin the login in process and create a session once the user logs in
            $ID = $_POST['username'];
            $PASSWORD = $_POST['password'];
            
            function SignIn()
            {
                session_start();
                if(!empty($_POST['user']))
                {
                    $query = mysqli_query("SELECT * FROM UserProfile where username = '$_POST[username]' AND password = '$_POST[password]'");
                    $row = mysqli_fetch_array($query);
                    
                    if (!empty($row['username'] AND !empty($row['password'])))
                    {
                        $_SESSION['username'] = $row['password'];
                        echo "signed in";
                    }
                    else
                    {
                        echo "Password or username wrong";
                    }
                }
            }
            
            if (isset($_POST['submit']))
            {
                SignIn();
            }
?>

