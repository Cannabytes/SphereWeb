$(document).ready(function () {
    $("form").submit(function (e) {
        $.ajax({
            type: "POST",
            url: "/admin/options/server/cache",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).done(function (data) {
            console.log(data);
            if (data.ok){
                notify_success(data.message);
            }else {
                notify_error(data.message)
            }
        });
        e.preventDefault();
    });
});
 