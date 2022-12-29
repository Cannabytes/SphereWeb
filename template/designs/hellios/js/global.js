var swiper = new Swiper('.swiper-news', {
  speed: 1000,
  autoplay: {
    delay: 4000,
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'fraction',
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

$(function() {
  function ScrolClass() {
    if($(this).scrollTop() >= 50) {
            $('.topPanel').addClass('topPanel-fixed');
          } else {
            $('.topPanel').removeClass('topPanel-fixed');
          }
    }
    $(window).scroll(function() {
      ScrolClass();
    });
    $(document).ready(function() {
      ScrolClass();
    });
});
/*
$(window).ready = function () {
	[].forEach.call(document.querySelectorAll(".radio-custom"), function (el) {
		el.addEventListener("click", function () {
			[].forEach.call(document.querySelectorAll(".radio-custom-label"), function(label){
				label.style.color = "black";
			});

			document.querySelector("label[for='" + this.id + "']").style.color = "green";
			alert("TEST");
		});
	});
}*/

// To Top Button
$(function() {
  $(window).scroll(function() {
    if($(this).scrollTop() != 0) {
    $('.toTop').fadeIn();
  } else {
    $('.toTop').fadeOut();
  }
  });
    $('.toTop').click(function() {
    $('body,html').animate({scrollTop:0},800);
  });
});

$(".btn-drop").click(function(){
  $(this).toggleClass("active");
  $("."+$(this).attr("data-class")).toggleClass("active");
});

$("."+$(".btn-drop").attr("data-class")+" a").click(function(){
	//$(this).toggleClass("active");
	//$("."+$(this).attr("data-class")).toggleClass("active");
	let href = $(this).attr('href').replace('#', '');
	if(href != 'javascript:void(0)')
	{
		$(".btn-drop").removeClass("active");
		$("."+$(".btn-drop").attr("data-class")).removeClass("active");
	}
	
	
});

$(".popup_desc_click").click(function(){
  	$('.popup_desc_click').removeClass('_active');
	$(this).addClass('_active');

	//$(".popup_desc").removeClass("_active");
	//$(".popup_"+$(this).attr("data-class")).addClass('_active');
	
	//$(".popup_desc").hide();
	//$(".popup_"+$(this).attr("data-class")).show();
	

	if(!$(".popup_"+$(this).attr("data-class")).is(':visible'))
	{
		//$(".popup_desc").fadeOut(250);
		//$(".popup_"+$(this).attr("data-class")).fadeIn(250);
	var x = $(".popup_"+$(this).attr("data-class"));
	$(".popup_desc").fadeOut(250, function(){
            x.fadeIn(250)
        });
	}
	
});
/*
$(".popup_desc_click").click(function(){
  ///$(this).toggleClass("_active");
  //$("."+$(this).attr("data-class")).toggleClass("active");
  ///$(".popup_desc_click1").removeClass("_active");
});*/
 

//Tabs
(function($) {
  $(function() {
    $("ul.tabs-caption").on("click", "li:not(.active)", function() {
      $(this)
        .addClass("active")
        .siblings()
        .removeClass("active")
        .closest("div.tabs")
        .find("div.tabs-content")
        .removeClass("active")
        .eq($(this).index())
        .addClass("active");
    });
  });
})(jQuery);

// Hover and Click Block
if (window.matchMedia("(min-width: 1220px)").matches) //(min-width: 992px)
{
  $('.sub-menu ul').hide();
} else {
  $('.sub-menu ul').hide();
}
/*
$(".sub-menu").hover(function(){
  if (window.matchMedia("(min-width: 992px)").matches) {
      //$(this).children("ul").slideToggle("200");
	  
	/* $(this).children("ul").toggle(function () {
		//$(this).children("ul").show();
	}, function () {
		//$(this).children("ul").hide();
	});* /
  }
});*/

$(".sub-menu").on("mouseover", function(){
	if (window.matchMedia("(min-width: 1220px)").matches) {
        //быстро изменяем стиль display
       $(this).children("ul").show(0);
	}
});

$(".sub-menu").on("mouseout", function(){
	if (window.matchMedia("(min-width: 1220px)").matches) {
        //быстро изменяем стиль display
       $(this).children("ul").hide(0);
	}
});


$(".sub-menu").click(function(){
  if (!window.matchMedia("(min-width: 1220px)").matches)
  {
      $(this).toggleClass("active");
	  
		//$(".btn-drop").toggleClass("active");
		//$("."+$(".btn-drop").attr("data-class")).toggleClass("active");
      $(this).children("ul").slideToggle();
  }
});



$('#radio1').click(function(){
	//alert("Test1");
	//$('.radio-submit').html("Пополнить через QIWI");
})

$('#radio2').click(function(){
	//alert("Test2");
	//$('.radio-submit').html("Пополнить через PayPal");
})

// tabs
$('.tabTable2-button').click(function(){
	$('.tabTable2-button').removeClass('active');
	$(this).addClass('active');
	$('.tabTable2-block').removeClass('active');
	$('#'+$(this).attr('data-tab')).addClass('active');
	
	$('.tabTable-button').removeClass('active');
	$('.'+$(this).attr('data-tab')+'pvp').addClass('active');
	$('.tabTable-block').removeClass('active');
	$('#'+$(this).attr('data-tab')+'pvp').addClass('active');
})

// tabs
$('.tabTable-button').click(function(){
	$('.tabTable-button').removeClass('active');
	$(this).addClass('active');
	$('.tabTable-block').removeClass('active');
	$('#'+$(this).attr('data-tab')).addClass('active');
})

$('.tabTable3-button').click(function(){
	$('.tabTable3-button').removeClass('active');
	$(this).addClass('active');
	$('.tabTable3-block').removeClass('active');
	$('.serverstat>span').html($(this).attr('data-tab'));
	//loadlastStats(6);
	//ScrollToMain(self);
	/*if()
	{
		window.location.hash = '#'.$(this).attr('data-tab');
	}*/
	ScrollToMainHref(window.location.hash)
	//$('#'+$(this).attr('data-tab')).addClass('active');
})

function StatsPKPVP(server,href)
{
	$('.serverstat>span').html(server);
	$('.tabTable3 > .active').removeClass('active');
	var server_stats = $('.tabTable3 > a[data-tab="'+server+'"]');
	server_stats.addClass('active');
	$('.serverstat>span').html(server_stats.attr('data-tab'));
	ScrollToMain(href);
}
	



$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  centerMode: true,
  slidesToShow: 7,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1200,
      events: {
        slidesToShow: 5,
      }
    },
    {
      breakpoint: 1024,
      events: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 550,
      events: {
        slidesToShow: 1,
      }
    }
  ]
});

$('.slider-gallery').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      events: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 750,
      events: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 520,
      events: {
        slidesToShow: 1,
      }
    }
  ]
});

