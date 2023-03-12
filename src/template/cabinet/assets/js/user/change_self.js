$(document).ready(function () {
    $("form").submit(function (event) {
		event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/user/change",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).success(function (data) {
            console.log(data)
            if (data.ok){
                notify_success(data.message);
            }else {
				$.each(data.message, function( index, value ) {
					notify_error(value)
				});
            }
        });
    });
});
 