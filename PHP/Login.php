<?php
    echo "I run before the connection";
    include("Connect.php");
    echo "I run after the connection";
    
    echo $host;
    echo $user;
    echo $psswrd;
    echo $db;
    
    echo "The username is: ".$_POST('LoginUsername');
    echo "The password is: ".$_POST('LoginPassword');

    $USRNM = $_POST('LoginUsername');
    $PSSWRD = $_POST('LoginPassword');

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
    $sqlLogin = "SELECT * FROM UserProfile WHERE username='".$USRNM."' AND password='".$PSSWRD."' LIMIT 1";
    $resultLogin = mysqli_query($conn, $sqlLogin);
    echo "query created";
    //if $result matched username and password, table row must be 1
    if (mysqli_num_rows($resultLogin) == 1)
    {
        //Register the username and password then redirect it to the profile page
        echo "You have successfully logged in";
        exit();
    }
    else
    {
        echo "Wrong username and password";
        exit();
    }
    
    echo "I either skipped the if or completed it no probs";
?>

