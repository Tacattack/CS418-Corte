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
                        echo "<a href=\"register.php\">Register</a>";
                    }
                ?>
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
                        <ol type="A"><li>Go to the top of the page, put in your username and password, then click log in</li></ol>
                    </li>
                    <li>I'm not able to log in. What's going on?
                        <ol type="A"><li>Are you registered?</li></ol>
                    </li>
                    <li>How do I register?
                        <ol type="A"><li>Click the register button then figure it out</li></ol>
                    </li>
                    <li>How do I post a question?
                        <ol type="A"><li>Click the Ask Questions tab in the navigation bar. Make sure you are logged in</li></ol>
                    </li>
                    <li>How do I post a reply
                        <ol type="A"><li>Click a questions, make your logged in, fill out the box then hit submit</li></ol>
                    </li>
                    <li>Can I look at posted questions?
                        <ol type="A"><li>Yeah</li></ol>
                    </li>
                    <li>Can I search questions?
                        <ol type="A"><li>Still working on fixing that but soon yes</li></ol>
                    </li>
                    <li>Can I search users?
                        <ol type="A"><li>Soon yes</li></ol>
                    </li>
                    <li>Why can't I delete a user?
                        <ol type="A"><li>Because you aren't special and will not receive privileges like that without approval</li></ol>
                    </li>
                </ol>
            </div>
        </div>
    </body>
</html>
