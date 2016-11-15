<?php
include ('Login.php');

?>
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
                <b id="welcome">Welcome: <i><?php echo $login_session;?></i></b>
            </div>
            <img src="" alt=""/>
            <div class="Navigation">
                <h1>
                    <a href="index.php"><img src="images/Logo.png" class="logo"></a>
                </h1>
                <ul>
                    <li><a href="#" class="active">View Questions</a></li>
                    <li><A href="ask.php">Ask Question</a></li>
                </ul>
            </div>
            <div class="Profile">
                <h1>
                    User Profile
                </h1>
                
                <form action="PHP/Upload.php" method="post" enctype="multipart/form-data">
                    Select a profile image:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
                
                
            </div>
        </div>
        <div id="Footer">
            
        </div>
    </body>
</html>


