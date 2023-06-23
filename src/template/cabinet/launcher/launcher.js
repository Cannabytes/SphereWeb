var socket;
var isConnect = false;
var maxConcurrencyLoad = 5;
var lastStatusID;
var buttonShowNow = "button_loading";
//Ошибка, при которой нужно прервать выполнение скрипта, и запретить ему соединяться далее с вебсокетом
var criticalError = false;
var criticalErrorMessage;


//ID сервера
var serverID = parseInt($('meta[name="server_default"]').attr('content'), 10);
var chronicle = $('meta[name="server_chronicle"]').attr('content')

var filesLink = $('#client_update').data('files-link')
var filesPatch = $('#client_update').data('files-patch')


//Если лаунчер работает: кнопки закрываем или показываем
var fasfid = -999;
function launcherButtonIsWork(){
    if (fasfid === lastStatusID){
        return
    }
    fasfid = lastStatusID
    if(lastStatusID == 0 || lastStatusID == 4 || lastStatusID == 5 || lastStatusID == 6 ){
        $("#client_update_cancel").hide();
        $(".startL2").show();
        $(".startL2").removeClass("d-none");
        return
    }
    $(".startL2").hide();
    $("#client_update_cancel").show();
    $("#client_update_cancel").removeClass("d-none");
}


