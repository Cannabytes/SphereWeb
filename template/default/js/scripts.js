$(document).ready(function(){
    $('.tops-nav .tops-nav-serv a').click(function(e){
        $target = $(this).attr('data-target');
        $('.tops-nav .tops-nav-serv a').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
        if(!$($target).is(':visible')) {
            $('.top-serv').stop().animate({opacity:0}, function(){
                $('.top-serv').hide();
                $($target).show().css({opacity:0}).animate({opacity:1});
            });
        }
    });
    $('.tops-nav .tops-nav-type a').click(function(e){
        $target = '.'+$(this).attr('data-target');
        $('.tops-nav .tops-nav-type a').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
        if(!$($target).is(':visible')) {
            $('.top-table').stop().animate({opacity:0}, function(){
                $('.top-table').hide();
                $($target).show().css({opacity:0}).animate({opacity:1});
            });
        }
    });
    $('.pk-table, #serv2').hide();

    var online;
    $('.server').each(function(i, el) {
        online = ($(el).attr('data-online'))/$(el).attr('data-max-online');
        if (online > 100) {
          online = 100;
        }
        $(el).circleProgress({
            value: online,
            startAngle: 0,
            size: 110,
            thickness: 12,
            emptyFill: '#ffffff',
            fill: { color: '#FFAE4C' }
        });
    });


    if ($('table#l2top').length) {
        $('table#l2top').wrap('<div class="static stat-bot"></div>');
    }

    $('.scrollTo a').click(function(e){
        e.preventDefault();
        $('body, html').animate({'scrollTop' : $($(this).attr('href')).offset().top}, 'slow');
    });

    $(window).scroll(function() {
      slowShow($('.header .top-bar'),-1);
      slowShow($('.header .logo'),-1);
      slowShow($('.languages'),-1);
      slowShow($('.nav li'),-1);
      slowShow($('.btns a'),-1);
      slowShow($('.servers'),-1);
      slowShow($('.start'),-1);
      slowShow($('.l2top'),-1);
      slowShow($('.startinfo'),-1);
      if($(document).scrollTop() > $('.main').offset().top-$(window).height()/2 && $(document).scrollTop() < $('.main').offset().top-$(window).height()/2+$('.main').height()) {
        slowShow($('.news'),-1);
        slowShow($('.page'),-1);
        slowShow($('.show-more'),-1);
        slowShow($('.block'),-1);
        slowShow($('.block-title'),-1);
        slowShow($('.forum .item'),-1);
      }
      if($(document).scrollTop() > $('.footer').offset().top-$(window).height()) {
        slowShow($('.footer .container'),-1);
        slowShow($('.copy'),-1);
        slowShow($('.pay'),-1);
        slowShow($('.counters'),-1);
      }
    });

    $(window).scroll();
});

function slowShow(el, i) {
  setTimeout(function(){
    i++
    if(i <= $(el).length) {
      $(el).eq(i).addClass('show');
    }
    slowShow(el, i);
  },150);
  
}