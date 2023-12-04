var baseHref = $('base').attr('href');

$(document).on("change", "#server_set_default", function () {
    $.ajax({
        type: "POST",
        url: baseHref + "/user/change/default/server",
        data: {
            server_id: $(this).val(),
        },
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.ok) {
            location.reload();
        } else {
            alert("false");
        }
    });
});

$(document).on("new_account_word", 'click', function () {
    $.ajax({
        type: "POST",
        url: baseHref + "/generation/account",
        encode: true,
    }).done(function (data) {
        $("input[name*='login']").val(data);
    });
});

$(document).on('#new_password_word', 'click', function () {
    $.ajax({
        type: "POST",
        url: baseHref + "/generation/password",
        encode: true,
    }).done(function (data) {
        $("input[name*='password']").val(data);
    });
});

$(document).on("click", ".selectItem", function () {
    let id = $(this).data("bonus-id");
    let phrase = $(this).data("bonus-phrase");
    let enchant = $(this).data("bonus-enchant");
    let icon = $(this).data("bonus-icon");
    let name = $(this).data("bonus-name");
    let count = $(this).data("bonus-count");
    if (enchant >= 1) {
        name = "+" + enchant + " " + name;
    }
    $("#object_id").val(id);
    $("#bonusNameItem").text(name);
    $("#bonusCount").text(count);
    $("#bonusIcon").attr("src", baseHref + "/uploads/images/icon/" + icon + ".webp");
    $("#bonusPhrase").text(phrase);
})

$(document).on("click", ".post-buff-skill", function () {
    var imgElement = $(this).find("img");
    var srcAttributeValue = imgElement.attr("src");
    $(".selected-buff-skill").attr("src", srcAttributeValue);
    $("#buff_skill_type").val(imgElement.data("skill-type"));
    $("#buff_skill_id").val(imgElement.data("skill-id"));
});

$(document).on("click", ".buttonLikeBuffPanel", function () {
    $("#buff_post_id").val($(this).data("post-id"));
    $("#showBuffPanel").modal("show");
});


$(document).on("click", ".buttonBuffListPost", function () {
    $("#buff_post_id").val($(this).data("post-id"));
    $("#showBuffListPostPanel").modal("show");
});


$(document).on("click", ".buttonBuffListPost", function () {
    post_id = $(this).data("post-id");
    $("#showBuffListPostPanel").modal("show");
    $.ajax({
        type: "POST",
        url: baseHref + "/forum/post/like/get",
        data: {
            post_id: post_id,
        },
        dataType: "json",
        encode: true,
    }).done(function (data) {
        var dataTable = $(".buffListTable").DataTable();
        dataTable.clear().draw();
        if (Array.isArray(data)) {
            data.forEach(function (item) {
                var rowData = [
                    `<img class="img-avatar-thumb img-avatar" src="/uploads/images/skills/${item.icon}" alt="">`,
                    item.comment,
                    `<span class="badge bg-info">${item.user_name}</span>`
                ];
                var rowNode = dataTable.row.add(rowData).draw().node();
                if (item.type === 1) {
                    $(rowNode).addClass('table-danger');
                }
            });
            dataTable.draw();
        }
    });
});


$(document).on('submit', '.formBuffMessage', function(event) {
    var form = $(this); // Текущая форма
    var post_id = form.find('#buff_post_id').val();
    var type = form.find('#buff_skill_type').val();
    var skill_id = form.find('#buff_skill_id').val();
    var comment = form.find('textarea[name="comment"]').val();
    $(".buttonBuffListPost_" + post_id).removeClass("d-none");
});

$(document).on('click', '.theme', function(event) {
    $.ajax({
        type: "POST",
        url: baseHref + "/user/change/theme",
        data: {
            theme: $("#page-container").hasClass("dark-mode"),
        },
        dataType: "json",
        encode: true,
    }).done(function (data) {

    });
});


function bonuscode(response, form){
    $("#bonusCode").empty();
    $("#bonusCode").text(response.join("\n"));
}


$(document).on('click', '#page-header-notifications', function(event) {
    $.ajax({
        type: "POST",
        url: baseHref + "/user/notification/read",
        data: {
            server_id: $(this).val(),
        },
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.ok) {
            $("#notification_point").hide();
        } else {}
    });
});


$(document).on('click', ".forbiddenToView",function(e) {
    $.ajax({
        type: "POST",
        url: baseHref + "/account/info/change/characters/info/forbidden",
        dataType: "json",
        data: {
            account: $(this).data('account'),
            player: $(this).data('player'),
            server_id: $('meta[name="server_default"]').attr('content'),
            forbidden: $(this).is(":checked")
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

$(document).on("click", ".generation_password", function () {
    $.ajax({
        url: baseHref + "/generation/password",
        type: "POST",
        dataType: "html",
        success: function (password) {
            $(".password").val(password);
        }
    });
});

// Если при клике на элемент prefix_account в списке выбран option = off
// то скрываем все элементы с классом prefix_account
$(document).on("change", "#prefix_account", function () {
    if ($(this).val() === "off_prefix") {
        $("#prefix_account_div").hide();
        $("#registration_login_div").removeClass("col-9");
        $("#registration_login_div").addClass("col-12");
    }
});

function captchaToken() {
    google_captcha_key = $('meta[name="google_captcha_key"]').attr('content');
    grecaptcha.execute(google_captcha_key).then(function (token) {
        $(".captchaToken").val(token);
    });
}



