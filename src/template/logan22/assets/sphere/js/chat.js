var last_message_chat_id = 0;
var player_message = "";
var text_message = "";
var stopChat = false;
var serverID = parseInt($('meta[name="server_default"]').attr('content'), 10);
var firstLoadChat = true;
var chatContainer = $(".block-rounded.chat");
var intervalId;
var newMessageCount = 0;
var isNeedScroll = true;

$(document).on("click", "#chatDownScroll", function () {
    chatContainer.animate({
        scrollTop: chatContainer[0].scrollHeight
    }, 500);
});

$(document).on("click", "#enableChatScrolling", function () {
    let enableChatScrolling = $('#enableChatScrolling').is(':checked');
    AjaxSend("/user/variable/set", "POST", {
        var: "chat_scrolling",
        val: enableChatScrolling,
    });
});


function connectUserChat() {
    intervalId = setInterval(function () {
        if (stopChat === true) {
            clearInterval(intervalId);
            return;
        }
        if (chatContainer.scrollTop() === chatContainer[0].scrollHeight - chatContainer[0].clientHeight) {
            isNeedScroll = true;
        } else {
            isNeedScroll = false;
        }

        $.ajax({
            url: "/chat",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({
                last_message_id: last_message_chat_id,
                server_id: serverID,
            }),
            success: function (response) {
                var dataArray = JSON.parse(response);
                var maxId = dataArray.reduce(function (prev, curr) {
                    return (curr.id > prev) ? curr.id : prev;
                }, 0);
                if (maxId <= last_message_chat_id) {
                    return;
                }
                last_message_chat_id = maxId
                let i = maxId + 1;
                dataArray.forEach(function (object) {
                    let msg = `<li data-count="` + i + `" class="timeline-event">
                        <div class="timeline-event-block">
                            <p class="small"><strong class="text-success js-bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="` + object.timeAgo + `">` + object.player + `</strong>: ` + object.message + `</p>
                         </div>
                    </li>`;
                    $("#chat_messages").append(msg);
                    i++;
                });
                Codebase.helpersOnLoad(['bs-tooltip']);

                if (firstLoadChat) {
                    chatContainer.animate({
                        scrollTop: chatContainer[0].scrollHeight
                    }, 100);
                    firstLoadChat = false;
                }
                if (isNeedScroll) {
                    //Если в радиокнопке id chatDownScroll 
                    if ($('#enableChatScrolling').is(':checked')) {
                        chatContainer.animate({
                            scrollTop: chatContainer[0].scrollHeight
                        }, 500);
                        isNeedScroll = false;
                    }
                } else {
                }
            },
            error: function (xhr, status, error) {
                console.log("Произошла ошибка при отправке запроса!");
            }
        });
    }, 1200);
}

function typeMessage(msgType) {
    switch (msgType) {
        case 1:
            return "ALL";
        case 2:
            return "TRADE";
        case 3:
            return "SHOUT";
        case 4:
            return "CLAN";
        case 5:
            return "ALLIANCE";
        case 6:
            return "HERO_VOICE";
        case 7:
            return "PETITION_PLAYER";
        case 8:
            return "TELL";
        case 9:
            return "PARTY";
    }
    return "OTHER";
}

function clearChat() {
    $("#chat_messages").html("");
}

connectUserChat();

function escapeRegExp(string) {
    return string.replace(/[.*+\-?^${}()|[\]\\]/g, '\\$&'); // экранируем специальные символы
}