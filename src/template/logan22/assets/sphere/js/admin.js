$(document).on('change', '#open_protocol_class_collection', function (event) {
    get_collection();
});

function get_collection() {
    let chronicle_name = $('#open_protocol_class_collection').val();
    let base_source = $("#sql_base_source").data("base_source");
    $.ajax({
        type: "POST",
        url: baseHref + "/admin/options/server/client/protocol",
        dataType: "json",
        data: {
            chronicle_name: chronicle_name,
        },
        success: function (result) {
            if (result.ok) {
                $('#sql_base_source').empty();
                if (result.collections.length === 0) {
                    $('#sql_base_source').append(`<option value="" disabled selected>Not your chronicle SQL base</option>`);
                    return;
                }
                result.collections.forEach(function (collection, index) {
                    collection_class = collection.replace("\\\\", "\\");
                    collection = basename(collection);
                    if (base_source == collection_class) {
                        $('#sql_base_source').append(`<option selected value="${collection_class}">${collection}</option>`);
                    } else {
                        $('#sql_base_source').append(`<option value="${collection_class}">${collection}</option>`);
                    }
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


$(document).on('click', '#getDBNameLogin', function (event) {
    $.ajax({
        url: baseHref + "/admin/option/server/db/connect/select/name",
        type: "POST",
        data: {
            "host": $("#db_login_host").val(),
            "port": $("#db_game_port").val(),
            "login": $("#db_login_user").val(),
            "password": $("#db_login_password").val(),
        },
        dataType: 'json',
        success: function (response) {
            if(response.type==="notice"){
                if(!ResponseNotice(response)){
                    return;
                }
            }
            //response возвращает массив , его элементы размещаем в select getDBNameLogin
            $("#db_login_name").empty();
            $.each(response, function (index, value) {
                $("#db_login_name").append('<option value="' + value + '">' + value + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Ошибка при выполнении AJAX-запроса:', error);
        }
    })
});

$(document).on('click', '#getDBNameGame', function (event) {
    $.ajax({
        url: baseHref + "/admin/option/server/db/connect/select/name",
        type: "POST",
        data: {
            "host": $("#db_game_host").val(),
            "port": $("#db_game_port").val(),
            "login": $("#db_game_user").val(),
            "password": $("#db_game_password").val(),
        },
        dataType: 'json',
        success: function (response) {
            if(response.type==="notice"){
                if(!ResponseNotice(response)){
                    return;
                }
            }
            $("#db_game_name").empty();
            $.each(response, function (index, value) {
                $("#db_game_name").append('<option value="' + value + '">' + value + '</option>');
            });

        },
        error: function (xhr, status, error) {
            console.error('Ошибка при выполнении AJAX-запроса:', error);
        }
    })
});

$(document).on('click', '#check_connect_mysql_login', function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: baseHref + "/admin/option/server/db/connect",
        dataType: "json",
        data: {
            host: $("input[name=db_login_host]").val(),
            port: $("input[name=db_login_port]").val(),
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


$(document).on('click', '#check_connect_mysql_game', function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: baseHref + "/admin/option/server/db/connect",
        dataType: "json",
        data: {
            host: $("input[name=db_game_host]").val(),
            port: $("input[name=db_game_port]").val(),
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


$(document).on('click', '#removeServer', function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: baseHref + "/admin/option/server/remove",
        dataType: "json",
        data: {
            server_id: $("input[name=server_id]").val(),
        },
        success: function (result) {
            if (result.ok) {
                document.location.href = baseHref + '/admin/options/server/list'
            } else {
                notify_error(result.message);
            }
        },
        error: function (result) {
            notify_error(result.message);
        }
    });
});


$(document).on('change', '.radio-switch', function (event) {
    if ($(this).is(":checked")) {
        var $this = $(this);
        $.ajax({
            type: "POST",
            url: baseHref + "/admin/options/server/description/default",
            data: {
                page_id: $this.val(),
                lang: $this.data("lang"),
                server_id: $this.data("server_id"),
            },
            dataType: "json",
            encode: true,
        }).done(function (data) {
            if (data.ok) {
                location.reload();
            } else {
                notify_error(data.message)
            }
        });
    }
});

$(document).on('click', '.removeDonateItem', function (e) {
    $.ajax({
        type: "POST",
        url: baseHref + "/admin/donate/remove",
        data: {
            productId: $(this).data("object-id"),
        },
        dataType: "json",
     }).done(function (data) {
        if (data.ok) {
            $(this).closest("tr").remove();
        }
    })
});

$(document).on('click', '.editDonateButton', function (event) {
    let objectId = $(this).data("object-id");
    let itemName = $(this).data("item-name");
    let itemId = $(this).data("item-id");
    let itemCount = $(this).data("item-count");
    let itemCost = $(this).data("item-cost");
    let img = $(this).data("img");
    $("#edit_name").text(itemName);
    $("#edit_id").val(objectId);
    $("#edit_itemID").val(itemId);
    $("#edit_count").val(itemCount);
    $("#edit_cost").val(itemCost);
    $("#editImgSrc").attr("src", img);
});


$('#itemIDDonate').on('input', function () {
    var newItemID = $(this).val().toString();
    var dataToSend = {
        itemID: newItemID
    };
    $.ajax({
        type: 'POST',
        url: baseHref + '/admin/client/info',
        dataType: 'json',
        data: dataToSend,
        success: function (response) {
            $("#editImgSrc").attr("src", response.icon);
            $("#itemNameDonate").text(response.name);
        },
        error: function (xhr, status, error) {
            console.error('Произошла ошибка:', error);
        }
    });
});


$(document).on('click', '#updateDonateItem', function (event) {
    $("#donateEdit").modal("hide");
});

$(document).on('change', '#template', function (event) {
    readme();
});


function readme() {
    $("#version").text("0.0");
    $("#date").text("-");
    $("#author").text("No");
    $("#contact").text("No");
    $("#description").text("");
    $.ajax({
        type: "POST",
        url: baseHref + "/admin/template/readme",
        dataType: "json",
        data: {
            template: $("#template").val()
        },
        success: function (result) {
            if (result.screen) {
                $("#screen").attr("src", baseHref + "/template/" + $("#template").val() + "/" + result.screen);
                $("#screen_href").attr("href", baseHref + "/template/" + $("#template").val() + "/" + result.screen);
            } else {
                $("#screen").attr("src", baseHref + "/src/template/logan22/assets/images/none.png");
                $("#screen_href").attr("href", baseHref + "/src/template/logan22/assets/images/none.png");
            }
            $("#version").text(result.version ?? "0.0");
            $("#author").text(result.author ?? "-");
            $("#contact").text(result.contact ?? "");
            $("#description").text(result.description ?? "");

            if (result.date === undefined) {
                humanDateFormat = "-"
            } else {
                var date = new Date(result.date * 1000);
                var day = date.getDate();
                var month = date.getMonth() + 1; // Месяцы в JavaScript начинаются с 0, поэтому добавляем 1
                var year = date.getFullYear();
                if (day < 10) {
                    day = '0' + day;
                }
                if (month < 10) {
                    month = '0' + month;
                }
                var humanDateFormat = day + '.' + month + '.' + year;
            }
            $("#date").text(humanDateFormat);
        }
    });
}

$(document).on('click', '.add_donate_point', function (event) {
    let id = $(this).data("user-id");
    $("#donate_user_id").val(id);
});

$(document).on('click', '.user_edit_button', function (event) {
    let id = $(this).data("user-id");
    let email = $(this).data("email");
    let name = $(this).data("name");
    let donate = $(this).data("donate");
    let access_level = $(this).data("group");
    $("#edit_user_id").val(id);
    $("#edit_user_email").val(email);
    $("#edit_user_name").val(name);
    $("#edit_user_donate_point").val(donate);
    $("#edit_user_access_level option[value=" + access_level + "]").prop('selected', true);
});

$(document).on("click", ".edit_category", function () {
    var category_id = $(this).data('category-id');
    var category_name = $(this).data('category-name');
    $('#change_name_category').val(category_name);
    $('#change_category_id').val(category_id);
});

$(document).on("click", ".remove_category", function () {
    var category_id = $(this).data('category-id');
    var category_name = $(this).data('category-name');
    $('#remove_category_name').text(category_name);
    $('#remove_category_id').val(category_id);
});

$(document).on("click", ".add_section", function () {
    var category_id = $(this).data('category-id');
    $('#id_category_new_section').val(category_id);
});

$(document).on("click", ".edit_section", function () {
    var section_id = $(this).data('section-id');
    var section_name = $(this).data('section-name');
    $('#edit_section_id').val(section_id);
    $('#edit_name_section').val(section_name);
});

$(document).on("click", ".remove_section", function () {
    var section_id = $(this).data('section-id');
    var section_name = $(this).data('section-name');
    $('#remove_section_name').text(section_name);
    $('#remove_section_id').val(section_id);
});


$(document).on("click", ".button_close", function () {
    var section_id = $(this).data('section-id');
    var is_close = $(this).data('is-close');
    AjaxSend(baseHref + "/admin/forum/section/close", "POST", {
        id: section_id,
        is_close: is_close,
     });
});

function is_add_donate(param){
    let user_id = param.user_id;
    let donate = param.donate;
    $(".donate_point_" + user_id).text(donate);
}

$(document).on("click", ".get_donate_history", function () {
    AjaxSend(baseHref + "/admin/donate/get/history/pay", "POST", {
        user_id: $(this).data("user-id"),
    }, true)
        .then(function(info) {
            // Код, который обрабатывает результат AJAX-запроса
            $("#donate_pay_history_table").empty();
            info.forEach(function (item, index) {
                $("#donate_pay_history_table").append(`
                <tr>
                    <td>${item.point}</td>
                    <td>${item.pay_system}</td>
                    <td>${item.date}</td>
                </tr>
            `);
            });
            console.log(info);
        })
        .catch(function (error) {
            // Обработка ошибки, если AJAX-запрос не удался
            console.error("Ошибка при выполнении AJAX-запроса: " + error);
        });
});


$(document).on("click", "#topic_close", function () {
    topic_id = $(this).data('topic-id');
    is_close = $("#topic_close").prop("checked");
    AjaxSend(baseHref + "/admin/forum/topic/close", "POST", {
        topic_id: topic_id,
        is_close: is_close,
    });
});
$(document).on("click", "#topic_pin", function () {
    topic_id = $(this).data('topic-id');
    is_pin = $("#topic_pin").prop("checked");
    AjaxSend(baseHref + "/admin/forum/topic/pin", "POST", {
        topic_id: topic_id,
        is_pin: is_pin,
    });
});
$(document).on("click", "#topic_move", function () {
    topic_move = $("#topic_select").val();
    topic_id   = $(this).data('topic-id');
    section_id = $(this).data('section-id');
    topic_page = $(this).data('topic-page');

   AjaxSend(baseHref + "/admin/forum/topic/move", "POST", {
        topic_move: topic_move,
        topic_id: topic_id,
        section_id: section_id,
        topic_page: topic_page,
    });

});