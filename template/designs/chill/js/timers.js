$(document).ready(function(){

	function startTimer(timer_class){
		var time = $('.' + timer_class).attr('data-time');
		var thisTime = Math.round(new Date().getTime()/1000.0);
		var languageTimer = $('.' + timer_class).attr('data-lang');
		if(time < thisTime){
			$('.' + timer_class).empty();
			$('.' + timer_class).append($('.' + timer_class).attr('data-end-msg'));
			return;
		}
		setInterval(function() {
			thisTime = Math.round(new Date().getTime()/1000.0);
			
			var backTime = time - thisTime;
			var d = backTime/(3600*24) ^ 0;
			var h = (backTime-d*3600*24)/3600 ^ 0;
			var m = (backTime-h*3600-d*3600*24)/60 ^ 0;
			var s = backTime-h*3600-d*3600*24-m*60;
			
			if(h < 10){
				h = '0' + h;
			}
			if(m < 10){
				m = '0' + m;
			}
			if(s < 10){
				s = '0' + s;
			}
			
			$('.' + timer_class).empty();
			
			if(languageTimer == 'ru')
			{
				$('.' + timer_class).append('<div class="header__content-timer-time-box"><div class="header__content-timer-time-num flex-cc">' + d + '</div><div class="header__content-timer-time-desc">ДНЕЙ</div></div><div class="header__content-timer-time-sep"></div><div class="header__content-timer-time-box"><div class="header__content-timer-time-num flex-cc">' + h + '</div><div class="header__content-timer-time-desc">ЧАС</div></div><div class="header__content-timer-time-sep"></div><div class="header__content-timer-time-box"><div class="header__content-timer-time-num flex-cc">' + m + '</div><div class="header__content-timer-time-desc">МИН</div></div><div class="header__content-timer-time-sep"></div><div class="header__content-timer-time-box"><div class="header__content-timer-time-num flex-cc">' + s + '</div><div class="header__content-timer-time-desc">СЕК</div></div>');
			}
			else
			{
				$('.' + timer_class).append('<div class="header__content-timer-time-box"><div class="header__content-timer-time-num flex-cc">' + d + '</div><div class="header__content-timer-time-desc">DAYS</div></div><div class="header__content-timer-time-sep"></div><div class="header__content-timer-time-box"><div class="header__content-timer-time-num flex-cc">' + h + '</div><div class="header__content-timer-time-desc">HOUR</div></div><div class="header__content-timer-time-sep"></div><div class="header__content-timer-time-box"><div class="header__content-timer-time-num flex-cc">' + m + '</div><div class="header__content-timer-time-desc">MIN</div></div><div class="header__content-timer-time-sep"></div><div class="header__content-timer-time-box"><div class="header__content-timer-time-num flex-cc">' + s + '</div><div class="header__content-timer-time-desc">SEC</div></div>');

			}
			

		}, 0);
	}
	
	startTimer('timer1');
});