//$(function() {
	function formInfoTip(isError, title, message)
	{
		if(isError == 'success')
		{
			$('.alert').hide();
			//$('#w7-color').setAttribute("style","color: #ffffff;background-color: #ec282821;border-color: #f1262633;");
			$('.w7-close').css({"color":"#00ff1f","text-shadow":"0 1px 0 #00ff1f85"});
			$('#w7-color').css({"color":"#00ff1f", "background-color":"#34ec2821", "border-color":"#32f12633"});
			$('#w7-title').html("<center><b>"+title+"</b></center>");
			$('#w7-text').text(message);
			$('.alert').show(200);
		}
		else
		if(isError == 'info')
		{
			//color: #0f9ce2;
			//background-color: #063c50;
			//border-color: #0f9ce2;
			$('.alert').hide();
			//$('#w7-color').setAttribute("style","color: #ffffff;background-color: #ec282821;border-color: #f1262633;");
			$('.w7-close').css({"color":"#0f9ce2","text-shadow":"0 1px 0 #0f9ce285"});
			$('#w7-color').css({"color":"#0f9ce2", "background-color":"#063c5021", "border-color":"#0f9ce233"});
			$('#w7-title').html("<center><b>"+title+"</b></center>");
			$('#w7-text').text(message);
			$('.alert').show(200);
		}
		else
		if(isError == 'warning')
		{
			//color: #0f9ce2;
			//background-color: #063c50;
			//border-color: #0f9ce2;
			$('.alert').hide();
			//$('#w7-color').setAttribute("style","color: #ffffff;background-color: #ec282821;border-color: #f1262633;");
			$('.w7-close').css({"color":"#e2d20f","text-shadow":"0 1px 0 #e2d20f85"});
			$('#w7-color').css({"color":"#e2d20f", "background-color":"#504e0621", "border-color":"#e2d20f33"});
			$('#w7-title').html("<center><b>"+title+"</b></center>");
			$('#w7-text').text(message);
			$('.alert').show(200);
		}
		else
		{
			$('.alert').hide();
			$('.w7-close').css({"color":"#f35f5f","text-shadow":"0 1px 0 #f35f5f59"});
			$('#w7-color').css({"color":"#f35f5f", "background-color":"#ec282821", "border-color":"#f1262633"});
			$('#w7-title').html("<center><b>"+title+"</b></center>");
			$('#w7-text').text(message);
			$('.alert').show(200);
		}
	}
	
	function formInfoTipCustom(isError, title, message)
	{
		if(isError == 'success')
		{
			$('.alertcustom').hide();
			//$('#w8-color').setAttribute("style","color: #ffffff;background-color: #ec282821;border-color: #f1262633;");
			$('.w8-close').css({"color":"#00ff1f","text-shadow":"0 1px 0 #00ff1f85"});
			$('#w8-color').css({"color":"#00ff1f", "background-color":"#34ec2821", "border-color":"#32f12633"});
			$('#w8-title').html("<center><b>"+title+"</b></center>");
			$('#w8-text').text(message);
			$('.alertcustom').show(200);
		}
		else
		if(isError == 'info')
		{
			//color: #0f9ce2;
			//background-color: #063c50;
			//border-color: #0f9ce2;
			$('.alertcustom').hide();
			//$('#w8-color').setAttribute("style","color: #ffffff;background-color: #ec282821;border-color: #f1262633;");
			$('.w8-close').css({"color":"#0f9ce2","text-shadow":"0 1px 0 #0f9ce285"});
			$('#w8-color').css({"color":"#0f9ce2", "background-color":"#063c5021", "border-color":"#0f9ce233"});
			$('#w8-title').html("<center><b>"+title+"</b></center>");
			$('#w8-text').text(message);
			$('.alertcustom').show(200);
		}
		else
		if(isError == 'warning')
		{
			//color: #0f9ce2;
			//background-color: #063c50;
			//border-color: #0f9ce2;
			$('.alertcustom').hide();
			//$('#w8-color').setAttribute("style","color: #ffffff;background-color: #ec282821;border-color: #f1262633;");
			$('.w8-close').css({"color":"#e2d20f","text-shadow":"0 1px 0 #e2d20f85"});
			$('#w8-color').css({"color":"#e2d20f", "background-color":"#504e0621", "border-color":"#e2d20f33"});
			$('#w8-title').html("<center><b>"+title+"</b></center>");
			$('#w8-text').text(message);
			$('.alertcustom').show(200);
		}
		else
		{
			$('.alertcustom').hide();
			$('.w8-close').css({"color":"#f35f5f","text-shadow":"0 1px 0 #f35f5f59"});
			$('#w8-color').css({"color":"#f35f5f", "background-color":"#ec282821", "border-color":"#f1262633"});
			$('#w8-title').html("<center><b>"+title+"</b></center>");
			$('#w8-text').text(message);
			$('.alertcustom').show(200);
		}
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function ForgIn1(){
		$('.alert').hide();
		var l = Ladda.create( document.querySelector( '#send_email_button' ) );
		$.ajax({
			url: "/api.php",
			type: "POST",
			headers: {
				"X-Requested-With": "XMLHttpRequest"
			},
			data: {
				'forgot':'1',
				'emailorlogin':$('#SignInForm .modalContent .fields .fieldGroup input[name="emailorlogin"]').val(),
				'g-recaptcha-response':grecaptcha.getResponse()
				},
			beforeSend: function(){
				l.start();
			},
			success: function(result) {
				if(result.id == 1) //1 close
				{
					formInfoTip("success",'Сообщение',result.result);
					
					/*$('.forgot').hide();
					$('.registration').hide();
					$('.sign').hide();
					$('.flogin').hide();
					$('.fpassword').hide();
					$('.fpassword2').hide();
					$('.femail').hide();
					$('.femailorlogin').hide();
					$('.fcode').hide();
					$('.recaptcha').hide();
					$('#send_email_button').hide();*/
					
					$('.flogin').hide();
					$('.fpassword').show();
					fpassword_i.val('');
					$('.fpassword2').show();
					fpassword2_i.val('');
					$('.femail').hide();
					$('.femailorlogin').show(200);
					femailorlogin_i.attr('disabled', 'disabled');
					$('.fcode').show(200);
					fcode_i.val('');
					$('.recaptcha').hide();
					$('#send_email_button').html('Восстановить').attr("onClick","ForgIn2()").show();
					MyModalFunct();
					
					var overlay = $('#overlay');
					var modal = $('.modal_div');
					
					setTimeout(() => { modal.animate({opacity: 0, top: '15%'}, 200, 
						function(){ 
							$(this).css('display', 'none');
							overlay.fadeOut(400); 
						}
					); }, 1000);
				}
				else
				if(result.id == 2) //no
				{
					formInfoTip("success",'Сообщение',result.result);
					/*$('.forgot').hide();
					$('.registration').hide();
					$('.sign').hide();
					$('.flogin').hide();
					$('.fpassword').hide();
					$('.fpassword2').hide();
					$('.femail').hide();
					$('.femailorlogin').hide();
					$('.fcode').hide();
					$('.recaptcha').hide();
					$('#send_email_button').hide();
					*/
					$('.flogin').hide();
					$('.fpassword').show();
					fpassword_i.val('');
					$('.fpassword2').show();
					fpassword2_i.val('');
					$('.femail').hide();
					$('.femailorlogin').show(200);
					femailorlogin_i.attr('disabled', 'disabled');
					$('.fcode').show(200);
					fcode_i.val('');
					$('.recaptcha').hide();
					$('#send_email_button').html('Восстановить').attr("onClick","ForgIn2()").show();
					MyModalFunct();
				}
				else
				if(result.id == 0)
				{
					formInfoTip("info",'Сообщение',result.result);
					/*$('.forgot').hide();
					$('.registration').hide();
					$('.sign').hide();
					$('.flogin').hide();
					$('.fpassword').hide();
					$('.fpassword2').hide();
					$('.femail').hide();
					$('.femailorlogin').hide();
					$('.fcode').hide();
					$('.recaptcha').hide();
					$('#send_email_button').hide();
					*/
					$('.flogin').hide();
					$('.fpassword').show();
					fpassword_i.val('');
					$('.fpassword2').show();
					fpassword2_i.val('');
					$('.femail').hide();
					$('.femailorlogin').show(200);
					femailorlogin_i.attr('disabled', 'disabled');
					$('.fcode').show(200);
					fcode_i.val('');
					$('.recaptcha').hide();
					$('#send_email_button').html('Восстановить').attr("onClick","ForgIn2()").show();
					MyModalFunct();
				}
				else
				if(result.id == -1)
				{
					formInfoTip("error",'Ошибка',result.error);
					MyModalFunct();//
				}
				else
				{
					formInfoTip("error",'Ошибка',"Unknown");
					MyModalFunct();//
				}
			},
			complete: function(){
				///$('#send_email_button').ladda( 'setProgress', 1 ).ladda('stop');
				l.setProgress( 1 );
				l.stop();
				grecaptcha.reset();
				// Personal();
			}
		});
		return false;
	}
	
	function ForgIn2(){
		$('.alert').hide();
		var l = Ladda.create( document.querySelector( '#send_email_button' ) );
		$.ajax({
			url: "/api.php",
			type: "POST",
			headers: {
				"X-Requested-With": "XMLHttpRequest"
			},
			data: {
				'forgot':'2',
				'emailorlogin':$('#SignInForm .modalContent .fields .fieldGroup input[name="emailorlogin"]').val(),
				'password':$('#SignInForm .modalContent .fields .fieldGroup input[name="password"]').val(),
				'password2':$('#SignInForm .modalContent .fields .fieldGroup input[name="password2"]').val(),
				'code':$('#SignInForm .modalContent .fields .fieldGroup input[name="code"]').val(),
				'g-recaptcha-response':grecaptcha.getResponse()
				},
			beforeSend: function(){
				l.start();
			},
			success: function(result) {
				if(result.id == 1)
				{
					formInfoTip("success",'Сообщение',result.result);
					
					$('.forgot').hide();
					$('.registration').hide();
					$('.sign').hide();
					$('.flogin').hide();
					$('.fpassword').hide();
					$('.fpassword2').hide();
					$('.femail').hide();
					$('.femailorlogin').hide();
					$('.fcode').hide();
					$('.recaptcha').hide();
					$('#send_email_button').hide();
					
					var overlay = $('#overlay');
					var modal = $('.modal_div');
					
					setTimeout(() => { modal.animate({opacity: 0, top: '15%'}, 200, 
						function(){ 
							$(this).css('display', 'none');
							overlay.fadeOut(400); 
							document.location.href = '/#events';
							ScrollToMainHref(window.location.hash);
						}
					); }, 1000);
				}
				else
				if(result.id == 2)
				{
					formInfoTip("info",'Сообщение',result.result);
					/*$('.forgot').hide();
					$('.registration').hide();
					$('.sign').hide();
					$('.flogin').hide();
					$('.fpassword').hide();
					$('.fpassword2').hide();
					$('.femail').hide();
					$('.femailorlogin').hide();
					$('.fcode').hide();
					$('.recaptcha').hide();
					$('#send_email_button').hide();*/
					MyModalFunct();
				}
				else
				if(result.id == 0)
				{
					formInfoTip("info",'Сообщение',result.result);
					MyModalFunct();//
				}
				else
				if(result.id == -1)
				{
					formInfoTip("error",'Ошибка',result.error);
					MyModalFunct();//
				}
				else
				if(result.id == -2)
				{
					formInfoTip("error",'Ошибка',result.error);
					$('.flogin').hide();
					$('.fpassword').hide();
					$('.fpassword2').hide();
					$('.femail').hide();
					$('.femailorlogin').show(200);
					femailorlogin_i.removeAttr('disabled');
					$('.fcode').hide(200);
					$('.recaptcha').hide();
					$('#send_email_button').html('Отправить').attr("onClick","ForgIn1()").show();
					MyModalFunct();
					
				}
				else
				{
					formInfoTip("error",'Ошибка',"Unknown");
					MyModalFunct();//
				}
			},
			complete: function(){
				///$('#send_email_button').ladda( 'setProgress', 1 ).ladda('stop');
				l.setProgress( 1 );
				l.stop();
				grecaptcha.reset();
				// Personal();
			}
		});
		return false;
	}
	
	function RegIn(){
		$('.alert').hide();
		var l = Ladda.create( document.querySelector( '#send_email_button' ) );
		$.ajax({
			url: "/api.php",
			type: "POST",
			headers: {
				"X-Requested-With": "XMLHttpRequest"
			},
			data: {
				'register':'1',
				'username':$('#SignInForm .modalContent .fields .fieldGroup input[name="username"]').val(),
				'password':$('#SignInForm .modalContent .fields .fieldGroup input[name="password"]').val(),
				'password2':$('#SignInForm .modalContent .fields .fieldGroup input[name="password2"]').val(),
				'email':$('#SignInForm .modalContent .fields .fieldGroup input[name="email"]').val(),
				'g-recaptcha-response':grecaptcha.getResponse()
				},
			beforeSend: function(){
				l.start();
			},
			success: function(result) {
				if(result.id == 1)
				{
					formInfoTip("success",'Сообщение',result.result);
					
					$('.forgot').hide();
					$('.registration').hide();
					$('.sign').hide();
					$('.flogin').hide();
					$('.fpassword').hide();
					$('.fpassword2').hide();
					$('.femail').hide();
					$('.femailorlogin').hide();
					$('.fcode').hide();
					$('.recaptcha').hide();
					$('#send_email_button').hide();
					
					var overlay = $('#overlay');
					var modal = $('.modal_div');
					
					setTimeout(() => { modal.animate({opacity: 0, top: '15%'}, 200, 
						function(){ 
							$(this).css('display', 'none');
							overlay.fadeOut(400); 
							//document.location.href = '/#events';
							document.location.href = '/#bonus';
							ScrollToMainHref(window.location.hash);
							setTimeout(function()
							{
								$('#anims').addClass('grn');
								setTimeout(function()
								{
									$('#anims').removeClass('grn');
								},10000);
								
							},1000);
						}
					); }, 1000);
				}
				else
				if(result.id == -1)
				{
					formInfoTip("error",'Ошибка',result.error);
				}
				else
				{
					formInfoTip("error",'Ошибка',"Unknown");
				}
			},
			complete: function(){
				///$('#send_email_button').ladda( 'setProgress', 1 ).ladda('stop');
				l.setProgress( 1 );
				l.stop();
				grecaptcha.reset();
				// Personal();
			}
		});
		return false;
	}
	
	function LogIn(){
		$('.alert').hide();
		//Ladda.bind( '#send_email_button', { timeout: 2000 } );
		var l = Ladda.create( document.querySelector( '#send_email_button' ) );
		
	
		//console.log($('input[name="g-recaptcha-response"]').val());
		$.ajax({
			//"url": cp_url+'/auth/register.php?ajax=sendEmail',
			url: "/api.php",
			type: "POST",
			//method: "GET",
			headers: {
				"X-Requested-With": "XMLHttpRequest"
			},
			data: {
				'login':'1',
				'username':$('#SignInForm .modalContent .fields .fieldGroup input[name="username"]').val(),
				'password':$('#SignInForm .modalContent .fields .fieldGroup input[name="password"]').val(),
				'g-recaptcha-response':grecaptcha.getResponse()
				},
			beforeSend: function(){
				///$('.custom-tooltip-error').remove();
				///$('#send_email_button').ladda().ladda('start');
				l.start();
			},
			success: function(result) {
				//$('.alert').hide();
				//notification(result.status,result.message,5000);
				
				//if(result.status == 'success')
				if(result.id == 1)
				{
					
					//$('.reg-buttons').show();
					//$('#passTypeBlock').show();
					//alert(result.result);
					formInfoTip("success",'Сообщение',result.result);
					
					$('.forgot').hide();
					$('.registration').hide();
					$('.sign').hide();
					$('.flogin').hide();
					$('.fpassword').hide();
					$('.fpassword2').hide();
					$('.femail').hide();
					$('.femailorlogin').hide();
					$('.fcode').hide();
					$('.recaptcha').hide();
					$('#send_email_button').hide();
					
					var overlay = $('#overlay');
					var modal = $('.modal_div');
					
					setTimeout(() => { modal.animate({opacity: 0, top: '15%'}, 200, 
						function(){ 
							$(this).css('display', 'none');
							overlay.fadeOut(400);
							document.location.href = '/#events';
							ScrollToMainHref(window.location.hash);
						}
					); }, 1000);
					
					
					/*
					modal.animate({opacity: 0, top: '15%'}, 2000, 
						function(){ 
							$(this).css('display', 'none');
							overlay.fadeOut(400); 
						}
					);*/
					
					/*overlay.fadeIn(400, 
						function(){ 
							$('#register') 
								.css('display', 'block') 
								.animate({opacity: 1, top: '10%'}, 200); 
					});*/
					
					
					
				}
				else
				if(result.id == -1)
				{
					formInfoTip("error",'Ошибка',result.error);
				}
				else
				{
					formInfoTip("error",'Ошибка',"Unknown");
				}
			},
			complete: function(){
				///$('#send_email_button').ladda( 'setProgress', 1 ).ladda('stop');
				l.setProgress( 1 );
				l.stop();
				grecaptcha.reset();
				// Personal();
			}
		});
		return false;
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function convertToHex(str)
	{
		var hex = '';
		for(var i=0;i<str.length;i++) {
			hex += ''+str.charCodeAt(i).toString(16);
		}
		return hex;
	}
	
	
	

	function CheckHash()
	{

		
		switch (window.location.hash)
				{
					case "#events":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".events").fadeIn(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeOut(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeOut(500);
						$(".rules").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);
						
						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						break;
					}
					case "#stream":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".fadeOut").fadeIn(500);
						$(".events").fadeOut(500);
						$(".stream").fadeIn(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeOut(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeOut(500);
						$(".rules").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);

						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						break;
					}
					case "#stock":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".fadeOut").fadeIn(500);
						$(".events").fadeOut(500);
						$(".stream").fadeOut(500);
						$(".stock").fadeIn(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeOut(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeOut(500);
						$(".rules").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);

						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						break;
					}
					case "#rules":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".fadeOut").fadeIn(500);
						$(".events").fadeOut(500);
						$(".stream").fadeOut(500);
						$(".rules").fadeIn(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeOut(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);

						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						break;
					}
					case "#bonus":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".events").fadeOut(500);
						$(".bonus").fadeIn(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeOut(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeOut(500);
						$(".stream").fadeOut(500);
						$(".rules").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);
						
						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						break;
					}
					case "#newsall":
					case "#news":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".events").fadeOut(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeIn(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeOut(500);
						$(".stream").fadeOut(500);
						$(".rules").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);
						
						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						break;
					}
					case "#download":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".events").fadeOut(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeOut(500);
						$(".download").fadeIn(500);
						$(".server_description").fadeOut(500);
						$(".stream").fadeOut(500);
						$(".rules").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);
						
						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						break;
					}
					case "#server_description":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".events").fadeOut(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeOut(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeIn(500);
						$(".stream").fadeOut(500);
						$(".rules").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);

						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						break;
					}
					case "#statistic":
					case "#statpvp":
					case "#statpk":
					

					//case "#PVPx25":
					//case "#PVPx1200":
					//case "#PKx25":
					//case "#PKx1200":
					case "#statblock":
					case "#statclan":
					case "#statheroes":
					case "#statcastle":
					case "#statinfo":
					{
						$(".topHomeBlocks1").fadeOut(500);
						$(".line1").fadeOut(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'flex');
						//$(".mainHomeBlock1").css('justify-content' , 'space-between');
						$(".rankings").css('margin-bottom' , '15px');
						$(".forumHome").css('margin-bottom' , '15px');
						//$(".mainHomeBlock").css('display' , 'block');
						$(".content").fadeIn(600);
						$(".events").fadeOut(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeIn(500);
						$(".news").fadeOut(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeOut(500);
						$(".stream").fadeOut(500);
						$(".rules").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeOut(500);
						$(".sliderGallery").fadeIn(500);
						
						//$(".aside").css('max-width','365px');//max-width: unset;
						$('aside').removeClass('asideMain');
						
						break;
					}
					default:
					{
						$(".content").fadeOut(600);
						$(".events").fadeOut(500);
						$(".bonus").fadeOut(500);
						$(".statistic").fadeOut(500);
						$(".news").fadeOut(500);
						$(".download").fadeOut(500);
						$(".server_description").fadeOut(500);
						$(".stream").fadeOut(500);
						$(".rules").fadeOut(500);
						$(".stock").fadeOut(500);

						$(".topHomeBlocks1").fadeIn(500);
						/*$(".topHomeBlocks1").fadeIn('show', function () {
							$('.topHomeBlocks1').animate({'opacity': 'show', 'paddingTop': 0}, 2000);
						});*/
						
						
						$(".line1").fadeIn(500);
						$(".mainHomeBlock1").fadeIn(500);
						//$(".mainHomeBlock1").css('display' , 'block');
						//$(".mainHomeBlock1").css('justify-content' , 'flex-start');
						$(".rankings").css('margin-bottom' , '0px');
						$(".forumHome").css('margin-bottom' , '0px');
						//$(".mainHomeBlock").css('display' , 'flex');
						$(".bigSlider1").fadeIn(500);
						$(".line2").fadeIn(500);
						$(".sliderGallery").fadeIn(500);
						
						/*$("aside").css('display','flex');
						$("aside").css('justify-content','space-between');
						$("aside").css('flex-wrap','wrap');
						$("aside").css('max-width','unset');//max-width: 365px;
						$(".rankings").css('margin','0px'); //margin: 15px;
						$(".forumHome").css('margin','0px'); //margin: 15px;
						$(".socHome").css('margin','0px'); //margin: 15px;*/
						
						
						//$(".aside").css('max-width','unset');//max-width: 365px;
						//asideMain
						$('aside').addClass('asideMain');
					
							

						break;
					}
				}
		
		
		
		if(true)
		{
			///pagenews.html(page);
			switch (window.location.hash)
			{
				case "#statistic":
				{
					$('.topTitle').html('Top Player');
					break;
				}
				//case "#PVPx25":
				//case "#PVPx1200":
				case "#statpvp":
				{
					$('.topTitle').html('Top PVP');
					break;
				}
				//case "#PKx25":
				//case "#PKx1200":
				case "#statpk":
				{
					$('.topTitle').html('Top PK');
					break;
				}
				
				case "#static_page_1":
				{
					$('.topTitle').html('Top PK');
					break;
				}
				
				case "#statclan":
				{
					$('.topTitle').html('Top Clan');
 					break;
				}
				case "#statblock":
				{
					$('.topTitle').html('Top Block');
 					break;
				}
				case "#statheroes":
				{
					$('.topTitle').html('Top Heroes');
 					break;
				}
				case "#statcastle":
				{
					$('.topTitle').html('Замки');
 					break;
				}
				case "#statinfo":
				{
					$('.topTitle').html('Информация');
					loadlastStats(6);
					break;
				}
				case "#newsall":
				case "#news":
				{
					loadlastStats(7);
					break;
				}
				default:
				{
					$('.topTitle').html('Top Игроков');
					//loadlastStats(6);
					break;
				}
			}
			
		}
	}
	

	function ScrollToMainHref(href)
	{
		switch (href)
				{
					case "#download":
					case "#description":
					case "#news":
					case "#newsall":
					case "#events":
					case "#stream":
					case "#rules":
					case "#stock":
					case "#server_description":
					case "#bonus":
					{
						 //$(".content").promise().done(function() {
							var header = $("header");
							$('html, body').animate({
							scrollTop: (header.offset().top+header.outerHeight())-180
							}, {
								duration: 400,   // по умолчанию «400» 
								easing: "linear" // по умолчанию «swing» 
							});
						// });
						
						
						
						break;
					}
					case "#statistic":
					case "#statpvp":
					case "#statpk":
 					//case "#PVPx25":
					//case "#PVPx1200":
					//case "#PKx25":
					//case "#PKx1200":
					case "#statblock":
					case "#statclan":
					case "#statheroes":
					case "#statcastle":
					case "#statinfo":
					{
						/*$('html, body').animate({
							scrollTop: $(".main").offset().top-90
						}, {
							duration: 400,   // по умолчанию «400» 
							easing: "linear" // по умолчанию «swing» 
						});*/
						//$(".content").promise().done(function() {
							var header = $("header");
							$('html, body').animate({
							scrollTop: (header.offset().top+header.outerHeight())-180
							}, {
								duration: 400,   // по умолчанию «400» 
								easing: "linear" // по умолчанию «swing» 
							});
						// });
						break;
					}
					default:
					{
						var header = $("header");
						$('html, body').animate({
						scrollTop: header.offset().top
						}, {
							duration: 400,   // по умолчанию «400» 
							easing: "linear" // по умолчанию «swing» 
						});
						break;
					}
				}
				
		var page = 1;
		if(true)
		{
			switch (href)
			{
				case "#statistic":
				{
					$('.topTitle').html('Top Игроков');
					break;
				}
				//case "#PVPx25":
				//case "#PVPx1200":
				case "#statpvp":
				{
					$('.topTitle').html('Top PVP');
					break;
				}
				//case "#PKx25":
				//case "#PKx1200":
				case "#statpk":
				{
					$('.topTitle').html('Top PK');
					break;
				}
				
				case "#static_page_1":
				{
					$('.topTitle').html('Статическая страница');
					break;
				}
				
				case "#statclan":
				{
					$('.topTitle').html('Top Clan');
					break;
				}
				case "#statblock":
				{
					$('.topTitle').html('Top Block');
					break;
				}
				case "#statheroes":
				{
					$('.topTitle').html('Top Heroes');
					break;
				}
				case "#statcastle":
				{
					$('.topTitle').html('Замки');
					break;
				}
				case "#statinfo":
				{
					$('.topTitle').html('Информация');
					break;
				}
				default:
				{
					$('.topTitle').html('Top Игроков');
					break;
				}
			}
			loadlastStats(6);
		}
	}
	
	function ScrollToMain(self)
	{
		var href = $(self).attr("href");
		ScrollToMainHref(href);
	}

	window.onhashchange = function()
	{ 
		
		// Personal();
		CheckHash();
	}
	
	window.onload = function()
	{
		rightPanelPvPTop()
		rightPanelPKTop()
		get_online_player_now()
		ScrollToMainHref(window.location.hash);
		CheckHash()
	}

	function Personal() {
		var personal = $('.topPanel-right'); 
		//personal.html('');
		$.ajax({
			url: "/api.php",
			//method: "GET",
			type: "POST",
			headers: {
				"X-Requested-With": "XMLHttpRequest"
			},
			data: { },
			success: function(data) {
				//alert(personal.html());
				//var res = data.html;
				//res = res.replace("\\r\\n", "\\n");
				var res = String(data.html).replaceAll(/(\r\n)/gm, '\n');
				
				//Text = Text.replace(/(\r\n|\n|\r)/gm," ");
				//alert(res);
				//alert(personal.html());
				
				//console.log(convertToHex(JSON.stringify(res)))
				//console.log(convertToHex(JSON.stringify(personal.html())))
				
				//console.log((JSON.stringify(res)))
				//console.log((JSON.stringify(personal.html())))
				
				//console.log(convertToHex(res))
				//console.log(convertToHex(personal.text()))
				
				if(res != personal.html())
				{
					//personal.hide();
					//personal.html(res);
					//personal.fadeIn(500);
					/*
					personal.fadeOut(200).queue(function(done) {
						var personal = $('.topPanel-right'); 
						personal.html(1234);
						personal.fadeIn(200, done);
					});*/
					
					personal.fadeOut(500);
					personal.promise().done(function() {
						//var personal = $('.topPanel-right');
						personal.html(res);
						personal.fadeIn(500);
					});
				}
				
				var user_id = $('#user_id')
				if(data.user_id.length != 0 && data.user_id != user_id.html())
				{
					//user_id.html(data.user_id);
					$('.qiwiaccount').val(data.user_id);
					
					user_id.fadeOut(500);
					user_id.promise().done(function() {
						user_id.html(data.user_id);
						user_id.fadeIn(500);
					});
				}
				
				var user_l2money = $('#user_l2money')
				if(data.user_l2money.length != 0 && (data.user_l2money+"₽") != user_l2money.html())
				{
					
					
					//user_l2money.html(data.user_l2money);
					user_l2money.fadeOut(500);
					user_l2money.promise().done(function() {
						user_l2money.html(data.user_l2money+"₽");
						user_l2money.fadeIn(500);
					});
				}
				
				var user_l2email = $('#user_l2email')
				if(data.user_l2email.length != 0 && data.user_l2email != user_l2email.html())
				{
					//user_l2email.html(data.user_l2email);
					user_l2email.fadeOut(500);
					user_l2email.promise().done(function() {
						user_l2email.html(data.user_l2email);
						user_l2email.fadeIn(500);
					});
				}
				
				var user_country = $('#user_country')
				if(data.user_country.length != 0 && data.user_country != user_country.html())
				{
					//user_country.html(data.user_country);
					user_country.fadeOut(500);
					user_country.promise().done(function() {
						user_country.html(data.user_country);
						user_country.fadeIn(500);
					});
				}
				
				var user_city = $('#user_city')
				if(data.user_city.length != 0 && data.user_city != user_city.html())
				{
					//user_city.html(data.user_city);
					user_city.fadeOut(500);
					user_city.promise().done(function() {
						user_city.html(data.user_city);
						user_city.fadeIn(500);
					});
				}
				
				var user_ip = $('#user_ip')
				if(data.user_ip.length != 0 && data.user_ip != user_ip.html())
				{
					//user_ip.html(data.user_ip);
					user_ip.fadeOut(500);
					user_ip.promise().done(function() {
						user_ip.html(data.user_ip);
						user_ip.fadeIn(500);
					});
				}
				
				var user_history_l2money = $('#user_history_l2money')
				if(data.user_history_l2money.length != 0 && data.user_history_l2money+"₽" != user_history_l2money.html())
				{
					//user_history_l2money.html(data.user_history_l2money);
					user_history_l2money.fadeOut(500);
					user_history_l2money.promise().done(function() {
						user_history_l2money.html(data.user_history_l2money+"₽");
						user_history_l2money.fadeIn(500);
					});
				}
				
				var parsed = 0;
				
				parsed = parseFloat(data.user_vip);
				if (isNaN(parsed) || parsed < 1)
				{
					parsed = 0;
				}
				else
				{
					parsed = 1;
				}
				//console.log('parsed0 '+parsed);
				
				var user_vip = $('#is_vip')
				if(parsed != user_vip.html())
				{
					user_vip.html(parsed);
					//    background: url(../images/body-bg.jpg) center top no-repeat;
					//user_history_l2money.html(data.user_history_l2money);
					
					//user_vip.fadeOut(500);
					//user_vip.promise().done(function() {
						//user_history_l2money.html(data.user_history_l2money+"₽");
						//user_history_l2money.fadeIn(500);
					//});
					

					
					if(parsed > 0)
					{
						$('.body').css("backgroundImage","url(../images/body-bg-vip.jpg)").fadeIn(3000);
						/*$(".body").fadeOut("slow", function () {
							$(this).css("background-image", "url(../images/body-bg-vip.jpg)");
							$(this).fadeIn("slow");
						});*/
						//console.log('parsed1 '+parsed);
					}
					else
					{
						$('.body').css("backgroundImage","url(../images/body-bg.jpg)").fadeIn(3000);
						/*$(".body").fadeOut("slow", function () {
							$(this).css("background-image", "url(../images/body-bg.jpg)");
							$(this).fadeIn("slow");
						});*/
						//console.log('parsed2 '+parsed);
					}
				}
				
				if(data.user_id == '' && window.location.hash == '#events')
				{
					document.location.href = '/#';
					OpenModalClick();
				}
				else
				if(data.user_id == '' && window.location.hash == '#static_page_1')
				{
					document.location.href = '/#';
					OpenModalClick();
				}
				else
				if(data.user_id == '' && window.location.hash == '#bonus')
				{
					document.location.href = '/#';
					OpenModalClick();
				}
				
				
				//Main();
				//alert(data.html);
				/*var personal_exit = $('.personal-exit');
				personal_exit.click( function(event){ 
					event.preventDefault();
					$.ajax({
						url: "/logout.php",
						method: "GET",
						headers: {
						"X-Requested-With": "XMLHttpRequest"
						},
						data: { },
						success: function(data) {
							Personal();
						}
					});
				});*/
			}
		});
		//Main();
	}
	/*
	function PersonalPage()
	{
		//Personal();
		//document.location.href = '/index.php?events';
		document.location.href = '/#events';
		//Personal();
	}*/
	/*
	function HomePage()
	{
		//Personal();
		//document.location.href = '/index.php?events';
		document.location.href = '/#home';
		//Personal();
	}*/
	
	
	//forgot
	function Forgot() {
		$('.alert').hide();
		$('.modalTitle').html('Восстановление');
		$('.forgot').hide();
		$('.registration').hide();
		$('.sign').show();
		
		$('.flogin').hide();
		$('.fpassword').hide();
		$('.fpassword2').hide();
		$('.femail').hide();
		$('.femailorlogin').show(200);
		femailorlogin_i.removeAttr('disabled');
		$('.fcode').hide();
		$('.recaptcha').hide();
		$('#send_email_button').html('Отправить').attr("onClick","ForgIn1()").show();
		MyModalFunct();
		return false;
	}
	
	//registration
	function Registration() {
		$('.alert').hide();
		$('.modalTitle').html('Регистрация');
		$('.forgot').hide();
		$('.registration').hide();
		$('.sign').show();
		
		$('.flogin').show();
		flogin_i.val('');
		$('.fpassword').show();
		fpassword_i.val('');
		$('.fpassword2').show();
		fpassword2_i.val('');
		$('.femail').show();
		femail_i.val('');
		$('.femailorlogin').hide();
		$('.fcode').hide();
		$('.recaptcha').hide();
		$('#send_email_button').html('Регистрация').attr("onClick","RegIn()").show();
		MyModalFunct();
		return false;
	}
	
	//sign
	function SignIn() {
		$('.alert').hide();
		$('.modalTitle').html('Авторизация');
		$('.forgot').show();
		$('.registration').show();
		$('.sign').hide();
		
		$('.flogin').show();
		$('.fpassword').show();
		$('.fpassword2').hide();
		$('.femail').hide();
		$('.femailorlogin').hide();
		$('.fcode').hide();
		$('.recaptcha').hide();
		$('#send_email_button').html('Войти').attr("onClick","LogIn()").show();
		MyModalFunct();
		return false;
	}
	
	
	function PersonalExit() {
		document.location.href = '/#';
		//Personal();
					$.ajax({
						url: "/logout.php",
						method: "GET",
						headers: {
						"X-Requested-With": "XMLHttpRequest"
						},
						data: { },
						success: function(data) {
							// Personal();
						}
					});
		return false;
	}
	
	function OpenModalClick()
	{
			// grecaptcha.reset();
			//$('.modalTitle').html('');
			SignIn();
		
			var overlay = $('#overlay');
			//$('.alert').hide();
			
			//var div =  $('#register');
			overlay.fadeIn(400, 
				function(){ 
					//var div = $(this).attr('href'); 
					var div = $('.modal_div');
					$(div) 
						.css('display', 'block') 
						.animate({opacity: 1, top: '10%'}, 200); 
						$('#SignInForm .modalContent .fields .fieldGroup input[name="username"]').focus();
			});
		return false;
	}
	
	function CloseModalClick()
	{
			var modal = $('.modal_div'); 
			modal 
				.animate({opacity: 0, top: '15%'}, 200, 
					function(){ 
						$(this).css('display', 'none');
						var overlay = $('#overlay');
						overlay.fadeOut(400); 
					}
				);
		return false;
	}
	
	function OpenModalAlertClick()
	{
			///grecaptcha.reset();
			//$('.modalTitle').html('');
			///SignIn();
		
			var overlay = $('#overlayalert');
			//$('.alert').hide();
			
			//var div =  $('#register');
			overlay.fadeIn(400, 
				function(){ 
					//var div = $(this).attr('href'); 
					var div = $('.modalalert_div');
					$(div) 
						.css('display', 'block') 
						.animate({opacity: 1, top: '10%'}, 200); 
						///$('#SignInForm .modalContent .fields .fieldGroup input[name="username"]').focus();
			});
		return false;
	}
	
	function OpenModalMainClick()
	{

		var overlay = $('#overlaymain');
		overlay.fadeIn(400, 
			function(){ 
				//var div = $(this).attr('href'); 
				var div = $('.modalmain_div');
				$(div) 
					.css('display', 'block') 
					.animate({opacity: 1, top: '0%'}, 200); 
					///$('#SignInForm .modalContent .fields .fieldGroup input[name="username"]').focus();
		});
		
		//var title = "test1";
		//var message = "test2";
		
		$('.maincustom').hide();
		
		$('.maincustom').show(200);
		
			
			
			
		return false;
	}
	
	function CloseModalAlertClick()
	{
			var modal = $('.modalalert_div'); 
			modal 
				.animate({opacity: 0, top: '15%'}, 200, 
					function(){ 
						$(this).css('display', 'none');
						var overlay = $('#overlayalert');
						overlay.fadeOut(400); 
					}
				);
		return false;
	}
	
	/*
				document.getElementById('raz').onclick = function(e) {
			if (e.target.nodeName.toUpperCase() == 'A') { return true; }
				alert("скрипт сработал");
		}
	*/
	/*
	$('.modalmain_div').addEvent('click', function(ev){
		CloseModalMainClick();
		ev.stopPropagation(); // this will prevent the event to bubble up, and fire the parent click event.
	});*/
	
	function CloseModalMainClick()
	{

		
			var modal = $('.modalmain_div'); 
			/*modal.onclick = function(e)
			{
				if (e.target.nodeName.toUpperCase() == 'A')
				{
					//return true; 
				}
				alert("скрипт сработал");
			}*/
			
			modal 
				.animate({opacity: 0, top: '0%'}, 200, 
					function(){ 
						$(this).css('display', 'none');
						var overlay = $('#overlaymain');
						overlay.fadeOut(400); 
					}
				);
			//evt.preventDefault();
		return false;
	}
	
	/*
	function Main() 
	{
		var overlay = $('#overlay'); 
		var open_modal = $('.open_modal'); 
		var close = $('.modal_close, #overlay'); 
		//var close = $('.modal_close'); 
		var modal = $('.modal_div'); 
		
		open_modal.click( function(event){ 
			event.preventDefault(); 
			$('.alert').hide();
			var div = $(this).attr('href'); 
			//var div =  $('#register');
			overlay.fadeIn(400, 
				function(){ 
					$(div) 
						.css('display', 'block') 
						.animate({opacity: 1, top: '10%'}, 200); 
			});
			//$(div) 
						//.css('display', 'block') 
						//.animate({opacity: 1, top: '10%'}, 200); 
		});
		
		close.click( function(){
			//event.preventDefault(); //
				modal 
				.animate({opacity: 0, top: '15%'}, 200, 
					function(){ 
						$(this).css('display', 'none');
						overlay.fadeOut(400); 
					}
				);
				//$(this).css('display', 'none');
		});
	}
	*/
	
	var MyModalFunction = MyModalFunct;
	var flogin_i = $('.flogin input');
	var fpassword_i = $('.fpassword input');
	var fpassword2_i = $('.fpassword2 input');
	var femail_i = $('.femail input');
	var femailorlogin_i = $('.femailorlogin input');
	var fcode_i = $('.fcode input');
	
	function none()
	{
		
	}
	
	//var MyModalFunction = function()
	function MyModalAlert(isError, title, message)
	{
		//alert('test');
		OpenModalAlertClick();
		formInfoTipCustom(isError, title, message);
	}
	
	//var MyModalFunction = function()
	function MyModalFunct()
	{
		
		
		var recaptcha = $('.recaptcha');
		var send_email_button = $('#send_email_button');
		
		//alert(flogin.val());
		
		if(send_email_button.attr('onClick') == 'LogIn()')
		{
			if(flogin_i.val() != '' && fpassword_i.val() != '')
			{
				recaptcha.show(200);
			}
			else
			{
				recaptcha.hide(200);
			}
		}
		else
		if(send_email_button.attr('onClick') == 'RegIn()')
		{
			if(flogin_i.val() != '' && fpassword_i.val() != '' && fpassword2_i.val() != '' && femail_i.val() != '')
			{
				recaptcha.show(200);
			}
			else
			{
				recaptcha.hide(200);
			}
		}
		else
		if(send_email_button.attr('onClick') == 'ForgIn1()')
		{
			if(femailorlogin_i.val())
			{
				recaptcha.show(200);
			}
			else
			{
				recaptcha.hide(200);
			}
		}
		else
		if(send_email_button.attr('onClick') == 'ForgIn2()')
		{
			if(femailorlogin_i.val() != '' && fcode_i.val() != '')
			{
				recaptcha.show(200);
			}
			else
			{
				recaptcha.hide(200);
			}
		}
		
	}
	
    $(document).ready(function() {

		$('.serverstat>span').html('x25');
		
        // Personal();
		CheckHash();
		//Main();
		//setTimeout(sayHi, 1000);
		

		//var flogin = $('.flogin input');
		//var fpassword = $('.fpassword input');
		//var fpassword2 = $('.fpassword2 input');
		//var femail = $('.femail input');
		//var femailorlogin = $('.femailorlogin input');
		//var fcode = $('.fcode input');
		
		var recaptcha = $('.recaptcha');
		var send_email_button = $('#send_email_button');
		/*
		var MyModalFunction = function()
		{
			if(send_email_button.attr('onClick') == 'LogIn()')
			{
				if(flogin.val() != '' && fpassword.val() != '')
				{
					recaptcha.show(200);
				}
				else
				{
					recaptcha.hide(200);
				}
			}
			else
			if(send_email_button.attr('onClick') == 'RegIn()')
			{
				if(flogin.val() != '' && fpassword.val() != '' && fpassword2.val() != '' && femail.val() != '')
				{
					recaptcha.show(200);
				}
				else
				{
					recaptcha.hide(200);
				}
			}
			else
			if(send_email_button.attr('onClick') == 'ForgIn()')
			{
				if(femailorlogin.val() != '' && fcode.val() != '')
				{
					recaptcha.show(200);
				}
				else
				{
					recaptcha.hide(200);
				}
			}
			
		}*/
		flogin_i.change(MyModalFunction).keyup(MyModalFunction).bind('cut',MyModalFunction).bind('paste',MyModalFunction);
		fpassword_i.change(MyModalFunction).keyup(MyModalFunction).bind('cut',MyModalFunction).bind('paste',MyModalFunction);
		fpassword2_i.change(MyModalFunction).keyup(MyModalFunction).bind('cut',MyModalFunction).bind('paste',MyModalFunction);
		femail_i.change(MyModalFunction).keyup(MyModalFunction).bind('cut',MyModalFunction).bind('paste',MyModalFunction);
		femailorlogin_i.change(MyModalFunction).keyup(MyModalFunction).bind('cut',MyModalFunction).bind('paste',MyModalFunction);
		fcode_i.change(MyModalFunction).keyup(MyModalFunction).bind('cut',MyModalFunction).bind('paste',MyModalFunction);
		
		
		//flogin.change(function(){
			
		//});
		
		//https://l2cw.ru/#qiwiok
		switch (window.location.hash)
		{
			case "#qiwiok":
			{
				//alert("qiwi");
				SignIn();
				
				formInfoTip("success",'Успешно!',"Платёж поступит на баланс в течение минуты.");
				flogin_i.val('');
				fpassword_i.val('');
				fpassword2_i.val('');
				fcode_i.val('');
				$('#send_email_button').html('Войти').attr("onClick","none()").show();
				
				$('.modalTitle').html('QIWI PAY');
				$('.forgot').hide();
				$('.registration').hide();
				$('.sign').hide();
				$('.flogin').hide();
				$('.fpassword').hide();
				$('.fpassword2').hide();
				$('.femail').hide();
				$('.femailorlogin').hide();
				$('.fcode').hide();
				$('.recaptcha').hide();
				$('#send_email_button').hide();
				
				var overlay = $('#overlay');
				overlay.fadeIn(400, 
					function(){ 
						//var div = $(this).attr('href'); 
						var div = $('.modal_div');
						$(div) 
							.css('display', 'block') 
							.animate({opacity: 1, top: '10%'}, 200); 
							//$('#SignInForm .modalContent .fields .fieldGroup input[name="username"]').focus();
				});
				MyModalFunct();
				window.location.hash = '#events';
				break;
			}
			case "#servers":
			{
				OpenModalMainClick();
				/*
				//alert("qiwi");
				SignIn();
				
				//formInfoTip("success",'Успешно!',"Платёж поступит на баланс в течение минуты.");
				flogin_i.val('');
				fpassword_i.val('');
				fpassword2_i.val('');
				fcode_i.val('');
				$('#send_email_button').html('Войти').attr("onClick","none()").show();
				
				$('.modalTitle').html('QIWI PAY');
				$('.forgot').hide();
				$('.registration').hide();
				$('.sign').hide();
				$('.flogin').hide();
				$('.fpassword').hide();
				$('.fpassword2').hide();
				$('.femail').hide();
				$('.femailorlogin').hide();
				$('.fcode').hide();
				$('.recaptcha').hide();
				$('#send_email_button').hide();
				
				var overlay = $('#overlay');
				overlay.fadeIn(400, 
					function(){ 
						//var div = $(this).attr('href'); 
						var div = $('.modal_div');
						$(div) 
							.css('display', 'block') 
							.animate({opacity: 1, top: '10%'}, 200); 
							//$('#SignInForm .modalContent .fields .fieldGroup input[name="username"]').focus();
				});
				MyModalFunct();
				//window.location.hash = '#events';
				*/
				break;
			}
			default:
			{
				break;
			}
		}
		
		
		$('.qiwicount').keyup(function(){
			calculateBonuses();
		});
		calculateBonuses();
		
		
        $('.qiwiForm').submit(function(){
            var coins = $('.qiwicount').val();
			
			if(!(typeof parseInt(coins) ==='number' && parseInt(coins%1)===0))
			{
                alert('Неверная сумма платежа');
                return false;
			}
			coins = parseFloat(coins);
			
			if (isNaN(coins) || !isInteger(coins) || coins <= 0 || coins > 5000000) {
                alert('Неверная сумма платежа');
                return false;
			}
			
			var user = $('.qiwiaccount').val(); //account
			if (user == '') {
                alert('Ошибка!!!');
                return false;
            }
        });
		
		
    });
	
	function isInteger(num) {
		return Number.isInteger(num) && Math.round(num)=== num;
	}
	
	function calculateBonuses()
	{
		var coins = $('.qiwicount').val();
		var qiwibonus = $('.qiwibonus');
		var qiwir = $('.qiwir');
		
		if(!(typeof parseInt(coins) ==='number' && parseInt(coins%1)===0))
		{
			qiwibonus.hide();
			qiwir.html('+0₽');
			return;
		}
		coins = parseFloat(coins);
		
		if (isNaN(coins) || !isInteger(coins) || coins <= 0 || coins > 5000000) {
			qiwibonus.hide();
			qiwir.html('+0₽');
			return;
		}
		
		if(coins>=2000) //7%
		{
			
			qiwir.html('+'+(Math.round(parseFloat((coins*0.07)) * 100) / 100)+'₽');
			qiwibonus.show();
		}
		else
		if(coins>=1500) //6%
		{
			qiwir.html('+'+(Math.round(parseFloat((coins*0.06)) * 100) / 100)+'₽');
			qiwibonus.show();
		}
		else
		if(coins>=1000) //5%
		{
			qiwir.html('+'+(Math.round(parseFloat((coins*0.05)) * 100) / 100)+'₽');
			qiwibonus.show();
		}
		else
		{
			//qiwibonus.hide();
			qiwir.html('+0₽');
			qiwibonus.show();
		}
	}
	
	
