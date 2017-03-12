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
    	</p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Previous Questions</h2>
          <?php
            $sql = "SELECT * FROM Questions ORDER BY id DESC LIMIT 5";
            $sqlU = "SELECT * FROM UserProfile";
            $result = mysqli_query($conn, $sql);
            $resultU = mysqli_query($conn, $sqlU);
            
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<div class=\"row\">";
                        echo "<div class=\"col-xs-12 col-sm-12\">";
                            echo "<div class=\"row\">";
                                echo "<div class=\"col-xs-2 col-sm-2 col-md-2\">";
                                    echo "<div class=\"votes\">";
                                        echo "<div>";
                                            echo "<h5>" . $row["questionScore"] . "</h5>";
                                        echo "</div>";
                                        echo "<div>";
                                            echo "votes";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class=\"col-xs-10 col-sm-10 col-md-10 QuestionSummary\">";
                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-xs-12 col-sm-12 col-md-12\">";
                                            echo "<a href=\"QuestionView.php?id=" . $row["id"]. "\"><h4>" . $row["questionTitle"] . "</h4>" . "</a>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-xs-6 col-sm-6 col-md-6 tags\">";
                                            echo "<a href=\"#\">TAGS</a>";
                                        echo "</div>";
                                        echo "<div class=\"col-xs-6 col-sm-6 col-md-6 poster\">";
                                            echo "<p>Posted by: ";
                                                while ($rowU = mysqli_fetch_assoc($resultU))
                                                {
                                                    if ($row["questionPoster"] == $rowU["username"])
                                                    {
                                                        echo "<a href=\"profile.php?id=".$rowU["id"]."\">";
                                                        echo $row["questionPoster"]."</a></p>";
                                                    }
                                                }
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<hr>";
                }
            }else {
                echo "<div class=\"row\">";
                        echo "<div class=\"col-xs-6 col-sm-6\">";
                            echo "<h5>";
                                echo "0 Results Found";
                            echo "</h5>";
                        echo "</div>";
                echo "</div>";
            }
        ?>
        </div>
        <div class="col-md-6">
          <h2>Top Questions</h2>
          <?php
            $sqlT = "SELECT * FROM Questions ORDER BY questionScore DESC LIMIT 5";
            $sqlTU = "SELECT * FROM UserProfile";
            $resultT = mysqli_query($conn, $sqlT);
            $resultTU = mysqli_query($conn, $sqlTU);
            
            if (mysqli_num_rows($resultT) > 0)
            {
                while ($rowT = mysqli_fetch_assoc($resultT))
                {
                    echo "<div class=\"row\">";
                        echo "<div class=\"col-xs-12 col-sm-12\">";
                            echo "<div class=\"row\">";
                                echo "<div class=\"col-xs-2 col-sm-2 col-md-2\">";
                                    echo "<div class=\"votes\">";
                                        echo "<div>";
                                            echo "<h5>" . $rowT["questionScore"] . "</h5>";
                                        echo "</div>";
                                        echo "<div>";
                                            echo "votes";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class=\"col-xs-10 col-sm-10 col-md-10 QuestionSummary\">";
                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-xs-12 col-sm-12 col-md-12\">";
                                            echo "<a href=\"QuestionView.php?id=" . $rowT["id"]. "\"><h4>" . $rowT["questionTitle"] . "</h4>" . "</a>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-xs-6 col-sm-6 col-md-6 tags\">";
                                            echo "<a href=\"#\">TAGS</a>";
                                        echo "</div>";
                                        echo "<div class=\"col-xs-6 col-sm-6 col-md-6 poster\">";
                                            echo "<p>Posted by: ";
                                            if (mysqli_num_rows($resultTU) > 0)
                                            {
                                                while ($rowTU = mysqli_fetch_assoc($resultTU))
                                                {
                                                    if ($rowT["questionPoster"] == $rowTU["username"])
                                                    {
                                                        echo "<a href=\"profile.php?id=".$rowTU["id"]."\">";
                                                    }
                                                }
                                            }
                                            echo $rowT["questionPoster"]."</a></p>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<hr>";
                }
            }else {
                echo "<div class=\"row\">";
                        echo "<div class=\"col-xs-6 col-sm-6\">";
                            echo "<h5>";
                                echo "0 Results Found";
                            echo "</h5>";
                        echo "</div>";
                echo "</div>";
            }

            mysqli_close($conn);
        ?>
        </div>
      </div>

      <hr>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrapDist/dist/js/bootstrap.min.js"></script>
  </body>
</html>