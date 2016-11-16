<?php
    echo "I run before the include \r\n";
    include ("Connect.php");
    echo "I run after the include \r\n";
    
    echo $dbName."\r\n";
    

    if (isset($_POST['LoginUsername']))
    {
        echo "The username is: ".$_POST('LoginUsername')."\r\n";
        echo "The password is: ".$_POST('LoginPassword')."\r\n";
        
        $USRNM = $_POST('LoginUsername');
        $PSSWRD = $_POST('LoginPassword');
        
        echo $USRNM."\r\n";
        echo $PSSWRD."\r\n";
        
        //Protecting username from MYSQL injection
        $USRNM = stripslashes($USRNM);
        $USRNM = mysqli_real_escape_string($USRNM);
        echo "username protected \r\n";
        //Protecting password from MYSL injection
        $PSSWRD = stripslashes($PSSWRD);
        $PSSWRD = mysqli_real_escape_string($PSSWRD);
        echo "password protected \r\n";
        //comparing username and password to database
        $sqlLogin = "SELECT * FROM UserProfile WHERE username='".$USRNM."' AND password='".$PSSWRD."' LIMIT 1";
        $resultLogin = mysqli_query($sqlLogin);
        echo "query created \r\n";
        //Couting the table row
        $count = mysqli_num_rows($result);
        echo $count;
        //if $result matched username and password, table row must be 1
        if ($count == 1)
        {
            echo "Count == 1 \r\n";
            //Register the username and password then redirect it to the profile page
            session_register("USRNM");
            session_register("PSSWRD");
            header("location: profile.php");
        }
        else
        {
            echo "Wrong username and password";
        }
    }
    
    echo "I either skipped the if or completed it no probs";
?>

