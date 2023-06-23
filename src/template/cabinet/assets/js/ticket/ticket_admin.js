$(document).ready(function () {

    $("#removeTicket").on('click', function () {
        const formData = new FormData();
        formData.append('ticketID', $(this).data("ticket") );
        $.ajax({
            type: "POST",
            url: "/ticket/remove",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        }).success(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message)
                window.location.href = "/ticket"
            } else {
                notify_error(data.message)
            }
        });
    });

    $(".removeTicketComment").on('click', function () {
        const formData = new FormData();
        formData.append('commentID', $(this).data("comment") );
        $.ajax({
            type: "POST",
            url: "/ticket/remove/comment",
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
