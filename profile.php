<?php
include ('Login.php'); 

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
            <div id="header-wrapper">
               
            </div>
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
            <div class="Profile">
                <h1>
                    User Profile
                </h1>
                
                <form action="PHP/Upload.php" method="post" enctype="multipart/form-data">
                    Select a profile image:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
                
                <?php
                $questionID = (isset($_GET["id"]) && trim($_GET["id"]) == 'QuestionView.php') ? trim($_GET["id"]) : '';
                
                $sql = "SELECT * FROM Questions WHERE id='".$_GET["id"] . "'";
                $sqlA = "SELECT * FROM Answers WHERE questionID='".$_GET["id"]."' ORDER BY answerScore DESC";
                $result = mysqli_query($conn, $sql);
                $resultA = mysqli_query($conn, $sqlA);
                

                if (mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                            echo "<div id=\"QuestionTitle\">";
                            echo "<h1>" . $row["questionTitle"] . "</h1>";
                            echo "</div>";

                            echo "<div id=\"QuestionBody\">";
                            echo "<p>";
                            echo $row["questionBody"];
                            echo "</p>";
                            echo "</div>";
                            
                            echo "<div id=\"Answers\">";
                            echo "<h3>Answers</h3>";
                            echo "<ul>";
                            if (mysqli_num_rows($resultA) > 0)
                            {
                                while ($rowA = mysqli_fetch_assoc($resultA))
                                {
                                    echo "<li>" . "<p id=\"AnswerScore\">" . $rowA["answerScore"] . "</p>" .
                                     "<p id=\"AnswerText\">" . $rowA["answerBody"] . "</p>" . "</li>";
                                }
                            }
                            echo "<br />";
                    }
                }
                ?>   
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>