function connect() {
   socket = new WebSocket("ws://localhost:17580/ws");
   socket.timeout = 500;
   socket.onopen = function () {
      console.log("Успешное соединение с лаунчером")
      isConnect = true;
      getStatus()
      getVersionLauncher()
      getChronicleDirectory()
      direction(".")
      getEvents()
      getAllConfig()
   };

    if (socket.readyState === WebSocket.CONNECTING) {
      console.log("Соединение с лаунчером");
   } else if (socket.readyState === WebSocket.OPEN) {
      console.log("Соединение установлено");
      clearInterval(connectInterval); // остановить проверку статуса соединения
   } else {
      socket.close();
      isConnect = false;
      console.log("Ошибка соединения. Вероятно лаунчер не был запущен и его нужно установить и запустить.");
   }

   //Когда пользователь обновляет страницу или уходит.
   socket.onclose = function (event) {
      if (event.wasClean) {
         console.log("Connection closed cleanly.");
      } else {
         downloadAndRunLauncher()
         console.log("Connection lost.");
      }
      socket.close();
      isConnect = false;
   };

   socket.onmessage = function (event) {
      let response = JSON.parse(event.data); // преобразование JSON-строки в объект
      console.log(response)

      if (response.command == "status") {
         lastStatusID = response.status
         launcherButtonIsWork()

         if (lastStatusID != response.status && response.status == 0) {
            $('.chart').data('easyPieChart').update(0);
            $('.percent').text(0);
            resetLoadPanel()
         }
         //Если идет загрузка списка, если идет сравнение файлов, если загрузка файлов
         if (response.status == 0 || response.status == 1 || response.status == 2 || response.status == 3) {
                if( response.status == 0 ){
                }

                //Если приходит запрос, уведомление что идет сравнение файлов
                if(response.status == 2){
                    percentPanel = ((response.loaded / response.filesTotal) * 100).toFixed(0);
                    $('.chart').data('easyPieChart').update(percentPanel);
                    $('.percent').text(percentPanel);
                    $('#main_panel_load').attr('data-original-title', "Проверено файлов " + response.loaded + " / " + response.filesTotal + " (" + ( (response.loaded / response.filesTotal) * 100).toFixed(2) + "%)")
                }
                //Если приходит запрос, уведомление что идет загрузка файлов
                if (response.status == 3) {
                   if (response.boot == null) {
                      resetLoadPanel()
                      allLoadPanel()
                      return
                   }

                   $('#main_panel_load').attr('data-original-title', "Загружено " + response.loaded + " / " + response.filesTotal + " (" + ( (response.loaded / response.filesTotal) * 100).toFixed(2) + "%)")

                   for (let index = 0; index < response.boot.length; ++index) {
                      element = response.boot[index];
                      percentage = ((response.boot[index].size / response.boot[index].sizeTotal) * 100).toFixed(2);

                      $("#download_status_filename_" + (index + 1)).attr('data-original-title', formatBytes(element.sizeTotal));

                      $("#download_status_filename_" + (index + 1)).text(element.filename)
                      $("#download_status_load_procent_" + (index + 1)).text(percentage + "%")
                      $("#download_status_load_procent_csswidth_" + (index + 1)).css("width", Math.floor(percentage) + "%");

                      percentPanel = Math.floor((response.loaded / response.filesTotal) * 100).toFixed(0);
                      $('.chart').data('easyPieChart').update(percentPanel);
                      $('.percent').text((percentPanel));
                   }
                }
         } else if (response.status == 4) {
            console.log("Загрузка завершена")
            resetLoadPanel()
            allLoadPanel()
         } else if (response.status == 5) {
            console.log("Загрузка отменена")
            resetLoadPanel()
         }
      } else if (response.command == "event") {
          var date = new Date(response.time);
          var time = date.toLocaleTimeString();
          $('#eventNotification tbody').prepend("<tr><td>" + time + " - " + response.message + "</td></tr>");
         console.log(response.message)
      } else if (response.command == "eventslog") {
         if (response.events != null) {
            for (let index = 0; index < response.events.length; ++index) {
                var date = new Date(response.events[index].time);
                var time = date.toLocaleTimeString();
               $('#eventNotification tbody').prepend("<tr><td>" + time + " - " + response.events[index].message + "</td></tr>");
            }
         }
      } else if (response.command == "directry") {
         $("#dirfullpath").text(response.directory)
         $('.saveDirClient').attr('data-client-dir-path', response.directory)
         $("#dirlist").html("")

         $("#dirfullpath").html(parsePathToLinks(response.directory))
         //Если это не папка, значит показываем изображение диска
         image = "folder"
         if ($("#dirfullpath").text() == false) {
            image = "local_disk"
         }
         if (response.folders != null) {
            response.folders.forEach(function (elem) {
               $('#dirlist').append('<figure data-all-path="' + (elem) + '" class="cursor-pointer highlight direction"><img src="/src/template/cabinet/assets/images/' + image + '.png" style="width: 124px;" alt="Folder Icon"><figcaption class="name">' + dirname(elem) + '</figcaption></figure>');
            });
         } else {
            $("#dirlist").html("Тут больше нету папок.<br>Нажмите на кнопку <Сохранить> и мы сюда будем загружать клиент!")
         }
      } else if (response.command == "saveDirectory") {
         if (response.error == null) {
            notify_success("Директория была сохранена")
         }
      } else if (response.command == "getChronicleDirectory") {
         if (response.clients == null) {
            return
         }
           $('#selectClient').empty();
            var clients = JSON.parse(response.clients);
            clients.client.forEach(function(elem) {
              var newOption = $('<option>', {
                value: elem.dir,
                text: elem.dir
              });

              if (elem.dir === response.default) {
                newOption.prop('selected', true);
              }

              $('#selectClient').append(newOption);
            });

      } else if(response.command == "getAllConfig"){
            $("#isClientFilesArchive").prop("checked", response.isClientFilesArchive ? true : false);
            $("#autoStartLauncher").prop("checked", response.autoStartLauncher ? true : false);
            $("#autoUpdateLauncher").prop("checked", response.autoUpdateLauncher ? true : false);
      } else if (response.command == "getVersionLauncher"){
            $(".userLauncherVersion").text(response.version)
            $(".actualLauncherVersion").text(response.actualVersion)
      }
      else if (response.command == "needClientUpdate") {

              Swal.fire({
                title: 'Необходимо обновление',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Нет',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Начать обновление'
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    '',
                    'Начинается загрузка патча',
                    'success'
                  )
                  //
                     if (criticalError) {
                        notify_error(criticalErrorMessage)
                        return
                     }
                     if($("#selectClient").val()==""){
                      notify_error("Не установлена папка для обновления клиента")
                     }else{
                        startUpdate()
                        getStatus()
                      }
                }
              })

      }
      else if (response.command == "error") {
         Error(response.message)
      }
   };
}

