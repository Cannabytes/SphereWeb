$(document).ready(function () {
    $("#options").on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/gallery/screen/options/save",
            data: {
                screen_enable: $("#screen_enable").val(),
                max_user_count_screenshots: $("#max_user_count_screenshots").val(),
                max_count_all_screenshots: $("#max_count_all_screenshots").val(),
            },
            dataType: "json",
            encode: true,
        }).done(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message);
            } else {
                notify_error(data.message)
            }
        });
    });
});

 