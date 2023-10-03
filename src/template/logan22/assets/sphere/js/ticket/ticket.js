function ResponseTicketCommentAdd(response, form) {
    if (response.ok) {
        $("#ticket_read_list").append(response.html)
        Codebase.helpersOnLoad(['jq-magnific-popup']);
        form[0].reset();
    }
}

