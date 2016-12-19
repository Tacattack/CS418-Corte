<?php
//require_once("redirected.php");
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
            <h1>This is a help page for people who struggle without it</h1>
            <p>This is a list of Q&A's to help you out</p>
            <ol type="1">
                <li>How do I log in?
                    <ol type="A"><li>Go to the top of the page, put in your username and password, then click log in</li></ol>
                </li>
                <li>I'm not able to log in. What's going on?
                    <ol type="A"><li>Are you registered?</li></ol>
                </li>
                <li>How do I register?
                    <ol type="A"><li>Click the register button then figure it out</li></ol>
                </li>
                <li>How do I post a question?
                    <ol type="A"><li>Click the Ask Questions tab in the navigation bar. Make sure you are logged in</li></ol>
                </li>
                <li>How do I post a reply
                    <ol type="A"><li>Click a questions, make your logged in, fill out the box then hit submit</li></ol>
                </li>
                <li>Can I look at posted questions?
                    <ol type="A"><li>Yeah</li></ol>
                </li>
                <li>Can I search questions?
                    <ol type="A"><li>Still working on fixing that but soon yes</li></ol>
                </li>
                <li>Can I search users?
                    <ol type="A"><li>Soon yes</li></ol>
                </li>
                <li>Why can't I delete a user?
                    <ol type="A"><li>Because you aren't special and will not receive privileges like that without approval</li></ol>
                </li>
            </ol>
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