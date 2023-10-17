$(document).ready(function() {
    $('input[name="paysystem"]:first').prop('checked', true);
});
$("#countValue").val( ( currency_exchange.min_donate_bonus_coin+currency_exchange.max_donate_bonus_coin)/2 );


$(".count").change(function () {
    id = $(this).data("id");
    default_count = $(this).data("default_count");
    default_cost = $(this).data("default_cost");
    user_value = $(this).val();
    if (user_value <= 0) {
        $(this).val(1);
        return;
    }
    count = default_count * user_value;
    $("#product_count_" + id).text(count.toLocaleString('de-DE', {maximumFractionDigits: 2}));
    $("#product_cost_" + id).text(default_cost * user_value);
});

$(document).on("click", ".openWindowBuy", function () {
    id = $(this).data("product-id");

    name = $(this).data("product-name");
    count = $(this).data("product-count");
    cost = $(this).data("product-cost");

    product_count = $("#product_count_" + id).text();

    user_value = $("#user_value_" + id).text();
    if (user_value == 0) {
        user_value = $("#user_value_" + id).val();
    }
    $("#user_count_buy").text(count*user_value);
    $("#user_worth_buy").text(cost*user_value);

    $("#user_name_buy").text(name);

    $('#buy').attr('data-product-id', id);
    $('#buy').attr('data-user_value', user_value);

});


$(document).on("click", "#buy", function (event) {
    event.preventDefault();
    count = $("#user_count_buy").text();
    name = $("#user_name_buy").text();
    $.ajax({
        type: "POST",
        url: baseHref + "/donate/transaction",
        data: {
            server_id: $(this).attr("data-server_id"),
            id: $(this).attr("data-product-id"),
            user_value: $("#buy").attr("data-user_value"),
            char_name: $("#char_name").val(),
        },
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.ok) {
            notify_success(data.message + " " + name + " (" + count +")");
            $('#modal_panel_apply').modal('toggle');
            $(".header_donate_point_count").text(data.donate_bonus);
        } else {
            notify_error(data.message);
        }
    });

});


function currency(val) {
    const currencies = ['RUB', 'UAH', 'USD', 'EUR'];

    currencies.forEach((currency) => {
        let amount = (val * currency_exchange.coefficient[currency]) / currency_exchange.quantity;
        if (isNaN(amount)) {
            amount = 0;
        }
        $(`[data-count="${currency.toLowerCase()}"]`).text(amount.toFixed(1));
    });
}


$(document).on('input', '#countPayUser', function () {
    currency($(this).val());
});

$(document).on('click', '#paynext', function () {
    paysystem = $('input[name=paysystem]:checked').val();
    // if (typeof paysystem === 'undefined') {
    //     notify_error("Выберите платежную систему");
    //     return;
    // }
    var count = $("#countPayUser").val();
    // if(count < currency_exchange.min_donate_bonus_coin || count > currency_exchange.max_donate_bonus_coin){
    //     notify_error("Минимальное количество "+currency_exchange.min_donate_bonus_coin+" максимальное "+currency_exchange.max_donate_bonus_coin);
    //     return;
    // }
    $.ajax(
        {
            type: "POST",
            url: baseHref + "/donate/transfer/" + paysystem + "/createlink",
            data: ({"count": count}),
            async: false,
            success: function (redirectLink) {
                console.log(redirectLink)
                if (redirectLink['ok'] === false) {
                    notify_error(redirectLink['message'])
                    return;
                }
                window.open(redirectLink, '_blank');
            }
        });
});