<?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Create database
            $sqldb = "CREATE DATABASE myDB";
            if (mysqli_query($conn, $sqldb)) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . mysqli_error($conn);
            }
            
            //Create Table used for questions and answers
            $sql = "CREATE TABLE IF NOT EXISTS Question (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            questionTitle NOT NULL,
            questionBody NOT NULL
            )";

            if (mysqli_query($conn, $sql)) {
                echo "Table QuestionAnswer created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }
            mysqli_close($conn);
?>

