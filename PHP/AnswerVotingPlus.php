<?php
include("Connect.php");
$AID = intval($_GET['a']);
$QID = intval($_GET['q']);
                    
$AnswerScoreAdd = 0;

$sqlAdd = "SELECT * FROM Answers WHERE AnswerID='".$AID."' AND questionID='".$QID."'";
$resultAdd = mysqli_query($conn, $sqlAdd);
if (mysqli_num_rows($resultAdd) > 0)
{
    while ($rowAdd = mysqli_fetch_assoc($resultAdd))
    {
        $AnswerScoreAdd = $rowAdd["answerScore"];
    }
}

$AnswerScoreAdd = $AnswerScoreAdd + 1;

$sqlUpdateAdd = "UPDATE Answers SET answerScore='".$AnswerScoreAdd."' WHERE AnswerID='".$AID."'";

if (mysqli_query($conn, $sqlUpdateAdd))
{
    //echo "ANSWER PLUS UPDATE : ".$sqlUpdateAdd."<br>";
    header("Location:QuestionView.php?id=".$QID);
}
else
{
    echo "Error: " . $sqlUpdateAdd . "<br>" . mysqli_error($conn);
}