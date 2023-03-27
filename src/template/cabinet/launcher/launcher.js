var socket;
var isConnect = false;
var maxConcurrencyLoad = 5;
var lastStatusID;
var buttonShowNow = "button_loading";
//Ошибка, при которой нужно прервать выполнение скрипта, и запретить ему соединяться далее с вебсокетом
var criticalError = false;
var criticalErrorMessage;


function showTurnOnLauncher(){
   if(buttonShowNow == "showTurnOnLauncher"){
      return
   }
   buttonShowNow = "showTurnOnLauncher";
   $("#turn_on_launcher").show();
   $("#turn_on_launcher").removeClass("d-none");

   $("#button_loading").hide();
   $("#client_update").hide();
   $("#client_update_cancel").hide();
}

function showUpdateCancel(){
   if(buttonShowNow == "showUpdateCancel"){
      return
   }
   buttonShowNow = "showUpdateCancel";

   $("#client_update_cancel").show();
   $("#client_update_cancel").removeClass("d-none");

   $("#button_loading").hide();
   $("#client_update").hide();
   $("#turn_on_launcher").hide();
}

function showClientUpdate(){
   if(buttonShowNow == "showClientUpdate"){
      return
   }
   buttonShowNow = "showClientUpdate";

   $("#client_update").show();
   $("#client_update").removeClass("d-none");

   $("#button_loading").hide();
   $("#client_update_cancel").hide();
   $("#turn_on_launcher").hide();
}

function connect() {
    socket = new WebSocket("ws://localhost:8080/ws");
    socket.timeout = 1000;
    socket.onopen = function() {
        console.log("Успешное соединение с лаунчером")
        isConnect = true;
        showClientUpdate()
        getStatus()
        direction(".")
    };

    var connectInterval = setInterval(function() {
      if (socket.readyState === WebSocket.CONNECTING) {
        console.log("Соединение с лаунчером");
        showTurnOnLauncher()
      } else if (socket.readyState === WebSocket.OPEN) {
        console.log("Соединение установлено");
        showClientUpdate()
        clearInterval(connectInterval); // остановить проверку статуса соединения
      } else {
        socket.close();
        isConnect = false;
        showTurnOnLauncher()
        console.log("Ошибка соединения. Вероятно лаунчер не был запущен и его нужно установить и запустить.");
      }
    }, socket.timeout); // проверять статус каждую секунду

    //Когда пользователь обновляет страницу или уходит.
    socket.onclose = function(event) {
        if (event.wasClean) {
            console.log("Connection closed cleanly.");
        } else {
            console.log("Connection lost.");
        }
        socket.close();
        isConnect = false;
        console.log("Code:", event.code, "Reason:", event.reason);
        // Здесь мы используем функцию setInterval для повторного подключения к сокету каждые N секунд
        if(!criticalError){
//            setTimeout(connect, 2000);
        }
    };

    socket.onmessage = function(event) {
          let response = JSON.parse(event.data); // преобразование JSON-строки в объект
          console.log(response)
          if (response.command == "error"){
              socket.close(); // закрыть соединение
              clearInterval(connectInterval); // остановить проверку статуса соединения
              criticalError = true
              notify_error(response.message)
              criticalErrorMessage = response.message
              return
          }
          if (response.command == "status") {
                    if (lastStatusID != response.status && response.status == 0 ){
                       $('.chart').data('easyPieChart').update(0);
                       $('.percent').text(0);
                       resetLoadPanel()
                    }
                    if (response.status == 1 || response.status == 2 || response.status == 3)  {
                      if (response.boot == null){
                           resetLoadPanel()
                           allLoadPanel()
                           return
                      }
                      for (let index = 0; index < response.boot.length; ++index) {
                          element = response.boot[index];
                          percentage = ((response.boot[index].size / response.boot[index].sizeTotal) * 100).toFixed(2);
                          $("#download_status_filename_"+(index+1)).text(element.filename)
                          $("#download_status_load_procent_"+(index+1)).text(percentage + "%")
                          $("#download_status_load_procent_csswidth_"+(index+1)).css("width", Math.floor(percentage)+"%");

                          percentPanel = ((response.loaded / response.filesTotal) * 100).toFixed(0);
                          $('.chart').data('easyPieChart').update(percentPanel);
                          $('.percent').text((percentPanel));
                      }
                    }
                    else if (response.status == 4){
                          console.log("Загрузка завершена")
                          resetLoadPanel()
                          allLoadPanel()
                          showClientUpdate()
                    }
                    else if (response.status == 5){
                          console.log("Загрузка отменена")
                          resetLoadPanel()
                          allLoadPanel()
                          showClientUpdate()
                    }
            lastStatusID = response.status
          }
          else if (response.command == "event"){
            $('#eventNotification tbody').append("<tr><td>"+response.message+"</td></tr>");
            console.log(response.message)
          }
          else if (response.command == "eventslog"){
            if (response.events != null){
                 for (let index = 0; index < response.events.length; ++index) {
                     $('#eventNotification tbody').append("<tr><td>"+response.events[index].message+"</td></tr>");
                 }
            }
          }else if (response.command == "directry" ){
                  $("#dirfullpath").text(response.directory)
                  $("#dirlist").html("")

                  $("#dirfullpath").html(parsePathToLinks(response.directory))
                  //Если это не папка, значит показываем изображение диска
                  image = "folder"
                  if($("#dirfullpath").text()==false){
                    image = "local_disk"
                  }
                  if (response.folders != null){
                      response.folders.forEach(function(elem) {
                          $('#dirlist').append('<figure data-all-path="'+ (elem) +'" class="cursor-pointer highlight direction"><img src="/src/template/cabinet/assets/images/'+image+'.png" style="width: 124px;" alt="Folder Icon"><figcaption class="name">'+dirname(elem)+'</figcaption></figure>');
                      });
                  }else{
                    $("#dirlist").html("Тут больше нету папок.<br>Нажмите на кнопку <Сохранить> и мы сюда будем загружать клиент!")
                  }
          }

      };
}

