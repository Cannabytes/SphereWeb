$(document).ready(function() {
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        initialSlide: 1,
        spaceBetween: 40,
        keyboard: {
            enabled: !0
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: !0
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            0: {
                spaceBetween: 20
            },
            1024: {
                spaceBetween: 50
            }
        }
    })
});