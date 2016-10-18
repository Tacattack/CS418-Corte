<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    if (!$database){
        //Create the database
        $sql = "CREATE DATABASE myDB";
        if (mysqli_query($conn, $sql)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . mysqli_error($conn);
        }
    }
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);
?>

