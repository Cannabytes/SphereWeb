$(document).ready(function () {
	$("#add_patch_list").on('click',function(e) {
		e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/options/server/patch/add",
            dataType: "json",
            data: {
                server_id: $('meta[name="server_default"]').attr("content"),
                link: $("#link").val(),
                type: $("#type").val(),
                lang: $("#lang").val()
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
 