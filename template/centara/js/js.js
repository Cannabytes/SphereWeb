$(window).on("scroll", function() {
    if ($(window).scrollTop() > 20) $('.menu').addClass('fixed');
    else $('.menu').removeClass('fixed');
});

$(document).ready(function(){
    $(document).on('click', '.menu .wrapper ul li.children > a', function(e){
        e.preventDefault();

        if ($(window).width() <= 1100) {
            $(this).parent().find('.sub').slideToggle(200);
        }
    });

    $('.news-box .news .date, .shares-box .item .date').each(function(){
        var month = $(this).find('span').html();
        if (month == 'Jan') {$(this).find('span').html('ЯНВ')}
        if (month == 'Feb') {$(this).find('span').html('ФЕВ')}
        if (month == 'Mar') {$(this).find('span').html('МАР')}
        if (month == 'Apr') {$(this).find('span').html('АПР')}
        if (month == 'May') {$(this).find('span').html('МАЯ')}
        if (month == 'Jun') {$(this).find('span').html('ИЮН')}
        if (month == 'Jul') {$(this).find('span').html('ИЮЛ')}
        if (month == 'Aug') {$(this).find('span').html('АВГ')}
        if (month == 'Sept') {$(this).find('span').html('СЕН')}
        if (month == 'Oct') {$(this).find('span').html('ОКТ')}
        if (month == 'Nov') {$(this).find('span').html('НОЯ')}
        if (month == 'Dec') {$(this).find('span').html('ДЕК')}
    });

    $(document).on('click', 'ul.tabs[data-rel-tabs] li a[data-href]', function(el){
        var list = $(this).parent().parent().attr('data-rel-tabs');
        var tab = $(this).attr('data-href');

        $('.top-body[data-top-body="'+list+'"] .block[data-tab]').removeClass('active');
        $('.top-body[data-top-body="'+list+'"] .block[data-tab="'+tab+'"]').addClass('active');

        $(this).parent().parent().find('li a[data-href]').removeClass('active');
        $(this).addClass('active');

        el.preventDefault();
    });

    $(document).on('click', '.about-tabs ul.tabs[data-tabs-about] li a[data-href]', function(el){
        var tab = $(this).attr('data-href');

        $('.about-content[data-content-about] .content-tab[data-tab]').removeClass('active');
        $('.about-content[data-content-about] .content-tab[data-tab="'+tab+'"]').addClass('active');

        $(this).parent().parent().find('li a[data-href]').removeClass('active');
        $(this).addClass('active');

        el.preventDefault();
    });
});

function showMenu() {
    document.querySelector('.menu .wrapper ul').classList.toggle('toggle');
    event.currentTarget.classList.toggle('toggle');
}

function galNext() {
    var child = document.querySelector('.gallery .flex .item:last-child');
    if (child.classList.contains('active')) {} else {
        $('.gallery .prev').addClass('toggle');
        $('.gallery .flex .item:not(:last-child).active').removeClass('active').next().addClass('active');
        var set = $('.gallery .flex .item.active').position().left;
        $('.gallery .flex').css('transform', 'translateX(-'+set+'px)');
    }
}
function galPrev() {
    var child = document.querySelector('.gallery .flex .item:first-child');
    if (child.classList.contains('active')) {} else {
        $('.gallery .next').addClass('toggle');
        $('.gallery .flex .item:not(:first-child).active').removeClass('active').prev().addClass('active');
        var set = $('.gallery .flex .item.active').position().left;
        $('.gallery .flex').css('transform', 'translateX(-'+set+'px)');
        if (set == 0) {$('.gallery .prev').removeClass('toggle');}
    }
}

function showVote() {
    document.querySelector('.vote-box .wrapper').classList.toggle('toggle');
}

document.addEventListener('DOMContentLoaded', function(){
    var max = 1000;
    var speed = 4;

    [].forEach.call(document.querySelectorAll('.progress'), function(e){
        var width = e.getAttribute('width');
        var allCircle = e.querySelector('circle');
        var circle = e.querySelector('circle.circle');
        var stroke_width = circle.getAttribute('stroke-width');
        [].forEach.call(e.querySelectorAll('circle'), function(el){
            el.setAttribute('cx', width/2);
            el.setAttribute('cy', width/2);
            el.setAttribute('r', width/2-stroke_width/2);
        });

        [].forEach.call(e.querySelectorAll('circle.circle'), function(el){
            var r = el.getAttribute('r');
            var rad = 2*Math.PI*r;
            el.setAttribute('stroke-dasharray', rad);
            el.setAttribute('stroke-dashoffset', rad);

            setTimeout(function(){
                var set = e.getAttribute('data-set');
                if (set >= max) {
                    set = max;
                }
                var per = set/max*100;
                var count = 100 - per;
                var str = rad/100;
                var result = count*str;
                el.style.transition = 'all '+speed+'s ease';
                el.setAttribute('stroke-dashoffset', result);
            }, 10);
        });
    });
});