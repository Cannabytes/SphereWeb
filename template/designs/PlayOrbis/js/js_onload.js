$(document).ready(function() {
    //Examples of how to assign the Colorbox event to elements
    $(".stream_link").colorbox({ iframe: true, width: 640, height: 400, maxWidth: "90%", maxHeight: "70%" });
    $(".stream_window").colorbox({ inline: true, width: 600, maxWidth: "90%", maxHeight: "70%" });
    $(".iframe").colorbox({ iframe: true, width: "80%", height: "80%" });
    $(".inline").colorbox({ inline: true, width: "50%" });
    $(".callbacks").colorbox({
        onOpen: function() { alert('onOpen: colorbox is about to open'); },
        onLoad: function() { alert('onLoad: colorbox has started to load the targeted content'); },
        onComplete: function() { alert('onComplete: colorbox has displayed the loaded content'); },
        onCleanup: function() { alert('onCleanup: colorbox has begun the close process'); },
        onClosed: function() { alert('onClosed: colorbox has completely closed'); }
    });

    $('.non-retina').colorbox({ rel: 'group5', transition: 'none' })
    $('.retina').colorbox({ rel: 'group5', transition: 'none', retinaImage: true, retinaUrl: true });

    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function() {
        $('#click').css({ "background-color": "#f00", "color": "#fff", "cursor": "inherit" }).text("Open this window again and this message will still be here.");
        return false;
    });


    $('.news-container').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        swipe: false,
        infinite: false
    });

    $('.news-container').on('beforeChange', function(event) {
        $('.news-container .article').removeClass('article__border-non');
    });

    $('.news-container').on('afterChange', function(event) {
        $('.news-container .slick-active:last .article').addClass('article__border-non');
    });

    $('.news-container .slick-active:last .article').addClass('article__border-non');


    $('.stream-container').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        swipe: false,
        infinite: false
    });


});

$(function() {
    $('.button_open-answer').click(function() {
        $('#questions-modal').addClass('questions-modal_visible');
        $(".button_open-answer").css({ 'pointer-events': 'none' });
    });
});

var questionsModal = document.getElementById('questions-modal');

document.addEventListener('mouseup', function(event) {
    var isClickInside = questionsModal.contains(event.target);

    if (!isClickInside) {
        $('#questions-modal').removeClass('questions-modal_visible');
        $(".button_open-answer").css({ 'pointer-events': 'auto' });
    }
});


function l2b_random_online(l2b_correct) {
    var online_correct = l2b_correct || 0;
    var online;
    var l2b_math_random = Math.random();

    var temp_date = new Date();
    var hours = temp_date.getHours();
    if (hours < 1) {
        online = Math.floor((l2b_math_random * 7) * 2 + 75 + online_correct);
    } else if (hours < 2) {
        online = Math.floor((l2b_math_random * 7) * 2 + 69 + online_correct); 
    } else if (hours < 4) {
        online = Math.floor((l2b_math_random * 4) * 2 + 74 + online_correct);
    } else if (hours < 6) {
        online = Math.floor((l2b_math_random * 4) * 2 + 78 + online_correct);
    } else if (hours < 8) {
        online = Math.floor((l2b_math_random * 4) * 2 + 83 + online_correct);
    } else if (hours < 10) {
        online = Math.floor((l2b_math_random * 4) * 2 + 86 + online_correct);
    } else if (hours < 12) {
        online = Math.floor((l2b_math_random * 7) * 2 + 89 + online_correct);
    } else if (hours < 14) {
        online = Math.floor((l2b_math_random * 7) * 2 + 94 + online_correct);
    } else if (hours < 16) {
        online = Math.floor((l2b_math_random * 8) * 2 + 98 + online_correct);
    } else if (hours < 18) {
        online = Math.floor((l2b_math_random * 8) * 2 + 103 + online_correct);
    } else if (hours < 20) {
        online = Math.floor((l2b_math_random * 6) * 2 + 106 + online_correct);
    } else if (hours < 22) {
        online = Math.floor((l2b_math_random * 6) * 2 + 101 + online_correct);
    } else if (hours >= 22) {
        online = Math.floor((l2b_math_random * 5) * 2 + 94 + online_correct);
    }
    online = (online >= 100) ? 100 : online;
    online = (online < 0) ? 0 : online;

    return online;
}

