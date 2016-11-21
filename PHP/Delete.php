<?php
session_start();
include ("Connect.php");
include ("questions.php");

//$result = $_GET['id'];
echo "<p>This is the ID: " . $_SESSION["CurrentRow"]. "</p>";
$results =$_SESSION["CurrentRow"];
//mysql_query("DELETE FROM Questions WHERE id='$results'");

header("Location: ../questions.php");
?>