//});
/*
$(document).ready(function() { 
	//Personal();
		var overlay = $('#overlay'); 
		var open_modal = $('.open_modal'); 
		var close = $('.modal_close, #overlay'); 
		var modal = $('.modal_div'); 
		
		open_modal.click( function(event){ 
			event.preventDefault(); 
			var div = $(this).attr('href'); 
			overlay.fadeIn(400, 
				function(){ 
					$(div) 
						.css('display', 'block') 
						.animate({opacity: 1, top: '10%'}, 200); 
			});
		});
		
		close.click( function(){ 
				modal 
				.animate({opacity: 0, top: '15%'}, 200, 
					function(){ 
						$(this).css('display', 'none');
						overlay.fadeOut(400); 
					}
				);
		});
});
*/



$(function (){
      var hg1=$('.regBlock').height();
      var hg2=$('.s-server').height();
      hg=hg1-hg2+9+'px';
      $('.s-acc').height(hg);
});
  


function pvpTop(blockid) {
$('.statsheader'+blockid+'  tr').detach();
	$.ajax({
		url: "/statistic/pvp/ajax",
		method: "post",
		data: {},
		dataType: "json",
		encode: true,
		success: function(data) {
			var statsheader = $('.statsheader'+blockid) //1
			thead = ('<tr><td width="25px">№</td><td>Ник</td><td>Lvl</td><td>Профессия</td><td>Клан</td><td>PvP/PK</td><td>Статус</td><td>Время в игре</td></tr>');
			var thead_html = statsheader.find("thead");
			thead_html.html(thead);	
			i = 0;
			data.forEach(function(item){
				i++;
				var sex = 'Мужской';
				if(item.sex == 1)
				{
					sex = 'Женский';
				}
				if(item.online == 1){
						online = '<font style="color:#5cd707;text-shadow: 0px 0px 8px #888;">[ online ]</font>';
				}else{
					online = '<font style="color: #ffb23f;text-shadow: 0px 0px 8px #e74b00;">[ offline ]</font>';
				}
				alliance_crest = item.alliance_crest?'<img src="data:image/png;base64, '+item.alliance_crest+'">':'';
				clan_crest = item.clan_crest?'<img src="data:image/png;base64, '+item.clan_crest+'">':'';
 				$("#lastStats"+blockid).append('<tr class="tableBlock-conten_name1 oflo trRowA1 item1" style=""><td>'+i+'</td><td><a href="javascript:void(0)">  '+alliance_crest+clan_crest+item.player_name+'<div class="tablePopup1"><span class="tablePopup1-title"><b>'+item.player_name+'</b></span><div class="tablePopup1-ava"></div><div class="tablePopup1-block"><span>Клан:</span> <span>'+check_null_name(item.clan_name)+'</span></div><div class="tablePopup1-block"><span>Уровень:</span> <span><font class="color-yellow">'+item.level+'</font></span></div><div class="tablePopup-block"><span>Класс:</span> <span>'+getClassName(item.class_id)+'</span></div><div class="tablePopup1-block"><span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.time_in_game)+'. </span></div><div class="tablePopup1-block"><span>Пол:</span> <span>'+sex+'</span></div></div></a></td><td><font class="color-yellow">'+item.level+'</font></td><td>'+ getClassName(item.class_id)+'</td><td>'+check_null_name(item.clan_name)+'</td><td style="text-align: right;"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></td><td>'+online+'</td><td>'+seconds_to_days_hours_mins_secs_str(item.time_in_game)+' </td></tr>');
			});
		}
	});
}
function pkTop(blockid) {
$('.statsheader'+blockid+'  tr').detach();

	$.ajax({
		url: "/statistic/pk/ajax",
		method: "post",
		data: {},
		dataType: "json",
		encode: true,
		success: function(data) {
			var statsheader = $('.statsheader'+blockid) //1
			thead = ('<tr><td width="25px">№</td><td>Ник</td><td>Lvl</td><td>Профессия</td><td>Клан</td><td>PvP/PK</td><td>Статус</td><td>Время в игре</td></tr>');
			var thead_html = statsheader.find("thead");
			thead_html.html(thead);	
			i = 0;
			data.forEach(function(item){
				i++;
				var sex = 'Мужской';
				if(item.sex == 1)
				{
					sex = 'Женский';
				}
				if(item.online == 1){
						online = '<font style="color:#5cd707;text-shadow: 0px 0px 8px #888;">[ online ]</font>';
				}else{
					online = '<font style="color: #ffb23f;text-shadow: 0px 0px 8px #e74b00;">[ offline ]</font>';
				}
				alliance_crest = item.alliance_crest?'<img src="data:image/png;base64, '+item.alliance_crest+'">':'';
				clan_crest = item.clan_crest?'<img src="data:image/png;base64, '+item.clan_crest+'">':'';
 				$("#lastStats"+blockid).append('<tr class="tableBlock-conten_name1 oflo trRowA1 item1" style=""><td>'+i+'</td><td><a href="javascript:void(0)"> '+alliance_crest+clan_crest+item.player_name+'<div class="tablePopup1"><span class="tablePopup1-title"><b>'+item.player_name+'</b></span><div class="tablePopup1-ava"></div><div class="tablePopup1-block"><span>Клан:</span> <span>'+check_null_name(item.clan_name)+'</span></div><div class="tablePopup1-block"><span>Уровень:</span> <span><font class="color-yellow">'+item.level+'</font></span></div><div class="tablePopup-block"><span>Класс:</span> <span>'+getClassName(item.class_id)+'</span></div><div class="tablePopup1-block"><span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+'. </span></div><div class="tablePopup1-block"><span>Пол:</span> <span>'+sex+'</span></div></div></a></td><td><font class="color-yellow">'+item.level+'</font></td><td>'+ getClassName(item.class_id)+'</td><td>'+check_null_name(item.clan_name)+'</td><td style="text-align: right;"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></td><td>'+online+'</td><td>'+seconds_to_days_hours_mins_secs_str(item.time_in_game)+' </td></tr>');
			});
		}
	});
}


function clanTop(blockid) {
	$('.statsheader'+blockid+'  tr').detach();
	$.ajax({
		url: "/statistic/clan/ajax",
		method: "post",
		data: {},
		dataType: "json",
		encode: true,
		success: function(data) {
			var statsheader = $('.statsheader'+blockid) //1
			thead = ('<tr><td width="25px">№</td><td>Лидер</td><td>Клан</td><td>Lvl</td><td>Замок</td><td>Игроков</td><td>Репутация</td><td>Альянс</td></tr>');
			var thead_html = statsheader.find("thead");
			thead_html.html(thead);	
			i = 0;
			data.forEach(function(item){
			i++;
			var sex = 'Мужской';
			if(item.sex == 1){
				sex = 'Женский';
			}
			alliance_crest = item.alliance_crest?'<img src="data:image/png;base64, '+item.alliance_crest+'">':'';
			clan_crest = item.clan_crest?'<img src="data:image/png;base64, '+item.clan_crest+'">':'';
 				$("#lastStats"+blockid).append('<tr class="tableBlock-conten_name1 oflo ">'+
												'<td>'+i+'</td>'+
												'<td><a href="javascript:void(0)"> '+alliance_crest+clan_crest+item.player_name+
												'<div class="tablePopup1">'+
													'<span class="tablePopup1-title"><b>'+alliance_crest+clan_crest+item.player_name+'</b>'+'</span>'+
													'<div class="tablePopup1-block">'+
														'<span>Клан:</span> <span>'+item.clan_name+'</span>'+
													'</div>'+
													'<div class="tablePopup1-block">'+
														'<span>Уровень:</span> <span>'+(item.char_level)+'</span>'+
													'</div>'+
													'<div class="tablePopup-block">'+
														'<span>Класс:</span> <span>'+getClassName(item.class_id)+'</span>'+
													'</div>'+
											
													'<div class="tablePopup1-block">'+
														'<span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+'</span>'+
													'</div>'+
													'<div class="tablePopup1-block">'+
														'<span>Пол:</span> <span>'+sex+'</span>'+
													'</div>'+
												'</div>'+
												'</a></td>'+
												
												'<td style="color:#696868;">'+item.clan_name+'</td>'+
												'<td>'+(item.clan_level)+'</td>'+
												
												'<td>'+getCastleName(item.castle_id)+'</td>'+
												'<td>'+item.clan_count_members+'</td>'+
												'<td>'+item.reputation_score+'</td>'+
												'<td>'+check_null_name(item.alliance_name)+'</td>'+
											'</tr>');
			});
		}
	});
}

function playerTop(blockid) {
	$('.statsheader'+blockid+'  tr').detach();
	$.ajax({
		url: "/statistic/player/ajax",
		method: "post",
		data: {},
		dataType: "json",
		encode: true,
		success: function(data) {
			var statsheader = $('.statsheader'+blockid) //1
			thead = ('<tr><td width="25px">№</td><td>Ник</td><td>Lvl</td><td>Профессия</td><td>Клан</td><td>PvP/PK</td><td>Статус</td><td>Время в игре</td></tr>');
			var thead_html = statsheader.find("thead");
			thead_html.html(thead);	
			i = 0;
			data.forEach(function(item){
			i++;
			var sex = 'Мужской';
			if(item.sex == 1){
				sex = 'Женский';
			}
			if(item.online == 1){
					online = '<font style="color:#5cd707;text-shadow: 0px 0px 8px #888;">[ online ]</font>';
			}else{
				online = '<font style="color: #ffb23f;text-shadow: 0px 0px 8px #e74b00;">[ offline ]</font>';
			}
			alliance_crest = item.alliance_crest?'<img src="data:image/png;base64, '+item.alliance_crest+'">':'';
			clan_crest = item.clan_crest?'<img src="data:image/png;base64, '+item.clan_crest+'">':'';
			$("#lastStats"+blockid).append('<tr class="tableBlock-conten_name1 oflo trRowA1 item1" style=""><td>'+i+'</td><td><a href="javascript:void(0)"> '+alliance_crest+clan_crest+item.player_name+'<div class="tablePopup1"><span class="tablePopup1-title"><b>'+alliance_crest+clan_crest+item.player_name+'</b></span><div class="tablePopup1-ava"></div><div class="tablePopup1-block"><span>Клан:</span> <span>'+check_null_name(item.clan_name)+'</span></div><div class="tablePopup1-block"><span>Уровень:</span> <span><font class="color-yellow">'+item.level+'</font></span></div><div class="tablePopup-block"><span>Класс:</span> <span>'+getClassName(item.class_id)+'</span></div><div class="tablePopup1-block"><span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.time_in_game)+'.</span></div><div class="tablePopup1-block"><span>Пол:</span> <span>'+sex+'</span></div></div></a></td><td><font class="color-yellow">'+item.level+'</font></td><td>'+ getClassName(item.class_id)+'</td><td>'+check_null_name(item.clan_name)+'</td><td style="text-align: right;"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></td><td>'+online+'</td><td>'+seconds_to_days_hours_mins_secs_str(item.time_in_game)+' </td></tr>');

			});
		}
	});
}

function heroesTop(blockid) {
	$('.statsheader'+blockid+'  tr').detach();
	$.ajax({
		url: "/statistic/heroes/ajax",
		method: "post",
		data: {},
		dataType: "json",
		encode: true,
		success: function(data) {
			var statsheader = $('.statsheader'+blockid) //1
			thead = ('<tr><td width="25px">№</td><td>Ник</td><td>Lvl</td><td>Профессия</td><td>Клан</td><td>PvP/PK</td><td>Статус</td><td>Время в игре</td></tr>');
			var thead_html = statsheader.find("thead");
			thead_html.html(thead);	
			i = 0;
			data.forEach(function(item){
			i++;
			var sex = 'Мужской';
			if(item.sex == 1){
				sex = 'Женский';
			}
			if(item.online == 1){
					online = '<font style="color:#5cd707;text-shadow: 0px 0px 8px #888;">[ online ]</font>';
			}else{
				online = '<font style="color: #ffb23f;text-shadow: 0px 0px 8px #e74b00;">[ offline ]</font>';
			}
			
			alliance_crest = item.alliance_crest?'<img src="data:image/png;base64, '+item.alliance_crest+'">':'';
			clan_crest = item.clan_crest?'<img src="data:image/png;base64, '+item.clan_crest+'">':'';
			
			$("#lastStats"+blockid).append('<tr class="tableBlock-conten_name1 oflo trRowA1 item1" style=""><td>'+i+'</td><td><a href="javascript:void(0)"> '+alliance_crest+clan_crest+item.player_name+'<div class="tablePopup1"><span class="tablePopup1-title"><b>'+alliance_crest+clan_crest+item.player_name+'</b></span><div class="tablePopup1-ava"></div><div class="tablePopup1-block"><span>Клан:</span> <span>'+(item.clan_name)+'</span></div><div class="tablePopup1-block"><span>Уровень:</span> <span><font class="color-yellow">'+item.level+'</font></span></div><div class="tablePopup-block"><span>Класс:</span> <span>'+getClassName(item.class_id)+'</span></div><div class="tablePopup1-block"><span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+'. </span></div><div class="tablePopup1-block"><span>Пол:</span> <span>'+sex+'</span></div></div></a></td><td><font class="color-yellow">'+item.level+'</font></td><td>'+ getClassName(item.class_id)+'</td><td>'+check_null_name(item.clan_name)+'</td><td style="text-align: right;"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></td><td>'+online+'</td><td>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+' </td></tr>');

			});
		}
	});
}

function blockTop(blockid) {
	$('.statsheader'+blockid+'  tr').detach();
	$.ajax({
		url: "/statistic/block/ajax",
		method: "post",
		data: {},
		dataType: "json",
		encode: true,
		success: function(data) {
			var statsheader = $('.statsheader'+blockid) //1
			thead = ('<tr><td width="25px">№</td><td>Ник</td><td>Lvl</td><td>Профессия</td><td>Клан</td><td>PvP/PK</td><td>Статус</td><td>Время в игре</td></tr>');
			var thead_html = statsheader.find("thead");
			thead_html.html(thead);	
			i = 0;
			data.forEach(function(item){
			i++;
			var sex = 'Мужской';
			if(item.sex == 1){
				sex = 'Женский';
			}
			if(item.online == 1){
					online = '<font style="color:#5cd707;text-shadow: 0px 0px 8px #888;">[ online ]</font>';
			}else{
				online = '<font style="color: #ffb23f;text-shadow: 0px 0px 8px #e74b00;">[ offline ]</font>';
			}
			$("#lastStats"+blockid).append('<tr class="tableBlock-conten_name1 oflo trRowA1 item1" style=""><td>'+i+'</td><td><a href="javascript:void(0)"> '+item.player_name+'<div class="tablePopup1"><span class="tablePopup1-title"><b>'+item.player_name+'</b></span><div class="tablePopup1-ava"></div><div class="tablePopup1-block"><span>Клан:</span> <span>'+(item.clan_name)+'</span></div><div class="tablePopup1-block"><span>Уровень:</span> <span><font class="color-yellow">'+item.level+'</font></span></div><div class="tablePopup-block"><span>Класс:</span> <span>'+getClassName(item.class_id)+'</span></div><div class="tablePopup1-block"><span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+'. </span></div><div class="tablePopup1-block"><span>Пол:</span> <span>'+sex+'</span></div></div></a></td><td><font class="color-yellow">'+item.level+'</font></td><td>'+ getClassName(item.class_id)+'</td><td>'+check_null_name(item.clan_name)+'</td><td style="text-align: right;"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></td><td>'+online+'</td><td>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+' </td></tr>');

			});
		}
	});
}

function castleTop(blockid) {
	$('.statsheader'+blockid+'  tr').detach();
	$.ajax({
		url: "/statistic/castle/ajax",
		method: "post",
		data: {},
		dataType: "json",
		encode: true,
		success: function(data) {
			var statsheader = $('.statsheader'+blockid) //1
			thead = ('<tr><td colspan="2" style="text-align: center;padding: 20px 35px 20px 35px;">Замки</td></tr>');
			var thead_html = statsheader.find("thead");
			thead_html.html(thead);	
			i = 0;
			data.forEach(function(item){
				siegeDate = new Date(parseInt(item.siegeDate)).toLocaleString(); 
				i++;
				alliance_crest = item.alliance_crest?'<img src="data:image/png;base64, '+item.alliance_crest+'">':'';
				clan_crest = item.clan_crest?'<img src="data:image/png;base64, '+item.clan_crest+'">':'';

				$("#lastStats"+blockid).append('<tr class="noneon oflo '+i+'" style="background-image:none;">'+
												'<td class="l2left">'+
													'<img src="template/designs/hellios/images/castle/'+item.castle_id+'.jpg" width="164px" height="123px" border="0">'+
												'</td>'+
												'<td class="l2right" style="text-align: right;">'+
													'<strong>'+getCastleName(item.castle_id)+'</strong><br>'+
													'<small>Дата осады: '+siegeDate+'</small><br><br>'+
													'Владелец: <b>'+alliance_crest+clan_crest+castle_leader(item.player_name)+'</b><br><br>'+
													// 'Владелец: <b>'+allyImg+clanImg+escapeHtml(item.clan_name)+'</b><br><br>'+
													//'Защитники: '+escapeHtml(Defenders)+'<br>'+
													//'Атакующие: '+escapeHtml(Attackers)+'<br>'+
												'</td>'+
											'</tr>');
			});
		}
	});
}

function castle_leader(clan_leader){
	if(clan_leader==null){
		return 'NPC';
	}
	return clan_leader;
}

function rightPanelPvPTop() {
	$.ajax({
		url: "/statistic/pvp/ajax",
		method: "post",
		dataType: "json",
		encode: true,
		success: function(data) {
			console.log(data);
			i = 0;
			data.forEach(function(item){
				if(i==10){
					return;
				}
				var sex = 'Мужской';
				if(item.sex == 1){
					sex = 'Женский';
				}
				i++;
				$(".statshpvp").append('<div class="tableBlock-content oflo '+i+'">'+
										'<div class="tableBlock-conten_number">'+i+'</div>'+
										'<div class="tableBlock-conten_name"><a href="javascript:void(0)">'+(item.player_name)+''+
											'<div class="tablePopup">'+
												'<span class="tablePopup-title">'+(item.player_name)+'</b>'+'</span>'+
												'<div class="tablePopup-block">'+
													'<span>Клан:</span> <span>'+item.clan_name+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Уровень:</span> <span>'+(item.level)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Класс:</span> <span>'+getClassName(item.class_id)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.time_in_game)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Пол:</span> <span>'+sex+'</span>'+
												'</div>'+
											'</div>'+
										'</a></div>'+
										'<div class="tableBlock-conten_lvl"><span>'+(item.level)+'</span></div>'+
										'<div class="tableBlock-conten_scr"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></div>'+
									'</div>');
			});
		}
	});
}

function rightPanelPKTop() {
	$.ajax({
		url: "/statistic/pk/ajax",
		method: "post",
		dataType: "json",
		encode: true,
		success: function(data) {
			i = 0;
			data.forEach(function(item){
				if(i==10){
					return;
				}
				var sex = 'Мужской';
				if(item.sex == 1){
					sex = 'Женский';
				}
				i++;
				$(".statshpk").append('<div class="tableBlock-content oflo '+i+'">'+
										'<div class="tableBlock-conten_number">'+i+'</div>'+
										'<div class="tableBlock-conten_name"><a href="javascript:void(0)">'+(item.player_name)+''+
											'<div class="tablePopup">'+
												'<span class="tablePopup-title">'+(item.player_name)+'</b>'+'</span>'+
												'<div class="tablePopup-block">'+
													'<span>Клан:</span> <span>'+item.clan_name+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Уровень:</span> <span>'+(item.level)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Класс:</span> <span>'+getClassName(item.class_id)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.time_in_game)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Пол:</span> <span>'+sex+'</span>'+
												'</div>'+
											'</div>'+
										'</a></div>'+
										'<div class="tableBlock-conten_lvl"><span>'+(item.level)+'</span></div>'+
										'<div class="tableBlock-conten_scr"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></div>'+
									'</div>');
			});
		}
	});
}
function get_online_player_now() {
	$.ajax({
		url: "/statistic/other/ajax",
		method: "post",
		dataType: "json",
		encode: true,
		success: function(data) {
			$("#server_online").text(data.player_online);
			$("#server_count_player").text(data.player_all);
			$("#server_count_clan").text(data.count_clans);
			
			var allonlinesrvS1 = $('.onlineReg-block-player .sonline');
			allonlinesrvS1.css('max-width',widthOnline(data.player_online)+'%')
			var allonlinesrvS1 = $('.onlineReg-block-clans .sonline');
			allonlinesrvS1.css('max-width',widthOnline(data.count_clans)+'%')
		}
});
}
 	
function widthOnline(value)
	{
		
		//return parseInt(value*0.1);
		//var result = parseInt(value*0.1);
		var result = parseInt(value*0.4);
		if(result>100)
			result = 100;
		result = parseInt(result*0.9);
		return result+10;
	}


function check_null_name(variable){
	if(variable==null){
		return '';
	}
	return variable;
}



	var shopScript = [];
	function loadlastStats(blockid) {
		//if (openingCase) return;

		var textstat
		//var colspan_type
		var statsheader = $('.statsheader'+blockid) //1

		if(statsheader.length < 1)
		{
			alert('statsheader.length < 1');
			return;
		}


		//colspan_type = 1
		
		shopScript[0] = '/statapi1.php?api=toppvp&srv=1&rnd='+Math.floor((Math.random() * 1000000) + 1);
		shopScript[1] = '/statapi2.php?api=toppk&srv=1&rnd='+Math.floor((Math.random() * 1000000) + 1);
		shopScript[2] = '/statapi3.php?api=toppvp&srv=2&rnd='+Math.floor((Math.random() * 1000000) + 1);
		shopScript[3] = '/statapi4.php?api=toppk&srv=2&rnd='+Math.floor((Math.random() * 1000000) + 1);
		shopScript[4] = '/forumapi.php?api=forum&rnd='+Math.floor((Math.random() * 1000000) + 1);
		shopScript[5] = '/qiwiapi.php?api=qiwi&rnd='+Math.floor((Math.random() * 1000000) + 1);
		
		var serverid = 1;
		var serverstat = $('.serverstat>span');
 
		
		shopScript[6] = '/statapi5.php?api=characters&srv='+serverid+'&rnd='+Math.floor((Math.random() * 1000000) + 1);
		shopScript[7] = '/statapi6.php?api=news&rnd='+Math.floor((Math.random() * 1000000) + 1);
		
		shopScript[8] = '/teleapi7.php?api=tele&rnd='+Math.floor((Math.random() * 1000000) + 1);
		
		var thead = '';

		var loading;
		var noting;
		
		var toptitle = $('.topTitle');

		if(blockid == 5)
		{
			if (statsheader.length != 0 )
			{
				if(statsheader.find(".tbbody").length == 0)
				{
					var textstat2 = $('<tbody id="lastStats'+blockid+'" class="tbbody"></tbody>') //1
					statsheader.append(textstat2)
					textstat2.fadeIn(0)
				}
			}
			loading = $('<tr><td colspan="5" class="trRowB" style="padding: 20px 35px 20px 35px;"><div ><font size="4"><center>Loading...</center></font></div></td></tr>')
			noting = $('<tr><td colspan="5" class="trRowB" style="padding: 20px 35px 20px 35px;"><div ><font size="4"><center>No Information...</center></font></div></td></tr>')
		}
		else
		if(blockid == 6)
		{

			if (statsheader.length != 0 )
			{
				if(statsheader.find(".tbbody").length == 0)
				{
					var textstat2 = $('<tbody id="lastStats'+blockid+'" class="tbbody"></tbody>') //1
					statsheader.append(textstat2)
					textstat2.fadeIn(0)
				}
			}
			loading = $('<tr><td colspan="8" class="trRowB" style="padding: 20px 35px 20px 35px;"><div ><font size="4"><center>Loading...</center></font></div></td></tr>')
			noting = $('<tr><td colspan="8" class="trRowB" style="padding: 20px 35px 20px 35px;"><div ><font size="4"><center>No Information...</center></font></div></td></tr>')
			
 
			//var thread = statsheader.find("thead");
			
			
			if(toptitle.length != 0 && toptitle.html() == 'Top Player')
			{
 				playerTop(blockid);
				return;
			}
			else
			if(toptitle.length != 0 && toptitle.html() == 'Top PVP')
			{
  				pvpTop(blockid);
				return;
			}
			else
			if(toptitle.length != 0 && toptitle.html() == 'Top PK')
			{
 				pkTop(blockid);
				return;
			}
			else
			if(toptitle.length != 0 && toptitle.html() == 'Top Clan')
			{
 				clanTop(blockid);
				return;
			}
			else
			if(toptitle.length != 0 && toptitle.html() == 'Top Heroes')
			{
 				heroesTop(blockid);
				return;
			}
			else
			if(toptitle.length != 0 && toptitle.html() == 'Top Block')
			{
 				blockTop(blockid);
				return;
			}
			else
			if(toptitle.length != 0 && toptitle.html() == 'Замки')
			{
				castleTop(blockid);
				return;
			}
			else
			if(toptitle.length != 0 && toptitle.html() == 'Информация')
			{
				thead = ('<tr><td width="25px">№</td><td>Ник</td><td>Lvl</td><td>Профессия</td><td>Клан</td><td>PvP/PK</td><td>Статус</td><td>Время в игре</td></tr>');
				shopScript[6] = '/statapi.php?api=info&page='+page+'&srv='+serverid+'&rnd='+Math.floor((Math.random() * 1000000) + 1);
			}
			else
			{
				playerTop(blockid);
				return;
			}
			
			
		}
		else
		if(blockid == 7)
		{
			if (statsheader.length != 0 )
			{
				if(statsheader.find(".tbbody").length == 0)
				{
					var textstat2 = $('<div id="lastStats'+blockid+'" class="tbbody"></div>') //1
					statsheader.append(textstat2)
					textstat2.fadeIn(0)
				}
			}
			
			loading = $('<div class="trRowB"  style="padding: 20px 35px 20px 35px;"><div ><font size="4"><center>Loading...</center></font></div></div>')
			noting = $('<div class="trRowB"   style="padding: 20px 35px 20px 35px;"><div ><font size="4"><center>No information...</center></font></div></div>')
			
			
			var page = 1;
			var pagehtml = $('.pagenews>span');
			if(pagehtml.length != 0)
			{
				var parsed = parseInt(pagehtml.html());
				if (isNaN(parsed))
				{
					page = 1;
				}
				else
				{
					page = parsed;
				}
				//page = pagehtml
			}
			shopScript[7] = '/statapi.php?api=news&page='+page+'&rnd='+Math.floor((Math.random() * 1000000) + 1);
			if(window.location.hash == '#newsall')
			{
				shopScript[7] = '/statapi.php?api=newsall&page='+page+'&rnd='+Math.floor((Math.random() * 1000000) + 1);
			}
		}
		else
		if(blockid == 8)
		{
			if (statsheader.length != 0 )
			{
				if(statsheader.find(".tbbody").length == 0)
				{
					var textstat2 = $('<tbody id="lastStats'+blockid+'" class="tbbody"></tbody>') //1
					statsheader.append(textstat2)
					textstat2.fadeIn(0)
				}
			}
			loading = $('<tr><td colspan="5" class="trRowB" style="padding: 20px 35px 20px 35px;"><div ><font size="4"><center>Loading...</center></font></div></td></tr>')
			noting = $('<tr><td colspan="5" class="trRowB" style="padding: 20px 35px 20px 35px;"><div ><font size="4"><center>No Information...</center></font></div></td></tr>')
		}
		else //blockid == 4
		{
			if (statsheader.length != 0 )
			{
				if(statsheader.find(".tbbody").length == 0)
				{
					var textstat2 = $('<div id="lastStats'+blockid+'" class="tbbody"></div>') //1
					statsheader.append(textstat2)
					textstat2.fadeIn(0)
				}
			}
			//hz
			loading = $('<div class="trRowB" style="padding: 20px 35px 20px 35px;" ><div ><font size="4"><center>Loading...</center></font></div></div>')
			noting = $('<div class="trRowB" style="padding: 20px 35px 20px 35px;" ><div ><font size="4"><center>No information...</center></font></div></div>')
		}
		
		

		var lastStats = $('#lastStats'+blockid) //1

		//JSON.parse
		var deletestats = true
		if(shopScript[blockid] != 'NONE')
		{
			$.ajax
			({
				url: shopScript[blockid],
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'lastStats'+blockid
				},
				success: function(data) {
					var number = 0;
					try {
						if(blockid == 6)
						{
							if (statsheader.length != 0 )
							{
								//var thread_hrml = statsheader.find("thead");
								var thead_html = statsheader.find("thead");
								//alert(thread);
								if(thead_html.length != 0)
								{
									//alert(thread);
									thead_html.html(thead);
								}
							}
						}
						
						
						data.forEach(function(item)
						{
							if (item)
							{
								number++;
								if(number % 2)
									trRow = 'trRowA1'
								else
									trRow = 'trRowB1'

								var el
								if(blockid == 0 || blockid == 1 || blockid == 2 || blockid == 3)
								{
									
									var srvid = 1;
									if(blockid == 2 || blockid == 3)
									{
										srvid = 2;
									}
									
									if(item.ally_crest_id > 0)
										allyImg = '<img class="allycrest" src="//l2cw.ru/crests/'+srvid+'/AllyCrest_'+item.ally_crest_id+'.gif" height="14" width="8" align="middle" alt="" style="vertical-align: middle;">'
									else
										allyImg = ''
								
									if(item.crest_id > 0)
										clanImg = '<img class="clancrest" src="//l2cw.ru/crests/'+srvid+'/Crest_'+item.crest_id+'.gif" height="14" width="18" align="middle" alt="" style="vertical-align: middle;">'
									else
										clanImg = ''
									
									
									var clanname = escapeHtml(item.clan_name)
									//if(clanname.toUpperCase() === ''.toUpperCase())
									if(clanname.toUpperCase() === ''.toUpperCase())
										clanname = '<font color="#333333">Нет Клана</font>'
									
									var sex = 'Мужской';
									if(item.sex == 1)
									{
										sex = 'Женский';
									}

									el = $('<div class="tableBlock-content oflo '+trRow+'">'+
										'<div class="tableBlock-conten_number">'+number+'</div>'+
										'<div class="tableBlock-conten_name"><img src="'+getRaceImg(item.race,item.sex)+'" alt=""> <a href="javascript:void(0)">'+allyImg+clanImg+''+escapeHtml(item.player_name)+''+
											'<div class="tablePopup">'+
												'<span class="tablePopup-title">'+allyImg+clanImg+'<b>'+escapeHtml(item.player_name)+'</b>'+'</span>'+
												'<div class="tablePopup-ava"><img src="'+getRaceImg(item.race,item.sex)+'" alt=""></div>'+
												//'<div class="tablePopup-block">'+
													//'<span>Иконка класса:</span> <span><img class="classicon" src="images/'+getClassNameImg(item.class_id)+'.png"></span>'+
												//'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Клан:</span> <span>'+allyImg+clanImg+clanname+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Уровень:</span> <span>'+GetColorLevel(item.level)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Класс:</span> <span>'+getClassName(item.class_id)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+'</span>'+
												'</div>'+
												'<div class="tablePopup-block">'+
													'<span>Пол:</span> <span>'+sex+'</span>'+
												'</div>'+
											'</div>'+
										'</a></div>'+
										'<div class="tableBlock-conten_lvl"><span>'+GetColorLevel(item.level)+'</span></div>'+
										'<div class="tableBlock-conten_scr"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></div>'+
									'</div>')
								}
								else
								if(blockid == 4 )
								{
									
									var photo = '';
									if(item != null &&  item.pp_main_photo != null && item.pp_main_photo != '' && (item.pp_main_photo.endsWith('.jpg') || item.pp_main_photo.endsWith('.png') || item.pp_main_photo.endsWith('.gif') || item.pp_main_photo.endsWith('.bmp')) )
									{
										photo = forum+'uploads/'+item.pp_main_photo;
									}
									else
									{
										photo = '/images/default_large.png?1';
										
									}
									//var formatted = $.datepicker.formatDate("M d, yy", new Date("2014-07-08T09:02:21.377"));
									//var formatted = new Date(item.last_post*1000).toDateString();
									var formatted = formatDate(new Date(item.last_post*1000));
									
									var admgrp = '';
									if(item.member_group_id == 4)
									{
										admgrp = 'class="admin-group"';
									}
									
									el = $('<div class="forumBlock oflo '+trRow+'">'+
												'<div class="forumBlock-ava">'+
													'<img src="'+photo+'" alt="">'+
												'</div>'+
												'<div class="forumBlock-text">'+
													'<a href="'+forum+'index.php?showtopic='+item.tid+'" class="forumBlock-text_link" target="_blank">'+item.title+'</a>'+
													'<div class="forumBlock-text_info">'+
														'<span class="forumBlock-text_info-nick">by <a '+admgrp+' href="'+forum+'index.php?showuser='+item.last_poster_id+'" title="'+item.last_poster_name+'" target="_blank">'+item.last_poster_name+'</a></span>'+
														'<span class="forumBlock-text_info-date">'+formatted+' | <span class="forumBlock-text_info-comments">'+item.posts+'</span></span>'+
														//'<span class="forumBlock-text_info-comments">'+item.posts+'</span>'+
													'</div>'+
												'</div>'+
											'</div>')
											
									//console.log('test '+item.posts);
								}
								else
								if(blockid == 5 )
								{
									
									
									//var formatted = $.datepicker.formatDate("M d, yy", new Date("2014-07-08T09:02:21.377"));
									//var formatted = new Date(item.last_post*1000).toDateString();
									//var formatted = formatDate(new Date(item.last_post*1000));
									
									el = $('<tr><td>'+item.qiwipayId+'</td><td style="text-align:left">'+item.system+'</td><td style="text-align:right">'+item.sum+'₽</td><td style="text-align:right">'+(item.itemsCount/100)+'₽</td><td style="text-align:right">'+item.dateComplete+'</td></tr>')
									
									
								}
								else
								if(blockid == 6 )
								{
									if(toptitle.length != 0 && toptitle.html() == 'Кланы')
									{
										var srvid = serverid;
										if(item.ally_crest_id > 0)
											allyImg = '<img class="allycrest" src="//l2cw.ru/crests/'+srvid+'/AllyCrest_'+item.ally_crest_id+'.gif" height="14" width="8" align="middle" alt="" style="vertical-align: middle;">'
										else
											allyImg = ''
										if(item.crest_id > 0)
											clanImg = '<img class="clancrest" src="//l2cw.ru/crests/'+srvid+'/Crest_'+item.crest_id+'.gif" height="14" width="18" align="middle" alt="" style="vertical-align: middle;">'
										else
											clanImg = ''
										var clanname = escapeHtml(item.clan_name)
										if(clanname.toUpperCase() === ''.toUpperCase())
											clanname = '<font color="#333333">Нет Клана</font>'
										
										var allyname = escapeHtml(item.ally_name)
										if(allyname.toUpperCase() === ''.toUpperCase())
											allyname = '<font color="#333333">Нет Альянса</font>'
										
										var sex = 'Мужской';
										if(item.sex == 1)
										{
											sex = 'Женский';
										}
										var online = '';
										if(item.online == 1)
										{
											online = '[ online ]';
										}
										
										el = $('<tr class="tableBlock-conten_name1 oflo '+trRow+'">'+
												'<td>'+item.number+'</td>'+
												'<td><a href="javascript:void(0)">'+allyImg+clanImg+' '+escapeHtml(item.player_name)+
												'<div class="tablePopup1">'+
													'<span class="tablePopup1-title">'+allyImg+clanImg+'<b>'+escapeHtml(item.player_name)+'</b>'+'</span>'+
													'<div class="tablePopup1-ava"><img src="'+getRaceImg(item.race,item.sex)+'" alt=""></div>'+
													//'<div class="tablePopup-block">'+
														//'<span>Иконка класса:</span> <span><img class="classicon" src="images/'+getClassNameImg(item.class_id)+'.png"></span>'+
													//'</div>'+
													'<div class="tablePopup1-block">'+
														'<span>Клан:</span> <span>'+allyImg+clanImg+clanname+'</span>'+
													'</div>'+
													'<div class="tablePopup1-block">'+
														'<span>Уровень:</span> <span>'+GetColorLevel(item.level)+'</span>'+
													'</div>'+
													'<div class="tablePopup-block">'+
														'<span>Класс:</span> <span>'+getClassName(item.class_id)+'</span>'+
													'</div>'+
												
													'<div class="tablePopup1-block">'+
														'<span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+'</span>'+
													'</div>'+
													'<div class="tablePopup1-block">'+
														'<span>Пол:</span> <span>'+sex+'</span>'+
													'</div>'+
												'</div>'+
												'</a></td>'+
												
												'<td style="color:#696868;">'+clanImg+clanname+'</td>'+
												'<td>'+GetColorLevel2(item.clan_level)+'</td>'+
												
												'<td>'+getCastleName(item.castle_id)+'</td>'+
												'<td>'+GetColorLevel2(item.count)+'</td>'+
												'<td>'+item.reputation_score+'</td>'+
												'<td>'+allyImg+allyname+'</td>'+
												
												
												
												
											'</tr>')
									}
									else
									if(toptitle.length != 0 && toptitle.html() == 'Замки')
									{
										
										var siegeDate = formatDateAll(new Date(parseInt(item.siegeDate)));
										var lider = escapeHtml(item.clan_name)
										
										if(item.id == undefined)
										{
											item.id = "1";
										}
										
										el = $(
											'<tr class="noneon oflo '+trRow+'" style="background-image:none;">'+
												'<td class="l2left">'+
													'<img src="/images/castles/'+item.id+'.jpg" width="164px" height="123px" border="0">'+
												'</td>'+
												'<td class="l2right" style="text-align: right;">'+
													'<strong>'+escapeHtml(item.name)+' Castle</strong><br>'+
													'<small>Налог: '+item.taxPercent+'%, '+siegeDate+'</small><br><br>'+
													((lider.length != 0)?'Владелец: <b>'+lider+'</b><br><br>':'Владельца нету')+
									
													//'Владелец: <b>'+allyImg+clanImg+escapeHtml(item.clan_name)+'</b><br><br>'+
													//'Защитники: '+escapeHtml(Defenders)+'<br>'+
													//'Атакующие: '+escapeHtml(Attackers)+'<br>'+
												'</td>'+
											'</tr>'
										)
										//alert(el.text());
									}
									else
									{

										var srvid = serverid;
										if(item.ally_crest_id > 0)
											allyImg = '<img class="allycrest" src="//l2cw.ru/crests/'+srvid+'/AllyCrest_'+item.ally_crest_id+'.gif" height="14" width="8" align="middle" alt="" style="vertical-align: middle;">'
										else
											allyImg = ''
										if(item.crest_id > 0)
											clanImg = '<img class="clancrest" src="//l2cw.ru/crests/'+srvid+'/Crest_'+item.crest_id+'.gif" height="14" width="18" align="middle" alt="" style="vertical-align: middle;">'
										else
											clanImg = ''
										var clanname = escapeHtml(item.clan_name)
										if(clanname.toUpperCase() === ''.toUpperCase())
											clanname = '<font color="#333333">Нет Клана</font>'
										var sex = 'Мужской';
										if(item.sex == 1)
										{
											sex = 'Женский';
										}
	
										var online = '';
										if(item.online == 1)
										{
											online = '[ online ]';
										}
										else
										if(item.online == 2)
										{
											online = '<font style="color: #ffb23f;text-shadow: 0px 0px 8px #e74b00;">[ trade ]</font>';
										}
										else
										if(item.online == 3)
										{
											online = '<font style="color:#999;text-shadow: 0px 0px 8px #888;">[ afk ]</font>';
										}
										
										el = $("#lastStats"+blockid).html('<tr class="tableBlock-conten_name1 oflo '+trRow+'">'+
												'<td>'+item.number+'</td>'+
												'<td><a href="javascript:void(0)">'+allyImg+clanImg+' '+escapeHtml(item.player_name)+
												
												'<div class="tablePopup1">'+
													'<span class="tablePopup1-title">'+allyImg+clanImg+'<b>'+escapeHtml(item.player_name)+'</b>'+'</span>'+
													'<div class="tablePopup1-ava"><img src="'+getRaceImg(item.race,item.sex)+'" alt=""></div>'+
													//'<div class="tablePopup-block">'+
														//'<span>Иконка класса:</span> <span><img class="classicon" src="images/'+getClassNameImg(item.class_id)+'.png"></span>'+
													//'</div>'+
													'<div class="tablePopup1-block">'+
														'<span>Клан:</span> <span>'+allyImg+clanImg+clanname+'</span>'+
													'</div>'+
													'<div class="tablePopup1-block">'+
														'<span>Уровень:</span> <span>'+GetColorLevel(item.level)+'</span>'+
													'</div>'+
													'<div class="tablePopup-block">'+
														'<span>Класс:</span> <span>'+getClassName(item.class_id)+'</span>'+
													'</div>'+
											
													'<div class="tablePopup1-block">'+
														'<span>В игре:</span> <span>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+'</span>'+
													'</div>'+
													'<div class="tablePopup1-block">'+
														'<span>Пол:</span> <span>'+sex+'</span>'+
													'</div>'+
												'</div>'+
												'</a></td>'+
												'<td>'+GetColorLevel(item.level)+'</td>'+
												'<td><img src="'+getRaceImg(item.race,item.sex)+'" alt="">'+getClassName(item.class_id)+'</td>'+
												'<td>'+allyImg+clanImg+clanname+'</td>'+
												'<td style="text-align: right;"><span class="pvp color-purple">'+item.pvp+'</span><font color="#696868">/</font><span class="pk color-red">'+item.pk+'</span></td>'+
												'<td>'+online+'</td>'+
												'<td>'+seconds_to_days_hours_mins_secs_str(item.onlinetime)+'</td>'+
											'</tr>');
									}
									
									
									
								}
								else
								if(blockid == 7)
								{
									//var res = String(item.html).replaceAll(/(\r\n)/gm, '\n');
									//el = $(res)
									el = $(item.html)
									//console.log(item.html)
									//console.log(el.text())
								}
								else
								if(blockid == 8 )
								{
									
									
									//var formatted = $.datepicker.formatDate("M d, yy", new Date("2014-07-08T09:02:21.377"));
									//var formatted = new Date(item.last_post*1000).toDateString();
									//var formatted = formatDate(new Date(item.last_post*1000));
									
									if(item.status>0)
									{
										status_tele = '<font class="font_good">[Выдано]</font>';
									}
									else
									{
										status_tele = '<font class="font_bad">[Ожидает]</font>';
									}
									
									el = $('<tr><td>'+item.id+'</td><td style="text-align:left"><b><font color="#00AA00">'+item.code.toUpperCase()+'</font></b></td><td style="text-align:left">'+item.server+'</td><td style="text-align:right">'+item.curtime+'</td><td style="text-align:right">'+status_tele+'</td></tr>')
									
									
								}
								
								

								if (lastStats.find('.item' + number).length != 0 && lastStats.find('.item' + number).text() == el.text())
								{
									/*lastStats.find('.item' + number).remove()
									el.hide().addClass('item'+number)
									lastStats.append(el)
									//el.fadeIn(0);
									el.show();*/
									
								}
								else
								{
									/*lastStats.find('.item' + number).remove()
									el.hide().addClass('item'+ number)
									lastStats.append(el)
									el.fadeIn(1000)*/
									
									var itemrow = lastStats.find('.item' + number);
									if(itemrow.length == 0)
									{
										lastStats.find('.item' + number).remove()
										el.hide().addClass('item'+ number)
										lastStats.append(el)
										el.fadeIn(1000)
									}
									else
									{
										if(blockid == 7)
										{
											//alert("test none ==");
											//console.log(convertToHex(lastStats.find('.item' + number).text()))
											//console.log(convertToHex(el.text()))
											
											//console.log((lastStats.find('.item' + number).text()))
											//console.log((el.text()))
										}
										el.hide().addClass('item'+ number)
										itemrow.hide();
										itemrow.attr('class',el.attr('class'));
										itemrow.attr('style',el.attr('style'));
										itemrow.html(el.html());
										itemrow.fadeIn(1000)
										el.fadeIn(1000)
									}
									
								}
							}
							deletestats = false
						})
						
						var count = number;
						while(true)
						{
							
							number++;
							if (lastStats.find('.item'+number).length != 0)
							{
								lastStats.find('.item'+number).remove()
							}
							else
							{
								break;
							}
							
						}
						
						if (lastStats.find('.item0').length != 0)
						{
							lastStats.find('.item0').remove()
						}
						if(count<=0)
						{
							noting.hide().addClass('item0')
							lastStats.append(noting)
							noting.fadeIn(1000)
							showLoading = true
						}
						else
						{
							showLoading = false
						}
					}
					catch(e) {
								console.log(e);
								//alert('bbb')
								if (lastStats.find(".oflo").length != 0)
								{
									lastStats.find(".oflo").remove()
								}
								if (lastStats.find('.item0').length != 0)
								{
									lastStats.find('.item0').remove()
								}
								noting.hide().addClass('item0')
								lastStats.append(noting)
								noting.fadeIn(1000)
								showLoading = true
					}
				},
				error: function() {
					//alert('vvv')
				}
			})
			
			
			
			
		}
		else
		{
			if (lastStats.find(".oflo").length != 0)
			{
				lastStats.find(".oflo").remove()
			}
			if (lastStats.find('.item0').length != 0)
			{
				lastStats.find('.item0').remove()
			}

			noting.hide().addClass('item0')

			lastStats.append(noting)
			noting.fadeIn(1000)
			showLoading = true

		}
		
		//if(refreshIntervalId)
		//{
			//clearInterval(refreshIntervalId)
		//}
		//refreshIntervalId = setInterval(loadlastStats, winnersInterval)
	}
 
	function seconds_to_days_hours_mins_secs_str(seconds)
	{ 	// day, h, m and s
		var days     = Math.floor(seconds / (24*60*60));
			seconds -= days    * (24*60*60);
		var hours    = Math.floor(seconds / (60*60));
			seconds -= hours   * (60*60);
		var minutes  = Math.floor(seconds / (60));
			seconds -= minutes * (60);
		return ((0<days)?(days+" дня "):"")+hours+" час. "+((0>=days)?(minutes+"мин."):"");
	}

