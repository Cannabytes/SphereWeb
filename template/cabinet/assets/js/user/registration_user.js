$(document).ready(function () {



    $("#timezone").val(Intl.DateTimeFormat().resolvedOptions().timeZone)

    $("form").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/registration/user",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok) {
                notify_success(data.message);
                setTimeout(() => {
                    window.location.href = "/auth";
                }, 2200);
            } else {
                notify_error(data.message)
            }
        });
    });


    get_captcha();
    $("#refreshCaptcha").on('click', function (e) {
        get_captcha();
    });
    function get_captcha() {
        $.ajax({
            type: "POST",
            url: "/captcha",
            async: true,
        }).success(function (data) {
            $(".captcha").attr("src", data);
        });
    }



});