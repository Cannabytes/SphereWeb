$(document).ready(function () {
    $("form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: "/admin/option/server/save",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok){
                document.location.href = '/admin/options/server/list'
            }else {
                notify_error(data.message)
            }
        });
        event.preventDefault();
    });

    $("#check_connect_mysql_login").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/option/server/db/connect",
            dataType: "json",
            data: {
                host: $("input[name=db_login_host]").val(),
                user: $("input[name=db_login_user]").val(),
                password: $("input[name=db_login_password]").val(),
                name: $("input[name=db_login_name]").val(),
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
	
	
    $("#check_connect_mysql_game").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/option/server/db/connect",
            dataType: "json",
            data: {
                host: $("input[name=db_game_host]").val(),
                user: $("input[name=db_game_user]").val(),
                password: $("input[name=db_game_password]").val(),
                name: $("input[name=db_game_name]").val(),
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

 