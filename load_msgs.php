<?php
//connect to DB
include("bd.php");
//Take all msgs
$res=mysql_query("SELECT * FROM `messages` ORDER BY `id` ");
//print them
if(isset($_POST['room']))
{
	$room=strval($_POST['room']);
} else $room = strval(1);
while($d=mysql_fetch_array($res))
{	
	if($d['room']==$room) echo "<b><font color='orange'>".$d['from'].":&nbsp;</font></b>".$d['message']."<br>";
}
?>