window.location.href = 'open-launcher://run';

connect();

$("#turn_on_launcher").click(function() {
    if(criticalError){
        notify_error(criticalErrorMessage)
        return
    }
    window.location.href = 'open-launcher://run';
});


$("#client_update").click(function() {
    if(criticalError){
        notify_error(criticalErrorMessage)
        return
    }
    startUpdate()
    getStatus()
    showUpdateCancel()
});

$("#client_update_cancel").click(function() {
    cancelUpdate()
    showClientUpdate()
});

$("#dirfullpath").on("click", ".linkdir", function() {
    allPath = $(this).attr("data-all-path");
    direction(allPath+"\\")
});

$("#dirlist").on("click", ".direction", function() {
    allPath = $(this).attr("data-all-path");
    direction(allPath)
});

function direction(dirname){
    obj = { command: 'getDirectory', dirname: dirname };
    sendToLauncher(obj)
 }

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
    obj = {
        command: 'start_client_update',
        filesLink: $('#client_update').data('files-link'),
        filesPatch: $('#client_update').data('files-patch'),
    };
    sendToLauncher(obj);
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

function parsePathToLinks(path) {
  const pathParts = path.split("\\");
  let result = '<i data-all-path="." aria-hidden="true" class="fa fa-home cursor-pointer linkdir"></i> ';
  let currentPath = "";

  for (let i = 0; i < pathParts.length; i++) {
    currentPath += pathParts[i];
    result += `<span data-all-path="${currentPath}" class="cursor-pointer linkdir">${pathParts[i]}</span>\\`;
    currentPath += "\\";
  }
  return result.replace(/\\$/g, '');
}


function dirname(path) {
  const separator = path.includes("/") ? "/" : "\\";
  const parts = path.split(separator).filter(part => part !== "");
  return parts[parts.length - 1];
  }
