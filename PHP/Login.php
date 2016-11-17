<?php
    echo "I run before the connection |";
    include("Connect.php");
    echo "| I run after the connection |";
    
    echo "| ".$servername." |";
    echo "| ".$username." |";
    echo "| ".$password." |";
    echo "| ".$dbName." |";
    
    echo "| The username is: ".$_POST['LoginUsername']." |";
    echo "| The password is: ".$_POST['LoginPassword']." |";

    $USRNM = $_POST['LoginUsername'];
    $PSSWRD = $_POST['LoginPassword'];

    echo "| ".$USRNM." |";
    echo "| ".$PSSWRD." |";

    //Protecting username from MYSQL injection
    //$USRNM = stripslashes($USRNM);
    //$USRNM = mysqli_real_escape_string($USRNM);
    echo "| username protected |";
    //Protecting password from MYSL injection
    //$PSSWRD = stripslashes($PSSWRD);
    //$PSSWRD = mysqli_real_escape_string($PSSWRD);
    echo "| password protected |";
    //comparing username and password to database
    $sqlLogin = "SELECT username FROM UserProfile";
    $resultLogin = mysqli_query($conn, $sqlLogin);
    echo "| query created |";
    echo "| ".mysqli_num_rows($resultLogin)." |";
    //if $result matched username and password, table row must be 1
    if (mysqli_num_rows($resultLogin) > 0)
    {
        echo "| I'm in the first if statement |";
        while ($rowLog = mysqli_fetch_assoc($resultLogin)) //Searches through the table
        {
            echo "| I'm in the while loop |";
            echo "| ".$rowLog[addslashes("username")]." |";
            if ($USRNM == $rowLog[addslashes("username")]) //compares usernames to entered username
            {
                //Register the username and password then redirect it to the profile page
                echo "| You have successfully logged in |";
                exit();
            }
            else
            {
                echo "| Wrong username and password |";
                exit();
            }
        }
    }
    
    echo "| If statement exited |";
?>

