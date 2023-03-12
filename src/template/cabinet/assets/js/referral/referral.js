$(document).ready(function () {
    $(".referral").on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/referral",
            data: {
                "player_name": $(this).data("referral-player_name"),
                "server_id": $(this).data("referral-server_id")
            },
            dataType: "json",
            encode: true,
        }).success(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message);
                location.reload()
            } else {
                notify_error(data.message)
            }
        });
    });

    $(".copy").on('click', function (e) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).text()).select();
        document.execCommand("copy");
        $temp.remove();
    });

});

 