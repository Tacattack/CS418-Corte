<?php
include ("Connect.php");
include ("questions.php");

$id = intval($_GET['deletes']);

$result = "DELETE FROM Questions WHERE id=$id";
$sqlresult = mysqli_query($conn,$result);
            
header("Location: ../questions.php");
?>

