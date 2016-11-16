<?php
//require_once("redirected.php");
//require_once("PHP/Connect.php");

    echo "I run before the connection";
    $host = "localhost";
    $user = "root";
    $passwrd = "";
    $db = "QuestionAnswer";
    
    mysqli_connect($host, $user, $pass);
    mysqli_select_db($db);
    echo "I run after the connection";
    
    echo $host;
    echo $user;
    echo $psswrd;
    echo $db;
    

    if (isset($_POST['Login']))
    {
        echo "The username is: ".$_POST('LoginUsername');
        echo "The password is: ".$_POST('LoginPassword');
        
        $USRNM = $_POST('LoginUsername');
        $PSSWRD = $_POST('LoginPassword');
        
        echo $USRNM;
        echo $PSSWRD;
        
        //Protecting username from MYSQL injection
        $USRNM = stripslashes($USRNM);
        $USRNM = mysqli_real_escape_string($USRNM);
        echo "username protected";
        //Protecting password from MYSL injection
        $PSSWRD = stripslashes($PSSWRD);
        $PSSWRD = mysqli_real_escape_string($PSSWRD);
        echo "password protected";
        //comparing username and password to database
        $sqlLogin = "SELECT * FROM UserProfile WHERE username='".$USRNM."' AND password='".$PSSWRD."' LIMIT 1";
        $resultLogin = mysqli_query($sqlLogin);
        echo "query created";
        //if $result matched username and password, table row must be 1
        if (mysqli_num_rows($resultLogin) == 1)
        {
            //Register the username and password then redirect it to the profile page
            echo "You have successfully logged in";
            exit();
        }
        else
        {
            echo "Wrong username and password";
            exit();
        }
    }
    
    echo "I either skipped the if or completed it no probs";
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
                <div id="header-links">
                    <a href="" id="Register">sign up</a>
                    <a href="" id="Login">log in</a>
                    <a href="" title="Help">help</a>
                </div>
            </div>
            <form method="post" class="FormLogin" action="">
                Username: <input type="text" name="LoginUsername">
                Password: <input type="password" name="LoginPassword"> 
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
                    <?php
                        $sqlT = "SELECT * FROM Questions ORDER BY questionScore DESC LIMIT 5";
                        $resultT = mysqli_query($conn, $sqlT);
                        
                        if (mysqli_num_rows($resultT) > 0)
                        {
                            while ($rowT = mysqli_fetch_assoc($resultT))
                            {
                                echo "<div>";
                                    echo "<div id=\"questionScore\">";
                                        echo "<h5>" . $rowT["questionScore"] . "</h5>";
                                    echo "</div>";
                                    echo "<div id=\"questionTitleLink\">";
                                        echo "<a href=\"QuestionView.php?id=" . $rowT["id"]. "\">";
                                            echo "<h5>" . $rowT["questionTitle"] . "</h5>" . "</a>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        }else {
                            echo "<div>";
                            echo "<h5>";
                            echo "0 Results Found";
                            echo "</h5>";
                            echo "</div>";
                        }
                    ?>
                </aside>
                <aside class="PQuest">
                    <h3>Previously Asked Questions</h3>
                    <?php
                        $sql = "SELECT * FROM Questions ORDER BY id DESC LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<div>";
                                    echo "<div id=\"questionScore\">";
                                        echo "<h5>" . $row["questionScore"] . "</h5>";
                                    echo "</div>";
                                    echo "<div id=\"questionTitleLink\">";
                                        echo "<a href=\"QuestionView.php?id=" . $row["id"]. "\">";
                                            echo "<h5>" . $row["questionTitle"] . "</h5>" . "</a>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        }else {
                            echo "<div>";
                            echo "<h5>";
                            echo "0 Results Found";
                            echo "</h5>";
                            echo "</div>";
                        }
                        
                        mysqli_close($conn);
                    ?>
                </aside>
            </div>
        </div>
    </body>
</html>
