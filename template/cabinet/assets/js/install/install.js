$(document).ready(function () {
    $("form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: "/install/db/connect/test",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok){
                notify_success(data.message)
                document.location.href = '/install/admin'
            }else {
                notify_error(data.message)
            }
        });
        event.preventDefault();
    });
});
 