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
          <?PHP
                   if (isset($_SESSION["USER"]))
                    {
                        echo "<form class=\"FormLogin\" action=\"PHP/Logout.php\" method=\"post\">";
                        echo "<img src=\"\" style=\"height:35px; width:35px;\">";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<b>Welcome: <a href=\"profile.php?id=\"".$_SESSION["USERID"]."\">".$_SESSION["USER"]."</a></b>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" name=\"submit\" value=\"Logout\">";
                        echo "</form>";
                    }
                    else
                    {
                        echo "<form class=\"navbar-form navbar-right\" action=\"PHP/Login.php\" method=\"post\">";
                        echo "<div class=\"form-group\">";
                        echo "<input type=\"text\" placeholder=\"Username\" class=\"form-control\">";
                        echo "</div>";
                        echo "<div class=\"form-group\">";
                        echo "<input type=\"password\" placeholder=\"Password\" class=\"form-control\">";
                        echo "</div>";
                        echo "<button type=\"submit\" class=\"btn btn-success\">Sign in</button>";
                        echo "<br /><a href=\"register.html\">Need an account? Register Here</a>";
                        echo "</form>";
                    }
                ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">
        <h1>Admins</h1>
        <div class="row">"
            <div class="col-xs-12 col-sm-12">
                <div class="row">
                    <ol>
        <?php
            $sql = "SELECT * FROM UserProfile WHERE level='1'";
            $result = mysqli_query($conn, $sql);
            
             if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<li>";
                    echo "<a href=\"profile.php?id=".$row["id"]."\">".$row["username"]."</a>";
                    echo "</li>";
                }
            }
        ?>
                    </ol>
                </div>
            </div>
        </div>
        <hr>
                        
        <h1>Plebs</h1>
        <div class="row">"
            <div class="col-xs-12 col-sm-12">
                <div class="row">
                    <ol>
        <?php
            $sql = "SELECT * FROM UserProfile WHERE level='0'";
            $result = mysqli_query($conn, $sql);
            
             if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<li>";
                    echo "<a href=\"profile.php?id=".$row["id"]."\">".$row["username"]."</a>";
                    echo "</li>";
                }
            }
        ?>
                    </ol>
                </div>
            </div>
        </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrapDist/dist/js/bootstrap.min.js"></script>
  </body>
</html>