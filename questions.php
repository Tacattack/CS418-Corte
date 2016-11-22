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
                    }
                ?>
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
                   <?php
                        if($_SESSION["USERLEVEL"] == 1)
                        {
                            echo "<li><a href =\"users.php\" class=\"active\">Users</a></li>";
                        }
                        ?>
                    <li><form action="" method="post">
                        <input type="radio" name="search" value="Users"/> Users
                        <input type="radio" name="search" value="Questions"/> Questions
                        <input type="text" name="search" placeholder="Search..."></li>
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
                                    if($_SESSION["USERLEVEL"] == 1)
                                    {
                                    $_SESSION["CurrentRow"] = $row["id"];
                                       echo "<table style=\"width:100%\">";
                                       echo "<tr>"."<div>";
                                        echo "<td>"."<div id=\"questionScore\">";
                                     
                                        echo "<h5>".$row["questionScore"]."</h5>";
                                        echo "</div></td>";
                                        
                                        echo "<td>"."<div id=\"questionTitleLink\">";
                                        echo "<a href=\"QuestionView.php?id=".$row["id"]."\">";
                                        echo "<h5>".$row["questionTitle"]."</h5>"."</a>";
                                        echo "</div>"."</td>";  
                                        echo "<td>"."<div id=\"questionDelete\">";
                                        echo "<h5><form action=\"PHP/Delete.php\" method=\"post\">"."<button name=\"delete\" type=\"submit\" value=\"1\">Delete</button>"."</form></h5></td>";
                                        echo "<td>"."Freeze:";
                                        echo "<form method=\"post\" ><label class=\"switch\">"."<input type=\"checkbox\">"."<div id=\"freezeToggle\" class=\"slider\"></div>"."</label>"."</form>"."</td>"."</tr>";
                                    echo "</div>"; 
                                    echo "</table>";
                                    }
                                    else
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