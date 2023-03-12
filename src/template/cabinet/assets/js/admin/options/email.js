$(document).ready(function () {
	$("#save_email").on('click',function(e) {
		e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/options/email",
            dataType: "json",
            data: {
                host: $("#host").val(),
                username: $("#username").val(),
                password: $("#password").val(),
                port: $("#port").val(),
                encrypt: $("#encrypt").val(),
                email_smtp_auth: $('#email_smtp_auth:checked').val()?true:false
            },
            success: function(result) {
                if (result.ok){
                    notify_success(result.message);
                }else{
                    notify_error(result.message);
                }
            },
            error: function(result) {
                notify_error(result.message);
            }
        });
    });
});
 