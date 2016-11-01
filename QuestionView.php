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
                    <li><A href="ask.php">Ask Question</a></li>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
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
                
                $questionID = (isset($_GET["id"]) && trim($_GET["id"]) == 'QuestionView.php') ? trim($_GET["id"]) : '';
                
                $sql = "SELECT * FROM Questions WHERE id='".$_GET["id"] . "'";
                $sqlA = "SELECT * FROM Answers WHERE questionID='".$_GET["id"]."'";
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
                            
                            echo "<div>";
                            echo "<h4>Answers</h4>";
                            echo "<table>";
                            if (mysqli_num_rows($resultA) > 0)
                            {
                                while ($rowA = mysqli_fetch_assoc($resultA))
                                {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo "<p>";
                                    echo $rowA["questionBody"];
                                    echo "</p>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            echo "</table>";
                            echo "<br />";
                    }
                }
                ?>
                <textarea rows="30" name="ABody" style="width: 600px; height: 50px;"></textarea>
                <input type="submit" name="submit" value="Submit Answer" style="margin: 20px 50px; float: right"/>
                
                <?php
                    if (isset($_POST["submit"]))
                        {
                            $AnswerID = $_POST[$_GET["id"]];
                            $AnswerBody = $_POST['ABody'];
                                
                            $sql = "INSERT INTO Answers (questionID,answerBody)
                            VALUES('{$AnswerID}', '{$AnswerBody}')";
                        }
                        echo "</div>";
                ?>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>

