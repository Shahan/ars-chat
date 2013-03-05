<?php
 
//Check for data in POST
if(isset($_POST['login']) && isset($_POST['password']))
{
//set variables
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
    $email=htmlspecialchars(trim($_POST['email']));
    $country=htmlspecialchars(trim($_POST['country']));
    $langs=htmlspecialchars(trim($_POST['langs']));
	$birthday=htmlspecialchars(trim($_POST['birthday']));
	//If empty
    if($login=="" || $password=="" || $email=="" || $country=="" || $langs=="" || $birthday=="")
    {
        $error="Fill all the fields!";
    }
	else
	{
	    //Connect to DB
		include("bd.php");
 
		//Take information about this login from DB
		$res=mysql_query("SELECT `login` FROM `users` WHERE `login`='$login' ");
		$data=mysql_fetch_array($res);
 
		//Check, if such name is already registered
		if(!empty($data['login']))
		{
			$error="The user with such name already registered!";
		}
		else if(strlen($password)<6) //Password lenght should be >=6
		{
			$error = "Password length should be more than 5 chars!";
		}
		else
		{ 
			//Insert new user to DB
			$query="INSERT INTO `users` (`login`,`password`,`email`,`country`,`langs`, `birthday`, `lvl`) VALUES('$login','$password','$email','$country','$langs', '$birthday','0') ";
			$result=mysql_query($query);
 
			//reports
			if($result==true)
			{ ?>
				<center>
					<font color=green>Successfully registered</font><br>
					<form action="">
						<h3>Now you can login:</h3>
						Login: <br> <input type="text" name="log_login" id="log_login"><br>
						Password: <br> <input type="password" name="log_password" id="log_password"><br>
						<input type="button" onclick="LoginUser();" value="Login">
					</form>
				</center>
			<?}
			//fail reports
			else
			{
				echo "Error! ----> ". mysql_error();
			}
		}
	}
	if(isset($error)) //smth failed, print error and register again
	{ ?>
	<center>
		<form action="">
			<font color="red"><?php echo $error; ?></font><br>
			<h3>Try to register again:</h3>
			Login: <br> <input type="text" name="login" id="reg_login" value="<? echo $login;?>"><br>
			Password: <br> <input type="password" name="password" id="reg_password"><br>
			Email: <br> <input type="text" name="email" id="email" value="<? echo $email;?>"><br>
			Country: <br> <input type="text" name="country" id="country" value="<? echo $country;?>"><br>
			Languages: <br> <input type="text" name="langs" id="langs" value="<? echo $langs;?>"><br>
			Birthday: <br> <input type="text" name="birthday" id="birthday" value="<? echo $birthday;?>"><br>
			<input type="button" onclick="register();" value="Register">
			
			
			<h3>or login, if you are already registered:</h3>
			Login: <br> <input type="text" name="log_login" id="log_login"><br>
			Password: <br> <input type="password" name="log_password" id="log_password"><br>
			<input type="button" onclick="LoginUser();" value="Login">
			
		</form>
	</center>
	<? }
}
?>