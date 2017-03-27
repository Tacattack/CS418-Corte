<?php
$q = $_GET['q'];

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
    $sql = "SELECT * FROM UserProfile WHERE username = '". $q ."'";
    $result = mysqli_query($conn,$sql);
    
    while($row = mysqli_fetch_array($result)) {
        echo $row['username'];
    }