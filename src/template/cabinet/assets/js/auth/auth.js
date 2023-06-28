$(document).ready(function () {

    $("#registration_panel").click(function (e) {
            e.preventDefault();
            registration($("#email_registration_panel").val(), $("#password_registration_panel").val(), $("#captcha_registration_panel").val())
    });

    $(".captcha_img").click(function (e) {
           get_captcha()
    });

    function registration(email, password, captcha) {
        $.ajax({
            type: "POST",
            url: "/registration/user",
            data: {
                email: email,
                password: password,
                captcha: captcha,
            },
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok) {
                location.reload()
            } else {
                notify_error(data.message)
                get_captcha()
            }
        });
    }


    $("#auth").click(function (e) {
        e.preventDefault();
        authorization($("#email").val(), $("#password").val(), $("#captcha").val())
    });

    $("#auth_page").click(function (e) {
        e.preventDefault();
        authorization($("#email_auth_page").val(), $("#password_auth_page").val(), $("#captcha_auth_page").val())
    });

    $("#auth_panel").click(function (e) {
        e.preventDefault();
        authorization($("#email_panel").val(), $("#password_panel").val(), $("#captcha_panel").val())
    });


    function authorization(email, password, captcha) {
        $.ajax({
            type: "POST",
            url: "/auth",
            data: {
                email: email,
                password: password,
                captcha: captcha,
            },
            dataType: "json",
            encode: true,
        }).success(function (data) {
            console.log(data);
            if (data.ok) {
                location.reload()
            } else {
                notify_error(data.message)
                get_captcha()
            }
        });
    }


    $('#captcha').keypress(function (e) {
        if (e.which == 13) {
            authorization($("#email").val(), $("#password").val(), $("#captcha").val())
        }
    });


});
