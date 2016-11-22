<?php
include ("Connect.php");
include ("questions.php");

echo "Getting Parameter that was stored via session". " | ";
$id = intval($_GET['deletes']);
echo $id;

$result = "DELETE FROM Questions WHERE id=$id";
$sqlresult = mysqli_query($conn,$result);
            
//header("Location: ../questions.php");
?>

