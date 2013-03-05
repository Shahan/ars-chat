<?php session_start(); ?>
<?php
	//guests have only 'login' in cookie, when registered user has both 'login' and 'id'
	if(isset($_POST['request']) && $_POST['request']=="init")
	{
		if(!isset($_SESSION['login'])) //nothing in cookies
		{
		?>
		<center>
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
			<input type="button" onclick="LoginUser();" value="Login">
		</form>
		</center>
		<?php
		}
		else if(isset($_SESSION['login']) && !isset($_SESSION['id']))
		{
		?>
		<center>
		<form action="">
			<h3>Looks like you are fisrt time with us! Try to register</h3>
			Login: <br> <input type="text" name="login" id="reg_login"><br>
			Password: <br> <input type="password" name="password" id="reg_password"><br>
			Email: <br> <input type="text" name="email" id="email"><br>
			Country: <br> <input type="text" name="country" id="country"><br>
			Languages: <br> <input type="text" name="langs" id="langs"><br>
			Birthday: <br> <input type="text" name="birthday" id="birthday"><br>
			<input type="button" onclick="register();" value="Register">
		</form>
		<form>
			<h3>And then login:</h3>
			Login: <br> <input type="text" name="log_login" id="log_login"><br>
			Password: <br> <input type="password" name="log_password" id="log_password"><br>
			<input type="button" onclick="LoginUser();" value="Login">
		</form>
		</center>
		<?php
		}
		else if(isset($_SESSION['login']) && isset($_SESSION['id']))
		{
		 
			include("bd.php");
			$user=$_SESSION['login'];
			$res=mysql_query("SELECT * FROM `users` WHERE `login`='$user' ");
			$user_data=mysql_fetch_array($res);
		 
			echo "<center>";
			echo "Logged as: <b>". $user_data['login']."</b><br>";
			echo "Your email: <b>". $user_data['email']."</b><br>";
			echo "Your country: <b>". $user_data['country']."</b><br>";
			echo "Languages you speak: <b>". $user_data['langs']."</b><br>";
			echo "<a href=\"#\" onclick=\"logout();\">Logout</a>";				
			echo "</center>";
		}
	}
	else if(isset($_POST['request']) && $_POST['request']=="login")
	{
		include("login.php");
	}
	else if(isset($_POST['request']) && $_POST['request']=="register")
	{
		include("register.php");
	}
	else if(isset($_POST['request']) && $_POST['request']=="logout")
	{
		include("logout.php");
	}
	else echo 'wtf';
		
?>