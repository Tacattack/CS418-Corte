<?php
session_start();

    if (isset($_SESSION["USER"]))
    {
        if($_SESSION["USERLEVEL"] == 1)
            {
                require_once("PHP/Connect.php");
            }
    }
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
        <p>
            <a class="btn btn-primary btn-lg" href="questions.php" role="button">View Questions &raquo;</a>
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
            if (isset($_SESSION["USER"]))
            {
                if($_SESSION["USERLEVEL"] == 1)
                    {
                        echo "<form class=\"FormLogin navbar-form\" action=\"\" method=\"post\">";
                        echo "<b style=\"color:white;\">Search Users:</b>";
                        echo "<div id=\"form-group\">";
                        echo "<input type=\"text\" name=\"userSearch\" placeholder=\"Search Users\" id=\"form-control\" onkeyup=\"showHint(this.value)\">";
                        echo "</div>";
                        echo "&nbsp&nbsp&nbsp";
                        echo "<input type=\"submit\" class=\"btn btn-success\" name=\"submit\" value=\"Search\">";
                        echo "</form>";
                    
                    
                        echo "<table class=\"table table-bordered table-striped\">";  
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th colspan='2'><center><h1>ADMINS</h1><center></th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td><h3>User</h3></td>";
                        echo "<td><h3>Options</h3></td>";
                        echo "</tr>";

                        $sql = "SELECT * FROM UserProfile WHERE level='1' ORDER BY username ASC";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0)
                        {
                           while ($row = mysqli_fetch_assoc($result))
                           {
                               echo "<tr><td>";
                               echo "<a href=\"profile.php?id=".$row["id"]."\">".$row["username"]."</a>";
                               echo "</td>";
                               echo "<td>";
                               echo "<form>";
                               echo '<input type="hidden" name="UID" value="'.$row["id"].'">';
                               echo "<input type=\"submit\" name=\"removeAdmin\"class=\"btn btn-danger\" value=\"Remove Admin\"></form>";
                               echo "</td></tr>";
                           }
                        }
                        echo "</tbody>";
                        echo "</table>";
                    
                        echo "<table class=\"table table-bordered table-striped\">";  
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th colspan='2'><center><h1>PLEBS</h1><center></th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td><h3>User</h3></td>";
                        echo "<td><h3>Options</h3></td>";
                        echo "</tr>";

                        $sqlp = "SELECT * FROM UserProfile WHERE level='0' ORDER BY username ASC";
                        $resultp = mysqli_query($conn, $sqlp);
                        
                        if (mysqli_num_rows($resultp) > 0)
                        {
                           while ($row = mysqli_fetch_assoc($resultp))
                           {
                               echo "<tr><td>";
                               echo "<a href=\"profile.php?id=".$row["id"]."\">".$row["username"]."</a>";
                               echo "</td>";
                               echo "<td>";
                               echo "<form>";
                               echo '<input type="hidden" name="UID" value="'.$row["id"].'">';
                               echo "<input type=\"submit\" name=\"makeAdmin\"class=\"btn btn-danger\" value=\"Make Admin\"></form>";
                               echo "</td></tr>";
                           }
                        }
                        echo "</tbody>";
                        echo "</table>";
                        
                        if (isset($_POST["makeAdmin"]))
                        {
                            $UID = $_REQUEST["UID"];
                            echo "UID: " .$UID."<br>";
                            $sqlUpdate = "UPDATE Answers SET level='1' WHERE id='".$UID."'";
                            echo "updating: " .$sqlUpdate."<br>";
                            
                            if (mysqli_query($conn, $sqlUpdate))
                                {
                                    //header("Location: users.php");
                                }
                                else
                                {echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);}
                        }
                        
                        if (isset($_POST["removeAdmin"]))
                        {
                            $UID = $_REQUEST["UID"];
                            echo "UID: " .$UID."<br>";
                            $sqlUpdate = "UPDATE Answers SET level='0' WHERE id='".$UID."'";
                            echo "updating: " .$sqlUpdate."<br>";
                            
                            if (mysqli_query($conn, $sqlUpdate))
                                {
                                    //header("Location: users.php");
                                }
                                else
                                {echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);}
                        }
                        
                        mysqli_close($conn);
                    }
                    else
                    {
                        echo "ACCESS RESTRICTED. YOU DO NOT HAVE ADMIN RIGHTS";
                        die();
                    }
            }
            else
            {
                echo "ACCESS RESTRICTED. PLEASE LOGIN AND TRY AGAIN";
                die();
            }
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
    <script>
    function showHint(str)
    {
        var xhttp;
        
        if (str.length == 0)
        {
            document.getElementById("form-group").innerhtml = str;
            document.getElementById("form-group").style.border="0px";
            return;
        }
        else
        {
         xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function()
         {
             if(this.readyState == 4 && this.status == 200)
             {
             document.getElementById("form-group").innerHTML = this.responseText;
             document.getElementById("form-group").style.border="1px solid #A5ACB2";
             }
         }
        };
        xhttp.open("GET","PHP/getuser.php?q=" + str,true);
        xhttp.send();
    }
    </script>
  </body>
</html>