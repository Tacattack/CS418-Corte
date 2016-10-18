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
                    <form>
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
                        <input type="submit" value="Submit Question" style="margin: 20px 50px; float: right"/>
                    </form>
                </div>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
    
   <?PHP 
        echo gethostname();
   
        $servername = "localhost";
        $username = "admin";
        $password = "M0n@rch$";
        $database = "QuestionAnswer";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        mysql_selet_db("QuestionAnswer", $conn);
        $sql="INSERT INTO Questions (questionTitle, questionBody)
            VALUES
            ('$_POST[QTitle]','$_POST[QBody]')";
        
        if (!mysql_query($sql,$conn))
        {
            die('Error: ' . mysql_error());
        }
        echo "Thank you for posting your question";
        mysqli_close($conn);
    ?>
</html>

