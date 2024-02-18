/* Google fonts */
var WebFontConfig = {
    google: {
        families: __config.gFonts.fonts
    },
    timeout: __config.gFonts.delay // Set the timeout to two seconds
};
(function () {
    var wf = document.createElement('script');
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
})();

hidePreload(function () {
    try {
        Copy();
        // GetWebServers();
        fancyCheckHash();
        insertmedia({
            delay: 500,
        });
    } catch (error) {
        console.log(error)
    }

});


/* Ramdom number */

// function getRandomInt(min, max) {
//     return Math.floor(Math.random() * (max - min)) + min;
// }

/* Rounding number */

// function roundingNum(x, n) {
//     return parseFloat(Number.parseFloat(x).toFixed(n || 2));
// }


/* fancybox */
$.fancybox.defaults.animationDuration = 300;

$('body').on('click', '[data-open-window]', function (e) {
    e.preventDefault();
    $.fancybox.getInstance('close');
    let target = $(this).attr('data-open-window');
    window.location.hash = target;
    fancyCustomOpen(target);
})

function fancyCustomOpen(target) {
    $.fancybox.open({
        src: '#' + target,
        type: 'inline',
        selectable: true,
        opts: {
            touch: false,
            beforeShow: function (instance, current) {

            },
            btnTpl: {
                smallBtn: '<div class="gw-modal-close" data-fancybox-close></div>',
            },
            beforeClose: function () {
                history.pushState("", document.title, window.location.pathname);
            }
        },
    });
}

function fancyCheckHash() {
    switch (window.location.hash.substr(1)) {
        case 'files':
            fancyCustomOpen("files");
            break;
        case 'reg':
            fancyCustomOpen("reg");
            break;
    }
}

/*  AnimatingNumbers */

function AnimatingNumbers(el, start, end, duration) {
    anime({
        targets: el,
        duration: duration || 1000,
        innerHTML: [start, end],
        round: 1,
        easing: 'easeOutExpo',
    });
}

/* tabs */

$(function () {
    $('[data-open-tab]').on("click", function (e) {
        // e.preventDefault();
        var __this = $(this);
        var groups = __this.attr("data-open-tab-group").split('|');
        gwTabHide(groups);
        var tabs = __this.attr("data-open-tab").split('|');
        gwOpenTab(tabs);
    });
});

$(function () {
    $('[data-tab-select]').on("change", function (e) {
        // e.preventDefault();
        let __this = $(this);
        let option = __this.find('option:selected');
        let groups = option.attr("data-open-tab-group-select").split('|');
        gwTabHide(groups);
        let tabs = option.attr("data-open-tab-select").split('|');
        gwOpenTab(tabs);
    });
});


function gwTabHide(arr) {
    for (var i = 0; i < arr.length; i++) {
        $('[data-tab-group=' + arr[i] + ']').hide();
    }
}

function gwOpenTab(arr) {
    for (var n = 0; n < arr.length; n++) {
        $('[data-tab=' + arr[n] + ']').show();
    }
}

$('#method').on('change', function () {
    const __this = $(this);
    console.log(__this.val());
    __this.val();
    gwTabHide(['r-type']);
    gwOpenTab([`${__this.val()}`])
}).trigger('change');


/* tippy content */
let Tip_content = function () {
    tippy('[data-tip]', {
        delay: 0,
        flip: true,
        trigger: 'click',
        allowHTML: true,
        theme: 'tip',
        // boundary: '.equipment__box',
        arrow: true,
        arrowType: 'round',
        // duration: 250,
        // animation: 'shift-away',
        placement: 'right',
        // size: 'small',
        // sticky: false,
        // theme: 'dark lite',
        maxWidth: '250px',
        content(reference) {
            const ref = $(reference)
            if (ref.attr('data-tip') != "") {
                return ref.attr('data-tip');
            }
            return ref.find('[data-tip-content]').html() || "";
        }
    });
}

Tip_content();

/* preload */

function hidePreload(fn) {
    $(".preload__progress").animate({
        width: "100%"
    }, __config.preload.time * 1000);
    setTimeout(function () {
        hidePreloadHandler(fn);
    }, __config.preload.time * 1000);
    if (__config.preload.hideByClick) {
        $('.preload').on('click', function () {
            hidePreloadHandler(fn);
        });
    }
}

function hidePreloadHandler(fn) {
    $('.preload').addClass('preload__fade').fadeOut(400, function () {
        $('.preload').remove();
        if (typeof fn == 'function') fn();
        document.querySelector('body').dispatchEvent(new Event('PreloadEnd'));
    });
}

