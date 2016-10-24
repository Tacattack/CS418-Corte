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
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "QuestionAnswer";

                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $QuestionTitle = $_POST['QTitle'];
                        $QuestionBody = $_POST['QBody'];

                        $sql = "INSERT INTO Questions (questionTitle, questionBody)
                            VALUES('{$QuestionTitle}', '{$QuestionBody}')";

                        if (mysqli_query($conn, $sql)) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        $questionID = (isset($_GET["id"]) && trim($_GET["id"]) == 'QuestionView.php') ? trim($_GET["id"]) : '';
                
                        $sql = "SELECT * FROM Questions WHERE id='".$_GET["id"] . "'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                header("Location: QuestionView.php?id=".$row["id"]);
                                mysqli_close($conn);
                                die(); 
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>

