<?php
session_start();
include ("Connect.php");
include ("questions.php");

//$result = $_GET['id'];
echo "<p>This is the ID: " . $_SESSION["CurrentRow"]. "</p>";
$result =$_SESSION["CurrentRow"];
mysql_query("DELETE FROM Questions WHERE id='$result'");

//header("Location: ../questions.php");
?>

