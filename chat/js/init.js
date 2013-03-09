function init_profile()
{
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=init",
			success: function(html) {
				$("#user_panel").empty();
				$("#user_panel").append(html);
			}
		});
}
function init_username_room(room)
{
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=username&room="+room,
			success: function(html) {
				$("#username_"+room).empty();
				$("#username_"+room).append(html);
			}
		});
}
function init_username()
{
	for(i=0; i<2; i++)
	{
		init_username_room(i+1);
	}
}
function load_rooms()
{
	for(i=0; i<3; i++)
	{
		load_msgs(i+1);
	}
}

function onTick()
{	
	load_rooms();
}