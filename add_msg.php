<?php
//check if we have smth to add
if(isset($_POST['msg']) && $_POST['msg']!="" && $_POST['msg']!=" ")
{
	//Use session to get user's login
	session_start();
		
	//Set variables
	$from=$_SESSION['login'];
	$to = 'all';
	$message=$_POST['msg'];
	$when = date("Y-m-d H:i:s");
	$room = 'Public';
	$extra = 'None';
	
	
	//Connect to DB
	include("bd.php");
	//Add to DB
	$res=mysql_query("INSERT INTO `messages` (`from`,`to`,`message`,`when`,`room`,`extra`) VALUES ('$from','$to','$message','$when','$room','$extra') ");
}
?>