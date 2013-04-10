
function LoginUser()
{
	//get parametrs
	var inp_login = $('#log_login').val();
	var inp_password = $('#log_password').val();
	var inp_remember=$("input[type='checkbox']").prop('checked');
	
	// send parametrs
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=login&login="+inp_login+"&password="+inp_password+"&remember=" + inp_remember,
			// output what PHP returned
			success: function(html) {
				//firstly clear the required part of the page
				$("#user_panel").empty();
				//and print PHP answer
				$("#user_panel").append(html);
			}
	});
	
	//update user info
	init_username();
}

function register()
{
	//get parametrs
	var inp_login = $('#reg_login').val();
	var inp_password = $('#reg_password').val();
	var inp_email = $('#email').val();
	var inp_country = $('#country').val();
	var inp_langs = $('#langs').val();
	var inp_birthday = $('#birthday').val();
	// send parametrs
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=register&login="+inp_login+"&password="+inp_password+"&email="+inp_email+"&country="+inp_country+"&langs="+inp_langs+"&birthday="+inp_birthday,
			// output what PHP returned
			success: function(html) {
				//firstly clear the required part of the page
				$("#user_panel").empty();
				//and print PHP answer
				$("#user_panel").append(html);
			}
	});
	
	//update user info
	init_username();
}

function logout()
{
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=logout",
			// output what PHP returned
			success: function(html) {
				//firstly clear the required part of the page
				$("#user_panel").empty();
				//and print PHP answer
				$("#user_panel").append(html);
			}
		});
		
	//update user info
	init_username();
}