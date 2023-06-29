
$(document).ready(function() {
  if ($('.captcha_img').length) {
    get_captcha();
  }
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

