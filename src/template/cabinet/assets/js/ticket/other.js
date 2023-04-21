$(document).ready(function () {

    $('#search').keypress(function(e){
      if(e.which == 13){
          var searchVal = $('#search').val();
          window.location.href = '/ticket/search/' + searchVal;
      }
    });

});
