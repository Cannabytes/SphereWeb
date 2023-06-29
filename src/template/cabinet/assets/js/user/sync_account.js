$(document).ready(function () {

    get_captcha();
    $("#refreshCaptcha").on('click', function (e) {
        get_captcha();
    });

    function get_captcha() {
        $.ajax({
            type: "POST",
            url: "/captcha",
            async: true,
        }).done(function (data) {
            $(".captcha_img").attr("src", data);
        });
    }

    $("form").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/registration/account/sync",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).done(function (data) {
            if (data.ok) {
                notify_success(data.message);
            } else {
                notify_error(data.message)
            }
            get_captcha();
        });
    });
});

