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
        die("Fill all the fields!");
    }
 
//Connect to DB
    include("bd.php");
 
//Take information about this login from DB
    $res=mysql_query("SELECT `login` FROM `users` WHERE `login`='$login' ");
    $data=mysql_fetch_array($res);
 
//Check, if such name is already registered
    if(!empty($data['login']))
    {
        die("The user with such name already registered!");
    }
 
//Password lenght should be >=6
    if(strlen($password)<6)
    {
        die("Password length should be more than 5 chars!");
    }
 
//Insert new user to DB
    $query="INSERT INTO `users` (`login`,`password`,`email`,`country`,`langs`, `birthday`, `lvl`) VALUES('$login','$password','$email','$country','$langs', '$birthday','0') ";
    $result=mysql_query($query);
 
//reports
    if($result==true)
    {
        echo "Successfully registered. <br><a href='index.php'>Go to main page</a>";
    }
//fail reports
    else
    {
        echo "Error! ----> ". mysql_error();
    }
}
?>