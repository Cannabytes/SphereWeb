"use strict";function hidePreload(e){setTimeout(function(){$(".preload").addClass("preload__fade").fadeOut(400,function(){$(".preload").remove(),"function"==typeof e&&e()})},1e3*__config.preload.timeMax),__config.preload.hideByClick&&$(".preload").on("click",function(){$(".preload").addClass("preload__fade").fadeOut(400,function(){$(".preload").remove()})})}function Copy(){console.log("%c Жулик, не воруй! ","background: #222; color: red; font-size: 30px"),console.log("Front-end developer: L2Banners | Get-Web.Site"),console.log("Designer: Dezi"),console.log("for People")}function extend(){var a={},n=!1,e=0,t=arguments.length;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(n=arguments[0],e++);for(var i=function(e){for(var t in e)Object.prototype.hasOwnProperty.call(e,t)&&(n&&"[object Object]"===Object.prototype.toString.call(e[t])?a[t]=extend(!0,a[t],e[t]):a[t]=e[t])};e<t;e++){i(arguments[e])}return a}function getRandomInt(e,t){return Math.floor(Math.random()*(t-e))+e}function roundingNum(e,t){return parseFloat(Number.parseFloat(e).toFixed(t||2))}function gwTabHide(e){for(var t=0;t<e.length;t++)$("[data-tab-group="+e[t]+"]").hide()}function gwOpenTab(e){for(var t=0;t<e.length;t++)$("[data-tab="+e[t]+"]").show()}function l2b_random_online(e){var t,a=e||0,n=Math.random(),i=(new Date).getHours();return i<1?t=Math.floor(7*n*2+75+a):i<2?t=Math.floor(7*n*2+69+a):i<4?t=Math.floor(4*n*2+74+a):i<6?t=Math.floor(4*n*2+78+a):i<8?t=Math.floor(4*n*2+83+a):i<10?t=Math.floor(4*n*2+86+a):i<12?t=Math.floor(7*n*2+89+a):i<14?t=Math.floor(7*n*2+94+a):i<16?t=Math.floor(8*n*2+98+a):i<18?t=Math.floor(8*n*2+103+a):i<20?t=Math.floor(6*n*2+106+a):i<22?t=Math.floor(6*n*2+101+a):22<=i&&(t=Math.floor(5*n*2+94+a)),t=(t=100<=t?100:t)<0?0:t}function infServerBuild(e){return'<div class="inf">'.concat(e||"","</div>")}hidePreload(function(){Copy(),insertmedia({delay:500})}),$(".gw-burger").on("click",function(){$(".gw-burger").toggleClass("gw-burger_active")}),$(".navigation__list").on("click",function(){$(window).width()<1200&&$(".gw-burger").toggleClass("gw-burger_active")}),$(function(){var e=$("[data-slider-news-count]"),t=$("[data-slider-news-counter]");new Swiper("[data-slider-news]",{effect:"fade",grabCursor:!0,speed:400,spaceBetween:100,navigation:{nextEl:"[data-slider-news-next]",prevEl:"[data-slider-news-prev]"},autoplay:!(void 0===__config.sliders||void 0===__config.sliders.news||!__config.sliders.news.init)&&{delay:__config.sliders.news.delay},on:{init:function(){e.html(this.slides.length),t.html(this.activeIndex+1)},slideChange:function(){t.html(this.activeIndex+1)}}})}),$(function(){new Swiper("[data-slider-streams]",{slidesPerView:2,slidesPerGroup:2,grabCursor:!0,speed:400,spaceBetween:10,autoplay:!(void 0===__config.sliders||void 0===__config.sliders.sreams||!__config.sliders.sreams.init)&&{delay:__config.sliders.sreams.delay},navigation:{nextEl:"[data-slider-streams-next]",prevEl:"[data-slider-streams-prev]"}})}),$(function(){$("[data-open-tab]").on("click",function(e){var t=$(this);gwTabHide(t.attr("data-open-tab-group").split("|")),gwOpenTab(t.attr("data-open-tab").split("|"))})}),$(function(){$("[data-rating-select]").on("click",function(){var e=$(this);e.parent().find('[data-rating-select="true"]').attr("data-rating-select","false"),e.attr("data-rating-select","true")})}),$(function(){$("[data-server-select]").on("click",function(){$('[data-server-select="true"]').attr("data-server-select","false");var e=$(this);e.attr("data-server-select","true");var t=e.attr("data-open-tab"),a=$("[data-tab="+t+"]");0<a.find('[data-rating-select="true"]').length||a.find("[data-open-tab]").eq(0).trigger("click")}).eq(0).trigger("click")}),$("[data-server]").each(function(e,t){var a=$(t),n=a.attr("data-server"),i=extend({date:!1,status:!1,timeCorrection:0},__config.servers[n]||null);console.log("setting.status",i.status);var o=i.status?i.status:a.attr("data-server-status");if(console.log("status",o),"on"==o){var r=l2b_random_online(i.timeCorrection);0==i.timeCorrection&&(r=Math.floor(a.attr("data-server-online")/a.attr("data-server-max-online")*100)),r=100<r?100:r,a.find("[data-server-inf]").html(infServerBuild("".concat(__config.server.txt.load,': <span class="color-light-green">').concat(r,"%</span>")))}else"off"==o?a.find("[data-server-inf]").html(infServerBuild(__config.server.txt.offline)):"soon"==o?a.find("[data-server-inf]").html(infServerBuild(__config.server.txt.soon)):"zbt"==o?a.find("[data-server-inf]").html(infServerBuild(__config.server.txt.zbt)):"obt"==o?a.find("[data-server-inf]").html(infServerBuild(__config.server.txt.obt)):a.find("[data-server-inf]").html(infServerBuild(__config.server.txt.offline));i.date&&a.find("[data-server-date]").html(i.date)});var Tip_serv=function(){tippy("[data-server]",{delay:0,distance:8,theme:"inf",allowHTML:!0,arrow:!0,arrowType:"round",placement:"top",maxWidth:"350px",content:function(e){return $(e).find("[data-server-inf]").html()}})};function calcTime(e){var t=new Date,a=t.getTime()+6e4*t.getTimezoneOffset();return new Date(a+36e5*e)}Tip_serv(),tippy("[data-tip]",{delay:0,distance:15,theme:"inf",allowHTML:!0,arrow:!0,arrowType:"round",placement:"top",maxWidth:"350px",content:function(e){return e.getAttribute("data-tip")}});var newDate=calcTime(__config.eDate.timeZone);__config.eDate.month=__config.eDate.month-1;var expiryDate=new Date(__config.eDate.year,__config.eDate.month,__config.eDate.day,__config.eDate.hour,__config.eDate.minute,__config.eDate.second),nowDate=new Date;function GetDonateBonus(e){var t=0;return t=e<75?0:e<150?.05*e:e<250?.07*e:e<350?.1*e:350<=e?.12*e:0,parseInt(t)}expiryDate.getTime()>newDate.getTime()?$(".counter_js").countdown({until:expiryDate,format:__config.eDate.format,layout:'<div class="gw-timer">{y<}<div class="gw-timer__item gw-timer__item_{yn}"><div class="gw-timer__amount">{yn}</div><div class="gw-timer__desc">{yl}</div></div>{y>}{o<}<div class="gw-timer__item" gw-timer__item_{on}><div class="gw-timer__amount">{on}</div><div class="gw-timer__desc">{ol}</div></div>{o>}{d<}<div class="gw-timer__item gw-timer__item_{dn}"><div class="gw-timer__amount">{dn}</div><div class="gw-timer__desc">{dl}</div></div>{d>}{h<}<div class="gw-timer__item"><div class="gw-timer__amount">{hnn}</div><div class="gw-timer__desc">{hl}</div></div>{h>}{m<}<div class="gw-timer__item"><div class="gw-timer__amount">{mnn}</div><div class="gw-timer__desc">{ml}</div></div>{m>}{s<}<div class="gw-timer__item"><div class="gw-timer__amount">{snn}</div><div class="gw-timer__desc">{sl}</div></div>{s>}</div>',timezone:__config.eDate.timeZone}):$(".counter_js").html('<div class="end-time">'+__config.eDate.endTimeMSG+"</div>"),$(function(){var e=$("[data-server-check]"),t=$(".psy__input"),a=$("[data-price-coin]"),n=$("#total");0<a.length&&a.keypress(function(e){if(8!=e.which&&0!=e.which&&46!=e.which&&(e.which<48||57<e.which))return!1}),a.on("input",function(){var e=$(this);n.html(Math.floor(e.attr("data-price-coin"))*Math.floor(a.val())+" "+__config.donate.txt.currency),$("[data-bonus-result]").html(GetDonateBonus(parseInt(a.val())))}),e.eq(0).prop("checked",!0),e.eq(0).attr("checked",!0),t.eq(0).prop("checked",!0),t.eq(0).attr("checked",!0),a.trigger("input")}),$.fancybox.defaults.animationDuration=300,$("body").on("click","[data-open-window]",function(){$.fancybox.getInstance("close");var e=$(this).attr("data-open-window");$.fancybox.open({src:"#"+e,type:"inline",selectable:!0,opts:{touch:!1,afterShow:function(){},btnTpl:{smallBtn:'<div class="gw-modal-close compensate-for-scrollbar" data-fancybox-close></div>'}}})}),$("[data-res-target]").on("change",function(){var e=$(this).attr("data-res-target");$("[data-res-box]").hide(),$('[data-res-box="'.concat(e,'"]')).show()}).eq(0).trigger("change").prop("checked",!0),$("[data-about-target]").on("change",function(){var e=$(this).attr("data-about-target");$("[data-about-box]").hide(),$('[data-about-box="'.concat(e,'"]')).show()}).eq(0).trigger("change").prop("checked",!0),$("[data-desc-target]").on("change",function(){var e=$(this),t=e.attr("data-desc-target");e.closest(".about").find("[data-desc-box]").hide(),$('[data-desc-box="'.concat(t,'"]')).show()}),$("[data-desc-active]").trigger("change").prop("checked",!0),window.requestAnimFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e,t){window.setTimeout(e,1e3/60)},$(function(){if(void 0!==__config.server&&void 0!==__config.server.animation&&__config.server.animation.init){var e=function(){t.attr("data-server-animation","false"),setTimeout(function(){t.attr("data-server-animation","true")},__config.server.animation.delay||3e3)},t=$("[data-server-animation]");$("[data-decor]").on("animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd",e),e()}});