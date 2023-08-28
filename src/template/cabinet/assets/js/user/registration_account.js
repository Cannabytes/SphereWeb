$(document).ready(function () {
    generateRandomCharacters(2,5)
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
            var type = this.type;
            if (type === 'select-one') {
              formData.append(this.name, this.value);
            } else if (type === 'checkbox' || type === 'radio') {
              if (this.checked) {
                formData.append(this.name, this.value);
              }
            } else {
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
              if(data.isDownload){
                  var blob = new Blob([data.content], { type: "text/plain" });
                  var link = document.createElement("a");
                  link.href = URL.createObjectURL(blob);
                  link.download = data.title;
                  document.body.appendChild(link);
                  link.click();
                  document.body.removeChild(link);
              }
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

    $(document).on("change", ".prefixlist", function() {
        generateRandomCharacters(2, 5);
    });

});


function generateRandomCharacters(length, count) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    const prefixArray = [];
    for (let j = 0; j < count; j++) {
        let result = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            result += characters.charAt(randomIndex);
        }
        prefixArray.push(result);
    }
    var elementType = $('.prefixlist').data('type');
    $(".prefixlist [data-prefix='true']").remove();
    prefixArray.forEach(prefix => {
        if(elementType==="prefix"){
            $(".prefixlist").prepend(`<option value="${prefix}_" data-prefix="true">${prefix}_</option>`);
        }
        if(elementType==="suffix"){
            $(".prefixlist").prepend(`<option value="_${prefix}" data-prefix="true">_${prefix}</option>`);
        }
    });
    $(".prefixlist").val($(".prefixlist [data-prefix='true']:first").val());
}

