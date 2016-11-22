<?php
include ("Connect.php");
include ("questions.php");

$status = intval($_GET['freeze']);
$id = intval($_GET["delete"]);

$result = "UPDATE Questions SET questionFrozen = $status WHERE id=$id";
$sqlresult = mysqli_query($conn,$result);
            
//header("Location: ../questions.php");

?>
