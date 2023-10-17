
    $(document).on('click', '.captcha_img', function (event) {
        get_captcha()
    });

    function get_captcha() {
        $.ajax({
            type: "POST",
            url: baseHref + "/captcha",
            async: true,
        }).done(function (data) {
            $(".captcha_img").attr("src", data);
        });
    }

