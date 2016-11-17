<?php
//Logs out the current user from their session
session_start();
unset($_SESSION["USER"]);
unset($_SESSION["PASSWORD"]);
unset($_SESSION["USERID"]);


header('Refresh: 2;,URL= index.php');

?>


