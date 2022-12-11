$(document).ready(function () {
    $(".change_avatar").on('click',function(e) {
        e.preventDefault();
         $.ajax({
            type: "POST",
            url: "/user/change/avatar",
            dataType: "json",
            data: {
                avatar: $(this).data('avatar')
            },
            success: function(result) {
				console.log(result.src);
                if (result.ok){
                    notify_success(result.message);
					$(".user_self_avatar").attr("src", result.src);
                }else{
                    notify_error(result.message);
                }
            },
            error: function(result) {
                notify_error(result.message);
            }
        });
    });

    $(".change_background").on('click',function(e) {
        e.preventDefault();
         $.ajax({
            type: "POST",
            url: "/user/change/avatar/background",
            dataType: "json",
            data: {
                avatar: $(this).data('avatar')
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
 