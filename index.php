<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UnstackingExchange</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);

            // Check connection
            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

            //Create Table used for questions and answers
            $sql = "CREATE TABLE IF NOT EXISTS Question (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            questionTitle NOT NULL,
            questionBody NOT NULL
            )";

            if (mysqli_query($conn, $sql)) {
                echo "Table QuestionAnswer created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        ?>
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
                Username: <input type="text">
                Password: <input type="password">
                <input type="submit" value="Login">
            </form>
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
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <aside class="TQuest">
                    <h3>Top Questions</h3>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 1</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 2</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 3</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 4</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 5</h5></div>
                </aside>
                <aside class="PQuest">
                    <h3>Previously Asked Questions</h3>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 1</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 2</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 3</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 4</h5></div>
                    <div><h5>This is a really long title that will be a placeholder for the titles until functionality works number 5</h5></div>
                </aside>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>