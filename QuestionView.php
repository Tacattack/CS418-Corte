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
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <?php
                $questionID = (isset($_GET["id"]) && trim($_GET["id"]) == 'QuestionView.php') ? trim($_GET["id"]) : '';
                $sql = "SELECT * FROM Questions WHERE id='".$_GET["id"] . "'";
                $sqlA = "SELECT * FROM Answers WHERE questionID='".$_GET["id"]."' ORDER BY answerScore DESC LIMIT 5";
                $sqlU = "SELECT * FROM UserProfile";
                $result = mysqli_query($conn, $sql);
                $resultA = mysqli_query($conn, $sqlA);
                $resultU = mysqli_query($conn, $sqlU);


                if (mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<div id=\"QuestionTitle\">";
                        echo "<h1>" . $row["questionTitle"] . "</h1>";
                        echo "</div>";

                        echo "<div id=\"QuestionBody\">";
                        echo "<p>";
                        echo $row["questionBody"];
                        echo "</p>";

                        echo "Posted By: ";
                        if (mysqli_num_rows($resultU) > 0)
                        {
                            while ($rowU = mysqli_fetch_assoc($resultU))
                            {
                                if ($row["questionPoster"] == $rowU["username"])
                                {
                                    echo "<a href=\"profile.php?id=".$rowU["id"]."\">";
                                }
                            }
                        }
                        echo $row["questionPoster"]."</a>";
                        echo "</div>";

                        echo "<div id=\"Answers\">";
                        echo "<h3>Answers</h3>";
                        echo "<ul>";
                        while ($rowA = mysqli_fetch_array($resultA)) {
                            if (mysqli_num_rows($resultA) > 0) {
                                while ($rowA = mysqli_fetch_assoc($resultA)) {
                                    if (isset($_SESSION["USER"])) {
                                        if ($_SESSION["USER"] == $row["questionPoster"])
                                        {

                                            if ($rowA["bestAnswer"] == 1)
                                            {
                                                echo "<li><table>";
                                                echo "<tr style=\"background:green;\"><td>" . $rowA["answerBody"] . "</td></tr>";
                                                echo "<tr><td>" . $rowA["answerScore"]. "</td><td> posted by: " . $rowA["answerPoster"] . "</td></tr>";
                                            }
                                            else
                                            {
                                                //Answer ID
                                                $AID= $rowA["AnswerID"];
                                                //Question ID
                                                $ID= $row["id"];
                                                echo "<li><form id=\"BestAnswer\" action=\"PHP/Like.php\" method=\"post\"><table>";
                                                echo "<tr><td><button form=\"BestAnswer\" type=\"submit\" name=\"Like\" value=".$AID.">I Like</button></td><td>" . $rowA["answerBody"] . "</td></tr>";
                                                echo "<tr><td><form id=\"BestAnswer\" action=\"PHP/Like.php\" method=\"post\">"
                                                . "<input type=\"submit\" name=\"upVote\" value=\"+\">&nbsp" . $rowA["answerScore"] . "&nbsp<input type=\"submit\" name=\"downVote\" value=\"-\">"
                                                . "</td><td> posted by: " . $rowA["answerPoster"] . "</td></tr>";   
                                            }
                                        }
                                        else
                                        {
                                            echo "<li><form action=\"\" method=\"post\"><table>";
                                            echo "<tr><td>" . $rowA["answerBody"] . "</td></tr>";
                                            echo "<tr><td><input type=\"submit\" name=\"upVote\" value=\"+\">&nbsp" . $rowA["answerScore"] . "&nbsp<input type=\"submit\" name=\"downVote\" value=\"-\">"
                                            . "</td><td> posted by: " . $rowA["answerPoster"] . "</td></tr>";
                                        }
                                        echo "</table></form></li>";
                                    } else {
                                        echo "<li><form><table>";
                                        echo "<tr><td>" . $rowA["answerScore"] . "</td><td>" . $rowA["answerBody"] . "</td></tr>";
                                        echo "<tr><td> posted by: " . $rowA["answerPoster"] . "</td></tr>";
                                        echo "</table></form></li>";
                                    }
                                }
                            }
                        }
                    }
                    echo "<br />";
                }
                echo "</ul>";

                if (isset($_SESSION["USER"]))
                {
                    echo "<form method=\"post\">";
                    echo "<textarea rows=\"30\" name=\"ABody\" style=\"width: 600px; height: 50px;\"></textarea>";
                    echo "<input type=\"submit\" name=\"submit\" value=\"Submit Answer\" style=\"margin: 20px 50px; float: right\"/>";
                    echo "</form>";

                    if (isset($_POST["submit"]))
                    {
                        $AnswerID = $_GET["id"];
                        $AnswerBody = addslashes($_POST['ABody']);

                        $AnswerCreate = "INSERT INTO Answers (questionID,answerBody, answerPoster)
                        VALUES('{$AnswerID}', '{$AnswerBody}', '{$_SESSION["USER"]}')";

                        if (mysqli_query($conn, $AnswerCreate)) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }

                        $QuestionReload = "SELECT * FROM Questions";
                        $QuestionReloadResult = mysqli_query($conn, $QuestionReload);

                        if (mysqli_num_rows($QuestionReloadResult) > 0)
                        {
                            while ($Qrow = mysqli_fetch_assoc($QuestionReloadResult))
                            {
                                if ($_GET["id"] == $Qrow["id"])
                                {
                                    header("Location: QuestionView.php?id=".$Qrow["id"]);
                                    die(); 
                                }
                            }
                        }
                    }
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

