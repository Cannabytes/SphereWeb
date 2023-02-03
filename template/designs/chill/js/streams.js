$(document).ready(function(){
	
	function addStreams()
	{
		if($(window).outerWidth() > 1024)
		{
			$('.streams__item').each(function(index, element) {
				let autoplay = $(element).attr('data-autoplay');
				if(autoplay == 'true')
				{
					let preview = $(element).find('.streams__item-preview');
					let player = $(element).find('.streams__item-player');
					
					let platform = player.attr('data-platform');
					let url = player.attr('data-url');
					let mute = 0;
					
					if(player.attr('data-mute') == 'true')
					{
						mute = 1;
					}
					
					if(platform == 'youtube')
					{
						let content = '<iframe height="140" width="250" src="' + url + '?autoplay=1&mute=' + mute + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
						
						player.html(content);
						preview.addClass('disabled');
					} else if (platform === 'twitch') {
						let content = '<iframe height="140" width="250" src="' + url + '?autoplay=1&mute=' + mute + '" title="YouTube video player" frameborder="0" allowfullscreen="true" scrolling="no"></iframe>';
						player.html(content);
						preview.addClass('disabled');
					}
				}
			});
		}
	}
	
	function deleteStreams()
	{
		if($(window).outerWidth() > 1024)
		{
			$('.streams__item').each(function(index, element) {
				let preview = $(element).find('.streams__item-preview');
				let player = $(element).find('.streams__item-player');
				preview.removeClass('disabled');
				player.html('');
			});
		}
	}
	
	$('.streams__item-play').click(function(event){
		let this_element = $(this).parent().parent();
		let preview = this_element.find('.streams__item-preview');
		let player = this_element.find('.streams__item-player');
		
		let platform = player.attr('data-platform');
		let url = player.attr('data-url');
		let mute = 0;
		
		if(player.attr('data-mute') == 'true')
		{
			mute = 1;
		}
		
		if(platform == 'youtube')
		{
			let content = '<iframe height="140" width="250" src="' + url + '?autoplay=1&mute=' + mute + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			
			player.html(content);
			preview.addClass('disabled');
		} else if (platform === 'twitch') {
			let content = '<iframe height="140" width="250" src="' + url + '?autoplay=1&mute=' + mute + '" title="YouTube video player" frameborder="0" allowfullscreen="true" scrolling="no"></iframe>';
			player.html(content);
			preview.addClass('disabled');
		}
	});
	
	function initStreams()
	{
		if($(window).outerWidth() > 1024)
		{
			let box = $('.streams .content-area');
			if (!box || !box.offset()) {
				return;
			}

			let window_distance_top = $(document).scrollTop();
			let window_distance_bottom = $(document).scrollTop() + $(window).outerHeight();
			
			let streams_distance_top = box.offset().top;
			let streams_distance_bottom = box.offset().top + box.outerHeight();
			
			if(( streams_distance_top > window_distance_top && streams_distance_top < window_distance_bottom ) || ( streams_distance_bottom > window_distance_top && streams_distance_bottom < window_distance_bottom ))
			{
				if(!box.hasClass('visible'))
				{
					box.addClass('visible');
					addStreams();
				}
			}
			else
			{
				if(box.hasClass('visible'))
				{
					box.removeClass('visible');
					deleteStreams();
					console.log(false);
				}
			}
		}
	}

	initStreams();
	
	$(document).scroll(function(){
		if($(window).outerWidth() > 1024)
		{
			let box = $('.streams .content-area');

			let window_distance_top = $(this).scrollTop();
			let window_distance_bottom = $(this).scrollTop() + $(window).outerHeight();
			
			let streams_distance_top = box.offset().top;
			let streams_distance_bottom = box.offset().top + box.outerHeight();
			
			if(( streams_distance_top > window_distance_top && streams_distance_top < window_distance_bottom ) || ( streams_distance_bottom > window_distance_top && streams_distance_bottom < window_distance_bottom ))
			{
				if(!box.hasClass('visible'))
				{
					box.addClass('visible');
					addStreams();
				}
			}
			else
			{
				if(box.hasClass('visible'))
				{
					box.removeClass('visible');
					deleteStreams();
				}
			}
		}
	});
	
});


