<!DOCTYPE html>
<html>
    <head>
        <title>UnstackingExchange</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
    </head>
    <body>
        <div id="Header">
            <!--<div id="header-wrapper">
                <div id="header-links">
                    <a href="" id="Register">sign up</a>
                    <a href="" id="Login">log in</a>
                    <a href="" title="help">help</a>
                </div>
            </div>-->
            <form action="PHP/Login.php" method="post" class="FormLogin" >
                Username: <input type="text" name="username" value="" >
                Password: <input type="password"name="password" value=""> 
               <input type="submit" name="submit" value="Login">
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
                    <li><a href="help.php" class="active">Help</a></li>
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
                <h1>This is a help page for people who struggle without it</h1>
                <p>This is a list of Q&A's to help you out</p>
                <ol type="1">
                    <li>How do I log in?
                        <ol><li>Go to the top of the page, put in your username and password, then click log in</li></ol>
                    </li>
                    <li>I'm not able to log in. What's going on?
                        <ol><li>Are you registered?</li></ol>
                    </li>
                    <li>How do I register?
                        <ol><li>Click the register button then figure it out</li></ol>
                    </li>
                    <li>How do I post a question?
                        <ol><li>Click the Ask Questions tab in the navigation bar. Make sure you are logged in</li></ol>
                    </li>
                    <li>How do I post a reply
                        <ol><li>Click a questions, make your logged in, fill out the box then hit submit</li></ol>
                    </li>
                    <li>Can I look at posted questions?
                        <ol><li>Yeah</li></ol>
                    </li>
                    <li>Can I search questions?
                        <ol><li>Still working on fixing that but soon yes</li></ol>
                    </li>
                    <li>Can I search users?
                        <ol><li>Soon yes</li></ol>
                    </li>
                    <li>Why can't I delete a user?
                        <ol><li>Because you aren't special and will not receive privileges like that without approval</li></ol>
                    </li>
                </ol>
            </div>
        </div>
    </body>
</html>
