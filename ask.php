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
                    <li><a class="active" href="#">Ask Question</a></li>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <div class="AQuestDiv">
                    <?php
                    if (isset($_SESSION["USER"]))
                    {
                        echo "<form name=\"AskQuestion\" method=\"post\" action=\"\">";
                        echo "<table>";
                        echo "<tr>";
                        echo "<td>Title:";
                        echo "<br /><input type=\"text\" class=\"AQuestTitle\" name=\"QTitle\"/></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Description:";
                        echo "<br /><textarea rows=\"30\" name=\"QBody\"></textarea></td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Submit Question\" style=\"margin: 20px 50px; float: right\"/>";
                        echo "</form>";
                    }
                    else
                    {
                        echo "<p>Please Sign in to post a question</p>";
                    }
                    if(isset($_POST["submit"])){
                        $QuestionTitle = addslashes($_POST['QTitle']);
                        $QuestionBody = addslashes($_POST['QBody']);
                        $QuestionPoster = $_SESSION("USER");

                        $sql = "INSERT INTO Questions (questionTitle, questionBody, questionPoster)
                            VALUES('{$QuestionTitle}', '{$QuestionBody}', '{$QuestionPoster}')";

                        if (mysqli_query($conn, $sql)) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                
                        
                        $sql = "SELECT * FROM Questions";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                if ($QuestionTitle == $row[addslashes("questionTitle")])
                                {
                                    header("Location: QuestionView.php?id=".$row["id"]);
                                    die(); 
                                }else {
                                    echo "ERROR: QuestionTitle != row[questionTitle]";
                                }
                            }
                        }else {
                            echo "ERROR: Row is not > 0";
                        }
                        
                        mysqli_close($conn);
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>

