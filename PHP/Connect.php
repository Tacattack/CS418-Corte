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
            $sqlDB = "CREATE IF NOT EXISTS DATABASE QuestionAnswer";
            if (mysqli_query($conn, $sqlDB)) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . mysqli_error($conn);
            }
            
            mysqli_close($conn);
            
            $servernameT = "localhost";
            $usernameT = "root";
            $passwordT = "";
            $dbNameT = "QuestionAnswer";

            // Create connection
            $connT = mysqli_connect($servernameT, $usernameT, $passwordT, $dbNameT);

            // Check connection
            if (!$connT) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            //Create Table used for questions and answers
            $sql = "CREATE TABLE IF NOT EXISTS Questions (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            questionTitle CHAR(250) NOT NULL,
            questionBody CHAR(250) NOT NULL
            )";

            if (mysqli_query($connT, $sql)) {
                echo "Table QuestionAnswer created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }
            mysqli_close($conn);
?>

