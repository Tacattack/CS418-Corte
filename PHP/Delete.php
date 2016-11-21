<?php
include ("Connect.php");
include ("questions.php");

$id = $_GET['id'];
echo "<p>This is the ID: " . $id . "</p>";
echo 
mysql_query("DELETE from purchase WHERE id='$id'");

header("Location: ../questions.php");
?>

