
$(function() {
    "use strict";
     
	 
//sidebar menu js
$.sidebarMenu($('.sidebar-menu'));

// === toggle-menu js
$(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });	 
	   
// === sidebar menu activation js

$(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }), 	   
	   



/* Back To Top */

$(document).ready(function(){ 
    $(window).on("scroll", function(){ 
        if ($(this).scrollTop() > 300) { 
            $('.back-to-top').fadeIn(); 
        } else { 
            $('.back-to-top').fadeOut(); 
        } 
    }); 

    $('.back-to-top').on("click", function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});	   
	   

  // page loader

    $(window).on('load', function(){

     $('#pageloader-overlay').fadeOut(1000);

    })  
   
   
$(function () {
  $('[data-toggle="popover"]').popover()
})


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


	 // theme setting
	 $(".switcher-icon").on("click", function(e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });
	
	$('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    
    function theme1() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme4');
    }
	
	function theme5() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme5');
    }
	
	function theme6() {
      $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme6');
    }

   
    // header setting 
	
	$('#header1').click(header1);
    $('#header2').click(header2);
	$('#header3').click(header3);
	$('#header4').click(header4);
	$('#header5').click(header5);
	$('#header6').click(header6);
	
	function header1() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme1');
    }
	
	function header2() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme2');
    }
	
	function header3() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme3');
    }
	
	function header4() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme4');
    }
	
	function header5() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme5');
    }
	
	function header6() {
      $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme6');
    }
	
	
	
	// default header & sidebar
	
	$(document).ready(function(){
		
	   $("#default-header").click(function(){
		  
		 $("#header-setting").removeClass("color-header bg-theme1 bg-theme2 bg-theme3 bg-theme4 bg-theme5 bg-theme6");
		
	  });
	  
	  
	  $("#default-sidebar").click(function(){
		  
		 $("#sidebar-wrapper").removeClass("bg-theme bg-theme1 bg-theme2 bg-theme3 bg-theme4 bg-theme5 bg-theme6");
		
	  });
	  
	  
	  
	});
	
	
	
	
	
	
	
	
	

});