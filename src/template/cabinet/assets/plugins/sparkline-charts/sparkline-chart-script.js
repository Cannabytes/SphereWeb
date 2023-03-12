
  $(function() {
    "use strict";

    $('#sparklinechart1').sparkline([ 1, 4, 5, 9, 8, 10, 5, 8, 4, 1, 0, 7, 5, 7, 9, 8, 10, 5], {
            type: 'bar',
            height: '45',
            barWidth: '3',
            resize: true,
            barSpacing: '4',
            barColor: '#14abef',
			spotColor: '#14abef',
            minSpotColor: '#14abef',
            maxSpotColor: '#14abef',
            highlightSpotColor: '#14abef',
            highlightLineColor: '#14abef'
        });
		
		
	$("#sparklinechart2").sparkline([1,1,0,1,-1,-1,1,-1,0,0,1,-1,1,1,-1,0,0,1,1,-1,-1,1,1], {
		type: 'tristate',
		height: '30',
		zeroAxis: false
		});	
		
		
	$("#sparklinechart3").sparkline([28,48,40,19,96,27,100], {
            type: 'line',
            width: '150',
            height: '65',
            lineWidth: '2',
            lineColor: '#02ba5a',
            fillColor: 'transparent',
            spotColor: '#02ba5a',
            minSpotColor: '#02ba5a',
            maxSpotColor: '#02ba5a',
            highlightSpotColor: '#02ba5a',
            highlightLineColor: '#02ba5a'
    }); 	
		
		
	  $("#sparklinechart4").sparkline([5,6,7,9,9,5,3,2,2,4,6,7], {
		type: 'line',
		width: '180',
		height: '65',
		lineWidth: '2',
		lineColor: '#d13adf',
		fillColor: 'rgba(209, 58, 223, 0.33)',
		maxSpotColor: '#d13adf',
		highlightLineColor: '#d13adf',
		highlightSpotColor: '#d13adf'
	  });
  
  
   $('#sparklinechart5').sparkline([20, 20, 20], {
            type: 'pie',
            height: '200',
            resize: true,
            sliceColors: ['#14abef', '#02ba5a', '#eb5076']
        }); 


	$('#sparklinechart6').sparkline([40, 40, 40], {
		  type: 'pie',
		  height: '200',
		  resize: true,
		  sliceColors: ['#d13adf', '#fba540', '#03d0ea']
	  });
	  
  
  $("#sparklinechart7").sparkline([15,16,20,18,19,14,17,12,11,12,10,14,17,14,10,15], {
    type: 'bar',
    width: '100%',
    height: '200',
    barWidth: 6,
    barSpacing: 10,
    barColor: '#000000'
  });
  


   });