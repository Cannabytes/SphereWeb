$(document).ready(function () {
    $(".save").on('click', function () {
        id = $(this).data("id");
        desc = $("#desc_" + id).val();

        $.ajax({
            type: "POST",
            url: "/gallery/save",
            data: {
                id: id,
                desc: desc,
            },
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok) {
                notify_success(data.message);
            } else {
                notify_error(data.message)
            }
        });
    });

    $(".remove").on('click', function (e) {
        e.preventDefault();
        th = $(this)
        $.ajax({
            type: "POST",
            url: "/gallery/screenshot/my/remove",
            data: {
                id: $(this).data("id")
            },
            dataType: "json",
            encode: true,
        }).success(function (data) {
            if (data.ok) {
                notify_success(data.message);
                th.closest("tr").remove();
            } else {
                notify_error(data.message)
            }
        });
    });

});

 