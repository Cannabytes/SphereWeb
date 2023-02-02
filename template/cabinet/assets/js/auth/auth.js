$("#headerInput1").append('<img id="getcaptchaauth" src="" class="form-control form-control-xl captcha" />');
$("#headerInput2").append('<input id="authcaptcha" value="" type="text" class="form-control form-control-xl" >');
$("#getcaptchaauth").hide();
$("#authcaptcha").hide();

$("#auth").click(function (e) {
    e.preventDefault();
    authorization($("#email").val(), $("#password").val(), $("#captcha").val())
});

$("#getcaptchaauth").hide();
$("#authcaptcha").hide();
var email = null;
var pass = null;
$("#authmain").on('click', function (e) {
    authmain()
});
function authmain(){
    if (email === null || pass === null) {
        email = $("#emailmain").val()
        pass = $("#passwordmain").val()

        // $("#headerInput2").append('<input id="authcaptcha" value="" type="text" class="form-control form-control-xl" >');
        $("#emailmain").hide();
        $("#passwordmain").hide();
        $("#getcaptchaauth").show();
        $("#authcaptcha").show();
        // get_captcha()
    } else {
        authorization(email, pass, $("#authcaptcha").val())
    }
}

get_captcha();

function get_captcha() {
    $.ajax({
        type: "POST",
        url: "/captcha",
        async: true,
    }).success(function (data) {
        // $("#headerInput1").append("<img id='imagecaptcha' src=" + data + " class=\"form-control form-control-xl\" />");
        $(".captcha").attr("src", data);
    });
}

// get_captcha_auth()
// function get_captcha_auth() {
//     $.ajax({
//         type: "POST",
//         url: "/captcha",
//         async: true,
//     }).success(function (data) {
//         $("#getcaptchaauth").attr("src", data);
//     });
// }

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


$('#authcaptcha').keypress(function (e) {
    if (e.which == 13) {
        authorization($("#emailmain").val(), $("#passwordmain").val(), $("#captcha").val())
    }
});

$('#passwordmain').keypress(function (e) {
    if (e.which == 13) {
        authmain()
    }
});
