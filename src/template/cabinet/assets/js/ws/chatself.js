var last_message_id = 0;
var player_message = "";
var text_message = "";
var stopChat = false;
var serverID = parseInt($('meta[name="server_default"]').attr('content'), 10);

if (typeof chat_admin_password === 'undefined'){
    var chat_admin_password = "";
}


var intervalId;

function connect() {
intervalId = setInterval(function() {
      if (stopChat==true){
        clearInterval(intervalId);
        return;
      }
      $.ajax({
        url: "/chat",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify({
          last_message_id: last_message_id,
          server_id: serverID,
        }),
        success: function(response) {
          var dataArray = JSON.parse(response);
          var maxId = dataArray.reduce(function(prev, curr) {
            return (curr.id > prev) ? curr.id : prev;
          }, 0);
          if(maxId <= last_message_id){
            return;
          }
          last_message_id = maxId
          let i = maxId+1;
          dataArray.forEach(function(object) {
            $("#chat_messages").append('<li data-count="' + i + '" class="message left appeared"><div class="text_wrapper"><div data-message-id="' + object.id + '" data-message-time="' + object.date + '" class="' + typeMessage(object.type) + '">' + object.player + " : " + object.message + '</div></div></li>');
            i++;
          });
          $('#chat_messages').animate({scrollTop: $('#chat_messages')[0].scrollHeight}, 500);
        },
        error: function(xhr, status, error) {
          console.log("Произошла ошибка при отправке запроса!");
        }
      });
    }, 1200);
}

function typeMessage(msgType){
    switch (msgType) {
        case 1: return "ALL";
        case 2: return "TRADE";
        case 3: return "SHOUT";
        case 4: return "CLAN";
        case 5: return "ALLIANCE";
        case 6: return "HERO_VOICE";
        case 7: return "PETITION_PLAYER";
        case 8: return "TELL";
        case 9: return "PARTY";
    }
    return "OTHER";
}

function clearChat() {
    $("#chat_messages").html("");
}

connect();