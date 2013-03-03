<?php
//connect to DB
include("bd.php");
//Take all msgs
$res=mysql_query("SELECT * FROM `messages` ORDER BY `id` ");
//print them
while($d=mysql_fetch_array($res))
{	
	echo "<b><font color='orange'>".$d['from'].":&nbsp;</font></b>".$d['message']."<br>";
}
?>