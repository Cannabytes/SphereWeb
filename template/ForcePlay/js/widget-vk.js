$(document).ready(function(){
	
	// Адаптивный виджет ВКонтакте
	// На странице сайта должен быть блок #vk_groups
	// Выше данного скрипта подключить <script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>
	
	var group_id = 188631655, // ID сообщества, только число
		group_layout = 1, // Использовать обложку. 0 - Использовать, 1 - Не использовать
		group_wide = 0, // Расширенный режим. 0 - Не использовать, 1 - Использовать
		type_widget = 3, // 1 - Только название, 3 - Участники, 4 - Новости ( 2 - Новости но более кривые... оО )
		color_bg = '29241d', // Цвет фона
		color_text = 'd2bf89', // Цвет текста
		color_buttons = 'e09906'; // Цвет кнопок и ссылок
		
	if( $('#vk_groups').length > 0 ){
		function VK_Widget_Init(){
			document.getElementById('vk_groups').innerHTML = "";
			var vk_width = $('.vk').width();
			var vk_height = $('.vk').height() - 3;
			VK.Widgets.Group("vk_groups", {mode: type_widget, wide: group_wide, no_cover: group_layout, width: vk_width, height: vk_height, color1: color_bg, color2: color_text, color3: color_buttons}, group_id);
		};
		
		window.addEventListener('load', VK_Widget_Init, false);
		//window.addEventListener('resize', VK_Widget_Init, false);
	}

});

