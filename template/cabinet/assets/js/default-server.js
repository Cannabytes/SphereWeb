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