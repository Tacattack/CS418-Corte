<?php
include ("Connect.php");
include ("questions.php");

$id = $_GET['id'];
echo "This is the ID: " . $id;
mysql_query("DELETE from purchase WHERE id='$id'");

header("Location: ../questions.php");
?>

