$(document).ready(function () {

    get_captcha();
    $(".captcha_img").on('click', function (e) {
        get_captcha();
    });

    function get_captcha() {
        $.ajax({
            type: "POST",
            url: "/captcha",
            async: true,
        }).success(function (data) {
            $(".captcha_img").attr("src", data);
        });
    }

    $("#registration_game_account").on("click", function (event) {
        event.preventDefault();
        var form_data = $('#panel_registration_account').find('input, select').filter(':visible').serialize();
        $.ajax({
            type: "POST",
            url: "/registration/account",
            data: form_data,
            encode: true,
        }).success(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message);
            } else {
                notify_error(data.message)
            }
        });
    });
});

$('#new_account_word').on('click', function () {
    $.ajax({
        type: "POST",
        url: "/generation/account",
        encode: true,
    }).success(function (data) {
        $("input[name*='login']").val(data);
    });
});

$('#new_password_word').on('click', function () {
    $.ajax({
        type: "POST",
        url: "/generation/password",
        encode: true,
    }).success(function (data) {
        $("input[name*='password']").val(data);
    });
});
 