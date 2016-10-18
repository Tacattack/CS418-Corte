<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbName = "QuestionAnswer";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbName);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            //Create Table used for questions and answers
            $sql = "CREATE TABLE IF NOT EXISTS Questions (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            questionTitle CHAR(250) NOT NULL,
            questionBody CHAR(250) NOT NULL
            )";

            if (mysqli_query($conn, $sql)) {
                echo "Table QuestionAnswer created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }
            mysqli_close($conn);
?>