function getClassName(id){
	var classname = [{
		'0':'Human Fighter',
		'1':'Warrior', 
		'2':'Gladiator', 
		'3':'Warlord', 
		'4':'Human Knight', 
		'5':'Paladin', 
		'6':'Dark Avenger', 
		'7':'Rogue', 
		'8':'Treasure Hunter', 
		'9':'Hawkeye', 
		'10':'Human Mystic',
		'11':'Human Wizard', 
		'12':'Sorcerer', 
		'13':'Necromancer', 
		'14':'Warlock', 
		'15':'Cleric', 
		'16':'Bishop', 
		'17':'Prophet', 
		'18':'Elven Fighter',
		'19':'Elven Knight', 
		'20':'Temple Knight', 
		'21':'Sword Singer', 
		'22':'Elven Scout', 
		'23':'Plains Walker', 
		'24':'Silver Ranger', 
		'25':'Elven Mystic',
		'26':'Elven Wizard', 
		'27':'Spellsinger', 
		'28':'Elemental Summoner', 
		'29':'Elven Oracle', 
		'30':'Elven Elder', 
		'31':'Dark Fighter',
		'32':'Palus Knight', 
		'33':'Shillien Knight', 
		'34':'Bladedancer', 
		'35':'Assassin', 
		'36':'Abyss Walker', 
		'37':'Phantom Ranger', 
		'38':'Dark Mystic',
		'39':'Dark Wizard', 
		'40':'Spellhowler', 
		'41':'Phantom Summoner', 
		'42':'Shillien Oracle', 
		'43':'Shillien Elder', 
		'44':'Orc Fighter',
		'45':'Orc Raider', 
		'46':'Destroyer', 
		'47':'Monk', 
		'48':'Tyrant', 
		'49':'Orc Mystic',
		'50':'Orc Shaman', 
		'51':'Overlord', 
		'52':'Warcryer', 
		'53':'Dwarf Fighter',
		'54':'Scavenger', 
		'55':'Bounty Hunter', 
		'56':'Artisan', 
		'57':'Warsmith', 
		'88':'Duelist', 
		'89':'Dreadnought', 
		'90':'Phoenix Knight', 
		'91':'Hell Knight', 
		'92':'Sagittarius', 
		'93':'Adventurer', 
		'94':'Archmage', 
		'95':'Soultaker', 
		'96':'Arcana Lord', 
		'97':'Cardinal', 
		'98':'Hierophant', 
		'99':'Eva\'s Templar', 
		'100':'Sword Muse', 
		'101':'Wind Rider', 
		'102':'Moonlight Sentinel', 
		'103':'Mystic Muse', 
		'104':'Elemental Master', 
		'105':'Eva\'s Saint', 
		'106':'Shillien Templar', 
		'107':'Spectral Dancer', 
		'108':'Ghost Hunter', 
		'109':'Ghost Sentinel', 
		'110':'Storm Screamer', 
		'111':'Spectral Master', 
		'112':'Shillien Saint', 
		'113':'Titan', 
		'114':'Grand Khavatari', 
		'115':'Dominator', 
		'116':'Doom Cryer', 
		'117':'Fortune Seeker', 
		'118':'Maestro', 
		'123':'Male Kamael Soldier',
		'124':'Female Kamael Soldier',
		'125':'Trooper', 
		'126':'Warder', 
		'127':'Berserker', 
		'128':'Male Soul Breaker', 
		'129':'Female Soul Breaker', 
		'130':'Arbalester', 
		'131':'Doombringer', 
		'132':'Male Soul Hound', 
		'133':'Female Soul Hound', 
		'134':'Trickster', 
		'135':'Inspector', 
		'136':'Judicator', 
		'139':'Sigel Knight',
		'140':'Tyrr Warrior',
		'141':'Othell Rogue',
		'142':'Yul Archer',
		'143':'Feoh Wizard',
		'144':'Iss Enchanter',
		'145':'Wynn Summoner',
		'146':'Aeore Healer',
		'148':'Sigel Phoenix Knight', 
		'149':'Sigel Hell Knight', 
		'150':'Sigel Eva\'s Templar', 
		'151':'Sigel Shillien Templar', 
		'152':'Tyrr Duelist', 
		'153':'Tyrr Dreadnought', 
		'154':'Tyrr Titan', 
		'155':'Tyrr Grand Khavatari', 
		'156':'Tyrr Maestro', 
		'157':'Tyrr Doombringer', 
		'158':'Othell Adventurer', 
		'159':'Othell Wind Rider', 
		'160':'Othell Ghost Hunter', 
		'161':'Othell Fortune Seeker', 
		'162':'Yul Sagittarius', 
		'163':'Yul Moonlight Sentinel', 
		'164':'Yul Ghost Sentinel', 
		'165':'Yul Trickster', 
		'166':'Feoh Archmage', 
		'167':'Feoh Soultaker', 
		'168':'Feoh Mystic Muse', 
		'169':'Feoh Storm Screamer', 
		'170':'Feoh Soulhounds',  
		'171':'Iss Hierophant', 
		'172':'Iss Sword Muse', 
		'173':'Iss Spectral Dancer', 
		'174':'Iss Dominator', 
		'175':'Iss Doomcryer', 
		'176':'Wynn Arcana Lord', 
		'177':'Wynn Elemental Master', 
		'178':'Wynn Spectral Master', 
		'179':'Aeore Cardinal', 
		'180':'Aeore Eva\'s Saint', 
		'181':'Aeore Shillien Saint', 
		'182':'Ertheia Fighter',
		'183':'Ertheia Wizard',
		'184':'Marauder', 
		'185':'Cloud Breaker', 
		'186':'Ripper', 
		'187':'Stratomancer', 
		'188':'Eviscerator', 
		'189':'Sayha\'s Seer'
		}];
	return classname[0][id];
}

function getCastleName(id) {
		switch (parseInt(id))
		{
			case 0:
				return '';
			case 1:
				return 'Gludio Castle';
			case 2:
				return 'Dion Castle';
			case 3:
				return 'Giran Castle';
			case 4:
				return 'Oren Castle';
			case 5:
				return 'Aden Castle';
			case 6:
				return 'Innadril Castle';
			case 7:
				return 'Goddard Castle';
			case 8:
				return 'Rune Castle';
			case 9:
				return 'Schuttgart Castle';
			default:
				return '<font color="#333333">Неизвестный ID'+id+'</font>';
		}
	}