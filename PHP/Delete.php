<?php
include ("Connect.php");
include ("questions.php");

echo "Getting Parameter that was stored via session". " | ";
//echo "<p>This is the ID: " .$_SESSION["CurrentRow"]. "</p>" . " | ";




if (isset($_GET['id']) && is_numeric($_GET['id']))
    $id = $_GET['id'];
$result = mysql_query("DELETE FROM Questions WHERE id=$id")
        or die(mysql_error());

header("Location: ../questions.php");
?>

