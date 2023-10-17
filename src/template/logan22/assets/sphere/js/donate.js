

$(document).on("click", "#paynext", function (){
    paysystem = $('input[name=paysystem]:checked').val();
    if (typeof paysystem === 'undefined') {
        return;
    }
    var count = $("#count").val();
    $.ajax(
        {
            type: "POST",
            url: baseHref + "/donate/transfer/" + paysystem + "/createlink",
            data: ({"count": count}),
            async: false,
            success: function (redirectLink) {
                console.log(redirectLink)
                if (redirectLink['ok'] == false) {
                    notify_error(redirectLink['message'])
                    return;
                }
                window.open(redirectLink, '_blank');
            }
        });
});