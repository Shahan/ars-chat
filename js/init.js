function init_profile()
{
	$.ajax({
			type: "POST",
			url: "profile.php",
			data: "request=init",
			// ������� �� ��� ������ PHP
			success: function(html) {
				//�������������� ������� ������ ������� ��������
				$("#user_panel").empty();
				//� ������� ����� php �������
				$("#user_panel").append(html);
			}
		});
}
function load_rooms()
{
	for(i=0; i<3; i++)
	{
		load_msgs(i+1);
	}
}