var socket;
var isConnect = false;
var maxConcurrencyLoad = 2;

function connect() {
    socket = new WebSocket("ws://localhost:8080/ws"); // здесь необходимо заменить URL и порт на свои
    socket.onopen = function() {
        isConnect = true;
        getStatus()
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
          let response = JSON.parse(event.data); // преобразование JSON-строки в объект
//          console.log(response); // вывод значения свойства "status"
          if (response.status == 1 || response.status == 2 || response.status == 3)  {
            getStatus()
            for (let index = 0; index < response.boot.length; ++index) {
                element = response.boot[index];
                percentage = ((response.boot[index].size / response.boot[index].sizeTotal) * 100).toFixed(2);
                $("#download_status_filename_"+index).text(element.filename)
                $("#download_status_load_procent_"+index).text(percentage + "%")
                $("#download_status_load_procent_csswidth_"+index).css("width", Math.floor(percentage)+"%");

                percentPanel = ((response.loaded / response.filesTotal) * 100).toFixed(0);
                console.log(percentPanel)
                $('.chart').data('easyPieChart').update((percentPanel));
                $('.percent').text((percentPanel));
            }
          }else if (response.status == 4){
                resetLoadPanel()
                allLoadPanel()
          }
      };
}

connect();



$("#client_update").click(function() {
    startUpdate()
    getStatus()
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

function resetLoadPanel(){
    for (let index = 1; index < maxConcurrencyLoad+1; index++) {
        $("#download_status_filename_"+index).text("Нет")
        $("#download_status_load_procent_"+index).text("0%")
        $("#download_status_load_procent_csswidth_"+index).css("width", "0%");
    }
}

function allLoadPanel(){
        $('.chart').data('easyPieChart').update(100);
        $('.percent').text(100);
}
