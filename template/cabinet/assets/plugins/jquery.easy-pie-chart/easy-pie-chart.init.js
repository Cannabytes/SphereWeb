!function($) {
    "use strict";

    var EasyPieChart = function() {};

    EasyPieChart.prototype.init = function() {
    	//initializing various types of easy pie charts
		
    	$('.easy-pie-chart-1').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#14abef',
			lineWidth: 6,
			animate: 1000,
            lineCap: 'rgba(255, 255, 255, 0.05)',
            trackColor : 'rgba(255, 255, 255, 0.05)',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-2').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#02ba5a',
			lineWidth: 6,
			lineCap: 'rgba(255, 255, 255, 0.05)',
            trackColor : 'rgba(255, 255, 255, 0.05)',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-3').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#d13adf',
			lineWidth: 6,
			lineCap: 'rgba(255, 255, 255, 0.05)',
            trackColor : 'rgba(255, 255, 255, 0.05)',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-4').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#fe406e',
			lineWidth: 6,
			lineCap: 'rgba(255, 255, 255, 0.05)',
            trackColor : 'rgba(255, 255, 255, 0.05)',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-5').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#e4e6eb',
			lineWidth: 8,
			trackColor : 'rgba(255, 255, 255, 0.05)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-6').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#fba540',
			lineWidth: 8,
			trackColor : 'rgba(255, 255, 255, 0.05)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});


		$('.easy-pie-chart-7').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#009688',
			lineWidth: 8,
			trackColor : 'rgba(255, 255, 255, 0.05)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-8').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#03d0ea',
			lineWidth: 8,
			trackColor : 'rgba(255, 255, 255, 0.05)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});


    },
    //init
    $.EasyPieChart = new EasyPieChart, $.EasyPieChart.Constructor = EasyPieChart
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.EasyPieChart.init()
}(window.jQuery);