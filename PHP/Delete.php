<?php
echo "Session Starting" . " | ";
session_start();

echo "Including files". " | ";
include ("Connect.php");
include ("questions.php");

echo "Getting Parameter that was stored via session". " | ";
//$result = $_GET['id'];
$results =$_SESSION["CurrentRow"];
echo "<p>This is the ID: " .$_SESSION["CurrentRow"]. "</p>" . " | ";
//mysql_query("DELETE FROM Questions WHERE id='$results'");

//header("Location: ../questions.php");
?>

