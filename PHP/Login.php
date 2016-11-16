<?php
    include ("Connect.php");
    
    $USRNM = $_POST('username');
    $PSSWRD = $_POST('password');
    
    //Protecting username from MYSQL injection
    $USRNM = stripslashes($USRNM);
    $USRNM = mysqli_real_escape_string($USRNM);
    
    //Protecting password from MYSL injection
    $PSSWRD = stripslashes($PSSWRD);
    $PSSWRD = mysqli_real_escape_string($PSSWRD);
    
    //comparing username and password to database
    $sqlLogin = "SELECT * FROM UserProfile WHERE username='$USRNM' and password='$PSSWRD'";
    $resultLogin = mysqli_query($sqlLogin);
    
    //Couting the table row
    $count = mysqli_num_rows($result);
    
    //if $result matched username and password, table row must be 1
    if ($count == 1)
    {
        //Register the username and password then redirect it to the profile page
        session_register("USRNM");
        session_register("PSSWRD");
        header("location: ../profile.php");
    }
    else
    {
        echo "Wrong username and password";
    }
?>

