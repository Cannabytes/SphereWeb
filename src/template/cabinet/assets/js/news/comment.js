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

	$(".deleteComment").on('click',function(e) {
		e.preventDefault();
        comment_id = $(this).data("comment_id")
        $.ajax({
            type: "POST",
            url: "/page/comment/delete",
            dataType: "json",
            data: {
                comment_id: comment_id,
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

	$(".editCommentSave").on('click',function(e) {
		e.preventDefault();
        comment_id = $(this).data("comment_id")
        comment_message = $("#editComment_" + comment_id).val()
        console.log(comment_id, comment_message)
        $.ajax({
            type: "POST",
            url: "/page/comment/edit",
            dataType: "json",
            data: {
                comment_id: comment_id,
                comment_message: comment_message,
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
 