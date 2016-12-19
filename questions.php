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
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <br /><a href="register.html">Need an account? Register Here</a>
          </form>
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
        <div class="col-md-8">
          <?php
            $sql = "SELECT * FROM Questions ORDER BY id DESC";                      
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                        if($_SESSION["USERLEVEL"] == 1)
                        {
                        $_SESSION["CurrentRow"] = $row["id"];
                        $_SESSION["CurrentFreeze"] = $row["questionFrozen"];
                        $test=$row["questionFrozen"];
                        $test2=$row["id"];
                           echo "<table style=\"width:100%\">";
                           echo "<tr>"."<div>";
                            echo "<td>"."<div id=\"questionScore\">";

                            echo "<h5>".$row["questionScore"]."</h5>";
                            echo "</div></td>";

                            echo "<td>"."<div id=\"questionTitleLink\">";
                            echo "<a href=\"QuestionView.php?id=".$row["id"]."\">";
                            echo "<h5>".$row["questionTitle"]."</h5>"."</a>";
                            echo "</div>"."</td>";  
                            echo "<td>"."<div id=\"questionDelete\">";
                            echo "<h5><form id=\"delete\" action=\"PHP/Delete.php?=".$row["id"]." method=\"post\">"."<button form=\"delete\" name=\"deletes\" type=\"submit\" value=".$row["id"].">Delete</button>"."</form></h5></td>";
                            echo "<td>"."Freeze Status:";
                            if($test == 1)
                            {
                                echo "Frozen";
                            }
                            else if($test == 0)
                            {
                                echo "Not Frozen";
                            }
                        $test3 = "frozen=" . "$test" . "&" . "id=" . $test2;
                            echo "<form id=\"freeze\""."action=\"PHP/Freezing.php?=".$test3."method=\"post\">"."<button form=\"freeze\" name=\"freeze\" type=\"submit\" value=".$test.">Freeze</button></div>"."</form>";
                            echo "</td>"."</tr>";
                        echo "</div>"; 
                        echo "</table>";
                        }
                        else
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
        </div>
          <div class="col-md-4">
              
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