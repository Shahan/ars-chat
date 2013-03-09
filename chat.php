<? /*
	github.com/Shahan/ars-chat
	chat.php : main module, use include('chat.php'); to include it
*/?>
<link href="chat/css/rooms.css" rel="stylesheet" type="text/css" />
<link href="chat/css/tabs.css" rel="stylesheet" type="text/css" />

<!--include JQuery-->
<script src="chat/js/jquery.min.1.7.2.js"></script> 
<script src="chat/js/jTabs.js"></script> 
<script src="chat/js/init.js" type="text/javascript"></script>
<script src="chat/js/profile.js" type="text/javascript"></script> 
<script src="chat/js/msgs.js" type="text/javascript"></script> 
<script> 
	$(document).ready(function(){     
		$("ul.tabs").jTabs({content: ".tabs_content", animate: true});                       
		}); 
</script>
<div class="wrap">
    <ul class="tabs">  
        <li class="active"><a href="#">Public room 1</a></li>
        <li><a href="#">Public room 2</a></li>
        <li><a href="#">Private room</a></li>
		<li><a href="#">Profile</a></li>
    </ul>  
    <div class="clear"></div>
    <div class="tabs_content">
        <div>
			<table width="100%">
				<tr><td>
					<div id="msgs_room1"></div>
				</td></tr>
				<tr><td>
					<form action="javascript:send(1);">
						<span id="username_1"></span>
						<input type="text" id="msg__from_room1">
						<input type="submit" value="Send">
					</form>
				</td></tr>
			</table>
		</div>
        <div>
			<table width="100%">
				<tr><td>
					<div id="msgs_room2"></div>
				</td></tr>
				<tr><td>
					<form action="javascript:send(2);">
						<span id="username_2"></span>
						<input type="text" id="msg__from_room2">
						<input type="submit" value="Send">
					</form>
				</td></tr>
			</table>
		</div>
        <div>
			<table width="100%">
				<tr><td>
					<div id="msgs_room3"></div>
				</td></tr>
				<tr><td>
					<form action="javascript:send(3);">
						<input type="text" id="msg__from_room3">
						<input type="submit" value="Send">
					</form>
				</td></tr>
			</table>
		</div>
		<div>
			<div id="user_panel"></div>
			<script>init_profile();</script>
		</div>
    </div><!-- tabs content -->
	
</div><!-- wrap -->



<script>
//Load msgs on page load
onTick();
init_username();
//do it each 3 sec
setInterval(onTick,3000);
</script>
