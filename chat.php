<link href="css/rooms.css" rel="stylesheet" type="text/css" />
<link href="css/tabs.css" rel="stylesheet" type="text/css" />

<!--include JQuery-->
<script src="js/jquery.min.1.7.2.js"></script> 
<script src="js/jTabs.js"></script> 
<script src="js/init.js" type="text/javascript"></script>
<script src="js/profile.js" type="text/javascript"></script> 
<script> 
	$(document).ready(function(){     
		$("ul.tabs").jTabs({content: ".tabs_content", animate: true});                       
		}); 
</script>

<script type="text/javascript">
	
	//function for sending msgs
	
	
	//Function of loading msgs
	function load_msgs(room)
	{
		$.ajax({
				type: "POST",
				url:  "load_msgs.php",
				data: "room="+room,
				//Output php feedback
				success: function(html)
				{
					//Clear input box
					$("#msgs_room"+room).empty();
					//Output php feedback
					$("#msgs_room"+room).append(html);
					//scroll down
					$("#msgs_room"+room).scrollTop(90000);
				}
			});
	}
	function send(room)
	{
		//Get msg from input box with id mess_to_add
		var msg=$("#msg__from_room"+room).val();
		//Send parametrs
        $.ajax({
                type: "POST",
                url: "add_msg.php",
                data: "room="+room+"&msg="+msg,
                // Output PHP feedback
                success: function(html)
				{
					//if successful, load msgs
					load_rooms();
					//clear input form
					$("#msg__from_room"+room).val("");
                }
        });
	}
</script>
<div class="wrap">
    <ul class="tabs">  
        <li class="active"><a href="#">Room 1</a></li>
        <li><a href="#">Room 2</a></li>
        <li><a href="#">Room 3</a></li>
		<li><a href="#">Profile</a></li>
    </ul>  
    <div class="clear"></div>
    <div class="tabs_content">
        <div>
			<table>
				<tr><td>
					<div id="msgs_room1"></div>
				</td></tr>
				<tr><td>
					<form action="javascript:send(1);">
						<input type="text" id="msg__from_room1">
						<input type="submit" value="Send">
					</form>
				</td></tr>
			</table>
		</div>
        <div>
			<table>
				<tr><td>
					<div id="msgs_room2"></div>
				</td></tr>
				<tr><td>
					<form action="javascript:send(2);">
						<input type="text" id="msg__from_room2">
						<input type="submit" value="Send">
					</form>
				</td></tr>
			</table>
		</div>
        <div>
			<table>
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
load_rooms();
//do it each 3 sec
setInterval(load_rooms(),3000);
</script>
