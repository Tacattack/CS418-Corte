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
                        echo "<b style=\"color:white;\">Welcome: <a href=\"profile.php?id=".$_SESSION["USERID"]."\">".$_SESSION["USER"]."</a></b>";
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

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
                $questionID = (isset($_GET["id"]) && trim($_GET["id"]) == 'QuestionView.php') ? trim($_GET["id"]) : '';
                $sql = "SELECT * FROM Questions WHERE id='".$_GET["id"] . "'";
                $sqlU = "SELECT * FROM UserProfile";
                $result = mysqli_query($conn, $sql);
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
                        echo "<hr>";
                        echo "<div class=\"col-xs-4 col-sm-4 col-md-4 tags\">";
                        echo "<p>".$row["tagOne"]."   ".$row["tagTwo"]."   ".$row["tagThree"]."</p>";
                        echo "</div>";
                                                    
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
                        echo "<div>";
                        echo "<form method=\"post\">";
                        echo $row["questionScore"];
                        echo "<input type=\"submit\" class=\"btn btn-success\" name=\"PlusOne\" value=\"+1\">";
                        echo "<input type=\"submit\" class=\"btn btn-danger\" name=\"MinusOne\" value=\"-1\">";
                        echo "</form>";
                        echo "<hr>";
                        echo "</div>";
                        
                        if (isset($_POST["PlusOne"]))
                        {
                            $sqlPlus = "SELECT * FROM Questions WHERE id='".$_GET["id"] . "'";
                            $resultPlus = mysqli_query($conn, $sqlPlus);
                            $QuestionIDTemp = $_GET["id"];
                            $questionScore = 0;
                            echo "question score Originial: ".$questionScore;
                            if (mysqli_num_rows($resultPlus) > 0)
                            {
                                while ($rowPlus = mysqli_fetch_assoc($resultPlus))
                                {
                                    $questionScore = $rowPlus["questionScore"];
                                }
                            }
                            echo "question score After Loading: ".$questionScore;
                            $questionScore = $questionScore + 1;
                            echo "question score Before Update: ".$questionScore;
                            $sqlUpdate = "UPDATE Questions SET questionScore='".questionScore."' WHERE id='".$QuestionIDTemp."'";

                            if (mysqli_query($conn, $sqlUpdate)) {
                                echo "Score Updated";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        }
                        
                        if (isset($_POST["MinusOne"]))
                        {
                            $sqlPlus = "SELECT * FROM Questions WHERE id='".$_GET["id"] . "'";
                            $resultPlus = mysqli_query($conn, $sqlPlus);
                            $QuestionIDTemp = $_GET["id"];
                            $questionScore = 0;
                            
                            if (mysqli_num_rows($resultPlus) > 0)
                            {
                                while ($rowPlus = mysqli_fetch_assoc($resultPlus))
                                {
                                    $questionScore = $rowPlus["questionScore"];
                                }
                            }
                            
                            $questionScore = $questionScore - 1;
                            
                            $sqlUpdate = "UPDATE Questions SET questionScore='".questionScore."' WHERE id='".$QuestionIDTemp."'";

                            if (mysqli_query($conn, $sqlUpdate)) {
                                echo "Score Updated";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        }
                        ?>
                        <?php
                        echo "<div id=\"Answers\">";
                        echo "<h3>Answers</h3>";
                        echo "<ul>";
                        
                        $sqlA = "SELECT * FROM Answers WHERE questionID='".$_GET["id"]."' ORDER BY answerScore DESC";
                        $sqlU = "SELECT * FROM UserProfile";
                        $resultA = mysqli_query($conn, $sqlA);
                        $resultU = mysqli_query($conn, $sqlU);
                        
                        while ($rowA = mysqli_fetch_array($resultA)) {
                            if (mysqli_num_rows($resultA) > 0) {
                                while ($rowA = mysqli_fetch_assoc($resultA)) {
                                        echo "<div class=\"col-md-8\"><table>";
                                        echo "<tr><td>" . $rowA["answerBody"] . "</td></tr>";
                                        echo "<tr><td> posted by: " . $rowA["answerPoster"] . "</td></tr>";
                                        echo "</table><hr></div>";
                                    }
                                }
                            }
                        }
                        echo "<br />";
                    }
                echo "</ul>";

                if (isset($_SESSION["USER"]))
                {
                    echo "<form method=\"post\" action=\"\">";
                    echo "<textarea rows=\"30\" name=\"ABody\" style=\"width: 600px; height: 50px;\"></textarea>";
                    echo "<input type=\"submit\" name=\"submit\" value=\"Submit Answer\" style=\"margin: 20px 50px; float: right\"/>";
                    echo "</form>";

                    if (isset($_POST["submit"]))
                    {
                        $AnswerID = $_GET["id"];
                        $AnswerBody = addslashes($_POST['ABody']);

                        $AnswerCreate = "INSERT INTO Answers (questionID, answerBody, answerPoster)
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

