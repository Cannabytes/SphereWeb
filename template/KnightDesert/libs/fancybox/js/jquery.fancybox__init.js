// https://fancyapps.com/fancybox/3/

// $('.example_video-link').fancybox({
//     youtube: {
//         controls: 1,
//         showinfo: 0
//     },
//     baseTpl: '<div class="fancybox-container" role="dialog" tabindex="-1">' +
//         '<div class="fancybox-bg"></div>' +
//         '<div class="fancybox-inner">' +
//         '<div class="fancybox-infobar">' +
//         "<span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span>" +
//         "</div>" +
//         '<div class="fancybox-toolbar">{{buttons}}</div>' +
//         '<div class="fancybox-navigation">{{arrows}}</div>' +
//         '<div class="fancybox-stage"></div>' +
//         '<div class="fancybox-caption"></div>' +
//         '<a class="fancybox-more" href="' + $(this).attr("data-more") + '"><span>Подробнее</span></a>' +
//         "</div>" +
//         "</div>",
// });

$(".example_video-link").each(function() {
    $(this).fancybox({
        youtube: {
            controls: 1,
            showinfo: 0
        },
        baseTpl: '<div class="fancybox-container" role="dialog" tabindex="-1">' +
            '<div class="fancybox-bg"></div>' +
            '<div class="fancybox-inner">' +
            '<div class="fancybox-infobar">' +
            "<span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span>" +
            "</div>" +
            '<div class="fancybox-toolbar">{{buttons}}</div>' +
            '<div class="fancybox-navigation">{{arrows}}</div>' +
            '<div class="fancybox-stage"></div>' +
            '<div class="fancybox-caption"></div>' +
            '<a class="fancybox-more" href="' + $(this).attr("data-more") + '"><span>Подробнее</span></a>' +
            "</div>" +
            "</div>",
    });
});