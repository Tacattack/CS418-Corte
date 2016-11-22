<?php
echo "Starting";
require_once("PHP/Connect.php");
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UnstackingExchange</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
    </head>
    <body>
        <div id="Header">
                    <?PHP
                    if (isset($_SESSION["USER"]))
                    {
                        echo "<form class=\"FormLogin\" action=\"PHP/Logout.php\" method=\"post\">";
                        echo "<b>Welcome: <a href=\"profile.php?id=\"".$_SESSION["USERID"]."\">".$_SESSION["USER"]."</a></b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Logout\">";
                        echo "</form>";
                    }
                    else
                    {
                        echo "<form class=\"FormLogin\" action=\"PHP/Login.php\" method=\"post\">";
                        echo "Username: <input type=\"text\" name=\"LoginUsername\">";
                        echo "Password: <input type=\"password\" name=\"LoginPassword\">"; 
                        echo "<input type=\"submit\" name=\"submit\" value=\"Login\">";
                        echo "</form>";
                        echo "<a href=\"register.php\">Register</a>";
                    }
                ?>
            <div class="Navigation">
                <h1>
                    <a href="index.php"><img src="images/Logo.png" class="logo"></a>
                </h1>
                <ul>
                    <li><a href="questions.php">View Questions</a></li>
                    <li><a href="ask.php">Ask Question</a></li>
                    <li><a href="help.php">Help</a></li>
                    <li><form action="" method="post">
                        <input type="radio" name="search" value="Users"/> Users
                        <input type="radio" name="search" value="Questions"/> Questions
                        <input type="text" name="search" placeholder="Search..."></li>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <h1>Register</h1>
                    <form class="FormRegister" action="" method="post">
                    Username: <input type="text" name="RegUser">
                    Password: <input type="password" name="RegPass">
                    <input type="submit" name="register" value="Register">
                    
                    <?php
                    /*
                        if(isset($_POST("register")))
                        {
                            $USERNM = $_POST["RegUser"];
                            $PSSWRD = $_POST["RegPass"];

                            $sql = "INSERT INTO UserProfile (username, password, level)
                                                    VALUES('{$USRNM}', '{$PSSWRD}', '0')";

                            if (mysqli_query($conn, $sql)) {
                                echo "Registered Successfully";
                                header("Location: index.php");
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        }
                     */
                     
                    ?>
                    
                </form>
            </div>
        </div>
    </body>
</html>

