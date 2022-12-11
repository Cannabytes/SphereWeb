$(document).ready(function () {
    $("form").submit(function (event) {
		event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/registration/user",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok){
                notify_success(data.message);
				setTimeout(() => { window.location.href = "/auth"; }, 2200);
            }else {
                notify_error(data.message)
            }
        });
    });
});

