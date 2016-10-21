<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "QuestionAnswer";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$QuestionTitle = $_POST['QTitle'];
$QuestionBody = $_POST['QBody'];

$QuestionTitle = mysqli_real_escape_string($QuestionTitle);
$QuestionBody = mysqli_real_escape_string($QuestionBody);

$sql = "INSERT INTO Questions (questionTitle, questionBody)
    VALUES('$QuestionTitle', '$QuestionBody')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

