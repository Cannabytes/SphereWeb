$(document).ready(function () {
    $("form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: "/admin/pages/edit",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok){
                document.location.href = '/admin/pages'
            }else {
                notify_error(data.message)
            }
        });
        event.preventDefault();
    });
});

 