$(document).ready(function () {
    $("form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: "/install/admin",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).done(function (data) {
            if (data.ok){
                notify_success(data.message)
                document.location.href = '/page/1'
            }else {
                notify_error(data.message)
            }
        });
        event.preventDefault();
    });
});
