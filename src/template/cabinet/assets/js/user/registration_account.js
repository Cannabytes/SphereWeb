$(document).ready(function () {
    captchaVersion = $('meta[name="get_captcha_version"]').attr('content');

    $("#registration_game_account").click(function (e) {
        e.preventDefault();
        registration_panel("/registration/account", $('#panel_registration_account'));
    });

    $("#registration_main_registration").click(function (e) {
        e.preventDefault();
        registration_panel("/registration/account", $('#registration_user_game_account'));
    });

    function registration_panel(url, form) {
        var formData = new FormData();
        var inputs = form.find('input, select');
        inputs.each(function() {
            // Проверяем тип элемента
            var type = this.type;
            if (type === 'select-one') {
              // Для элемента select добавляем выбранное значение
              formData.append(this.name, this.value);
            } else if (type === 'checkbox' || type === 'radio') {
              // Для элементов checkbox и radio добавляем значение, только если они выбраны
              if (this.checked) {
                formData.append(this.name, this.value);
              }
            } else {
              // Для остальных элементов input добавляем их значение
              formData.append(this.name, this.value);
            }
        });
        if (captchaVersion == "google") {
           google_captcha_key = $('meta[name="google_captcha_key"]').attr('content');
           grecaptcha.execute(google_captcha_key, { action: 'submit' }).then(function (token) {
               formData.append("captcha", token);
               sendAjax(url, formData)
           });
        }else{
            sendAjax(url, formData)
        }
    }

    function sendAjax(url, formData){
      $.ajax({
          type: "POST",
          url: url,
          data: formData,
          dataType: "json",
          processData:false,
          contentType:false,
          encode: true,
      }).done(function (data) {
          console.log(data);
          if (data.ok) {
              notify_success(data.message)
              setTimeout(function() {
                  location.reload();
              }, 1000);
          } else {
              notify_error(data.message)
          }
          if (captchaVersion !== "google") {
             get_captcha()
          }
      });
    }

    $(".captcha_img").click(function (e) {
           get_captcha()
    });


});

