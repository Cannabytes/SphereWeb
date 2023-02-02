$(document).ready(function () {
    $("#auth").click(function (e) {
        e.preventDefault();
        authorization($("#email").val(), $("#password").val())
    });

    var email = null;
    var pass = null;
    $("#authmain").on('click', function (e) {
        e.preventDefault();
        if (email === null || pass === null) {
            email = $("#emailmain").val()
            pass = $("#passwordmain").val()

            $("#headerInput2").append('<input id="authcaptcha" value="" type="text" class="form-control form-control-xl" >');
            $("#emailmain").hide();
            $("#passwordmain").hide();

            get_captcha()
        } else {
            authorization(email, pass, $("#authcaptcha").val())
        }
    });

    function get_captcha() {
        $.ajax({
            type: "POST",
            url: "/captcha",
            async: true,
        }).success(function (data) {
            $("#headerInput1").append("<img id='imagecaptcha' src=" + data + " class=\"form-control form-control-xl\" />");
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
                $("#imagecaptcha").hide();
                $("#authcaptcha").remove();
                $("#emailmain").show();
                $("#passwordmain").show();
                $("#emailmain").val(email)
                $("#passwordmain").val(pass)
                //need restart captcha
                if (data.code == 1) {
                    get_captcha()
                } else if (data.code == 2) {
                    //Пароль не подошел
                    pass = null
                }
            }
        });
    }
});
