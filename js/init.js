function init_profile()
{
	$.ajax({
			type: "POST",
			url: "profile.php",
			data: "request=init",
			// Выводим то что вернул PHP
			success: function(html) {
				//предварительно очищаем нужный элемент страницы
				$("#user_panel").empty();
				//и выводим ответ php скрипта
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