<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    //Create the database
    $sql = "CREATE DATABASE IF NOT EXISTS myDB";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully";
    }else{
        echo "Error creating database: " . mysqli_error($conn);
        die("Connection failed: " . mysqli_connect_error());
    }
}

//Create Table used for questions and answers
$sql = "CREATE TABLE IF NOT EXISTS Question (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
questionTitle NOT NULL,
questionBody NOT NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table QuestionAnswer created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

