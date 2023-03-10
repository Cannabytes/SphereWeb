$(document).ready(function () {

    get_captcha()

    $("#registration_main_registration").click(function (e) {
            e.preventDefault();
              $.ajax({
                      type: "POST",
                      url: "/registration/account",
                      data: {
                          server: $("#server_main_registration").val(),
                          login: $("#login_main_registration").val(),
                          email: $("#email_main_registration").val(),
                          password: $("#password_main_registration").val(),
                          password_hide: $("#password_hide_registration").val(),
                          captcha: $("#captcha_main_registration").val(),
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
    });

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

    $("#refreshCaptcha").on('click', function (e) {
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

                // $("#emailmain").val(email)
                // $("#passwordmain").val(pass)
                //need restart captcha
                if (data.code == 1) {
                    get_captcha()
                } else if (data.code == 2) {
                    //Пароль не подошел
                    pass = null
                    $("#getcaptchaauth").hide();
                    $("#authcaptcha").hide();

                    $("#emailmain").show();
                    $("#passwordmain").show();
                }
            }
        });
    }


    $('#captcha').keypress(function (e) {
        if (e.which == 13) {
            authorization($("#email").val(), $("#password").val(), $("#captcha").val())
        }
    });


});
