<?php
include ("Connect.php");
include ("questions.php");

echo "Starting of the like process" . " | ";

$id = $_POST['Like'];
$QID = $_POST['$questionID'];

echo "ID Value: " . $id . " | ";
echo "QID Value: " . $QID . " | ";

$result = "SELECT FROM Answers WHERE id=$id";
$sqlresult = mysqli_query($conn,$result);

echo "Entering Result in DB " . " | ";
if (mysqli_num_rows($sqlresult) > 0)
{
    while ($row = mysqli_fetch_assoc($sqlresult))
    {
        $row["bestAnswer"] = 1;
        echo "Result entered in DB" . " | ";
    }
}

//header("Location: ../QuestionView.php?id=".$QID);
?>