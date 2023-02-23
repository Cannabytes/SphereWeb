(function() {

    // Цена колов
    var priceRub = 35;
    var priceUsd = 0.63;
    var priceUah = 16.5; 
	var donateForm = document.getElementById("donat-form-send");


/**********************************MMOWEB*****************************************/
    $('body').on('click', '[server]', function () {
        var server = $(this).attr('server');

        $("#server").val(server).trigger( "change" );
        $('.block-list_server .btn-donate').removeClass('btn-donate_active');

        $(this).addClass('btn-donate_active');
    });

    $('body').on('click', '[pay]', function () {
        var pay = $(this).attr('pay')

        $("#payment").val(pay).trigger( "change" );
        $('.block-list_system .btn-donate').removeClass('btn-donate_active');

        $(this).addClass('btn-donate_active');

    });
/**********************************************************************************/


    // Запрет ввода букв в числовом поле
    var count = document.getElementById("enter_sum");
    if (!!count) {
        count.onkeypress = function(e) {
            e = e || event;
            if (e.ctrlKey || e.altKey || e.metaKey) return;
            var chr = getChar(e);
            if (chr == null) return;
            if (chr < '0' || chr > '9') {
                return false;
            }
        }

        // Слушатель количества колов
        count.addEventListener("input", function() {
            if (parseInt(count.value) > 428) {
                count.value = 428;
            }
            // Итоговая цена
            document.getElementById("sum_rub").innerHTML = (count.value * priceRub).toFixed(0);
            document.getElementById("sum_usd").innerHTML = (count.value * priceUsd).toFixed(2);
            document.getElementById("sum_uah").innerHTML = (count.value * priceUah).toFixed(1);
            // Итоговый бонус
            document.getElementById("bonus").value = change_balance(count);
        });


    }


    // Функция проверка нажатой клавиши
    function getChar(event) {
        if (event.which == null) {
            if (event.keyCode < 32) return null;
            return String.fromCharCode(event.keyCode) // IE
        }
        if (event.which != 0 && event.charCode != 0) {
            if (event.which < 32) return null;
            return String.fromCharCode(event.which) // остальные
        }
        return null; // специальная клавиша
    }


    // Функци подсчета бонусов
    function change_balance(count) {
        if (count.value < 75) {
            bonus = 0;
        } else if (count.value < 150) {
            bonus = (count.value * 5 / 100).toFixed();
        } else if (count.value < 250) {
            bonus = (count.value * 7 / 100).toFixed();
        } else if (count.value < 350) {
            bonus = (count.value * 10 / 100).toFixed();
        } else if (count.value < 400) {
            bonus = (count.value * 12 / 100).toFixed();
        } else if (count.value >= 400) {
            bonus = (count.value * 15 / 100).toFixed();
        } else {
            bonus = 0;
        }
        return bonus;
    }




    // Условия соглашения
    /*
	var chekRule1 = "Вы должны принять условия";
    if (!!!donateForm) {
        return false;
    } else {
        donateForm.addEventListener("submit", function(e) {
            if (!$("#rule1").prop("checked")) {
                alert(chekRule1);
                e.preventDefault();
                return false;
            }
        });
    }
	*/


})();