$(document).ready(function () {
	$("#add_comment").on('click',function(e) {
		e.preventDefault();
        message = $("#message").val();
        $.ajax({
            type: "POST",
            url: "/page/comment/add",
            dataType: "json",
            data: {
                comment: message,
                id: page_id,
            },
            success: function(result) {
                if (result.ok){
                    location.reload()
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
 