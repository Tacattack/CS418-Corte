<?php
include ("Connect.php");
include ("questions.php");

//$result = $_GET['id'];
echo "<p>This is the ID: " . $result . "</p>";
mysql_query("DELETE FROM Questions WHERE id='$result'");

//header("Location: ../questions.php");
?>

