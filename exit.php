<?php
session_start();

//clear session
unset($_SESSION['login']);
unset($_SESSION['id']);
 
//redirect to main page
header("location: index.php");
?>