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
                    <li><a href="questions.php">View Questions</a></li>
                    <li><A href="ask.php">Ask Question</a></li>
                    <li><a href="users.php">Users</a></li>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <?php
                    $questionID = (isset($_GET["id"]) && trim($_GET["id"]) == 'QuestionView.php') ? trim($_GET["id"]) : '';

                    $sql = "SELECT * FROM Questions WHERE id='".$_GET["id"] . "'";
                    $sqlA = "SELECT * FROM Answers WHERE questionID='".$_GET["id"]."' ORDER BY answerScore DESC";
                    $sqlU = "SELECT * FROM UserProfile";
                    $result = mysqli_query($conn, $sql);
                    $resultA = mysqli_query($conn, $sqlA);
                    $resultU = mysqli_query($conn, $sqlU);


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

                            echo "Posted By: ";
                            if (mysqli_num_rows($resultU) > 0)
                            {
                                while ($rowU = mysqli_fetch_assoc($resultU))
                                {
                                    if ($row["questionPoster"] == $rowU["username"])
                                    {
                                        echo "<a href=\"profile.php?id=".$rowU["id"]."\">";
                                    }
                                }
                            }
                            echo $row["questionPoster"]."</a>";
                            echo "</div>";

                            echo "<div id=\"Answers\">";
                            echo "<h3>Answers</h3>";
                            echo "<ul>";
                            if (mysqli_num_rows($resultA) > 0)
                            {
                                while ($rowA = mysqli_fetch_assoc($resultA))
                                {
                                    if (isset($_SESSION["USER"]))
                                    {
                                        echo "<li><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"likeIt\" value=\"".
                                                "<?php \$rowA[\"bestAnswer\"]\"= 1; echo \$rowA[\"bestAnswer\"]\"; ?>\"><table>";
                                        echo "<tr><td><input type=\"submit\" name=\"Like\" value=\"I Like\"></td><td>".$rowA["answerBody"]."</td></tr>";
                                        echo "<tr><td><input type=\"submit\" name=\"upVote\" value=\"+\">&nbsp".$rowA["answerScore"]."&nbsp<input type=\"submit\" name=\"downVote\" value=\"-\">"
                                            ."</td><td> posted by: ".$rowA["answerPoster"]."</td></tr>";
                                        echo "</table></form></li>";
                                    }
                                    else
                                    {
                                        echo "<li><form><table>";
                                        echo "<tr><td>".$rowA["answerScore"]."</td><td>".$rowA["answerBody"]."</td></tr>";
                                        echo "<tr><td> posted by: ".$rowA["answerPoster"]."</td></tr>";
                                        echo "</table></form></li>";
                                    }
                                }
                            }
                            echo "<br />";
                        }
                    }
                    echo "</ul>";
                    if (isset($_SESSION["USER"]))
                    {
                        echo "<form method=\"post\">";
                        echo "<textarea rows=\"30\" name=\"ABody\" style=\"width: 600px; height: 50px;\"></textarea>";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Submit Answer\" style=\"margin: 20px 50px; float: right\"/>";
                        echo "</form>";

                        if (isset($_POST["submit"]))
                        {
                            $AnswerID = $_GET["id"];
                            $AnswerBody = addslashes($_POST['ABody']);

                            $AnswerCreate = "INSERT INTO Answers (questionID,answerBody)
                            VALUES('{$AnswerID}', '{$AnswerBody}')";

                            if (mysqli_query($conn, $AnswerCreate)) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }

                            $QuestionReload = "SELECT * FROM Questions";
                            $QuestionReloadResult = mysqli_query($conn, $QuestionReload);

                            if (mysqli_num_rows($QuestionReloadResult) > 0)
                            {
                                while ($Qrow = mysqli_fetch_assoc($QuestionReloadResult))
                                {
                                    if ($_GET["id"] == $Qrow["id"])
                                    {
                                        header("Location: QuestionView.php?id=".$Qrow["id"]);
                                        die(); 
                                    }
                                }
                            }
                        }
                    }
                    mysqli_close($conn);
                ?>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>

