/////////////////////////Char/////////////////////////////////
	 $(document).ready(function(){
		$('.char').click(function () {
			$(this).toggleClass('small');
			});
		});
		
	$(document).ready(function(){
		$('.char2').click(function () {
			$(this).toggleClass('small');
			});
		});
/////////////////////////Carousel/////////////////////////////////	
	    var width = 173; 
	    var count = 3; 

	    var carousel = document.getElementById('carousel');
	    var list = carousel.querySelector('ul');
	    var listElems = carousel.querySelectorAll('li');

	    var position = 0;

	    carousel.querySelector('.prev').onclick = function() {
	      position = Math.min(position + width * count, 0)
	      list.style.marginLeft = position + 'px';
	    };

	    carousel.querySelector('.next').onclick = function() {
	      position = Math.max(position - width * count, -width * (listElems.length - count));
	      list.style.marginLeft = position + 'px';
	    };	
/////////////////////////To Top Button/////////////////////////////////	 	
		$(function() {
			$(window).scroll(function() {
				if($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
				} else {
				$('#toTop').fadeOut();
			}
			});
				$('#toTop').click(function() {
				$('body,html').animate({scrollTop:0},800);
			});
		});

/////////////////////////Slider/////////////////////////////////			
  	$(document).ready(function() { 
						   
	var slides = $(".slider .slides").children(".slide"); 
	var width = $(".slider .slides").width(); 
	var i = slides.length; 
	var offset = i * width; 
	var cheki = i-1;
	
	$(".slider .slides").css('width',offset); 
	
	for (j=0; j < slides.length; j++) {
		if (j==0) {
			$(".slider .navigation").append("<div class='dot active'></div>");
		}
		else {
			$(".slider .navigation").append("<div class='dot'></div>");
		}
	}
	
	var dots = $(".slider .navigation").children(".dot");
	offset = 0;
	i = 0; 
	
	$('.slider .navigation .dot').click(function(){
		$(".slider .navigation .active").removeClass("active");								  
		$(this).addClass("active");
		i = $(this).index();
		offset = i * width;

		$('.slide').removeClass('active');
		var index=offset/width+1;
		$('.slider .slide:nth-child('+(index)+')').addClass('active');
		
		$(".slider .slides").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); 
	});
	
	
	
	$("body .slider .next").click(function(){	
		if (offset < width * cheki) {	
			offset += width; 

			$('.slide').removeClass('active');
			var index=offset/width+1;
			$('.slider .slide:nth-child('+(index)+')').addClass('active');
		
			$(".slider .slides").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); 
			$(".slider .navigation .active").removeClass("active");	
			$(dots[++i]).addClass("active");
		}
	});


	$("body .slider .prev").click(function(){	
		if (offset > 0) { 
			offset -= width;

			$('.slide').removeClass('active');
			var index=offset/width+1;
			$('.slider .slide:nth-child('+(index)+')').addClass('active');
		
			$(".slider .slides").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); 
			$(".slider .navigation .active").removeClass("active");	
			$(dots[--i]).addClass("active");
		}
	});
	function autoSlide(){
		 if ($(".slider .navigation .active").index() < $(".slider .slides").children(".slide").length-1) {
		  $("body .slider .next").click();
		 } else {
		  $('.slider .navigation .dot:first-child').click();
		 }
		}
	setInterval(function(){ autoSlide(); }, 7000);
});