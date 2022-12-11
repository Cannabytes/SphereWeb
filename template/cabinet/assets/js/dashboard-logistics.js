$(function() {
    "use strict";


  // chart 1
	
	 $('.fleet-chart').easyPieChart({
		easing: 'easeOutBounce',
		barColor : '#ffffff',
		lineWidth: 10,
		trackColor : 'rgba(255, 255, 255, 0.12)',
		scaleColor: false,
		onStep: function(from, to, percent) {
			$(this.el).find('.fleet-status-percent').text(Math.round(percent));
		}
	 });
  


  // chart 2

		var ctx = document.getElementById("deliverychart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ["Within Time Limit", "Out of Time Limit"],
					datasets: [{
						backgroundColor: [
							"#fba540",
							"#03d0ea"
						],
						data: [325, 145],
						borderWidth: [0, 0]
					}]
				},
			options: {
				maintainAspectRatio: false,
			   legend: {
				 position :"bottom",	
				 display: false,
				    labels: {
					  fontColor: '#585757',  
					  boxWidth:15
				   }
				}
				,
				tooltips: {
				  displayColors:false
				}
			   }
			});


 // chart 3

     var ctx = document.getElementById("regionchart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: ["Germany", "France", "Switzerland", "Australia"],
					datasets: [{
						backgroundColor: [
							"#14abef",
							"#02ba5a",
							"#d13adf",
							"#fba540"
						],
						data: [55, 220, 40, 40],
						borderWidth: [0, 0, 0, 0]
					}]
				},
			options: {
				maintainAspectRatio: false,
			   legend: {
				 position :"bottom",	
				 display: true,
				    labels: {
					  fontColor: '#e4e6eb',  
					  boxWidth:10
				   }
				}
			   }
			});



        // chart 3

     var ctx = document.getElementById('revenueChart').getContext('2d');
              
       var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['01', '02', '03', '04', '05', '06'],
          datasets: [{
            label: 'Total Revenue',
            data: [10, 18, 12, 8, 15, 10],
            backgroundColor: 'rgba(255, 255, 255, 0.12)',
            borderColor: '#fff',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:'#fff',
            pointBorderColor :'#fff',
            pointHoverBorderColor :'#fff',
            pointBorderWidth :1,
            pointRadius :0,
            pointHoverRadius :4,
            borderWidth: 2
          }]
        }
        ,
        options: {
			maintainAspectRatio: false,
              legend: {
                position: false,
                display: true,
            },
        tooltips: {
           enabled: false
      },
     scales: {
          xAxes: [{
            display: false,
            gridLines: false
          }],
          yAxes: [{
            display: false,
            gridLines: false
          }]
        }
        }
    
      });


      // chart 4

     var ctx = document.getElementById('profitChart').getContext('2d');
              
       var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['01', '02', '03', '04', '05', '06'],
          datasets: [{
            label: 'Total Profit',
            data: [10, 18, 12, 8, 15, 10],
            backgroundColor: 'rgba(255, 255, 255, 0.12)',
            borderColor: '#fff',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:'#fff',
            pointBorderColor :'#fff',
            pointHoverBorderColor :'#fff',
            pointBorderWidth :1,
            pointRadius :0,
            pointHoverRadius :4,
            borderWidth: 2
          }]
        }
        ,
        options: {
			maintainAspectRatio: false,
              legend: {
                position: false,
                display: true,
            },
        tooltips: {
           enabled: false
      },
     scales: {
          xAxes: [{
            display: false,
            gridLines: false
          }],
          yAxes: [{
            display: false,
            gridLines: false
          }]
        }
        }
    
      });


	   // chart 5

     var ctx = document.getElementById('shipmentChart').getContext('2d');
              
       var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['01', '02', '03', '04', '05', '06'],
          datasets: [{
            label: 'Total Shipments',
            data: [10, 18, 12, 8, 15, 10],
            backgroundColor: 'rgba(255, 255, 255, 0.12)',
            borderColor: '#fff',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:'#fff',
            pointBorderColor :'#fff',
            pointHoverBorderColor :'#fff',
            pointBorderWidth :1,
            pointRadius :0,
            pointHoverRadius :4,
            borderWidth: 2
          }]
        }
        ,
        options: {
			maintainAspectRatio: false,
              legend: {
                position: false,
                display: true,
            },
        tooltips: {
           enabled: false
      },
     scales: {
          xAxes: [{
            display: false,
            gridLines: false
          }],
          yAxes: [{
            display: false,
            gridLines: false
          }]
        }
        }
    
      });


    // chart 6

	 var ctx = document.getElementById("timeChart").getContext('2d');


      var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke3.addColorStop(0, '#42e695');
      gradientStroke3.addColorStop(1, '#3bb2b8');

      var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke4.addColorStop(0, ' #7f00ff');
      gradientStroke4.addColorStop(0.5, '#e100ff');

			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: 'Route',
						data: [15, 8, 12, 5, 12, 8, 16, 25, 15, 10, 20, 10],
						backgroundColor: gradientStroke3,
            hoverBackgroundColor: gradientStroke3
					}, {
						label: 'Time',
						data: [25, 18, 22, 15, 22, 18, 26, 35, 25, 20, 30, 20],
						backgroundColor: gradientStroke4,
            hoverBackgroundColor: gradientStroke4,
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
				  enabled:true,
          displayColors:false
				},	
			  scales: {
				  xAxes: [{
				  	  categoryPercentage: 0.3,
					ticks: {
						beginAtZero:true,
						fontColor: '#e4e6eb'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(255, 255, 255, 0.05)"
					},
				  }],
				   yAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#e4e6eb'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(255, 255, 255, 0.05)"
					},
				  }]
				 }

			 }
			});







    });