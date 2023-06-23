function auth_ulogin(token) {
    $.ajax({
        url: '/login',
        data: 'ulogin=' + token,
        type: "POST",
        cache: false,
        dataType: 'json',

        error: function (xhr, ajaxOptions, thrownError) {
            console.log("Result : " + xhr.responseText);
        }
    }).done(function (msg) {
        if (msg.type == 'msg') {
            $.notij(msg.text, {'type': msg.status});
        } else {
            if (response_loc === undefined)
                $('.show').html(msg.text);
            else
                $('.show_' + response_loc).html(msg.text);
        }
        if (msg.location) {
            setTimeout("document.location.href='/" + msg.location + "'", msg.time);
        }
        if (msg.eval) {
            jQuery.globalEval(msg.eval);
        }

    });
}
$(document).ready(function() {

    $('body').on('click', 'a.square, button[data-soc]', function () {
        soc = $(this).attr('data-soc');
        console.log(soc);
        $('[data-uloginbutton="'+soc+'"]').trigger('click');
    });

    $('.register-prefix').click(function(){

        $.get("/data/prefix/get", function (data) {
            $('.register-prefix').html(data);
        });


    });


    $('body').on("click", '.submit-btn', function () {
        var el = $(this);

        var response_loc = el.parents('form').attr('name');
        var action = el.parents('form').attr('action');
        if (action === '')
            action = "/data/controllers";

        $.ajax({
            url: action,
            data: $(el).parents('form').serialize(),
            type: "POST",
            cache: false,
            dataType: 'json',
            beforeSend: function () {
                el.attr("disabled", "disabled");

            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("Result : " + xhr.responseText);

            }
        }).done(function (msg) {
            if (msg.type == 'msg') {
                $.notij(msg.text, {'type': msg.status});

            } else {

                if (response_loc === undefined)
                    $('.show').html(msg.text);
                else
                    $('.show_' + response_loc).html(msg.text);

            }

            if (msg.location) {
                setTimeout("document.location.href='/" + msg.location + "'", msg.time);
            }

            if (msg.eval) {
                jQuery.globalEval(msg.eval);
            }


        }).always(function () {


            setTimeout(function () {
                el.removeAttr("disabled");
            }, 500);

        });

    });
});