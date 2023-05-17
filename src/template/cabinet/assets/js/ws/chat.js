var last_message_id = 0;
var player_message = "";
var text_message = "";

if (typeof chat_admin_password === 'undefined'){
    var chat_admin_password = "";
}


function connect() {
	
	var headers = {
		'Access-Control-Allow-Origin': '*',
		'Access-Control-Allow-Headers': 'Origin, X-Requested-With, Content-Type, Accept',
		'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE'
	};

	var socket = new WebSocket("ws://" + web_socket_c, null, headers);
    var refreshSend;

    socket.onopen = function () {
        console.log("Connected");
    };

    socket.onopen = function () {
        clearChat();
        last_message(30);
        refreshSend = setInterval(update_chat_refresh, 1000);
    };

    socket.onmessage = function (e) {
        e.preventDefault();
        if (e.data == "null") {
            return;
        }
        var array = JSON.parse(e.data);

        if(array.last_chat_message_id){
            last_message_id = array.last_chat_message_id;
        }

        i = 1
        array.last_chat_message.forEach(function (object) {
            $("#chat_messages").append('<li data-count="'+i+'" class="message left appeared"><div class="text_wrapper"><div data-message-id="'+ object.id + '" data-message-time="'+ object.time + '"  class="' + object.type + '">' + object.player + " : " + object.message + '</div></div></li>');
            i++
        });
        $('#chat_messages').animate({scrollTop: document.body.scrollHeight + 50}, 500);
    };

    function last_message(count) {
        socket.send("password:" + chat_admin_password + ":last:" + count);
    }

    function update_chat_refresh() {
        if (player_message != "") {
            clearChat();
            find_player_message();
            // clearInterval(refreshSend);
        }else if (text_message != "") {
            clearChat();
            find_message_text();
            // clearInterval(refreshSend);
        }else{
            socket.send("password:" + chat_admin_password + ":refresh:" + last_message_id);
        }
    }

    function find_player_message() {
        socket.send("player:" + player_message);
        player_message = ""
    }

    function find_message_text() {
        socket.send("text:" + text_message);
        text_message = ""
    }

    socket.onclose = function (event) {
        socket = null
        clearInterval(refreshSend);

        setTimeout(function () {
            connect();
        }, 2000);

        let reason;
        // See https://www.rfc-editor.org/rfc/rfc6455#section-7.4.1
        if (event.code == 1000)
            reason = "Normal closure, meaning that the purpose for which the connection was established has been fulfilled.";
        else if (event.code == 1001)
            reason = "An endpoint is \"going away\", such as a server going down or a browser having navigated away from a page.";
        else if (event.code == 1002)
            reason = "An endpoint is terminating the connection due to a protocol error";
        else if (event.code == 1003)
            reason = "An endpoint is terminating the connection because it has received a type of data it cannot accept (e.g., an endpoint that understands only text data MAY send this if it receives a binary message).";
        else if (event.code == 1004)
            reason = "Reserved. The specific meaning might be defined in the future.";
        else if (event.code == 1005)
            reason = "No status code was actually present.";
        else if (event.code == 1006)
            reason = "The connection was closed abnormally, e.g., without sending or receiving a Close control frame";
        else if (event.code == 1007)
            reason = "An endpoint is terminating the connection because it has received data within a message that was not consistent with the type of the message (e.g., non-UTF-8 [https://www.rfc-editor.org/rfc/rfc3629] data within a text message).";
        else if (event.code == 1008)
            reason = "An endpoint is terminating the connection because it has received a message that \"violates its policy\". This reason is given either if there is no other sutible reason, or if there is a need to hide specific details about the policy.";
        else if (event.code == 1009)
            reason = "An endpoint is terminating the connection because it has received a message that is too big for it to process.";
        else if (event.code == 1010) // Note that this status code is not used by the server, because it can fail the WebSocket handshake instead.
            reason = "An endpoint (client) is terminating the connection because it has expected the server to negotiate one or more extension, but the server didn't return them in the response message of the WebSocket handshake. <br /> Specifically, the extensions that are needed are: " + event.reason;
        else if (event.code == 1011)
            reason = "A server is terminating the connection because it encountered an unexpected condition that prevented it from fulfilling the request.";
        else if (event.code == 1015)
            reason = "The connection was closed due to a failure to perform a TLS handshake (e.g., the server certificate can't be verified).";
        else
            reason = "Unknown reason";
        console.log(reason)
    };

    socket.onerror = function (event) {
        clearChat()
        $("#chat_messages").append('<h4 class="mb-3">Игровой чат недоступен</h4>')
        $('#chat_messages').animate({scrollTop: document.body.scrollHeight + 100}, 500);
        socket.close();
    };
}

function clearChat() {
    $("#chat_messages").html("");
}

connect();