function downloadAndRunLauncher() {
   $("#showErrorStartLauncher").removeClass("d-none");

   const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
         confirmButton: 'btn btn-success',
         cancelButton: 'btn btn-info'
      },
      buttonsStyling: true
   })

   swalWithBootstrapButtons.fire({
      title: 'Не включен лаунчер',
      html: 'Единажды скаченный, подойдет для всех серверов на движке <b>SphereWeb</b>.',
      icon: 'error',
      showCancelButton: true,
      confirmButtonText: 'Скачать лаунчер',
      cancelButtonText: 'Запустить',
      reverseButtons: true
   }).then((result) => {
      if (result.isConfirmed) {
         swalWithBootstrapButtons.fire(
            'Ссылки для загрузки лаунчера',
            'Зекрало №1<br>Зекрало №2<br>',
            'success'
         )
      } else if (
         /* Read more about handling dismissals below */
         result.dismiss === Swal.DismissReason.cancel
      ) {
         window.location.href = 'web-launcher://run';
         swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
         )
      }
   })


}
//window.location.href = 'web-launcher://run';

connect();

$("#turn_on_launcher").click(function () {
   if (criticalError) {
      notify_error(criticalErrorMessage)
      return
   }
});


$(".client_update").click(function () {
   if (criticalError) {
      notify_error(criticalErrorMessage)
      return
   }
   if($("#selectClient").val()==""){
    notify_error("Не установлена папка для обновления клиента")
   }else{
      startUpdate()
      getStatus()
    }
});

$("#client_update").click(function () {
   if (criticalError) {
      notify_error(criticalErrorMessage)
      return
   }
   if($("#selectClient").val()==""){
    notify_error("Не установлена папка для обновления клиента")
   }else{
      startUpdate()
      getStatus()
    }
});

$(document).on('click', '#client_update_cancel', function () {
   cancelUpdate()
});

$("#dirfullpath").on("click", ".linkdir", function () {
   allPath = $(this).attr("data-all-path");
   direction(allPath + "\\")
});

$("#dirlist").on("click", ".direction", function () {
   allPath = $(this).attr("data-all-path");
   direction(allPath)
});

$(document).on('click', '#removeClientDir', function () {
   obj = {
      command: 'removeClientDir',
      dir: $("#selectClient").val(),
      chronicle: chronicle,
      serverID: serverID,
   };
   sendToLauncher(obj)
   var selectClientValue = $("#selectClient").val();
   var replacedValue = selectClientValue.replace(/\\/g, '\\\\');
   $("#selectClient option[value='" + replacedValue + "']").remove();
});

$(document).on('click', '.saveDirClient', function () {
   $("#addClientDirectory").modal("hide");
   obj = {
      command: 'saveDirectoryClient',
      dir: $(this).attr('data-client-dir-path'),
      chronicle: chronicle,
      domain: window.location.hostname,
      serverID: serverID,
   };
   sendToLauncher(obj)

    var optionValue = $(this).attr('data-client-dir-path');
    var optionText = $(this).attr('data-client-dir-path');

    $("#selectClient").append($('<option>', {
      value: optionValue,
      text: optionText
    }).prop('selected', true));

});

function direction(dirname) {
   obj = {
      command: 'getDirectory',
      dirname: dirname
   };
   sendToLauncher(obj)
}

//Отправка лаунчеру команду
function sendToLauncher(obj) {
   if (!isConnect) {
      downloadAndRunLauncher()
      return
   }
   socket.send(JSON.stringify(obj));
}

//Получает информацию о статусе лаучера
function getStatus() {
   obj = {
      command: 'getStatus'
   };
   sendToLauncher(obj)
}

//Получить версию лаунчера
function getVersionLauncher() {
   obj = {
      command: 'getVersionLauncher'
   };
   sendToLauncher(obj)
}

function getChronicleDirectory() {
   obj = {
      command: 'getPathDirectoryChronicle',
      chronicle: chronicle,
      domain: window.location.hostname,
      serverID: parseInt($('meta[name="server_default"]').attr('content')),
   };
   sendToLauncher(obj)
}
function getEvents() {
   obj = {
      command: 'getEvents',
   };
   sendToLauncher(obj)
}

//Если пользователь выбрал другую дефолтную папку
$('#selectClient').change(function () {
   obj = {
      command: 'setDefaultServer',
      chronicle: chronicle,
      domain: window.location.hostname,
      serverID: parseInt($('meta[name="server_default"]').attr('content')),
      dir: $(this).val(),
   }
   sendToLauncher(obj)
});


