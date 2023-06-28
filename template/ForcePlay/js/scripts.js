$(document).ready(function(){
	
	/**********************************************
	**************** Status Servers ***************
	**********************************************/
	
	$('.servers__server').each(function(index, element) {
        index = index+1;
        max = 1000; // Максимальный онлайн - Max online
		$(element).attr('class','servers__server flex-cc server_num_'+index);
  	});
	
	if($('.server_num_1').length > 0) {
        $('.server_num_1 .servers__server__progress').circleProgress({
            value: $('.server_num_1').attr('data-online')/max,
            emptyFill: 'rgba(0,0,0,0)',
            thickness: 16,
            startAngle: 4.73,
            fill: { image: "/templates/ForcePlay/images/bg/progress_bg.png" } 
        });
    }
	
	if($('.server_num_2').length > 0) {
        $('.server_num_2 .servers__server__progress').circleProgress({
            value: $('.server_num_2').attr('data-online')/max,
            emptyFill: 'rgba(0,0,0,0)',
            thickness: 16,
            startAngle: 4.73,
            fill: { image: "/templates/ForcePlay/images/bg/progress_bg.png" } 
        });
    }
	
	if($('.server_num_3').length > 0) {
        $('.server_num_3 .servers__server__progress').circleProgress({
            value: $('.server_num_3').attr('data-online')/max,
            emptyFill: 'rgba(0,0,0,0)',
            thickness: 16,
            startAngle: 4.73,
            fill: { image: "/templates/ForcePlay/images/bg/progress_bg.png" } 
        });
    }
	
	/**********************************************
	************** Switch Controller **************
	**********************************************/

	function switchController(classButton, dataButton, classBlock, dataBlock, saveHash){
		if(saveHash){
			var anc = window.location.hash.replace("#","");
			if(anc != '' && $(classButton + '[' + dataButton + ' = ' + anc + ']').length > 0){
				$(classButton + ',' + classBlock).removeClass("active");
				$(classButton + '[' + dataButton + ' = ' + anc + ']').addClass("active");
				$(classBlock + '[' + dataBlock + ' = ' + anc + ']').addClass("active");

				$('html, body').animate({
					scrollTop: ($(classButton + '[' + dataButton + ' = ' + anc + ']').offset().top) - 55
				}, Math.abs(($(classButton + '[' + dataButton + ' = ' + anc + ']').offset().top - $('html').scrollTop()) / 2));
			}
		}
		$(classButton).click(function(event){
			$(classButton + ',' + classBlock).removeClass("active");
			$(classBlock + '[' + dataBlock + ' = ' + $(this).attr(dataButton) + ']').addClass("active");
			$(this).addClass("active");
			if(saveHash){
				window.location.hash = $(this).attr(dataButton);
			}
		});
	}
	
	switchController('.rating__switch_button', 'data-open-id', '.rating__block', 'data-block-id', false); // rankings
	
	/**********************************************
	********************* Popup *******************
	**********************************************/
	if($(".streams").length > 0){
		var stream_players = $(".streams").html();
		$(".streams").html(' ');
	}

	$("[data-open-wnd]").click(function(event){
		var wnd_name = $(this).attr('data-open-wnd');
		if($("[data-wnd-name=" + wnd_name + "]").length > 0){
			$("[data-wnd-name]").removeClass("wnd_active");
			$(".wnd-bg").removeClass("wnd-bg-active");
		
			$("[data-wnd-name=" + wnd_name + "]").addClass("wnd_active");
			$(".wnd-bg").addClass("wnd-bg-active");
			
			if(wnd_name == 'stream'){
				if($(".streams").length > 0){
					$(".streams").html(stream_players);
				}
			}
		}
	});
	
	$(".wnd__close, .wnd-bg").click(function(event){
		$("[data-wnd-name]").removeClass("wnd_active");
		$(".wnd-bg").removeClass("wnd-bg-active");
		
		if($(".streams").length > 0){
			$(".streams").html(' ');
		}
	});
});

