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
                <div id="QuestionTitle">
                    <h1>A placeholder title</h1>
                </div>
                <div class="QuestionBody">
                    <p>A placeholder paragraph of extreme proportions because if I don't test it to the fullest I will never get a good enough size for the 
                    CSS to actually be somewhat correct. oanonasonoanfoinsdofnos ovns;d v;sod pspjfpapfn aas nao  sinpn pajsppasodjpasmdpamsp pjmpaspmd
                    apsndnaspn poajspjapsdmapsjpasmdpwoj   wojdapsodp[ oajspdja poajspdnuwiqw-09 9a0us0dna ais pdj apsnpa napsoc[qonpqopj-as</p>
                </div>
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>

