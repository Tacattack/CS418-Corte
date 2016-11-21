<?php
require("PHP/Connect.php");
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

                        //Checking the User's level of Access
                        //echo "<b>".$_SESSION["USERLEVEL"]. "</b>";
                        
                        //If the User is Admin
                        if($_SESSION["USERLEVEL"] == 1)
                        {
                        $UserLevel = "Admin";
                        echo "<form class=\"FormLogin\" action=\"PHP/Logout.php\" method=\"post\">";
                        echo "<b>Welcome: <a href=\"profile.php?id=\"".$_SESSION["USERID"]."\">".$_SESSION["USER"].""
                        . "</a> <b>Level:".$UserLevel. "</b> </b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Logout\">";
                        echo "</form>";   
                        }
                        //Else if the user is a Pleb
                        else if($_SESSION["USERLEVEL" == 0])
                        {
                        $UserLevel = "Pleb";
                        echo "<form class=\"FormLogin\" action=\"PHP/Logout.php\" method=\"post\">";
                        echo "<b>Welcome: <a href=\"profile.php?id=\"".$_SESSION["USERID"]."\">".$_SESSION["USER"]."</a>"
                                ."<b> Level:".$UserLevel. "</b> </b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Logout\">";
                        echo "</form>";
                        }
                        
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
            <img src="" alt=""/>
            <div class="Navigation">
                <h1>
                    <a href="index.php"><img src="images/Logo.png" class="logo"></a>
                </h1>
                <ul>
                    <li><a href="questions.php">View Questions</a></li>
                    <li><a href="ask.php">Ask Question</a></li>
                    <li><a href="users.php" class="active">Users</a></li>
                </ul>
            </div>
            <div id="Container">
                <?php
                    $UserID = (isset($_GET["id"]) && trim($_GET["id"]) == 'profile.php') ? trim($_GET["id"]) : '';
                    $sqlU = "SELECT * FROM UserProfile WHERE id='".$_GET["id"]."'";
                    $resultU = mysqli_query($conn, $sqlU);
                    if(mysqli_num_rows($resultU) > 0)//Find the user ID
                    {
                        while ($rowU = mysqli_fetch_assoc($resultU))
                        {
                            $UserIs = $rowU["username"];
                        }
                    }
                    echo "<h1>".$UserIs."</h1>";
                    
                    if (isset($_SESSION["USER"]))
                    {
                        echo "<form action=\"PHP/Upload.php\" method=\"post\" enctype=\"multipart/form-data\">";
                        echo "Select a profile image:";
                        echo "<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">";
                        echo "<input type=\"submit\" value=\"Upload Image\" name=\"submit\">";
                        echo  "</form>";
                    }
                    
                    echo "<h3>Asked Questions</h3>";
                    $sql = "SELECT * FROM Questions ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            if($UserIs == $row["questionPoster"])
                            {
                                echo "<div>";
                                echo "<div id=\"questionTitleLink\">";
                                echo "<a href=\"QuestionView.php?id=". $row["id"]."\">";
                                echo "<h5>".$row["questionTitle"]."</h5>"."</a>";
                                echo "</div>";
                            }
                        }
                    }
                    else {
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
        <div id="Footer">
            
        </div>
    </body>
</html>


