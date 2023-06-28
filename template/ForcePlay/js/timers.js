$(document).ready(function(){

	function startTimer(timer_class){
		var time = $('.' + timer_class).attr('data-time');
		var thisTime = Math.round(new Date().getTime()/1000.0);
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
			$('.' + timer_class).append('<div class="timer__time__number">' + d + '</div><div class="timer__time__separator">:</div><div class="timer__time__number">' + h + '</div><div class="timer__time__separator">:</div><div class="timer__time__number">' + m + '</div><div class="timer__time__separator">:</div><div class="timer__time__number">' + s + '</div>');
		}, 1000);
	}
	
	startTimer('timer1');
});

