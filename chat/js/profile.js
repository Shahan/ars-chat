
function LoginUser()
{
	//Получаем параметры
	var inp_login = $('#log_login').val();
	var inp_password = $('#log_password').val();
	// Отсылаем паметры
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=login&login="+inp_login+"&password="+inp_password,
			// Выводим то что вернул PHP
			success: function(html) {
				//предварительно очищаем нужный элемент страницы
				$("#user_panel").empty();
				//и выводим ответ php скрипта
				$("#user_panel").append(html);
			}
	});
	
	//update user info
	init_username();
}

function register()
{
	//Получаем параметры
	var inp_login = $('#reg_login').val();
	var inp_password = $('#reg_password').val();
	var inp_email = $('#email').val();
	var inp_country = $('#country').val();
	var inp_langs = $('#langs').val();
	var inp_birthday = $('#birthday').val();
	// Отсылаем паметры
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=register&login="+inp_login+"&password="+inp_password+"&email="+inp_email+"&country="+inp_country+"&langs="+inp_langs+"&birthday="+inp_birthday,
			// Выводим то что вернул PHP
			success: function(html) {
				//предварительно очищаем нужный элемент страницы
				$("#user_panel").empty();
				//и выводим ответ php скрипта
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
			// Выводим то что вернул PHP
			success: function(html) {
				//предварительно очищаем нужный элемент страницы
				$("#user_panel").empty();
				//и выводим ответ php скрипта
				$("#user_panel").append(html);
			}
		});
		
	//update user info
	init_username();
}