<?php
include ("Connect.php");
include ("questions.php");

echo "Getting Parameter that was stored via session". " | ";
//echo "<p>This is the ID: " .$_SESSION["CurrentRow"]. "</p>" . " | ";

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbName = "QuestionAnswer";
            
            $conn = mysqli_connect($servername, $username, $password, $dbName);
 
$url=$_GET['url'];
$parts = Explode('=',$url);
$part = $parts[5];

echo " | " .$parts[0]. " | ";
echo " | " .$parts[1]. " | ";
echo " | " .$parts[2]. " | ";
echo " | " .$parts[3]. " | ";
echo " | " .$parts[4]. " | ";
echo " | " .$parts[5]. " | ";
echo " | " .$parts[6]. " | ";
echo " | " .$parts[7]. " | ";




/*
$id = intval($_GET['id']);
echo $id;

$result = mysql_query("DELETE FROM Questions WHERE id=$id")
        or die(mysql_error());

    if (mysqli_query($conn,$result)) {
                echo "Deleting Question successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }
            mysqli_close($conn);
*/

            
//header("Location: ../questions.php");
?>

