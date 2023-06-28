$(document).ready(function(){

	var slideWidth = 417;
	var slideCount = $('div[data-type = slider] .slider-line .slider-slide').length;
	
	$(".slider-block .slider-line").css('width', slideWidth * slideCount);
	$(".slider-block .slider-line .slider-slide").css('width', slideWidth);
	
	if(slideCount > 1){
		$(".slider-block .slider-line .slider-slide:nth-child(1)").addClass('view-slide');
	}
	else{
		$(".slider-block .slider-nav .next").addClass('disabled');
		$(".slider-block .slider-nav .perv").addClass('disabled');
	}
	
	$(window).resize(function(){
		var slideWidth = $('div[data-type = slider]').width();
		var slideCount = $('div[data-type = slider] .slider-line .slider-slide').length;
		
		$(".slider-block .slider-line").css('width', slideWidth * slideCount);
		$(".slider-block .slider-line .slider-slide").css('width', slideWidth);
	});
	
	for(i = 0; i < slideCount; i++){
		$('.slider-block .slider-nav .markers').append('<div class="marker"></div>');
	}
	
	$(".slider-block .slider-nav .markers .marker:first").addClass("m_active");
	
	$(".slider-block .slider-nav .next").click(function(){
		
		var slideIndex = $(".slider-block .slider-line .view-slide").index();
		var slideNext = slideIndex + 1;
		var slideWidth = $('div[data-type = slider]').width();
		var slideCount = $('div[data-type = slider] .slider-line .slider-slide').length;

		if(slideNext < slideCount){
			$(".slider-block .slider-line").css('transition', 'all .5s ease-in-out');
			$(".slider-block .slider-line .slider-slide").eq(slideIndex).removeClass("view-slide");
			$(".slider-block .slider-line .slider-slide").eq(slideNext).addClass("view-slide");
			$(".slider-block .slider-line").css('transform', 'translateX(-' + ((100 / slideCount) * slideNext) + '%)');
			
			$(".slider-block .slider-nav .markers .marker").removeClass("m_active");
			$(".slider-block .slider-nav .markers .marker").eq(slideNext).addClass("m_active");
			
			setTimeout( function() {
				$(".slider-block .slider-line").css('transition', 'all .0s ease-in-out');
			}, 500);
		}
		else
		{
			$('.slider-block .slider-line .slider-slide:last').after($(".slider-block .slider-line .slider-slide").eq(0).clone());
			$(".slider-block .slider-line").css('width', $('div[data-type = slider]').width() * $('div[data-type = slider] .slider-line .slider-slide').length);	
			$(".slider-block .slider-line").css('transform', 'translateX(-' + ((100 / $('div[data-type = slider] .slider-line .slider-slide').length) * ($('div[data-type = slider] .slider-line .slider-slide').length - 2)) + '%)');
			$(".slider-block .slider-nav .next").click();
			$(".slider-block .slider-line .slider-slide").eq(slideIndex).removeClass("view-slide");
			$(".slider-block .slider-line .slider-slide:last").addClass("view-slide");
			
			$(".slider-block .slider-nav .markers .marker").removeClass("m_active");
			$(".slider-block .slider-nav .markers .marker").eq(0).addClass("m_active");
			
			setTimeout( function() {
				$(".slider-block .slider-line").css('transition', 'all .0s ease-in-out');
				$('.slider-block .slider-line .slider-slide:last').remove();
				$(".slider-block .slider-line").css('width', $('div[data-type = slider]').width() * $('div[data-type = slider] .slider-line .slider-slide').length);
				$(".slider-block .slider-line .slider-slide").eq(0).addClass("view-slide");
				$(".slider-block .slider-line").css('transform', 'translateX(0px)');
			}, 500);
		}
	});
	
	$(".slider-block .slider-nav .perv").click(function(){
		
		var slideIndex = $(".slider-block .slider-line .view-slide").index();
		var slidePerv = slideIndex - 1;
		var slideWidth = $('div[data-type = slider]').width();
		var slideCount = $('div[data-type = slider] .slider-line .slider-slide').length;
		
		if(slidePerv >= 0){
			$(".slider-block .slider-line").css('transition', 'all .5s ease-in-out');
			$(".slider-block .slider-line .slider-slide").eq(slideIndex).removeClass("view-slide");
			$(".slider-block .slider-line .slider-slide").eq(slidePerv).addClass("view-slide");
			$(".slider-block .slider-line").css('transform', 'translateX(-' + ((100 / slideCount) * slidePerv) + '%)');
			
			$(".slider-block .slider-nav .markers .marker").removeClass("m_active");
			$(".slider-block .slider-nav .markers .marker").eq(slidePerv).addClass("m_active");
			
			setTimeout( function() {
				$(".slider-block .slider-line").css('transition', 'all .0s ease-in-out');
			}, 500);
		}
		else
		{
			$('.slider-block .slider-line .slider-slide:first').before($(".slider-block .slider-line .slider-slide:last").clone());
			$(".slider-block .slider-line").css('width', $('div[data-type = slider]').width() * $('div[data-type = slider] .slider-line .slider-slide').length);
			$(".slider-block .slider-line").css('transform', 'translateX(-' + (100 / $('div[data-type = slider] .slider-line .slider-slide').length) + '%)');
			$(".slider-block .slider-nav .perv").click();
			$(".slider-block .slider-line .slider-slide").eq(slideIndex).removeClass("view-slide");
			$(".slider-block .slider-line .slider-slide:first").addClass("view-slide");
			
			$(".slider-block .slider-nav .markers .marker").removeClass("m_active");
			$(".slider-block .slider-nav .markers .marker:last").addClass("m_active");
			
			setTimeout( function() {
				$(".slider-block .slider-line").css('transition', 'all .0s ease-in-out');
				$('.slider-block .slider-line .slider-slide:first').remove();
				$(".slider-block .slider-line").css('width', $('div[data-type = slider]').width() * $('div[data-type = slider] .slider-line .slider-slide').length);
				$(".slider-block .slider-line .slider-slide:last").addClass("view-slide");
				$(".slider-block .slider-line").css('transform', 'translateX(-' + ((100 / $('div[data-type = slider] .slider-line .slider-slide').length) * ($('div[data-type = slider] .slider-line .slider-slide').length - 1)) + '%)');
			}, 500);
		}
	});
	
	$(".slider-block .slider-nav .markers .marker").click(function(){
		var slideIndex = $(this).index();
		var slideWidth = $('div[data-type = slider]').width();
		var slideCount = $('div[data-type = slider] .slider-line .slider-slide').length;
		
		$(".slider-block .slider-nav .markers .marker").removeClass("m_active");
		$(".slider-block .slider-nav .markers .marker").eq(slideIndex).addClass("m_active");
		
		$(".slider-block .slider-line .slider-slide").removeClass("view-slide");
		$(".slider-block .slider-line .slider-slide").eq(slideIndex).addClass("view-slide");
		
		$(".slider-block .slider-line").css('transition', 'all .5s ease-in-out');
		$(".slider-block .slider-line").css('transform', 'translateX(-' + ((100 / slideCount) * slideIndex) + '%)');
		setTimeout( function() {
			$(".slider-block .slider-line").css('transition', 'all .0s ease-in-out');
		}, 500);
	});
	
	function autoSlide(){
		$(".slider-block .slider-nav .next").click();
	}
	
	//setInterval(function(){ 
	//	autoSlide();
	//}, 5000);

});