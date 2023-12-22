function ResponseTicketCommentAdd(response, form) {
    if (response.ok) {
        $("#ticket_read_list").append(response.html)
        Codebase.helpersOnLoad(['jq-magnific-popup']);
        form[0].reset();
    }
}

$(document).on('click', '#deleteTicket', function (event) {
    $.ajax({
        url: '/ticket/remove',
        method: 'POST',
        data: {
            ticketID: $(this).data("ticket-id"),
        },
        success: function (response) {
            if(response.ok){
                window.location.href = "/ticket";
            }
        },
        error: function (xhr, status, error) {
            console.error('Произошла ошибка при удалении тикета:', error);
        }
    });
});

$(document).on('click', '#deleteTicketComment', function (event) {
    let commentID = $(this).data("comment-id");
    $.ajax({
        url: '/ticket/remove/comment',
        method: 'POST',
        data: {
            commentID: commentID,
        },
        success: function (response) {
            console.log(response);
            if(response.ok){
                $(".commentBlock_"+commentID).remove();
            }
        },
        error: function (xhr, status, error) {
            console.error('Произошла ошибка при удалении тикета:', error);
        }
    });
});

$(document).on('click', '.removeCommentTicket', function (event) {
    let commentID = $(this).data("comment-id");
    $('#deleteTicketComment').attr('data-comment-id', commentID).data('comment-id', commentID);
});


$(document).on('click', '#saveEditTicket', function (event) {
    $.ajax({
        url: '/ticket/edit/ticket',
        method: 'POST',
        data: {
            ticketID: $(this).data("ticket-id"),
            content: $("#content").val()
        },
        success: function (response) {
            console.log(response)
            if(response.ok){
                window.location.href = response.link;
            }
        },
        error: function (xhr, status, error) {
            console.error('Произошла ошибка:', error);
        }
    });
});

$(document).on('click', '#saveEditTicketComment', function (event) {
    $.ajax({
        url: '/ticket/edit/comment',
        method: 'POST',
        data: {
            ticketID: $(this).data("ticket-id"),
            commentID: $(this).data("comment-id"),
            content: $("#content").val()
        },
        success: function (response) {
            console.log(response)
            if(response.ok){
                window.location.href = response.link;
            }
        },
        error: function (xhr, status, error) {
            console.error('Произошла ошибка:', error);
        }
    });
});