<style>
#messages
{
	width:300px;
	height:150px;
	overflow:auto;
	border:1px solid silver;
}
</style>

<!--include JQuery-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
	//load JQuery
	google.load("jquery", "1.3.2");
	google.load("jqueryui", "1.7.2");
	
	//function for sending msgs
	function send()
	{
		//Get msg from input box with id mess_to_add
		var msg=$("#msg_to_send").val();
		//Send parametrs
       $.ajax({
                type: "POST",
                url: "add_msg.php",
                data:"msg="+msg,
                // Output PHP feedback
                success: function(html)
				{
					//if successful, load msgs
					load_msgs();
					//clear input form
					$("#mess_to_send").empty();
                }
        });
	}
	
	//Function of loading msgs
	function load_msgs()
	{
		$.ajax({
                type: "POST",
                url:  "load_msgs.php",
                data: "req=ok",
                //Output php feedback
                success: function(html)
				{
					//Clear input box
					$("#messages").empty();
					//Output php feedback
					$("#messages").append(html);
					//scroll down
					$("#messages").scrollTop(90000);
                }
        });
	}
</script>

<table>
<tr>
<td>
<div id="messages">
</div>
</td>
</tr>
<tr>
<td>
<form action="javascript:send();">
<input type="text" id="msg_to_send">
<input type="submit" value="Send">
</form>
</td>
</tr>
</table>

<script>
//Load msgs on page load
load_msgs();
//do it each 3 sec
setInterval(load_msgs,3000);
</script>
