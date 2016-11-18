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
            <img src="" alt=""/>
            <div class="Navigation">
                <h1>
                    <a href="index.php"><img src="images/Logo.png" class="logo"></a>
                </h1>
                <ul>
                    <li><a href="#" class="active">View Questions</a></li>
                    <li><A href="ask.php">Ask Question</a></li>
                </ul>
            </div>
            <div id="Container">
                <h1>User Profile</h1>
                
                <form action="PHP/Upload.php" method="post" enctype="multipart/form-data">
                    Select a profile image:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
                
                <h3>Asked Questions</h3>
                    <?php
                        $sql = "SELECT * FROM Questions ORDER BY id DESC";
                        $sqlU = "SELECT * FROM UserProfile";
                        
                        $result = mysqli_query($conn, $sql);
                        $resultU = mysqli_query($conn, $sqlU);
                        
                        $UserID = (isset($_GET["id"]) && trim($_GET["id"]) == 'profile.php') ? trim($_GET["id"]) : '';
                        
                        if(mysqli_num_rows($resultU) > 0)//Find the user ID
                        {
                            while ($row = mysqli_fetch_assoc($resultU))
                            {
                                if ($UserID == $row["id"])
                                {
                                    $UserIs = $row["username"];
                                    exit();
                                }
                            }
                        }
                        
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                if ($row["questionPoster"] == $_SESSION["USER"])
                                {
                                    echo "<div>";
                                    echo "<div id=\"questionTitleLink\">";
                                    echo "<a href=\"QuestionView.php?id=". $row["id"]."\">";
                                    echo "<h5>".$row["questionTitle"]."</h5>"."</a>";
                                    echo "</div>";
                                }
                                else if($UserIs == $row["questionPoster"])
                                {
                                    echo "<div>";
                                    echo "<div id=\"questionTitleLink\">";
                                    echo "<a href=\"QuestionView.php?id=". $row["id"]."\">";
                                    echo "<h5>".$row["questionTitle"]."</h5>"."</a>";
                                    echo "</div>";
                                }
                                else
                                {
                                    exit();
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


