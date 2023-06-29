$(document).ready(function () {
    captchaVersion = $('meta[name="get_captcha_version"]').attr('content');

    $("form").submit(function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        if (captchaVersion == "google") {
            google_captcha_key = $('meta[name="google_captcha_key"]').attr('content');
            grecaptcha.execute(google_captcha_key, { action: 'submit' }).then(function (token) {
                formData.append("captcha", token);
                sendAjaxRequest(formData);
            });
        } else {
            sendAjaxRequest(formData);
            get_captcha()
        }
    });

    function sendAjaxRequest(formData) {
        $.ajax({
            type: "POST",
            url: "/registration/account",
            data: formData,
            processData:false,
            contentType:false,
            encode: true,
        }).done(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message);
                setTimeout(function(){
                  location.reload();
                }, 2000);
            } else {
                notify_error(data.message)
            }
        });
    }


   if(captchaVersion=="default"){
       $(".captcha_img").on('click', function (e) {
           get_captcha();
       });

       $("#refreshCaptcha").on('click', function (e) {
           get_captcha();
       });
       function get_captcha() {
           $.ajax({
               type: "POST",
               url: "/captcha",
               async: true,
           }).done(function (data) {
               $(".captcha").attr("src", data);
           });
       }
   }

});

