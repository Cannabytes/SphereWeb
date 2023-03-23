var socket;
var isConnect = false;

function connect() {
    socket = new WebSocket("ws://localhost:8080/ws"); // здесь необходимо заменить URL и порт на свои
    socket.onopen = function() {
        console.log("Connected to WebSocket server!");
        isConnect = true;
    };

    socket.onclose = function(event) {
        if (event.wasClean) {
            console.log("Connection closed cleanly.");
        } else {
            console.log("Connection lost.");
        }
        isConnect = false;
        console.log("Code:", event.code, "Reason:", event.reason);

        // Здесь мы используем функцию setInterval для повторного подключения к сокету каждые 5 секунд
        setTimeout(connect, 5000);
    };

    socket.onmessage = function(event) {
        console.log("Лаунчер ответил:", event.data);
    };
}
connect();

$("#client_update").click(function() {
    startUpdate()
});

$("#update").click(function() {
    getStatus()
});

$("#client_update_cancel").click(function() {
    cancelUpdate()
});

//Отправка лаунчеру команду
function sendToLauncher(obj){
    if(!isConnect){
        return
    }
    socket.send(JSON.stringify(obj));
}

//Получает информацию о статусе лаучера
function getStatus(){
  obj = { command: 'getStatus' };
  sendToLauncher(obj)
}

//Начать обновление
function startUpdate(){
    obj = { command: 'start_client_update' };
	sendToLauncher(obj)
}

//Прервать обновление
function cancelUpdate(){
  obj = { command: 'client_update_cancel' };
  sendToLauncher(obj)
}

