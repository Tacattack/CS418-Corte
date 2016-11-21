<?php
//require_once("redirected.php");
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
                        
                        if ($WrongPassUse == true)
                        {
                            echo "Wrong username or password dumb dumb";
                        }
                        echo "</form>";
                    }
                ?>
            <!--<form class="FormRegister">
                Email: <input type="text" name="email">
                Username: <input type="text">
                Password: <input type="password">
                <input type="submit" value="Register">
            </form>-->
            <div class="Navigation">
                <h1>
                    <a href="index.php"><img src="images/Logo.png" class="logo"></a>
                </h1>
                <ul>
                    <li><a href="questions.php">View Questions</a></li>
                    <li><a href="ask.php">Ask Question</a></li>
                   <?php
                        if($_SESSION["USERLEVEL"] == 1)
                        {
                            echo "<li><a href =\"users.php\" class=\"active\">Users</a></li>";
                        }
                        ?>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <aside class="TQuest">
                    <h3>Top Questions</h3>
                    <?php
                        $sqlT = "SELECT * FROM Questions ORDER BY questionScore DESC LIMIT 5";
                        $resultT = mysqli_query($conn, $sqlT);
                        
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
                    ?>
                </aside>
                <aside class="PQuest">
                    <h3>Previously Asked Questions</h3>
                    <?php
                        $sql = "SELECT * FROM Questions ORDER BY id DESC LIMIT 5";
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
    </body>
</html>
