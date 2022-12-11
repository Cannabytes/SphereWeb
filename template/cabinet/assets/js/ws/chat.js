	
	var last_message_id = 0;
    var socket = new WebSocket("ws://localhost:8080/todo");
	
    socket.onopen = function () {
	  console.log("Connected");
	  $("#game_chat").show();
    };

	socket.onopen = function() {
		last_message(30);
		setInterval(update_chat_refresh, 1000); 
	};
			   
    socket.onmessage = function (e) {
		if (e.data=="null"){
			return;
		}
		e.preventDefault();
		var array = JSON.parse(e.data);
		array.forEach(function(object){
			last_message_id = object.Id;
			$("#chat_messages").append('<li class="message left appeared"><div class="avatar orc_male"></div><div class="text_wrapper"><div class="text">'+object.Username+": "+object.Text+'</div></div></li>');
		});
		$('#chat_messages').animate({scrollTop: document.body.scrollHeight}, 800);
    };

	function last_message(count){
		socket.send("last:"+count);
	}
	
	//Проверяем есть ли новые сообщения
	//last_message_id - ID последнего сообщениям
	function update_chat_refresh(){
		socket.send("refresh:"+last_message_id);
	}
	
	
	    socket.onclose = function (event) {
		$("#game_chat").hide();
        var reason;
         // See https://www.rfc-editor.org/rfc/rfc6455#section-7.4.1
        if (event.code == 1000)
            reason = "Normal closure, meaning that the purpose for which the connection was established has been fulfilled.";
        else if(event.code == 1001)
            reason = "An endpoint is \"going away\", such as a server going down or a browser having navigated away from a page.";
        else if(event.code == 1002)
            reason = "An endpoint is terminating the connection due to a protocol error";
        else if(event.code == 1003)
            reason = "An endpoint is terminating the connection because it has received a type of data it cannot accept (e.g., an endpoint that understands only text data MAY send this if it receives a binary message).";
        else if(event.code == 1004)
            reason = "Reserved. The specific meaning might be defined in the future.";
        else if(event.code == 1005)
            reason = "No status code was actually present.";
        else if(event.code == 1006)
           reason = "The connection was closed abnormally, e.g., without sending or receiving a Close control frame";
        else if(event.code == 1007)
            reason = "An endpoint is terminating the connection because it has received data within a message that was not consistent with the type of the message (e.g., non-UTF-8 [https://www.rfc-editor.org/rfc/rfc3629] data within a text message).";
        else if(event.code == 1008)
            reason = "An endpoint is terminating the connection because it has received a message that \"violates its policy\". This reason is given either if there is no other sutible reason, or if there is a need to hide specific details about the policy.";
        else if(event.code == 1009)
           reason = "An endpoint is terminating the connection because it has received a message that is too big for it to process.";
        else if(event.code == 1010) // Note that this status code is not used by the server, because it can fail the WebSocket handshake instead.
            reason = "An endpoint (client) is terminating the connection because it has expected the server to negotiate one or more extension, but the server didn't return them in the response message of the WebSocket handshake. <br /> Specifically, the extensions that are needed are: " + event.reason;
        else if(event.code == 1011)
            reason = "A server is terminating the connection because it encountered an unexpected condition that prevented it from fulfilling the request.";
        else if(event.code == 1015)
            reason = "The connection was closed due to a failure to perform a TLS handshake (e.g., the server certificate can't be verified).";
        else
            reason = "Unknown reason";
		console.log(reason)
    };

    socket.onerror = function (event) {
       console.log(event)
    };
  