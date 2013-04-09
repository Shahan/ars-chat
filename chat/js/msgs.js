/*
	github.com/Shahan/ars-chat
	chat/js/msgs.js : functions for sending&loading messages
*/
	
	
//Function of loading msgs
function load_msgs(room)
{
	//load msgs
	$.ajax({
			type: "POST",
			url:  "chat/load_msgs.php",
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
	var usrname=$("#guestname_"+room).val();
	//Send parametrs
    $.ajax({
            type: "POST",
            url: "chat/add_msg.php",
            data: "room="+room+"&user="+usrname+"&msg="+msg,
            // Output PHP feedback
            success: function(html)
			{
				//if successful, load msgs
				onTick();
				//clear input form
				$("#msg__from_room"+room).val("");
            }
        });
	
	//update user info
	init_username();
}