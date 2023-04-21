$(document).ready(function () {

    $("#add_comment").on('click', function () {
        const formData = new FormData();
        formData.append('content', $("#content").val());
        formData.append('ticketID', $(this).data("ticket-id"));

        $('input[type=file]').each(function() {
            formData.append('files[]', $(this).get(0).files[0]);
        });

        $.ajax({
            type: "POST",
            url: "/ticket/add/comment",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        }).success(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message)
                location.reload()
            } else {
                notify_error(data.message)
            }
        });
    });

    $("#close_ticket").on("click", function(){
        const formData = new FormData();
        formData.append('ticketID', $(this).data("ticket-id"));
        $.ajax({
            type: "POST",
            url: "/ticket/close",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        }).success(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message)
                location.reload()
            } else {
                notify_error(data.message)
            }
        });
    });

    $("#open_ticket").on("click", function(){
        const formData = new FormData();
        formData.append('ticketID', $(this).data("ticket-id"));
        $.ajax({
            type: "POST",
            url: "/ticket/open",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        }).success(function (data) {
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
