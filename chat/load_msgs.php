<?php
/* 
	github.com/Shahan/ars-chat
	chat/load_msgs.php : returns msgs from DB depending on room, which sent by ajax request
*/
//connect to DB
include("bd.php");
//Take all msgs


$error = "0";

//print them
if(isset($_POST['room']))
{
	$room=strval($_POST['room']);
	
	//private room
	if($room==3)
	{
		session_start();
		if(isset($_SESSION['login']) && isset($_SESSION['id'])) //if authed, check lvl, allow from lvl 3
		{
			include("bd.php");
			$user=$_SESSION['login'];
			$res=mysql_query("SELECT * FROM `users` WHERE `login`='$user' ");
			$user_data=mysql_fetch_array($res);
			if(!empty($user_data['login']))
			{
				if($user_data['lvl'] < 3)
				{
					$error = "This chat is for [iPod] Members only";
				}
			}
			else $error = "This chat is for [iPod] Members only. If you are clan member,auth first.";				
		}
		else $error = "This chat is for [iPod] Members only. If you are clan member,auth first.";
	}
} else $room = strval(1);
if($error=="0")
{
	$res=mysql_query("SELECT * FROM `messages` ORDER BY `id` ");
	while($d=mysql_fetch_array($res))
	{	
		if($d['room']==$room) echo "<b><font color='orange'>".$d['from'].":&nbsp;</font></b>".$d['message']."<br>";
	}
}
else echo '<b><font color=red>'.$error.'</font></b>';
?>