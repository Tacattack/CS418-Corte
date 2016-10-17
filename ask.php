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
                <div id="header-links">
                    <a href="" id="Register">sign up</a>
                    <a href="" id="Login">log in</a>
                    <a href="" title="help">help</a>
                </div>
            </div>
            <img src="" alt=""/>
            <form class="FormLogin">
                Username: <input type="text" name='user' value="<?PHP echo $name; ?>">
                Password: <input type="password" name='pass' value="<?PHP echo $pass;?>">
                <input type="submit" value="Login">
            </form>
            <form class="FormRegister">
                Email: <input type="text" name='email' value ="<?PHP echo $email;?>">
                Username: <input type="text" name='newuser' value="<?PHP echo $newuser;?>">
                Password: <input type="password" name='newpass' value="<?PHP echo $newpass; ?>">
                <input type="submit" value="Register">
            </form>
            <div>
                <h1>Unstacking Exchange</h1>
                <ul>
                    <li>View Questions</li>
                    <li>Ask Question</li>
                </ul>
            </div>
        </div>
        <div id="Container">
            <div id="Content">
                <div class="AQuestDiv">
                    <forms class="AQuest">
                        Title: <input type="text" class="ATitle" />
                        Description: <textarea rows="30" cols="50" name="Question"></textarea>
                    </forms>
                </div>
            </div>
        </div>
        <div id="Footer">
            <aside>
                <h4>Class Website</h4>
            </aside>
            <aside>
                <h4>Team Members</h4>
            </aside>
        </div>
    </body>
    
   <?PHP 
   /*
    $name = $email = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
       $name = test_input($_POST["name"]);
       $email = test_input($_POST["email"]);
   }
   
   function test_input($data)
   {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
   }
   */
   
    ?>
</html>
