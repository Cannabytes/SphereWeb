isConnect = false;


   var options = {
      chart: {
        height: 335,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          startAngle: -135,
          endAngle: 225,
           hollow: {
            margin: 20,
            size: '70%',
            background: 'transparent',
            image: undefined,
            imageOffsetX: 0,
            imageOffsetY: 0,
            position: 'front',
            dropShadow: {
              enabled: true,
              top: 3,
              left: 0,
              blur: 4,
              opacity: 0.24
            }
          },
          track: {
            background: '#fff',
            strokeWidth: '67%',
            margin: 0, // margin is in pixels
            dropShadow: {
              enabled: true,
              top: -3,
              left: 0,
              blur: 4,
              opacity: 0.35
            }
          },

          dataLabels: {
            showOn: 'always',
            name: {
              offsetY: -10,
              show: false,
              color: '#fff',
              fontSize: '16px'
            },
            value: {
              formatter: function (val) {
          return val + "%";
         },
              color: '#fff',
              fontSize: '40px',
              show: true,
            }
          }
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: ['#f1076f'],
          inverseColors: false,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
     // colors: ["#ff5447"],
      series: [0],
      stroke: {
        lineCap: 'round'
      },
      labels: ['Median Ratio'],
    }

var chart = new ApexCharts(
    document.querySelector("#vacancy-status"),
    options
);

chart.render();


function connect() {
   socket = new WebSocket("ws://localhost:8080/ws");
   socket.timeout = 500;
   socket.onopen = function () {
      console.log("Успешное соединение с лаунчером")
      isConnect = true;
      direction(".")
   };


   if (socket.readyState === WebSocket.CONNECTING) {
      console.log("Соединение с лаунчером");
   } else if (socket.readyState === WebSocket.OPEN) {
      console.log("Соединение установлено");
      direction(".")
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
          console.log("Connection lost.");
      }
      socket.close();
      isConnect = false;
   };

   socket.onmessage = function (event) {
      let response = JSON.parse(event.data); // преобразование JSON-строки в объект
      console.log(response)
      if (response.command == "createProcessInfo") {
        console.log(response)
        if(response.status==1){
          percentage = Math.floor( (response.files / response.totalFiles) * 100 )
          $("#files").text(response.files);
          $("#totalFiles").text(response.totalFiles);
          options.series = [percentage];
          chart.updateOptions(options);
        }
      } else if (response.command == "event") {
         $('#eventNotification tbody').append("<tr><td>" + response.message + "</td></tr>");
         console.log(response.message)
      } else if (response.command == "eventslog") {
         if (response.events != null) {
            for (let index = 0; index < response.events.length; ++index) {
               $('#eventNotification tbody').append("<tr><td>" + response.events[index].message + "</td></tr>");
            }
         }
      } else if (response.command == "directry") {
         $("#dirfullpath").text(response.directory)
         $('#saveModalDirectory').attr('data-client-dir-path', response.directory)
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
         console.log(response.clients)
         $('#selectClient').empty();
         response.clients.forEach(function (elem) {
            var newOption = $('<option>', {
               value: elem.id,
               text: elem.dir
            });
            if (elem.defaultDir === 1) {
               newOption.prop('selected', true);
            }
            $('#selectClient').append(newOption);
         });
      } else if (response.command == "error") {
         Error(response.message)
      }

   };
}
connect()

$('input[data-toggle="modal"][data-target="#openDir"]').click(function(event) {
  var elementId = $(this).attr('id');
  $("#saveModalDirectory").attr("data-trigger-id", elementId);
  $(this).attr("data-all-path")
  console.log(elementId);
});

$("#saveModalDirectory").on("click", function(){
  writeInput = $(this).attr("data-trigger-id")
  writePath = $(this).attr("data-client-dir-path")
  $("#"+writeInput).val(writePath)
  $('#openDir').modal('hide');
});

$("#dirfullpath").on("click", ".linkdir", function () {
   allPath = $(this).attr("data-all-path");
   direction(allPath + "\\")
});

$("#dirlist").on("click", ".direction", function () {
   allPath = $(this).attr("data-all-path");
   direction(allPath)
});

$(document).on("click", "#startGenerationArchive", function () {
   startGenerationArchive()
});

$(document).on("click", "#stopGenerationArchive", function () {
   stopGenerationArchive()
});

function getChronicleDirectory() {
   obj = {
      command: 'getPathDirectoryChronicle',
      chronicle: 123,
      serverID: 50,
   };
   sendToLauncher(obj)
}

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
       return
   }
   socket.send(JSON.stringify(obj));
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

function startGenerationArchive(){
   obj = {
      command: 'startGenerationArchive',
      clientDirectory: $("#clientDirectory").val(),
      saveArchiveDirectory: $("#saveArchiveDirectory").val(),
   };
   sendToLauncher(obj)
}

function stopGenerationArchive(){
   obj = {
      command: 'stopGenerationArchive',
   };
   sendToLauncher(obj)
}