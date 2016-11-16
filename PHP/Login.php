<?php
    echo "I run before the include \n";
    include ("Connect.php");
    echo "I run after the include \n";
    
    echo $dbName. "\n";
    echo "The username is: ".$_POST('username')."\n";
    echo "The password is: ".$_POST('password')."\n";
    $USRNM = $_POST('username');
    $PSSWRD = $_POST('password');
    
    echo $USRNM."\n";
    echo $PSSWRD."\n";
    
    //Protecting username from MYSQL injection
    $USRNM = stripslashes($USRNM);
    $USRNM = mysqli_real_escape_string($USRNM);
    echo "username protected \n";
    //Protecting password from MYSL injection
    $PSSWRD = stripslashes($PSSWRD);
    $PSSWRD = mysqli_real_escape_string($PSSWRD);
    echo "password protected \n";
    //comparing username and password to database
    $sqlLogin = "SELECT * FROM UserProfile WHERE username='$USRNM' and password='$PSSWRD'";
    $resultLogin = mysqli_query($sqlLogin);
    echo "query created \n";
    //Couting the table row
    $count = mysqli_num_rows($result);
    echo $count;
    //if $result matched username and password, table row must be 1
    if ($count == 1)
    {
        echo "Count == 1 \n";
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

