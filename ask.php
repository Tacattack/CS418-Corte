<?php
require('PHP/Connect.php');
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
                <!--<div id="header-links">
                    <a href="" id="Register">sign up</a>
                    <a href="" id="Login">log in</a>
                    <a href="" title="help">help</a>
                </div>-->
            </div>
            <img src="" alt=""/>
            <form class="FormLogin">
                Username: <input type="text" name='user' >
                Password: <input type="password" name='pass' >
                <input type="submit" value="Login">
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
                    <li><a href="questions.php">View Questions</a></li>
                    <li><a class="active" href="#">Ask Question</a></li>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <div class="AQuestDiv">
                    <form name="AskQuestion" method="post">
                        <table>
                            <tr>
                                <td>Title:
                                    <br /><input type="text" class="AQuestTitle" name="QTitle"/></td>
                            </tr>
                            <tr>
                                <td>Description:
                                    <br /><textarea rows="30" name="QBody"></textarea></td>
                            </tr>
                        </table>
                        <input type="submit" name="submit" value="Submit Question" style="margin: 20px 50px; float: right"/>
                    </form>
                    
                    <?php
                    if(isset($_POST["submit"])){
                        $QuestionTitle = addslashes($_POST['QTitle']);
                        $QuestionBody = addslashes($_POST['QBody']);

                        $sql = "INSERT INTO Questions (questionTitle, questionBody)
                            VALUES('{$QuestionTitle}', '{$QuestionBody}')";

                        if (mysqli_query($conn, $sql)) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                
                        
                        $sql = "SELECT * FROM Questions";
                        $result = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($result);
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                if ($QuestionTitle == $row[addslashes("questionTitle")])
                                {
                                    //header("Location: QuestionView.php?id=".$row["id"]);
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

