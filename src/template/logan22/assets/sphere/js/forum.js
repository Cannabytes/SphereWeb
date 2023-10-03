var postMemory = "";
var lastMessageIDForum = 0;

$(document).on("click", ".editForumComment", function () {
    let postID = $(this).data("post-id");

    isOpen = $(this).data("is-open");
    if (isOpen) {
        $(this).data("is-open", false);

        CKEDITOR.instances['js-ckeditor'].config.allowedContent = true;
        var editorInstance = CKEDITOR.instances["comment_message_id_" + postID];
        if (editorInstance) {
            editorInstance.destroy();
        }

        $("#saveForumButton_" + postID).remove();
        postMemory = "";

        $('.removeImagePost_' + postID).remove();
        return;
    }

    $(this).data("is-open", true);
    postMemory = $("#comment_message_id_" + postID).html();
    $("#saveForumButton_" + postID).remove();
    CKEDITOR.instances['js-ckeditor'].config.allowedContent = true;
    CKEDITOR.replace("comment_message_id_" + postID);

    let saveButton = $('<a class="btn w-100 btn-alt-secondary me-1 mb-1 saveForumComment" id="saveForumButton_' + postID + '" data-post-id="' + postID + '" href="javascript:void(0)">Сохранить</a>');
    saveButton.data("post-id", postID);
    $('#comment_message_id_' + postID).after(saveButton);

    $('.pic_img_' + postID).each(function () {
        var dataFileId = $(this).data('file-id');
        var $aTag = $('<button>', {
            'text': 'Удалить',
            'class': 'btn btn-alt-secondary btn-sm removeImagePost',
            'data-post-id': postID,
            'data-file-id': dataFileId,
        });
        $(this).append($aTag);
    });

})

$(document).on("click", ".removeImagePost", function () {
    var dataFileId = $(this).data('file-id');
    var postID = $(this).data('post-id');
    $.ajax({
        url: "/forum/delete/comment/image",
        type: "POST",
        data: {
            post_id: postID,
            file_id: dataFileId,
        },
        success: function (response) {
            $('.pic_img_' + postID).remove();
        }
    });
});

$(document).on("click", ".saveForumComment", function () {
    postID = $(this).data("post-id");
    CKEDITOR.instances['js-ckeditor'].config.allowedContent = true;
    var editorInstance = CKEDITOR.instances['comment_message_id_' + postID];
    if (editorInstance) {
        var editorContent = editorInstance.getData();
    } else {
        alert("ERROR #1");
    }
    editorContent = editorContent.replace(/<blockquote>/g, "");

    $.ajax({
        url: "/forum/edit/comment",
        type: "POST",
        data: {
            post_id: postID,
            message: editorContent,
        },
        success: function (data) {
            if (data.type === "notice") {
                if (data.ok === false) {
                    notify_error(data.message);
                    return;
                }
            }
            $(".editForumComment").data("is-open", false);
            CKEDITOR.instances['js-ckeditor'].config.allowedContent = true;
            var editorInstance = CKEDITOR.instances["comment_message_id_" + postID];
            if (editorInstance) {
                editorInstance.destroy();
            }
            $("#saveForumButton_" + postID).remove();
            postMemory = ""
            $('.pic_img').each(function () {
                $(this).find('a').remove();
            });
        },
        error: function (data) {
            notify_error("Ошибка сервера");
        }
    });
})


$(document).on("click", "#removePostButton", function () {
    postID = $(this).attr("data-post-id");
    $(".panel_comment_id_" + postID).remove();
    $.ajax({
        url: "/forum/delete/comment",
        type: "POST",
        data: {
            post_id: postID,
        },
        success: function (response) {
            ResponseNotice(response)
            $(".panel_comment_id_" + postID).remove();
        },
        error: function (data) {
            notify_error("Ошибка сервера");
        }
    });
})

$(document).on("click", ".deleteForumCommentModal", function () {
    postId = $(this).data("post-id");
    $("#removePostButton").attr("data-post-id", postId);
});

$(document).on("click", ".quote", function () {
    postID = $(this).data("post-id");
    author = $(this).data("post-author");
    postMessage = $("#comment_message_id_" + postID).html();
    postMessage = postMessage.replace(/<blockquote>/g, "");

    // Находим элемент <div> с классом "alert" и удаляем его
    postMessage = postMessage.replace(/<div class="alert alert-secondary" role="alert">[\s\S]*?<\/div>/gi, "");
    postMessage = postMessage.replace(/<p>&nbsp;<\/p>/gi, "");
    postMessage = postMessage.replace(/<p><br><\/p>/gi, "");
    postMessage = postMessage.replace(/\n/gi, "");
    postMessage = postMessage.replace(/<br><br>/gi, "");

    CKEDITOR.config.extraAllowedContent = '*(*)[*]';
    var editor = CKEDITOR.instances['js-ckeditor'];
    var currentContent = editor.getData();
    editor.setData(currentContent + `<blockquote><strong class='author' data-post-id='${postID}'>` + author + "</strong>" + postMessage + "</blockquote><p></p>\n");

});


function toGoHash() {
    $('html, body').animate({
        scrollTop: $('#' + (lastMessageIDForum)).offset().top - 25
    }, 1000);
}
