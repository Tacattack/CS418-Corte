<?php
include ("Connect.php");
include ("questions.php");

$id = intval($_GET['Like']);
$QID = intval($_GET['$questionID']);

$result = "SELECT FROM Answers WHERE id=$id";
$sqlresult = mysqli_query($conn,$result);

if (mysqli_num_rows($sqlresult) > 0)
{
    while ($row = mysqli_fetch_assoc($sqlresult))
    {
        $row["bestAnswer"] = 1;
    }
}

header("Location: ../QuestionView.php?id=".$QID);
