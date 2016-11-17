<?php
require('PHP/Connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UnstackingExchange</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
    </head>
    <body>
        <div id="Header">
            <form class="FormLogin">
                <?PHP
                    if (isset($_SESSION["USER"]))
                    {
                        echo "<b>Welcome: <a href=\"profile.php?id=\"".$_SESSION["USERID"]."\">".$_SESSION["USER"]."</a></b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Logout\">";
                    }
                    else
                    {
                        echo "Username: <input type=\"text\" name=\"LoginUsername\">";
                        echo "Password: <input type=\"password\" name=\"LoginPassword\">"; 
                        echo "<input type=\"submit\" name=\"submit\" value=\"Login\">";
                    }
                ?>
            </form>
            <!--<form class="FormRegister">
                Email: <input type="text" name='email' >
                Username: <input type="text" name='newuser' >
                Password: <input type="password" name='newpass' >
                <input type="submit" value="Register">
            </form>-->
            <div class="Navigation">
                <h1>
                    <a href="index.php"><img src="images/Logo.png" class="logo"></a>
                </h1>
                <ul>
                    <li><a href="#" class="active">View Questions</a></li>
                    <li><A href="ask.php">Ask Question</a></li>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <div class="QuestionList">
                    <?php
                        $sql = "SELECT * FROM Questions ORDER BY id DESC";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<div>";
                                    echo "<div id=\"questionScore\">";
                                        echo "<h5>" . $row["questionScore"] . "</h5>";
                                    echo "</div>";
                                    echo "<div id=\"questionTitleLink\">";
                                        echo "<a href=\"QuestionView.php?id=" . $row["id"]. "\">";
                                            echo "<h5>" . $row["questionTitle"] . "</h5>" . "</a>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        }else {
                            echo "<div>";
                            echo "<h5>";
                            echo "0 Results Found";
                            echo "</h5>";
                            echo "</div>";
                        }
                        
                        mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>