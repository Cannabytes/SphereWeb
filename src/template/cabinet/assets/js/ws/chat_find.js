$(document).ready(function () {

    $("#search_message_text").click(function (e) {
        text_message = $("#text_message").val().trim();
    });

    $("#search_message_player").click(function (e) {
        player_message = $("#player").val().trim();
    });

});
