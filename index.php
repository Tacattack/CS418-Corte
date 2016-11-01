<?php

require_once("redirected.php");
//require_once("PHP/Connect.php");

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
            <div id="header-wrapper">
                <<div id="header-links">
                    <a href="" id="Register">sign up</a>
                    <a href="" id="Login">log in</a>
                    <a href="" title="help">help</a>
                </div>>
            </div>
            <img src="" alt=""/>
            <form action="index.php" method="post" class="FormLogin" >
                Username: <input type="text" name="username" value="" >
                Password: <input type="password"name="password" value=""> 
               <input type="submit" name="submit" value="Login">
            </form>
            <<form class="FormRegister">
                Email: <input type="text" name="email">
                Username: <input type="text">
                Password: <input type="password">
                <input type="submit" value="Register">
            </form>>
            <div class="Navigation">
                <h1>
                    <a href="index.php"><img src="images/Logo.png" class="logo"></a>
                </h1>
                <ul>
                    <li><a href="questions.php">View Questions</a></li>
                    <li><a href="ask.php">Ask Question</a></li>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <aside class="TQuest">
                    <h3>Top Questions</h3>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 1</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 2</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 3</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 4</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 5</h5></div>
                </aside>
                <aside class="PQuest">
                    <h3>Previously Asked Questions</h3>
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
                        
                        $sql = "SELECT * FROM Questions";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<div>";
                                echo "<a href=\"QuestionView.php?id=" . $row["id"]. "\">";
                                echo "<h5>";
                                echo $row["questionTitle"];
                                echo "</a>";
                                echo "</h5>";
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
                </aside>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>