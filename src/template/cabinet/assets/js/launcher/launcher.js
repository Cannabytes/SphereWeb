$(document).ready(function () {

    $("#launcherAdd").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/options/server/launcher",
            dataType: "json",
            data: {
                code: $("#code").val(),
                l2app: $("#l2app").val(),
                buttonphrase: $("#buttonphrase").val(),
                serverId: $('#launcherAdd').data('server_id')
            },
            success: function(result) {
				console.log(result);
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
