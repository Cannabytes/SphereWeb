$(document).ready(function () {
	$(document).on('change', '#default_server', function() {
		$.ajax({
            type: "POST",
            url: "/user/change/default/server",
            data: {
				server_id : $(this).val(),
			},
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok){
                location.reload();
            }else {
                alert("false");
            }
        });
    });
});

$('#new_account_word').on('click', function () {
    $.ajax({
        type: "POST",
        url: "/generation/account",
        encode: true,
    }).success(function (data) {
        $("input[name*='login']").val(data);
    });
});

$('#new_password_word').on('click', function () {
    $.ajax({
        type: "POST",
        url: "/generation/password",
        encode: true,
    }).success(function (data) {
        $("input[name*='password']").val(data);
    });
});
