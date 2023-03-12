$(document).ready(function () {
    $("#send_password").click(function(e) {
        e.preventDefault();
		let email = $("#email").val().trim();
		if(isEmail(email)==false){
			notify_info("Not email");
			return;
		}
        $.ajax({
            type: "POST",
            url: "/auth/forget/send/password",
            dataType: "json",
            data: {
                email: $("#email").val(),
                code: $("#code").val(),
            },
            success: function(result) {
				console.log(result);
                if (result.ok){
                    notify_success(result.message);
                    setTimeout(function(){
                        window.location.href = '/auth';
                    }, 10000);
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
