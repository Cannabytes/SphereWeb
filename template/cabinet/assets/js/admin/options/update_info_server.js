$(document).ready(function () {
    get_collection();

    $("form").submit(function (event) {
        $.ajax({
            type: "POST",
            url: "/admin/option/server/update",
            data: $(this).serialize(),
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok) {
                document.location.href = '/admin/options/server/list'
            } else {
                notify_error(data.message)
            }
        });
        event.preventDefault();
    });

    $("#check_connect_mysql_login").click(function (e) {
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
            success: function (result) {
                if (result.ok) {
                    notify_success("Соединение установлено");
                } else {
                    notify_error(result.message);
                }
            },
            error: function (result) {
                notify_error(result.message);
            }
        });
    });


    $("#check_connect_mysql_game").click(function (e) {
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
            success: function (result) {
                if (result.ok) {
                    notify_success("Соединение установлено");
                } else {
                    notify_error(result.message);
                }
            },
            error: function (result) {
                notify_error(result.message);
            }
        });
    });

    $("#remove").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/option/server/remove",
            dataType: "json",
            data: {
                server_id: $("input[name=server_id]").val(),
            },
            success: function (result) {
                if (result.ok) {
                    document.location.href = '/admin/options/server/list'
                } else {
                    notify_error(result.message);
                }
            },
            error: function (result) {
                notify_error(result.message);
            }
        });
    });


    $('#open_protocol_class_collection').on('change', function () {
        get_collection();
    });

    function get_collection(){
        let chronicle_name = $('#open_protocol_class_collection').val();
        $.ajax({
            type: "POST",
            url: "/admin/options/server/client/protocol",
            dataType: "json",
            data: {
                chronicle_name: chronicle_name,
            },
            success: function (result) {
                if (result.ok) {
                    $('#sql_base_source').empty();
                    if (result.collections.length === 0){
                        $('#sql_base_source').append(`<option value="" disabled selected>Not your chronicle SQL base</option>`);
                        return;
                    }
                    result.collections.forEach(function (collection, index) {
                        collection_class = collection.replace("\\\\", "\\");
                        collection = basename(collection);
                        $('#sql_base_source').append(`<option value="${collection_class}">${collection}</option>`);
                    });
                } else {
                    notify_error(result.message);
                }
            },
            error: function (result) {
                notify_error(result.message);
            }
        });
    }

    function basename(str) {
        var base = new String(str).substring(str.lastIndexOf('\\') + 1);
        if (base.lastIndexOf("\\") != -1)
            base = base.substring(0, base.lastIndexOf("\\"));
        return base;
    }

});


 
 