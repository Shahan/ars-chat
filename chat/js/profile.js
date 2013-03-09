
function LoginUser()
{
	//�������� ���������
	var inp_login = $('#log_login').val();
	var inp_password = $('#log_password').val();
	// �������� �������
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=login&login="+inp_login+"&password="+inp_password,
			// ������� �� ��� ������ PHP
			success: function(html) {
				//�������������� ������� ������ ������� ��������
				$("#user_panel").empty();
				//� ������� ����� php �������
				$("#user_panel").append(html);
			}
	});
	
	//update user info
	init_username();
}

function register()
{
	//�������� ���������
	var inp_login = $('#reg_login').val();
	var inp_password = $('#reg_password').val();
	var inp_email = $('#email').val();
	var inp_country = $('#country').val();
	var inp_langs = $('#langs').val();
	var inp_birthday = $('#birthday').val();
	// �������� �������
	$.ajax({
			type: "POST",
			url: "chat/profile.php",
			data: "request=register&login="+inp_login+"&password="+inp_password+"&email="+inp_email+"&country="+inp_country+"&langs="+inp_langs+"&birthday="+inp_birthday,
			// ������� �� ��� ������ PHP
			success: function(html) {
				//�������������� ������� ������ ������� ��������
				$("#user_panel").empty();
				//� ������� ����� php �������
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
			// ������� �� ��� ������ PHP
			success: function(html) {
				//�������������� ������� ������ ������� ��������
				$("#user_panel").empty();
				//� ������� ����� php �������
				$("#user_panel").append(html);
			}
		});
		
	//update user info
	init_username();
}