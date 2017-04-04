<?php
require_once("PHP/Connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <title>Unstacking Exchange</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrapDist/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <link href="register.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Unstacking Exchange</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?PHP
                   if (isset($_SESSION["USER"]))
                    {
                        echo "<form class=\"FormLogin navbar-form navbar-right\" action=\"PHP/Logout.php\" method=\"post\">";
                        $imageSet = 0;
                        $qryPT = "SELECT * FROM UserPictures";
                        $resultPT = mysqli_query($conn, $qryPT);
                        if ($resultPT)
                        {
                            if(mysqli_num_rows($resultPT) > 0)
                            {
                                while ($rowImage = mysqli_fetch_array($resultPT))
                                {
                                    if ($rowImage["userID"] == $_SESSION["USERID"])
                                    {
                                        echo '<img style="height:35px; width:35px" alt="Profile Image" src="images/'.$rowImage["pictureName"].'">';
                                        $imageSet = 1;
                                    }
                                }   
                            }
                        }
                        
                        if ($imageSet == 0)
                        {
                            echo "<img style=\"height:35px; width:35px\" src=\"images/person.png\">";
                        }
                        echo "&nbsp&nbsp&nbsp";
                        echo "<b>Welcome: <a href=\"profile.php?id=".$_SESSION["USERID"]."\">".$_SESSION["USER"]."</a></b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" class=\"btn btn-success\" name=\"submit\" value=\"Logout\">";
                        echo "</form>";
                    }
                    else
                    {
                        echo "<form class=\"navbar-form navbar-right\" action=\"PHP/Login.php\" method=\"post\">";
                        echo "<div class=\"form-group\">";
                        echo "<input type=\"text\" name=\"LoginUsername\" placeholder=\"Username\" class=\"form-control\">";
                        echo "</div>";
                        echo "<div class=\"form-group\">";
                        echo "<input type=\"password\" name=\"LoginPassword\" placeholder=\"Password\" class=\"form-control\">";
                        echo "</div>";
                        echo "<input type=\"submit\" name=\"submit\"class=\"btn btn-success\" value=\"Sign In\">";
                        echo "<br /><a href=\"register.php\">Need an account? Register Here</a>";
                        echo "</form>";
                    }
                ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">
        <form class="form-signin" name="Register" method="post" action="">
        <h2 class="form-signin-heading">Register Here</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="rEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="username" name="rUsername" id="inputUsername" class="form-control" placeholder="Username" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="rPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Register">
        <?php
          require_once('PHP/recaptchalib.php');
          $publickey = "6Lf-aRsUAAAAAPPL4imKw7IUovJ1AyJChZpGzI8C"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
      </form>
        
        <?php
                    if(isset($_POST["submit"])){
                        
                        require_once('PHP/recaptchalib.php');
                        $privatekey = "6Lf-aRsUAAAAAKtH3hdijI2KgWEu-0psb8OCHGgs";
                        $resp = recaptcha_check_answer ($privatekey,
                                                      $_SERVER["REMOTE_ADDR"],
                                                      $_POST["recaptcha_challenge_field"],
                                                      $_POST["recaptcha_response_field"]);

                        if (!$resp->is_valid) {
                          // What happens when the CAPTCHA was entered incorrectly
                          die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
                               "(reCAPTCHA said: " . $resp->error . ")");
                        } else {
                          // Your code here to handle a successful verification
                            $RegisterName = mysqli_real_escape_string($conn,htmlspecialchars($_POST['rUsername'], ENT_QUOTES|ENT_HTML5));
                            $RegisterPssWd = mysqli_real_escape_string($conn,htmlspecialchars($_POST['rPassword'], ENT_QUOTES|ENT_HTML5));
                            $RegisterEmail = mysqli_real_escape_string($conn,htmlspecialchars($_POST['rEmail'], ENT_QUOTES|ENT_HTML5));
                            $Denied = 0;


                            $sql = "SELECT * FROM UserProfile";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0)
                            {
                               while ($row = mysqli_fetch_assoc($result))
                               {
                                   if($row["username"] == $RegisterName)
                                   {
                                       echo "<center>That username already exists</center>";
                                       $Denied = 1;
                                   }
                                   else if ($row["email"] == $RegisterEmail)
                                   {
                                       echo "<center>That email is already in use</center>";
                                       $Denied = 1;
                                   }
                               }
                            }

                            if ($Denied == 0)
                            {
                                $sql = "INSERT INTO UserProfile (username, password, email, level)
                                VALUES('{$RegisterName}', '{$RegisterPssWd}', '{$RegisterEmail}', '0')";

                                if (mysqli_query($conn, $sql)) {
                                    echo "<center>You Have Successfully Registered With Unstacking Exchange. You May Now Log In To Get Started</center>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                            else
                            {
                                $Denied = 0;
                            }
                        }

                        mysqli_close($conn);
                    }
            ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrapDist/dist/js/bootstrap.min.js"></script>
  </body>
</html>