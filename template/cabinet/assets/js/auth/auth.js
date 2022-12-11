$(document).ready(function () {
 
	var authFormPage = $('#authFormPage');
    authFormPage.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/auth",
			dataType: "json",
            encode: true,
            data: authFormPage.serialize(),
            success: function (data) {
				console.log(data, data.message);
				if(data.ok){
					notify_success(data.message)
					location.reload()
				}else{
					notify_warning(data.message)
				}            },
            error: function (data) {
                notify_warning(data.message);
            },
        });
    });
	
	
	var authForm = $('#authForm');
    authForm.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/auth",
			dataType: "json",
            encode: true,
            data: authForm.serialize(),
            success: function (data) {
				if(data.ok){
					notify_success(data.message)
					location.reload()
				}else{
					notify_warning(data.message)
				}
            },
            error: function (data) {
                notify_warning(data.message);
            },
        });
    });
	
	
});
