<?php
$q = $_GET['q'];
$hint = '';

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
            
    $sql = "SELECT username FROM UserProfile ";
    $result = mysqli_query($conn,$sql);
    $array = new sqlArray(mysqli_num_fields($result));
    $i = 0;
    while($row = mysqli_fetch_array($result)) {
     $array[$i] = $row['username'];
    //$a = array_fill(0, mysqli_num_rows($result),$row['username']);
     $i++;
    }
    
    if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($array as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

echo $hint === "" ? "no suggestion" : $hint;