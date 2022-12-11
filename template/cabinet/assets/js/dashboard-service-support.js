$(function() {
    "use strict";
	  
	  // chart 1
	 
		  var ctx = document.getElementById('chart1').getContext('2d');
		
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
					datasets: [{
						label: 'Support Costs',
						data: [25, 23, 27, 15, 27, 23, 31, 41, 31, 25, 35],
						backgroundColor: 'rgba(255, 255, 255, 0.13)',
						borderColor: "transparent",
						borderWidth: 3
					}, {
						label: 'Revenue',
						type: 'line',
						data: [10, 8, 12, 5, 12, 8, 16, 25, 15, 10, 20],
						backgroundColor: "rgba(243, 38, 89, 0.36)",
						borderColor: "#f32659",
						pointBackgroundColor:'transparent',
                        pointHoverBackgroundColor:'transparent',
						pointBorderWidth :0,
						pointRadius :0,
						pointHoverRadius :0,
						borderWidth: 2
						
					}]
				},
			options: {
				maintainAspectRatio: false,
				legend: {
				  display: true,
				  labels: {
					fontColor: '#e4e6eb',  
					boxWidth:40
				  }
				},
				tooltips: {
				  displayColors:false
				},	
			  scales: {
				  xAxes: [{
					barPercentage: .3,
					ticks: {
						beginAtZero:true,
						fontColor: '#e4e6eb'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(255, 255, 255, 0.04)"
					},
				  }],
				   yAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#e4e6eb'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(255, 255, 255, 0.04)"
					},
				  }]
				 }

			 }
			}); 
			
			
		// chart 2
	 
		  var ctx = document.getElementById('chart2').getContext('2d');
		
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: 'Request Volume',
						data: [10, 40, 20, 40, 40, 60, 40, 80, 40, 70, 40, 70],
						backgroundColor: '#02ba5a',
						borderColor: "transparent",
						pointRadius :"0",
						lineTension :'0',
						borderWidth: 3
					}, {
						label: 'Service Level',
						data: [30, 60, 50, 60, 60, 80, 60, 120, 60, 100, 60, 100],
						backgroundColor: "rgba(2, 186, 90, 0.52)",
						borderColor: "transparent",
						pointRadius :"0",
						lineTension :'0',
						borderWidth: 1
					}]
				},
			options: {
				maintainAspectRatio: false,
				legend: {
				  display: true,
				  labels: {
					fontColor: '#e4e6eb',  
					boxWidth:40
				  }
				},
				tooltips: {
				  displayColors:false
				},	
			  scales: {
				  xAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#e4e6eb'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(255, 255, 255, 0.04)"
					},
				  }],
				   yAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#e4e6eb'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(255, 255, 255, 0.04)"
					},
				  }]
				 }

			 }
			}); 	
			
			
	    //pie
            $("span.pie").peity("pie",{
                width: 158,
                height: 158 
            });
        
        //donut

          $("span.donut").peity("donut",{
                width: 158,
                height: 158 
            });
			
			
			
			
			
			
			
			
	
	  });	