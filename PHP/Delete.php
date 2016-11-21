<?php
include ("Connect.php");
include ("questions.php");

$id = $_GET['id'];
echo "<p>This is the ID: " . $id . "</p>";
mysql_query("DELETE FROM Questions WHERE id='$id'");

//header("Location: ../questions.php");
?>

