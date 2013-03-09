<?php
/*
	github.com/Shahan/ars-chat
	chat/add_msg.php : used by ajax request, this file adds msgs to chat DB
*/
//check if we have smth to add
if(isset($_POST['msg']) && $_POST['msg']!="" && $_POST['msg']!=" ")
{
	//Use session to get user's login
	session_start();
		
	//Set variables
	$from=$_SESSION['login'];
	if(!isset($_SESSION['id']) || $_SESSION['id']==0 || $_SESSION['id']=="") //we are not logged as registered user
	{	
		$_SESSION['login']= $_POST['user'];
		$from=$_SESSION['login'];
		if($from == '') $from = 'undefined';
		$from=$from . '<font color="#ccc">(guest)</font>'; 
		
	}
	$to = 'all';
	$message=$_POST['msg'];
	$when = date("Y-m-d H:i:s");
	if(isset($_POST['room']) && ($_POST['room']==1 || $_POST['room']==2 || $_POST['room']==3))
	{
		$room = strval($_POST['room']);
	} else $room = strval(1);
	$extra = 'None';
	
	
	//Connect to DB
	include("bd.php");
	//Add to DB
	$res=mysql_query("INSERT INTO `messages` (`from`,`to`,`message`,`when`,`room`,`extra`) VALUES ('$from','$to','$message','$when','$room','$extra') ");

}
?>