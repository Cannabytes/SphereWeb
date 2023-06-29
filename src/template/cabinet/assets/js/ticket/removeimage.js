$(document).ready(function () {

    $("#edit_ticket").on("click", function(){
        const formData = new FormData();
        formData.append('content', $("#content").val());
        formData.append('ticketID', $(this).data("ticket-id"));

       $('input[type=file]').each(function() {
            formData.append('files[]', $(this).get(0).files[0]);
        });

        $.ajax({
            type: "POST",
            url: "/ticket/edit/ticket",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        }).done(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message)
                window.location.href = data.link;
            } else {
                notify_error(data.message)
            }
        });
    });

    $("#edit_comment").on("click", function(){
        const formData = new FormData();
        formData.append('content', $("#content").val());
        formData.append('ticketID', $(this).data("ticket-id"));
        formData.append('commentID', $(this).data("comment-id"));

       $('input[type=file]').each(function() {
            formData.append('files[]', $(this).get(0).files[0]);
        });

        $.ajax({
            type: "POST",
            url: "/ticket/edit/comment",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        }).done(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message)
                window.location.href = data.link;
            } else {
                notify_error(data.message)
            }
        });
    });

    $(".removeimage").on("click", function(){
        const formData = new FormData();
        formData.append('commentID', $(this).data("comment-id"));
        formData.append('imageID', $(this).data("image-id"));
        $.ajax({
            type: "POST",
            url: "/ticket/remove/comment/image",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        }).done(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message)
                location.reload()
            } else {
                notify_error(data.message)
            }
        });
    });


});