(function() {
    /* Коррекция онлайна для каждого сервера.
    При значении 0 в пиковое время ~ с 16.00 до 22.00
    Онлайн будет приблизительно 100%
    Ночью около 75%
    Для кадого сервера по отедльности можно скорректировать время в меньшую или большую сторону
    Если значение отричательно например -25 , то показывать будет на 25% меньше чем по умолчанию
	и наоброто если полодитльное 25 , то на 25% больше стандартного в любое время суток
	
    Если сервер имеет модификатор server_off то онлайн равен 0 в скрипте не нужно ничего ставить
    
    Если в корректировку вписать -1 то выведится надпись Status: CBT
       Если в корректировку вписать -2 то выведится надпись Status: OBT
    */

    // // Корректировка для первого сервера
    // var server_1_cor = -35;
    // // Корректировка для второго сервера
    // var server_2_cor = -2;
    // // Корректировка для третьего сервера
    // var server_3_cor = -1;
    // // Корректировка для четвертого сервера
    // var server_4_cor = -26;





    var server1 = document.getElementById("server-1");
    var server2 = document.getElementById("server-2");
    var server3 = document.getElementById("server-3");
    var server4 = document.getElementById("server-4");

    if (!!server1) {
        if (server_1_cor == -1) {
            server1.querySelector(".server__load-content").innerHTML = txtZbt;
        } else if (server_1_cor == -2) {
            server1.querySelector(".server__load-content").innerHTML = txtObt;

        } else {
            if (server1.classList.contains("server_on")) {
                server1.querySelector(".server__percent").innerHTML = l2b_random_online(server_1_cor);
            }
        }
    }

    if (!!server2) {
        if (server_2_cor == -1) {
            server2.querySelector(".server__load-content").innerHTML = txtZbt;
        } else if (server_2_cor == -2) {
            server2.querySelector(".server__load-content").innerHTML = txtObt;

        } else {
            if (server2.classList.contains("server_on")) {
                server2.querySelector(".server__percent").innerHTML = l2b_random_online(server_2_cor);
            }
        }
    }

    if (!!server3) {
        if (server_3_cor == -1) {
            server3.querySelector(".server__load-content").innerHTML = txtZbt;
        } else if (server_3_cor == -2) {
            server3.querySelector(".server__load-content").innerHTML = txtObt;

        } else {
            if (server3.classList.contains("server_on")) {
                server3.querySelector(".server__percent").innerHTML = l2b_random_online(server_3_cor);
            }
        }
    }

    if (!!server4) {
        if (server_4_cor == -1) {
            server4.querySelector(".server__load-content").innerHTML = txtZbt;
        } else if (server_4_cor == -2) {
            server4.querySelector(".server__load-content").innerHTML = txtObt;

        } else {
            if (server4.classList.contains("server_on")) {
                server4.querySelector(".server__percent").innerHTML = l2b_random_online(server_4_cor);
            }
        }
    }

})();




