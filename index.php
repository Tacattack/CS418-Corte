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
                    <?php
                        $servernameT = "localhost";
                        $usernameT = "root";
                        $passwordt = "";
                        $dbNameT = "QuestionAnswer";

                        // Create connection
                        $connT = mysqli_connect($servernameT, $usernameT, $passwordt, $dbNameT);
                        
                        // Check connection
                        if (!$connT) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        
                        $sqlT = "SELECT * FROM Questions ORDER BY answerScore";
                        $resultT = mysqli_query($connT, $sqlT);
                        
                        if (mysqli_num_rows($resultT) > 0)
                        {
                            while ($rowT = mysqli_fetch_assoc($resultT))
                            {
                                echo "<div>";
                                    echo "<div id=\"questionScore\">";
                                        echo "<h5>" . $rowT["questionScore"] . "</h5>";
                                    echo "</div>";
                                    echo "<div id=\"questionTitleLink\">";
                                        echo "<a href=\"QuestionView.php?id=" . $rowT["id"]. "\">";
                                            echo "<h5>" . $rowT["questionTitle"] . "</h5>" . "</a>";
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
                        
                        mysqli_close($connT);
                    ?>
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
                </aside>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>