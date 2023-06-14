$(document).ready(function () {
    $("#search_message_text").click(function (e) {
        stopChat = true
        text_message = $("#text_message").val().trim();
        $.ajax({
            url : '/admin/chat/find/message',
            type : 'POST',
            data : {
                'message' : text_message,
                'server_id' : parseInt($('meta[name="server_default"]').attr('content'), 10),
            },
            dataType:'json',
            success : function(data) {
                  $("#chat_messages").empty();
                  var i = 1;
                  data.forEach(function(object) {
                  var escapedSearchText = escapeRegExp(text_message);
                  var regex = new RegExp(escapedSearchText, 'gi');
                  var message = object.message.replace(regex, '<u class="text-success">$&</u>'); // заменяем найденный текст на подчеркнутый внутри <u> тега
                  $("#chat_messages").append('<li data-count="' + i + '" class="message left appeared"><div class="text_wrapper"><div data-message-id="' + object.id + '" data-message-time="' + object.date + '" class="' + typeMessage(object.type) + '">' + object.player + " : " + message + '</div></div></li>');
                  i++;
                  });
                  $('#chat_messages').animate({scrollTop: document.body.scrollHeight + 50}, 500);
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });
    });

    function escapeRegExp(string) {
      return string.replace(/[.*+\-?^${}()|[\]\\]/g, '\\$&'); // экранируем специальные символы
    }



    $("#search_message_player").click(function (e) {
        stopChat = true
        player = $("#player").val().trim();
        $.ajax({
            url : '/admin/chat/find/player',
            type : 'POST',
            data : {
                'player' : player,
                'server_id' : parseInt($('meta[name="server_default"]').attr('content'), 10),
            },
            dataType:'json',
            success : function(data) {
                $("#chat_messages").empty();
                  data.forEach(function(object) {
                      var i = 1;
                      $("#chat_messages").append('<li data-count="' + i + '" class="message left appeared"><div class="text_wrapper"><div data-message-id="' + object.id + '" data-message-time="' + object.date + '" class="' + typeMessage(object.type) + '">' + object.player + " : " + object.message + '</div></div></li>');
                      i++;
                      $('#chat_messages').animate({scrollTop: document.body.scrollHeight + 50}, 500);
                  });
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });

    });

});
