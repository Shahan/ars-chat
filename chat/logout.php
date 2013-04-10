<?php
/* 
	github.com/Shahan/ars-chat
	chat/logout.php : clears session(cookies) by ajax request
*/
//clear session
unset($_SESSION['login']);
unset($_SESSION['id']);
 
echo'
<center>
		<font color=green>Logged out</font>
		<form action="">
			<h3>Register</h3>
			Login: <br> <input type="text" name="login" id="reg_login"><br>
			Password: <br> <input type="password" name="password" id="reg_password"><br>
			Email: <br> <input type="text" name="email" id="email"><br>
			Country: <br> <input type="text" name="country" id="country"><br>
			Languages: <br> <input type="text" name="langs" id="langs"><br>
			Birthday: <br> <input type="text" name="birthday" id="birthday"><br>
			<input type="button" onclick="register();" value="Register">
			
			<h3>Login:</h3>
			Login: <br> <input type="text" name="log_login" id="log_login"><br>
			Password: <br> <input type="password" name="log_password" id="log_password"><br>
			<input name="remember" type="checkbox" value="1">Remember me<br>
			<input type="button" onclick="LoginUser();" value="Login">
		</form>
</center>';
?>