$(document).ready(function () {
    $("form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: "/admin/forum",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).done(function (data) {
            if (data.ok){
                notify_success(data.message);
            }else {
                notify_error(data.message)
            }
        });
        event.preventDefault();
    });

    $("#check_connect_mysql_forum").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/option/server/db/connect",
            dataType: "json",
            data: {
                host: $("#forum_db_host").val(),
                user: $("#forum_db_user").val(),
                password: $("#forum_db_password").val(),
                name: $("#forum_db_name").val(),
            },
            success: function(result) {
                if (result.ok){
                    notify_success("Соединение установлено");
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

 