<?php
 
//check if nothing in POST
if(isset($_POST['login']) && isset($_POST['password']))
{
//connect to DB
    include("bd.php");
 
//Set variables
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
 
//Check for user with such login in DB
    $res=mysql_query("SELECT * FROM `users` WHERE `login`='$login' ");
    $data=mysql_fetch_array($res);
 
//report if exist
    if(empty($data['login']))
    {
        die("User with such name doesn't exist!");
    }
//check for password
    if($password!=$data['password'])
    {
        die("Wrong password!");
    }
//run session for user
    session_start();
 
//set session variables
    $_SESSION['login']=$data['login'];
    $_SESSION['id']=$data['id'];
//go to main page
    header("location: index.php");
}
 
?>