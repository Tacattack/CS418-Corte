<?php
    include("Connect.php");
    session_start();

    $USRNM = $_POST['LoginUsername'];
    $PSSWRD = $_POST['LoginPassword'];
    
    
    //Protecting username from MYSQL injection
    //$USRNM = stripslashes($USRNM);
    //$USRNM = mysqli_real_escape_string($USRNM);

    //Protecting password from MYSL injection
    //$PSSWRD = stripslashes($PSSWRD);
    //$PSSWRD = mysqli_real_escape_string($PSSWRD);

    if(isset($_POST("submit")))
    {
     //comparing username and password to database
    $sqlLogin = "SELECT * FROM UserProfile";
    $resultLogin = mysqli_query($conn, $sqlLogin);

    //if $result matched username and password, table row must be 1
    if (mysqli_num_rows($resultLogin) > 0)
    {
        while ($rowLog = mysqli_fetch_assoc($resultLogin)) //Searches through the table
        {
            if ($USRNM == $rowLog["username"] && $PSSWRD == $rowLog["password"]) //compares usernames to entered username
            {
                //Register the username and password then redirect it to the profile page
                $_SESSION["USERID"] = $rowLog["id"];
                $_SESSION["USER"] = $USRNM;
                $_SESSION["PASSWORD"] = $PSSWRD;
                $_SESSION["USERLEVEL"] = $rowLog["level"];
                header("Location: ../profile.php?id=".$_SESSION["USERID"]);
                die();
            }
        }
    }
    
    echo "Go back and log in like an adult or register if you haven't already: <a href=\"../index.php\">Return Home</a>";   
    }
    
    if(isset($_POST("register")))
    {
        $sql = "INSERT INTO UserProfile (username, password, level)
                                VALUES('{$USRNM}', '{$PSSWRD}', '0')";

        if (mysqli_query($conn, $sql)) {
            echo "Registered Successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

