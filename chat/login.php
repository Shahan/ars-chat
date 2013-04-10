<?php
/* 
	github.com/Shahan/ars-chat
	chat/login.php : returns form for login or creates session using info sent by ajax request
*/
//check if nothing in POST
if(isset($_POST['login']) && isset($_POST['password']) && $_POST['login']!=" " && $_POST['login']!="" && $_POST['password']!="" && $_POST['password']!=" ")
{
	
	//connect to DB
    include("bd.php");
 
	//Set variables
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
 
	//Check for user with such login in DB
    $res=mysql_query("SELECT * FROM `users` WHERE `login`='$login' ");
    $data=mysql_fetch_array($res);
 
	
    if(empty($data['login'])) //report if exist
    {
        $error = "User with such name doesn't exist!";
    }
	else if($password!=$data['password']) //check for password
    {
        $error = "Wrong password!";
    }	
	if(!isset($error)) //no errors
	{
		if(isset($_POST['remember']) && $_POST['remember']=="true") 
			session_cache_expire(9999);
		else session_cache_expire(180);
		//set session variables
		$_SESSION['login']=$data['login'];
		$_SESSION['id']=$data['id'];
		
		//output info
		$user=$_SESSION['login'];
		$res=mysql_query("SELECT * FROM `users` WHERE `login`='$user' ");
		$user_data=mysql_fetch_array($res);
		echo '<font color=green>Logged in for '. session_cache_expire() .'minutes</font>';
		echo "<center>";
		echo "Logged as: <b>". $user_data['login']."</b><br>";
		echo "Your email: <b>". $user_data['email']."</b><br>";
		echo "Your country: <b>". $user_data['country']."</b><br>";
		echo "Languages you speak: <b>". $user_data['langs']."</b><br>";
		echo "<a href=\"#\" onclick=\"logout();\">Logout</a>";			
		echo "</center>";
	}
	else //print form again
	{?>
	<center>
		
		<form action="">
			<font color="red"><?php $error; ?></font><br>
			<h3>Try to login again:</h3>
			Login: <br> <input type="text" name="log_login" id="log_login" value="<? echo $login;?>"><br>
			Password: <br> <input type="password" name="log_password" id="log_password"><br>
			<input name="remember" type="checkbox" value="1">Remember me<br>
			<input type="button" onclick="LoginUser();" value="Login">
			
			<h3>or register, of you are not registered yet:</h3>
			Login: <br> <input type="text" name="login" id="reg_login"><br>
			Password: <br> <input type="password" name="password" id="reg_password"><br>
			Email: <br> <input type="text" name="email" id="email"><br>
			Country: <br> <input type="text" name="country" id="country"><br>
			Languages: <br> <input type="text" name="langs" id="langs"><br>
			Birthday: <br> <input type="text" name="birthday" id="birthday"><br>
			<input type="button" onclick="register();" value="Register">
		</form>
	</center>
	<?}
	
		
}
 
?>