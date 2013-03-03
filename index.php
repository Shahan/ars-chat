<?php session_start(); ?>
<html>
 
<title>Chat</title>
 
<head>
</head>
 
<body>
<?php

//if nothing in session, suggest to login or register
if(!isset($_SESSION['login']) || !isset($_SESSION['id']))
{
?>
<center>
<form action="register.php" method="POST">
<h3>Register</h3>
Login: <br> <input type="text" name="login">
<br>
Password: <br> <input type="password" name="password">
<br>
Email: <br> <input type="text" name="email">
<br>
Country: <br> <input type="text" name="country">
<br>
Languages: <br> <input type="text" name="langs">
<br>
Birthday: <br> <input type="text" name="birthday">
<br>
<input type="submit" value="Register">
</form>
 
<form action="login.php" method="POST">
<h3>Login:</h3>
Login: <br> <input type="text" name="login">
<br>
Password: <br> <input type="password" name="password">
<br>
<input type="submit" value="Login">
</form>
</center>
<?php
}

if(isset($_SESSION['login']) && isset($_SESSION['id']))
{
 
    include("bd.php");
    $user=$_SESSION['login'];
    $res=mysql_query("SELECT * FROM `users` WHERE `login`='$user' ");
    $user_data=mysql_fetch_array($res);
 
    echo "<center>";
    echo "Your name: <b>". $user_data['login']."</b><br>";
    echo "Your email: <b>". $user_data['email']."</b><br>";
    echo "Your country: <b>". $user_data['country']."</b><br>";
    echo "Languages you speak: <b>". $user_data['langs']."</b><br>";
    echo "<a href='exit.php'>Logout</a>";
	include("chat.php");
    echo "</center>";
}
?>
</body>
 
</html>