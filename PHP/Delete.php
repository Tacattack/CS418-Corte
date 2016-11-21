<?php
include ("Connect.php");
include ("questions.php");

$id = $_GET['id'];
mysql_query("DELETE from purchase WHERE id='$id'");

header("Location: ../questions.php");
?>

