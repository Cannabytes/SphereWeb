$(document).ready(function () {
    $("#send_email").click(function(e) {
        e.preventDefault();
		let email = $("#email").val().trim();
		if(isEmail(email)==false){
			notify_info("Введите E-Mail");
			return;
		}
		$("#code").val("");
        $.ajax({
            type: "POST",
            url: "/auth/forget/send/code",
            dataType: "json",
            data: {
                email: $("#email").val()
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
	
    $("#send_code").click(function(e) {
        e.preventDefault();
		let code = $("#code").val().trim();
		let email = $("#email").val().trim();
		if(isEmail(email)==false){
			notify_info("Введите E-Mail");
			return;
		}
        $.ajax({
            type: "POST",
            url: "/auth/forget/verification/code",
            dataType: "json",
            data: {
                email: $("#email").val(),
                code: $("#code").val()
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
	
	function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}

	if (!isEmail(email)){
	  return false;
	}

});
