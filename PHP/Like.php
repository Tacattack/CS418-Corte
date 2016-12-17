<?php
include ("Connect.php");
include ("questions.php");

echo "Starting of the like process" . " | ";

$answerID = $_POST['$AID'];
$QuestionID = $_POST['$ID'];

echo "ID Value: " . $answerID . " | ";
echo "QID Value: " . $QuestionID . " | ";

$result = "SELECT FROM Answers WHERE id=$answerID";
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

//header("Location: ../QuestionView.php?id=".$QuestionID);
?>