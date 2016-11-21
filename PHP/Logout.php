<?php
//Logs out the current user from their session
session_start();
unset($_SESSION["USER"]);
unset($_SESSION["PASSWORD"]);
unset($_SESSION["USERID"]);
unset($_SESSION["USERLEVEL"]);

header("Location: ../index.php");

?>


