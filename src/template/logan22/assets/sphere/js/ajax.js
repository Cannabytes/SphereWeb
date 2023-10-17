$(document).on('click', '.ajaxload', function (event) {
    event.preventDefault();
    return false;
});

function changeAddress(url) {
    window.history.pushState(null, null, url);
    $('html, body').animate({
        scrollTop: 0
    }, 120);
    return false;
}

$(document).on('click', '.ajaxload', function (event) {
    linkAjax($(this).attr("href"), "GET")
});

window.addEventListener('popstate', function (event) {
    var newUrl = document.location.href;
    linkAjax(newUrl)
});

function linkAjax(url) {
    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        success: function (response) {
            if(response.type==="notice"){
                if(!ResponseNotice(response)){
                    return;
                }
            }
            changeAddress(url);
            if (response.title !== undefined) {
                document.title = response.title;
            }
            $('#main-container').empty();
            $('#main-container').append(response.content);
            preload()
        },
        error: function (xhr, status, error) {
            console.error('Ошибка при выполнении AJAX-запроса:', error);
        }
    });
}

$(document).on('submit', 'form', function (event) {
    event.preventDefault();
    let url = $(this).attr('action');
    let method = $(this).attr('method');
    if ($(this).attr('enctype') === 'multipart/form-data') {
        FormAjaxFile(url, method, $(this));
    } else {
        FormAjax(url, method, $(this));
    }
});

function FormAjax(url, method, form) {
    $.ajax({
        url: url,
        type: method,
        data: form.serialize(),
        dataType: 'json',
        success: function (response) {
            responseAnalysis(response, form)
        },
        error: function (xhr, status, error) {
            console.error('Ошибка при выполнении AJAX-запроса:', error);
        }
    });
}

function FormAjaxFile(url, method, form) {
    const formData = new FormData();

    $(form).serializeArray().forEach(function (field) {
        formData.append(field.name, field.value);
    });

    $('input[type=file]').each(function () {
        formData.append('files[]', this.files[0]);
    });

    $.ajax({
        type: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json"
    }).done(function (response) {
        console.log(response);
        if (response.ok) {
            responseAnalysis(response, form)
        } else {
            notify_error(response.message);
        }
    });
}



function responseAnalysis(response, form) {
    if (response.type === "page_add_comment") {
        page_add_comment(response, form)
    } else if (response.type === "notice") {
        ResponseNotice(response)
    } else if (response.type === "notice_registration") {
        ResponseNoticeRegistration(response)
    } else if (response.type === "notice_set_avatar") {
        ResponseNoticeSetAvatar(response)
    } else if (response.type === "ticket_comment_add") {
        ResponseTicketCommentAdd(response, form)
    } else if (response.type === "bonus") {
        $(".bonus_code_img_src").attr('src', response.icon);
        $(".bonus_name_item").text(response.name);
        notify_success(response.message);
        updateInventory()
    } else if (response.blockLoad) {


        if (response.title !== undefined) {
            document.title = response.title;
        }
        $.each(response.blocks, function (index, block) {
            let element = "";
            if (block.isID) {
                element = $("#" + block.name)
            } else {
                element = $("." + block.name)
            }
            if (block.action === "append") {
                element.append(block.html);
            } else if (block.action === "prepend") {
                element.prepend(block.html);
            } else if (block.action === "update") {
                element.empty();
                element.html(block.html);
            } else if (block.action === "remove") {
                element.remove();
            } else if (block.action === "replace") {
                element.replaceWith(block.html);
            }
        });

        $.each(response.changeVal, function (index, val) {
            let element = "";
            if (val.isID) {
                element = $("#" + val.name)
            } else {
                element = $("." + val.name)
            }
            element.val(val.value);
        });

        $.each(response.changeText, function (index, val) {
            let element = "";
            if (val.isID) {
                element = $("#" + val.name)
            } else {
                element = $("." + val.name)
            }
            element.text(val.value);
        });

        $.each(response.JSCode, function (index, code) {
            eval(code);
        });

        form.find(':input:not(:hidden)').val('');
        preload()



    }


    var func = form.attr("data-function");
    if (func !== undefined) {
        window[func](response, form);
        return;
    }

}

function page_add_comment(response, form) {
    form.find('[name="comment"]').val("");
    $("#page_new_comment").append(response.html);
}

$(document).on('click', '.change_avatar', function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: baseHref + "/user/change/avatar",
        dataType: "json",
        data: {
            avatar: $(this).data('avatar')
        },
        success: function (result) {
            console.log(result.src);
            if (result.ok) {
                notify_success(result.message);
                $(".user_self_avatar").attr("src", result.src);
            } else {
                notify_error(result.message);
            }
        },
        error: function (result) {
            notify_error(result.message);
        }
    });
});

function AjaxSend(url, method, data) {
    $.ajax({
        url: url,
        type: method,
        data: data,
        dataType: 'json',
        success: function (response) {
            responseAnalysis(response)
        },
        error: function (xhr, status, error) {
            console.error('Ошибка при выполнении AJAX-запроса:', error);
        }
    });
}

function updateInventory(){
    AjaxSend(baseHref + "/bonus/inventory/update", "POST", {})
}

