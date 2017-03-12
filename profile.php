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

    <title>Unstacking Exchange</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrapDist/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

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
          <?PHP
                   if (isset($_SESSION["USER"]))
                    {
                        echo "<form class=\"FormLogin navbar-form navbar-right\" action=\"PHP/Logout.php\" method=\"post\">";
                        echo "<img src=\"\" style=\"height:35px; width:35px;\">";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<b>Welcome: <a href=\"profile.php?id=".$_SESSION["USERID"]."\">".$_SESSION["USER"]."</a></b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Logout\">";
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

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to Unstacking Exchange</h1>
        <p>Unstacking your game dev needs</p>
        <p><a class="btn btn-primary btn-lg" href="questions.php" role="button">View Questions &raquo;</a>
        	<a class="btn btn-primary btn-lg" href="ask.php" role="button">Ask Question &raquo;</a>
    		<a class="btn btn-primary btn-lg" href="help.php" role="button">Help &raquo;</a>
                <?php
                if($_SESSION["USERLEVEL"] == 1)
                    {
                    echo "<a href =\"users.php\" class=\"btn btn-primary btn-lg\" role=\"button\">Users &raquo;</a>";
                    }
                ?>
    	</p>
      </div>
    </div>
    <?PHP
                   /* if (isset($_SESSION["USER"]))
                    {

                        //Checking the User's level of Access
                        //echo "<b>".$_SESSION["USERLEVEL"]. "</b>";
                        
                        //If the User is Admin
                        if($_SESSION["USERLEVEL"] == 1)
                        {
                        $UserLevel = "Admin";
                        echo "<form class=\"FormLogin\" action=\"PHP/Logout.php\" method=\"post\">";
                        echo "<b>Welcome: <a href=\"profile.php?id=\"".$_SESSION["USERID"]."\">".$_SESSION["USER"].""
                        . "</a> <b>Level:".$UserLevel. "</b> </b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Logout\">";
                        echo "</form>";   
                        }
                        //Else if the user is a Pleb
                        else
                        {
                        $UserLevel = "Pleb";
                        echo "<form class=\"FormLogin\" action=\"PHP/Logout.php\" method=\"post\">";
                        echo "<b>Welcome: <a href=\"profile.php?id=\"".$_SESSION["USERID"]."\">".$_SESSION["USER"]."</a>"
                                ."<b> Level:".$UserLevel. "</b> </b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Logout\">";
                        echo "</form>";
                        }
                        
                    }
                    else
                    {
                        echo "<form class=\"FormLogin\" action=\"PHP/Login.php\" method=\"post\">";
                        echo "Username: <input type=\"text\" name=\"LoginUsername\">";
                        echo "Password: <input type=\"password\" name=\"LoginPassword\">"; 
                        echo "<input type=\"submit\" name=\"submit\" value=\"Login\">";
                        echo "</form>";
                        echo "<a href=\"register.php\">Register</a>";
                    }*/
                ?>
    <div class="container">
      <?php
                    $UserID = (isset($_GET["id"]) && trim($_GET["id"]) == 'profile.php') ? trim($_GET["id"]) : '';
                    $sqlU = "SELECT * FROM UserProfile WHERE id='".$_GET["id"]."'";
                    $resultU = mysqli_query($conn, $sqlU);
                    if(mysqli_num_rows($resultU) > 0)//Find the user ID
                    {
                        while ($rowU = mysqli_fetch_assoc($resultU))
                        {
                            $UserIs = $rowU["username"];
                        }
                    }
                    echo "<h1>".$UserIs."</h1>";
                    
                    $qry = "SELECT * FROM UserPictures";
                    $result = mysqli_query($qry, $conn);
                    while ($row = mysqli_fetch_array($result))
                    {
                        if ($_SESSION["USER"] == $row["user"])
                        {
                            echo "I'm a fucking image";
                        }
                    }
                    
                    if (isset($_SESSION["USER"]))
                    {
                        echo "<form action=\"PHP/Upload.php\" method=\"post\" enctype=\"multipart/form-data\">";
                        echo "Select a profile image:";
                        echo "<input type=\"file\" name=\"image\" id=\"fileToUpload\">";
                        echo "<input type=\"submit\" value=\"Upload Image\" name=\"submit\">";
                        echo  "</form>";
                    }
                    
                    echo "<h3>Asked Questions</h3>";
                    $sql = "SELECT * FROM Questions ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            if($UserIs == $row["questionPoster"])
                            {
                                echo "<div>";
                                echo "<div id=\"questionTitleLink\">";
                                echo "<a href=\"QuestionView.php?id=". $row["id"]."\">";
                                echo "<h5>".$row["questionTitle"]."</h5>"."</a>";
                                echo "</div>";
                            }
                        }
                    }
                    else {
                        echo "<div>";
                        echo "<h5>";
                        echo "0 Results Found";
                        echo "</h5>";
                        echo "</div>";
                    }

                    mysqli_close($conn);
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