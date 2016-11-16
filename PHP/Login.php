<?php
    echo "I run before the include";
    include ("Connect.php");
    echo "I run after the include";
    
    $USRNM = $_POST('username');
    $PSSWRD = $_POST('password');
    
    echo $USRNM;
    echo $PSSWRD;
    
    //Protecting username from MYSQL injection
    $USRNM = stripslashes($USRNM);
    $USRNM = mysqli_real_escape_string($USRNM);
    echo "username protected";
    //Protecting password from MYSL injection
    $PSSWRD = stripslashes($PSSWRD);
    $PSSWRD = mysqli_real_escape_string($PSSWRD);
    echo "password protected";
    //comparing username and password to database
    $sqlLogin = "SELECT * FROM UserProfile WHERE username='$USRNM' and password='$PSSWRD'";
    $resultLogin = mysqli_query($sqlLogin);
    echo "query created";
    //Couting the table row
    $count = mysqli_num_rows($result);
    echo $count;
    //if $result matched username and password, table row must be 1
    if ($count == 1)
    {
        echo "Count == 1";
        //Register the username and password then redirect it to the profile page
        session_register("USRNM");
        session_register("PSSWRD");
        header("location: profile.php");
    }
    else
    {
        echo "Wrong username and password";
    }
    
    echo "I either skipped the if or completed it no probs";
?>