/* Copyright */

function Copy() {
    console.log('%c Жулик, не воруй! ', 'background: #222; color: red; font-size: 30px');
    console.log("Designer: Vitalii P. |  Get-Web.Site");
    console.log("Front-end developer: Vitalii P.");
    console.log("Back-end developer: Logan22");
    console.log("for SphereWeb");
}

/* gw-burger */

$('.gw-burger').on('click', function () {
    $('.gw-burger').toggleClass('gw-burger_active');
});

$('.navigation__list').on('click', function () {
    if ($(window).width() <= 1050) {
        $('.gw-burger').toggleClass('gw-burger_active');
    }
});


/* menu */

/* servers */

function GetWebServers() {
    // L2Banners Scripts
    let servers = $('[data-gw-server]');
    if (servers.length === 0) return;
    $.each(servers, function (i, el) {
        let server = $(el);
        let serverOnline = server.find('[data-gw-server-online]').attr("data-gw-server-online");
        let serverOnlineMax = server.find('[data-gw-server-online-max]').attr("data-gw-server-online-max");
        let online = Math.floor(
            serverOnline / serverOnlineMax * 100
        );
        online = online > 100 ? 100 : online;

        // server.find("[data-server-percent]").html(load);
        AnimatingNumbers(server.find("[data-server-percent]")[0], 0, online, 2000);
        server.find("[data-server-load]").css("right", 100 - online + "%");
    });
}

$('body').on('PreloadEnd', GetWebServers);

/* streams */

if (typeof __config != "undefined" && typeof __config.sliders != "undefined" && typeof __config.sliders.streams != "undefined" &&
    __config.sliders.streams.init) {
    var streamsSlider = new Swiper('[data-slider-streams="true"]', {
        autoplay: (function () {
            if (typeof __config.sliders.streams.autoplay != "undefined" && __config.sliders.streams.autoplay && typeof __config.sliders.streams.autoplayDelay != "undefined") {
                return {
                    disableOnInteraction: true,
                    delay: __config.sliders.streams.autoplayDelay || 10000,
                }
            } else {
                return false
            }
        })(),
        // pagination: {
        //     el: '[data-streams-pagination]',
        //     clickable: true,
        // },
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '[data-streams-next]',
            prevEl: '[data-streams-prev]',
        },
        slidesPerView: 3,
        spaceBetween: 0,
        simulateTouch: false,
        onlyExternal: false,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 2,
            },
            750: {
                slidesPerView: 3,
            },
            840: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            }
        }
    });
    if (typeof __config.sliders.streams.autoplay != "undefined" && __config.sliders.streams.autoplay && __config.sliders.streams.pauseOnHover) {
        $('[data-slider-streams="true"]').hover(function () {
            streamsSlider.autoplay.stop();
        }, function () {
            streamsSlider.autoplay.start();
        });
    }
} else {
    $('[data-slider-streams="true"], .streams__heading').remove();
}

/* rating */

$(function () {

    $('[data-rating-select]').on('click', function () {
        const __this = $(this);
        // Находим родителя нажатой кнопки
        const parent = __this.parent();
        /* Находим все активные кнопки внутри родителя и ставим false */
        parent.find('[data-rating-select="true"]').attr('data-rating-select', 'false');
        /* Нажатой кнопке ставим true */
        __this.attr('data-rating-select', 'true');
    });

    $('[data-tab-select-server]').on('change', function () {
        const __this = $(this);
        let option = __this.find('option:selected');
        // Записываем название сервера который будет открывать
        let server = option.attr('data-open-tab-select');
        /* Назодим таб серевера по названию */
        let rating = $('[data-tab=' + server + ']');
        /* Проверяем, есть ли в нем активные нажатые кнопки, если есть, то ничего не делаем */
        if (rating.find('[data-rating-select="true"]').length > 0) return;
        /* Если нет, то на первой найденой кнопки эмулируем событие click */
        rating.find('[data-open-tab]').eq(0).trigger('click');
    });

    $('[data-tab-select-server]').eq(0).trigger('change');

});

/* top */

// $("[data-top-scroll]").mCustomScrollbar({
//     axis: "y",
//     documentTouchScroll: false
// });

// var resizeTimeout;
// $(window).on("resize", function () {
//     clearTimeout(resizeTimeout);
//     resizeTimeout = setTimeout(function () {
//         if (document.body.clientWidth < 1200) {
//             $('[data-top-scroll]').mCustomScrollbar("disable", true);
//         } else {
//             $('[data-top-scroll]').mCustomScrollbar("update");
//         }
//     }, 100);
// }).trigger('resize');