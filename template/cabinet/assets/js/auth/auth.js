$(document).ready(function () {
    $("#auth").click(function (e) {
        e.preventDefault();
        authorization($("#email").val(), $("#password").val())
    });

    $("#authmain").click(function (e) {
        e.preventDefault();
        authorization($("#emailmain").val(), $("#passwordmain").val())
    });

    function authorization(email, password) {
        $.ajax({
            type: "POST",
            url: "/auth",
            data: {
                email: email,
                password: password,
            },
            dataType: "json",
            encode: true,
        }).success(function (data) {
            console.log(data);
            if (data.ok) {
                location.reload()
            } else {
                notify_error(data.message)
            }
        });
    }
});