$(document).ready(function() {
    //Default Action
    $("ul#top_tabs_server1 li:first").addClass("active").show(); //Activate first tab
    $(".top_player_block_server_1:first").addClass('top_active_block'); //Show first tab content

    //On Click Event
    $("ul#top_tabs_server1 li").click(function() {
        $("ul#top_tabs_server1 li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".top_player_block_server_1").removeClass('top_active_block'); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).addClass('top_active_block'); //Fade in the active content
        return false;
    });
});

$(document).ready(function() {
    //Default Action
    $("ul#top_tabs_server2 li:first").addClass("active").show(); //Activate first tab
    $(".top_player_block_server_2:first").addClass('top_active_block'); //Show first tab content

    //On Click Event
    $("ul#top_tabs_server2 li").click(function() {
        $("ul#top_tabs_server2 li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".top_player_block_server_2").removeClass('top_active_block'); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).addClass('top_active_block'); //Fade in the active content
        return false;
    });
});

$(document).ready(function() {
    //Default Action
    $("ul#top_tabs_server3 li:first").addClass("active").show(); //Activate first tab
    $(".top_player_block_server_3:first").addClass('top_active_block'); //Show first tab content

    //On Click Event
    $("ul#top_tabs_server3 li").click(function() {
        $("ul#top_tabs_server3 li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".top_player_block_server_3").removeClass('top_active_block'); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).addClass('top_active_block'); //Fade in the active content
        return false;
    });
});

$(document).ready(function() {
    //Default Action
    $("ul#top_tabs_server4 li:first").addClass("active").show(); //Activate first tab
    $(".top_player_block_server_4:first").addClass('top_active_block'); //Show first tab content

    //On Click Event
    $("ul#top_tabs_server4 li").click(function() {
        $("ul#top_tabs_server4 li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".top_player_block_server_4").removeClass('top_active_block'); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).addClass('top_active_block'); //Fade in the active content
        return false;
    });
});

$(document).ready(function() {
    //Default Action
    $("ul#top_tabs_server li:first").addClass("active").show(); //Activate first tab
    $(".top_content_server:first").addClass('top_active_block'); //Show first tab content

    //On Click Event
    $("ul#top_tabs_server li").click(function() {
        $("ul#top_tabs_server li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".top_content_server").removeClass('top_active_block'); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).addClass('top_active_block'); //Fade in the active content
        return false;
    });
});






var activAnimation = false;
var time = 100;
var ainationIn = "zoomIn";
var ainationOut = "zoomOut";

$(function() {
    $('#news_btn').click(function() {
        if ($('#news_btn').hasClass("btn_active") && !activAnimation) {
            activAnimation = true;
            var activ = $('.tab_active');
            $('#news_btn').removeClass('btn_active');
            activ.removeClass('tab_active animated ' + ainationIn);
            activ.css({ "opacity": "0" });
            activ.css({ "opacity": "1" });
            activ.addClass('tab_active animated ' + ainationOut);
            setTimeout(function() {
                activ.css({ "display": "none" });
                activ.removeClass('tab_active animated ' + ainationOut);
                activAnimation = false;
            }, time);
        } else {
            if (!activAnimation) {
                activAnimation = true;
                var act = $('.tab_active');
                act.removeClass('tab_active animated ' + ainationIn);
                act.css({ "opacity": "0" });
                act.css({ "opacity": "1" });
                act.addClass('tab_active animated ' + ainationOut);
                $('.btn_active').removeClass('btn_active');

                setTimeout(function() {
                    act.css({ "display": "none" });
                    act.removeClass('tab_active animated ' + ainationOut);
                    activAnimation = false;
                    $('#news_btn').addClass('btn_active');
                    $('#news_tab').css({ "display": "block", "opacity": "1" })
                    $('#news_tab').addClass('tab_active animated ' + ainationIn);
                    $(".news-container").slick('setPosition');
                }, time);
            }
        }

    });
});

$(function() {
    $('#about_btn').click(function() {
        if ($('#about_btn').hasClass("btn_active") && !activAnimation) {
            activAnimation = true;
            var activ = $('.tab_active');
            $('#about_btn').removeClass('btn_active');
            activ.removeClass('tab_active animated ' + ainationIn);
            activ.css({ "opacity": "0" });
            activ.css({ "opacity": "1" });
            activ.addClass('tab_active animated ' + ainationOut);
            setTimeout(function() {
                activ.css({ "display": "none" });
                activ.removeClass('tab_active animated ' + ainationOut);
                activAnimation = false;
            }, time);
        } else {
            if (!activAnimation) {
                activAnimation = true;
                var act = $('.tab_active');
                act.removeClass('tab_active animated ' + ainationIn);
                act.css({ "opacity": "0" });
                act.css({ "opacity": "1" });
                act.addClass('tab_active animated ' + ainationOut);
                $('.btn_active').removeClass('btn_active');

                setTimeout(function() {
                    act.css({ "display": "none" });
                    act.removeClass('tab_active animated ' + ainationOut);
                    activAnimation = false;
                    $('#about_btn').addClass('btn_active');
                    $('#about_tab').css({ "display": "block", "opacity": "1" })
                    $('#about_tab').addClass('tab_active animated ' + ainationIn);
                }, time);
            }
        }

    });
});


$(function() {
    $('#about_link').click(function() {
        if ($('#about_btn').hasClass("btn_active") && !activAnimation) {
            activAnimation = true;
            var activ = $('.tab_active');
            $('#about_btn').removeClass('btn_active');
            activ.removeClass('tab_active animated ' + ainationIn);
            activ.css({ "opacity": "0" });
            activ.css({ "opacity": "1" });
            activ.addClass('tab_active animated ' + ainationOut);
            setTimeout(function() {
                activ.css({ "display": "none" });
                activ.removeClass('tab_active animated ' + ainationOut);
                activAnimation = false;
            }, time);
        } else {
            if (!activAnimation) {
                activAnimation = true;
                var act = $('.tab_active');
                act.removeClass('tab_active animated ' + ainationIn);
                act.css({ "opacity": "0" });
                act.css({ "opacity": "1" });
                act.addClass('tab_active animated ' + ainationOut);
                $('.btn_active').removeClass('btn_active');
                // Скролл квсплывашке
                jQuery.scrollTo('#l2b_tabs_content', 500, { offset: -400, axis: 'y' });
                setTimeout(function() {
                    act.css({ "display": "none" });
                    act.removeClass('tab_active animated ' + ainationOut);
                    activAnimation = false;
                    $('#about_btn').addClass('btn_active');
                    $('#about_tab').css({ "display": "block", "opacity": "1" })
                    $('#about_tab').addClass('tab_active animated ' + ainationIn);
                }, time);
            }
        }

    });
});



$(function() {
    $('#play_btn').click(function() {
        if ($('#play_btn').hasClass("btn_active") && !activAnimation) {
            activAnimation = true;
            var activ = $('.tab_active');
            $('#play_btn').removeClass('btn_active');
            activ.removeClass('tab_active animated ' + ainationIn);
            activ.css({ "opacity": "0" });
            activ.css({ "opacity": "1" });
            activ.addClass('tab_active animated ' + ainationOut);
            setTimeout(function() {
                activ.css({ "display": "none" });
                activ.removeClass('tab_active animated ' + ainationOut);
                activAnimation = false;
            }, time);
        } else {
            if (!activAnimation) {
                activAnimation = true;
                var act = $('.tab_active');
                act.removeClass('tab_active animated ' + ainationIn);
                act.css({ "opacity": "0" });
                act.css({ "opacity": "1" });
                act.addClass('tab_active animated ' + ainationOut);
                $('.btn_active').removeClass('btn_active');

                setTimeout(function() {
                    act.css({ "display": "none" });
                    act.removeClass('tab_active animated ' + ainationOut);
                    activAnimation = false;
                    $('#play_btn').addClass('btn_active');
                    $('#play_tab').css({ "display": "block", "opacity": "1" })
                    $('#play_tab').addClass('tab_active animated ' + ainationIn);

                }, time);
            }
        }

    });
});


$(function() {
    $('#play_link').click(function() {
        if ($('#play_btn').hasClass("btn_active") && !activAnimation) {
            activAnimation = true;
            var activ = $('.tab_active');
            $('#play_btn').removeClass('btn_active');
            activ.removeClass('tab_active animated ' + ainationIn);
            activ.css({ "opacity": "0" });
            activ.css({ "opacity": "1" });
            activ.addClass('tab_active animated ' + ainationOut);
            setTimeout(function() {
                activ.css({ "display": "none" });
                activ.removeClass('tab_active animated ' + ainationOut);
                activAnimation = false;
            }, time);
        } else {
            if (!activAnimation) {
                activAnimation = true;
                var act = $('.tab_active');
                act.removeClass('tab_active animated ' + ainationIn);
                act.css({ "opacity": "0" });
                act.css({ "opacity": "1" });
                act.addClass('tab_active animated ' + ainationOut);
                $('.btn_active').removeClass('btn_active');
                // Скролл квсплывашке
                jQuery.scrollTo('#l2b_tabs_content', 500, { offset: -400, axis: 'y' });
                setTimeout(function() {
                    act.css({ "display": "none" });
                    act.removeClass('tab_active animated ' + ainationOut);
                    activAnimation = false;
                    $('#play_btn').addClass('btn_active');
                    $('#play_tab').css({ "display": "block", "opacity": "1" })
                    $('#play_tab').addClass('tab_active animated ' + ainationIn);

                }, time);
            }
        }

    });
});


$(function() {
    $('#donate_btn').click(function() {
        if ($('#donate_btn').hasClass("btn_active") && !activAnimation) {
            activAnimation = true;
            var activ = $('.tab_active');
            $('#donate_btn').removeClass('btn_active');
            activ.removeClass('tab_active animated ' + ainationIn);
            activ.css({ "opacity": "0" });
            activ.css({ "opacity": "1" });
            activ.addClass('tab_active animated ' + ainationOut);
            setTimeout(function() {
                activ.css({ "display": "none" });
                activ.removeClass('tab_active animated ' + ainationOut);
                activAnimation = false;
            }, time);
        } else {
            if (!activAnimation) {
                activAnimation = true;
                var act = $('.tab_active');
                act.removeClass('tab_active animated ' + ainationIn);
                act.css({ "opacity": "0" });
                act.css({ "opacity": "1" });
                act.addClass('tab_active animated ' + ainationOut);
                $('.btn_active').removeClass('btn_active');

                setTimeout(function() {
                    act.css({ "display": "none" });
                    act.removeClass('tab_active animated ' + ainationOut);
                    activAnimation = false;
                    $('#donate_btn').addClass('btn_active');
                    $('#donate_tab').css({ "display": "block", "opacity": "1" })
                    $('#donate_tab').addClass('tab_active animated ' + ainationIn);
                }, time);
            }
        }

    });
});




$(function() {
    $('#donate_link').click(function() {
        if ($('#donate_btn').hasClass("btn_active") && !activAnimation) {
            activAnimation = true;
            var activ = $('.tab_active');
            $('#donate_btn').removeClass('btn_active');
            activ.removeClass('tab_active animated ' + ainationIn);
            activ.css({ "opacity": "0" });
            activ.css({ "opacity": "1" });
            activ.addClass('tab_active animated ' + ainationOut);
            setTimeout(function() {
                activ.css({ "display": "none" });
                activ.removeClass('tab_active animated ' + ainationOut);
                activAnimation = false;
            }, time);
        } else {
            if (!activAnimation) {
                activAnimation = true;
                var act = $('.tab_active');
                act.removeClass('tab_active animated ' + ainationIn);
                act.css({ "opacity": "0" });
                act.css({ "opacity": "1" });
                act.addClass('tab_active animated ' + ainationOut);
                $('.btn_active').removeClass('btn_active');
                // Скролл квсплывашке
                jQuery.scrollTo('#l2b_tabs_content', 500, { offset: -400, axis: 'y' });
                setTimeout(function() {
                    act.css({ "display": "none" });
                    act.removeClass('tab_active animated ' + ainationOut);
                    activAnimation = false;
                    $('#donate_btn').addClass('btn_active');
                    $('#donate_tab').css({ "display": "block", "opacity": "1" })
                    $('#donate_tab').addClass('tab_active animated ' + ainationIn);
                }, time);
            }
        }

    });
});




$(function() {
    $('#stream_btn').click(function() {
        if ($('#stream_btn').hasClass("btn_active") && !activAnimation) {
            activAnimation = true;
            var activ = $('.tab_active');
            $('#stream_btn').removeClass('btn_active');
            activ.removeClass('tab_active animated ' + ainationIn);
            activ.css({ "opacity": "0" });
            activ.css({ "opacity": "1" });
            activ.addClass('tab_active animated ' + ainationOut);
            setTimeout(function() {
                activ.css({ "display": "none" });
                activ.removeClass('tab_active animated ' + ainationOut);
                activAnimation = false;
            }, time);
        } else {
            if (!activAnimation) {
                activAnimation = true;
                var act = $('.tab_active');
                act.removeClass('tab_active animated ' + ainationIn);
                act.css({ "opacity": "0" });
                act.css({ "opacity": "1" });
                act.addClass('tab_active animated ' + ainationOut);
                $('.btn_active').removeClass('btn_active');

                setTimeout(function() {
                    act.css({ "display": "none" });
                    act.removeClass('tab_active animated ' + ainationOut);
                    activAnimation = false;
                    $('#stream_btn').addClass('btn_active');
                    $('#stream_tab').css({ "display": "block", "opacity": "1" })
                    $('#stream_tab').addClass('tab_active animated ' + ainationIn);
                    $(".stream-container").slick('setPosition');
                }, time);
            }
        }

    });
});

$(function() {
    $('.tab-close').click(function() {
        var activ = $('.tab_active');
        $('.l2b_toggle_btn').removeClass('btn_active');
        activ.removeClass('tab_active animated ' + ainationIn);
        activ.css({ "opacity": "0" });
        activ.css({ "opacity": "1" });
        activ.addClass('tab_active animated ' + ainationOut);
        setTimeout(function() {
            activ.css({ "display": "none" });
            activ.removeClass('tab_active animated ' + ainationOut);
            activAnimation = false;
        }, time);
    });
});

function l2b_modal() {
    // Задний фон модалки
    var popupWindowWrp = document.getElementById("popup-window-wrp");
    console.log(popupWindowWrp);
    // Модальное окно
    var popupWindow = document.getElementById("popup-window");
    // Находим кнопку close
    var popClose = document.getElementById("pop-close");

    // Проверяем нашлись ли наши модальные окна и фон
    if (!!popupWindowWrp && !!popupWindow && !!popClose) {
        modal_back();
        l2b_modal_window();

        popClose.addEventListener("click", function() {
            localStorage.setItem('popvisit', 'yes');
            popupWindow.classList.add("zoomOut");
            popupWindowWrp.classList.remove("l2b_visible");
            setTimeout(function() {
                popupWindowWrp.style.display = "none";
            }, 1000)

        }, false);

        popupWindowWrp.addEventListener("click", function(e) {
            if (e.target.id == "popup-window-wrp") {
                localStorage.setItem('popvisit', 'yes');
                popupWindow.classList.add("zoomOut");
                popupWindowWrp.classList.remove("l2b_visible");
                setTimeout(function() {
                    popupWindowWrp.style.display = "none";
                }, 1000)
            }
        }, false);
    }

    // Активируем задний фон (затемнение)
    function modal_back() {
        popupWindowWrp.style.display = "flex";
        popupWindowWrp.classList.add("l2b_visible");
    }
    // Активируем модальное окно
    function l2b_modal_window() {
        // Если ид был найден добавляем классы
        setTimeout(function() {
            popupWindow.classList.add("l2b_visible", "animated", "zoomIn");
        }, 1000)

    }
}

if (localStorage["popvisit"] != "yes") {
    l2b_modal();
}

$(function() {
    $('.content-btn-wrp__btn').click(function() {
        $(this).addClass('btn_animate');
        setTimeout(function() {
            $('.content-btn-wrp__btn').removeClass('btn_animate');
        }, 220)

    });
});

/* MMOWEB */

$(document).ready(function() {
    if($.cookie('lang') != null){
        var lang = "#lang_"+$.cookie('lang');

        $(lang).addClass('lang__link_active');


    }
    $('body').on('click', '[lang]', function () {
        $.cookie('lang', $(this).attr('lang'), {
            expires: 5,
            path: '/'
        });


        location.reload();
    });
});






var isActiveWindow = true;

function onBlur() {
    isActiveWindow = false;
};

function onFocus() {
    isActiveWindow = true;
};

if ( /*@cc_on!@*/ false) { // check for Internet Explorer
    document.onfocusin = onFocus;
    document.onfocusout = onBlur;
} else {
    window.onfocus = onFocus;
    window.onblur = onBlur;
}


(function() {
    // L2B scene
    // Human Run

    var TIMEDEF = 5000,
        scene = document.getElementById("scene"),
        humanR = document.getElementById("human-run_r"),
        humanL = document.getElementById("human-run_l"),
        dakrElfFemale = document.getElementById("dark-elf-female"),
        humanAnimation = false;

    setTimeout(() => {
        RunHumanRight(TIMEDEF);
        setInterval(function() {
            RunHumanRight(TIMEDEF);
        }, TIMEDEF * 7); //  TIMEDEF * 5 = 25 секунд
    }, 5000);

    function RunHumanRight(setTime) {
        if (humanAnimation) {
            return;
        }
        timeAnimation = setTime;
        humanAnimation = true;
        humanR.style.display = "block";
        humanR.style.transitionDuration = setTime;
        humanR.style.left = (parseInt(getComputedStyle(scene).width) - parseInt(getComputedStyle(humanR).width)) + "px";
        setTimeout(() => {
            DakrElfFemale(timeAnimation);
        }, timeAnimation);

        setTimeout(() => {
            humanR.style.transitionDuration = 0;
            humanR.style.display = "none";
            humanR.style.left = 0;
            RunHumanLeft(timeAnimation);
        }, timeAnimation * 2);
    }

    function RunHumanLeft(setTime) {
        if (!humanAnimation) {
            return;
        }
        humanL.style.display = "block";
        humanL.style.transitionDuration = setTime;
        timeAnimation = setTime;
        humanL.style.right = (parseInt(getComputedStyle(scene).width) - parseInt(getComputedStyle(humanL).width)) + "px";
        humanL.classList.add("human_animate");
        setTimeout(() => {
            humanL.style.transitionDuration = 0;
            humanL.style.display = "none";
            humanL.style.right = 0;
            humanL.classList.remove("human_animate");
            humanAnimation = false;
        }, timeAnimation);
    }


    function DakrElfFemale(setTime) {
        if (!humanAnimation) {
            return;
        }
        dakrElfFemale.classList.add("dark-elf-female_animate");
        timeAnimation = setTime;
        setTimeout(() => {
            dakrElfFemale.classList.remove("dark-elf-female_animate");
        }, timeAnimation);
    }

})();
