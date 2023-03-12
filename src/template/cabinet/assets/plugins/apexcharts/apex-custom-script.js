$(function() {
    "use strict";


// chart 1

var options = {
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                      enabled: false
                    },
                foreColor: '#e4e6eb',
                toolbar: {
                      show: false
                    },
                shadow: {
                    enabled: false,
                    color: '#000',
                    top: 3,
                    left: 2,
                    blur: 3,
                    opacity: 1
                },
            },
            stroke: {
                width: 4,   
                curve: 'smooth',
            },
            series: [{
                name: 'Likes',
                data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5],
            }],

            tooltip: {
                enabled: true,
                theme: 'dark',
            },

            xaxis: {
                type: 'datetime',
                categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#00dbde'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            colors: ["#fc00ff"],
            grid:{
                show: true,
                borderColor: 'rgba(255, 255, 255, 0.04)',
            },
            yaxis: {
                min: -10,
                max: 40,                
            }
        }

       var chart = new ApexCharts(
            document.querySelector("#chart1"),
            options
        );
        
        chart.render();


// chart 2


   var options = {
            chart: {
                height: 350,
                type: 'area',
                zoom: {
                      enabled: false
                    },
             foreColor: '#e4e6eb',
             toolbar: {
                  show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 0, 
                curve: 'smooth'
            },
            series: [{
                name: 'series1',
                data: [50, 100, 180, 135, 190, 109, 200]
            }, {
                name: 'series2',
                data: [100, 150, 240, 185, 240, 159, 250]
            }],

            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],                
            },

            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#ff5447', '#08a50e'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            colors: ["#f1076f", "#cddc35"],
            grid:{
                show: true,
                borderColor: 'rgba(255, 255, 255, 0.04)',
            },
            tooltip: {
                theme: 'dark',
                x: {
                    format: 'dd/MM/yy HH:mm',
                },

            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart2"),
            options
        );

        chart.render();



  // chart 3

    var options = {
            chart: {
                height: 350,
                type: 'bar',
                foreColor: '#e4e6eb',
                toolbar: {
                      show: false
                    }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'  
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            grid:{
                show: true,
                borderColor: 'rgba(255, 255, 255, 0.00)',
            },
            series: [{
                name: 'Net Profit',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Revenue',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Free Cash Flow',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#00c8ff', '#08a50e', '#7f00ff'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            colors: ["#0072ff", "#cddc35", "#e100ff"],
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function (val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart3"),
            options
        );

        chart.render();


   
   // chart 4

        var options = {
            chart: {
                height: 280,
                type: 'donut',
                foreColor: '#e4e6eb',
            },
            dataLabels: {
                enabled: false
            },
            series: [44, 55, 41, 60],
            fill: {
                type: 'gradient',
                gradient: {
                    gradientToColors: [ '#ee0979', '#08a50e', '#7f00ff', '#2575fc'],
                },
            },
            colors: ["#ff6a00", "#cddc35", "#e100ff", '#6a11cb'],
            legend: {
                formatter: function(val, opts) {
                    return val + " - " + opts.w.globals.series[opts.seriesIndex]
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 330,
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]

        }

        var chart = new ApexCharts(
            document.querySelector("#chart4"),
            options
        );

        chart.render();
      

        // chart 5

        var options = {
            chart: {
                height: 280,
                type: 'pie',
                foreColor: '#e4e6eb',
            },
            dataLabels: {
                enabled: true
            },
            series: [44, 55, 41, 60],
            fill: {
                type: 'gradient',
                gradient: {
                    gradientToColors: [ '#2af598', '#fc4a1a', '#fc00ff', '#f7971e'],
                },
            },
            colors: ["#009efd", "#f7b733", "#00dbde", '#ffd200'],
            legend: {
                formatter: function(val, opts) {
                    return val + " - " + opts.w.globals.series[opts.seriesIndex]
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 330
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]

        }

        var chart = new ApexCharts(
            document.querySelector("#chart5"),
            options
        );

        chart.render();
        
       

        // chart 6
		
		var options = {
            chart: {
                height: 350,
                type: 'radar',
				foreColor: '#e4e6eb',
				toolbar: {
                      show: false
                    },
                dropShadow: {
                    enabled: true,
                    blur: 1,
                    left: 1,
                    top: 1
                }
            },
            series: [{
                name: 'Series 1',
                data: [80, 50, 30, 40, 100, 20],
            }, {
                name: 'Series 2',
                data: [20, 30, 40, 80, 20, 80],
            }, {
                name: 'Series 3',
                data: [44, 76, 78, 13, 43, 10],
            }],
			
            title: {
                text: 'Radar Chart - Multi Series'
            },
            stroke: {
                width: 0
            },
           fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#0072ff', '#d13adf', '#cddc35'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
			colors: ["#00c8ff", "#f1076f", "#08a50e"],
			grid:{
                show: false,
                borderColor: 'rgba(255, 255, 255, 0.04)',
            },
            markers: {
                size: 0
            },
            labels: ['2011', '2012', '2013', '2014', '2015', '2016']
        }

        var chart = new ApexCharts(
            document.querySelector("#chart6"),
            options
        );

        chart.render();

      
	  // chart 7
	  
	  var options = {
            chart: {
                height: 380,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
							
                            fontSize: '22px',
                        },
                        value: {
							color: '#e4e6eb',
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Total',
							color: '#e4e6eb',
                            formatter: function (w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 249
                            }
                        }
                    }
                }
            },
			fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#d13adf', '#d13adf', '#f7971e', '#08a50e'],
                    shadeIntensity: 1,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
			colors: ["#8f50ff", "#f1076f", "#ffd200", "#cddc35"],
            series: [44, 55, 67, 83],
            labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
            
        }

       var chart = new ApexCharts(
            document.querySelector("#chart7"),
            options
        );
        
        chart.render();

		
		
		
	 // chart 8
	 
	 var options = {
      chart: {
        height: 380,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          //startAngle: -135,
          //endAngle: 225,
           hollow: {
            margin: 0,
            size: '70%',
            background: '#000',
            image: undefined,
            imageOffsetX: 0,
            imageOffsetY: 0,
            position: 'front',
            dropShadow: {
              enabled: true,
              top: 3,
              left: 0,
              blur: 4,
              opacity: 0.24
            }
          },
          track: {
            background: '#fff',
            strokeWidth: '67%',
            margin: 0, // margin is in pixels
            dropShadow: {
              enabled: true,
              top: -3,
              left: 0,
              blur: 4,
              opacity: 0.35
            }
          },

          dataLabels: {
            showOn: 'always',
            name: {
              offsetY: -4,
              show: true,
              color: '#fff',
              fontSize: '16px'
            },
            value: {
              formatter: function(val) {
                return val + "%";
              },
			  offsetY: 12,
              color: '#fff',
              fontSize: '25px',
              show: true,
            }
          }
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: ['#5204ce'],
          inverseColors: false,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
      colors: ["#f14793"],
      series: [75],
      stroke: {
        lineCap: 'round'
      },
      labels: ['Server Load'],

    }

    var chart = new ApexCharts(
      document.querySelector("#chart8"),
      options
    );

    chart.render();	
		
		
		
     
    // chart 9 

    var options = {
            chart: {
                height: 380,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    startAngle: -225,
                    endAngle: 135,
					hollow: {
                      margin: 0,
                      size: '70%',
                      background: 'transparent',
                      image: undefined,
                      imageOffsetX: 0,
                      imageOffsetY: 0,
                      position: 'front',
                      dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.24
                      }
                    },
                    track: {
                      background: 'rgba(255, 255, 255, 0.12)',
                      strokeWidth: '0%',
                      margin: 0, // margin is in pixels
                      dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35
                      }
                    },
                    dataLabels: {
                        name: {
                            fontSize: '14px',
                            color: '#e4e6eb',
                            offsetY: -10
                        },
                        value: {
                            offsetY: 0,
                            fontSize: '22px',
                            color: '#e4e6eb',
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    },
                    track: {
                      background: '#fff',
                      strokeWidth: '0%',
                      margin: 0, // margin is in pixels
                      dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35
                      }
                    },
                },
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.15,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91]
                },
            },
            stroke: {
                dashArray: 4
            },
            fill: {
              type: 'gradient',
              gradient: {
              shade: 'dark',
              type: 'horizontal',
              shadeIntensity: 0.5,
              gradientToColors: ['#0575e6'],
              inverseColors: false,
              opacityFrom: 1,
              opacityTo: 1,
              stops: [0, 100]
            }
         }, colors: ["#00f260"],
            series: [87],
            labels: ['Median Ratio'],
            
        }

       var chart = new ApexCharts(
            document.querySelector("#chart9"),
            options
        );
        
        chart.render();	 







     });	