$('#addClientDirectory').on('show.bs.modal', function (event) {
  if (isConnect == false) {
    downloadAndRunLauncher();
    event.preventDefault(); // отменяем открытие модального окна
  } else {
    $(this).modal('show'); // открываем модальное окно
  }
});

$("#addClientDirectoryButton").on("click", function(event){
       if (isConnect == false) {
         downloadAndRunLauncher();
       } else {
         $("#addClientDirectory").modal('show');
       }
});


$(".startL2").on("click", function(event){
    if($("#selectClient").val()===null){
        $("#addClientDirectory").modal('show');
        return
    }
    obj = {
       command: 'startGame',
       application: $(this).attr("data-l2app"),
       args: $(this).attr("data-args"),
       dir: $("#selectClient").val(),
       uid: "anygame.eu.org",
       //      uid: window.location.host,

    }
    socket.send(JSON.stringify(obj));
});

$("#selectClient").on("click", function(event){
  if (isConnect == false) {
    downloadAndRunLauncher();
  }
});

$('#addClientDirectory').on('hidden.bs.modal', function (event) {
   $("#addClientDirectory").modal('hide');
});


//Получение конфигурации
function getAllConfig() {
   obj = {
      command: 'getAllConfig',
   };
   sendToLauncher(obj);
}

//Начать обновление
function startUpdate() {
   obj = {
      command: 'start_client_update',
      uid: "anygame.eu.org",
//      uid: window.location.host,
      updateDirID: $("#selectClient").val(),
   };
   sendToLauncher(obj);
}

//Прервать обновление
function cancelUpdate() {
   obj = {
      command: 'client_update_cancel'
   };
   sendToLauncher(obj)
}

function resetLoadPanel() {
   for (let index = 1; index < maxConcurrencyLoad + 1; index++) {
      $("#download_status_filename_" + index).attr('data-original-title', formatBytes(0))
      $("#download_status_filename_" + index).text("Нет")
      $("#download_status_load_procent_" + index).text("0%")
      $("#download_status_load_procent_csswidth_" + index).css("width", "0%");
   }
}

function allLoadPanel() {
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


//Если случяиться ошибка, выведем её пользователю
function Error(msg) {
   Swal.fire({
      icon: 'error',
      title: 'Проблемка',
      html: msg,
      //      footer: '<a href="">Why do I have this issue?</a>'
   })
}

//Байты в другие форматы
function formatBytes(bytes) {
  if (bytes < 1024) {
    return bytes + " B";
  } else if (bytes < 1024 * 1024) {
    return (bytes / 1024).toFixed(2) + " KB";
  } else if (bytes < 1024 * 1024 * 1024) {
    return (bytes / (1024 * 1024)).toFixed(2) + " MB";
  } else if (bytes < 1024 * 1024 * 1024 * 1024) {
    return (bytes / (1024 * 1024 * 1024)).toFixed(2) + " GB";
  } else {
    return (bytes / (1024 * 1024 * 1024 * 1024)).toFixed(2) + " TB";
  }
}

/*
 * Изменение настроек (конфигураций)
 *
*/
$(document).ready(function() {

    $("#isClientFilesArchive").on("click", function(event){
      if (isConnect == false) {
        downloadAndRunLauncher();
      }
      obj = {
         command: 'setConfig',
         param: 'isClientFilesArchive',
         value: $("#isClientFilesArchive").prop("checked"),
      };
      sendToLauncher(obj)
    });

    $("#autoStartLauncher").on("click", function(event){
      if (isConnect == false) {
        downloadAndRunLauncher();
      }
      obj = {
         command: 'setConfig',
         param: 'autoStartLauncher',
         value: $("#autoStartLauncher").prop("checked"),
      };
      sendToLauncher(obj)
    });

    $("#autoUpdateLauncher").on("click", function(event){
      if (isConnect == false) {
        downloadAndRunLauncher();
      }
      obj = {
         command: 'setConfig',
         param: 'autoUpdateLauncher',
         value: $("#autoUpdateLauncher").prop("checked"),
      };
      sendToLauncher(obj)
    });

});