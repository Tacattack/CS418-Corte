<?php

require_once("redirected.php");
//require_once("PHP/Connect.php");
if(isset($_POST["submit"]))
{
    //form submitted
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    //Hard coded until mysql is working with it
    if($username == "admin" && $password == "cs518pa$$")
    {
        redirect_to("loggedin.html");
    }
    else if($username == "jbrunelle" && $password == "M0n@rch$")
    {
          redirect_to("loggedin.html");
    }
    else if($username == "pvenkman" && $password == "imadoctor" )
    {
          redirect_to("loggedin.html");
    }
    else if($username == "dbarrett" && $password == "fr1ed3GGS")
    {
          redirect_to("loggedin.html");
    }
    else if($username == "winston" && $password == "zeddM0r3")
    {
          redirect_to("loggedin.html");
    }
    else if($username == "gozer" && $password == "d3$truct0R")
    {
          redirect_to("loggedin.html");
    }
    else if($username == "slimer" && $password == "f33dM3")
    {
          redirect_to("loggedin.html");
    }
    else if($username == "keymaster" && $password == "n0D@na")
    {
          redirect_to("loggedin.html");
    }
    else if($username == "staypuft" && $password == "m@r$hM@ll0w")
    {
          redirect_to("loggedin.html");
    }
    else if($username == "nbenfiel" && $password == "password")
    {
          redirect_to("loggedin.html");
    }
    else if($username == "tcorte" && $password == "password")
    {
          redirect_to("loggedin.html");
    }
}
else
{
  $username = "";   
}

?>

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
            <div id="header-wrapper">
                <!--<div id="header-links">
                    <a href="" id="Register">sign up</a>
                    <a href="" id="Login">log in</a>
                    <a href="" title="help">help</a>
                </div>-->
            </div>
            <img src="" alt=""/>
            <form action="index.php" method="post" class="FormLogin">
                Username: <input type="text" name="username" value="" <?php echo htmlspecialchars($username) ?>>
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