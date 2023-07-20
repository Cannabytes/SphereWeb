var socket;
var isConnect = false;
var maxConcurrencyLoad = 5;
var lastStatusID;
var buttonShowNow = "button_loading";
//Ошибка, при которой нужно прервать выполнение скрипта, и запретить ему соединяться далее с вебсокетом
var criticalError = false;
var criticalErrorMessage;
var currentConnectAttempts = 0; // Текущее количество попыток соединения
var swalWithBootstrapButtons = null;


//ID сервера
var serverID = parseInt($('meta[name="server_default"]').attr('content'), 10);
var chronicle = $('meta[name="server_chronicle"]').attr('content')


document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('beforeunload', function(event) {
        // Ваш код обработки события beforeunload
        return  alert("TTTEST")
        var confirmationMessage = 'Вы уверены, что хотите обновить страницу?';
        event.returnValue = confirmationMessage;
        return confirmationMessage;
    });
});


// window.addEventListener('beforeunload', function (event) {
//     // Здесь можно выполнить действия перед обновлением
//     alert("TEE")
//     localStorage.setItem('browserReloaded', 'true');
// });



//Если лаунчер работает: кнопки закрываем или показываем
var fasfid = -999;

function launcherButtonIsWork() {
    if (fasfid === lastStatusID) {
        return
    }
    fasfid = lastStatusID
    if (lastStatusID == 0 || lastStatusID == 4 || lastStatusID == 5 || lastStatusID == 6) {
        $("#client_update_cancel").hide();
        $(".startL2").show();
        $(".startL2MenuButton").show();
        $(".startL2").removeClass("d-none");
        return
    }
    $(".startL2").hide();
    $(".startL2MenuButton").hide();
    $("#client_update_cancel").show();
    $("#client_update_cancel").removeClass("d-none");
}


function connect() {
    var connectionTimeout = 1000; // Время ожидания в миллисекундах
    var connectInterval = null;
    var reconnectTimeout = 2000; // Задержка перед повторной попыткой соединения

    function establishConnection() {
        socket = new WebSocket("ws://localhost:17580/ws");

        var connectionTimer = setTimeout(function () {
            socket.close();
            isConnect = false;
            // Повторная попытка соединения, если не достигнуто максимальное количество попыток
            currentConnectAttempts++;
            console.log("Повторная попытка соединения: №", currentConnectAttempts);
            if(currentConnectAttempts===1){
                window.location.href = 'web-launcher://run';
            }
            establishConnection();
        }, connectionTimeout);

        socket.addEventListener('open', () => {
            clearTimeout(connectionTimer); // Очистка таймера
            console.log("Успешное соединение с лаунчером");
            isConnect = true;
            setlang()
            downloadAndRunLauncher_hide()
            getStatus();
            getVersionLauncher();
            getChronicleDirectory();
            direction(".");
            getEvents();
            getAllConfig();
        });

        socket.onclose = function (event) {
            if (event.wasClean) {
                console.log("Connection closed cleanly.");
            } else {
                console.log("Connection lost.", isConnect);
            }
            socket.close();
            if (isConnect === true) {
                isConnect = false;
                downloadAndRunLauncher()
                setTimeout(establishConnection, reconnectTimeout); // Повторная попытка соединения с задержкой
            }
            isConnect = false;
        };

        socket.addEventListener('message', (event) => {
            responseMessage(event);
        });

    }

    establishConnection();

    // Проверка статуса соединения каждые 500 миллисекунд
    connectInterval = setInterval(function () {
        if (socket.readyState === WebSocket.OPEN) {
            console.log("Соединение установлено");
            downloadAndRunLauncher_hide()
            clearInterval(connectInterval); // Остановить проверку статуса соединения
        }
    }, 500);
}

connect();




function responseMessage(event) {
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
            if (response.status == 0) {
            }

            //Если приходит запрос, уведомление что идет сравнение файлов
            if (response.status == 2) {
                percentPanel = ((response.loaded / response.filesTotal) * 100).toFixed(0);
                $('.chart').data('easyPieChart').update(percentPanel);
                $('.percent').text(percentPanel);
                $('#main_panel_load').attr('data-original-title', checked_files + " " + response.loaded + " / " + response.filesTotal + " (" + ((response.loaded / response.filesTotal) * 100).toFixed(2) + "%)")
            }
            //Если приходит запрос, уведомление что идет загрузка файлов
            if (response.status == 3) {
                if (response.boot == null) {
                    resetLoadPanel()
                    allLoadPanel()
                    return
                }

                $('#main_panel_load').attr('data-original-title', loadercount + " " + response.loaded + " / " + response.filesTotal + " (" + ((response.loaded / response.filesTotal) * 100).toFixed(2) + "%)")

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
        } else if (response.status === 4) {
            console.log("Загрузка завершена")
            resetLoadPanel()
            allLoadPanel()
        } else if (response.status === 5) {
            console.log("Загрузка отменена")
            resetLoadPanel()
        }
    } else if (response.command === "event") {
        var date = new Date(response.time);
        var time = date.toLocaleTimeString();
        let color = "";
        if (response.level === 0){
            color = "light";
        }else if (response.level === 1){
            color = "primary";
        }else if (response.level === 2){
            color = "secondary";
        } else if (response.level === 3){
            color = "danger";
        } else if (response.level === 4){
            color = "info";
        } else if (response.level === 5){
            color = "success";
        }
        $('#eventNotification tbody').prepend("<tr><td class='text-" + color +"'>" + time + " - " + response.message + "</td></tr>");
        console.log(response.message)
    } else if (response.command === "eventslog") {
        if (response.events != null) {
            for (let index = 0; index < response.events.length; ++index) {
                var date = new Date(response.events[index].time);
                var time = date.toLocaleTimeString();
                $('#eventNotification tbody').prepend("<tr> <td>" + time + " - " + response.events[index].message + "</td></tr>");
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
                $('#dirlist').append('<figure data-all-path="' + (elem) + '" class="cursor-pointer highlight direction"><img src="/src/template/cabinet/assets/images/' + image + '.png" style="width: 80px;" alt="Folder Icon"><figcaption class="name">' + dirname(elem) + '</figcaption></figure>');
            });
        } else {
            $("#dirlist").html("Тут больше нету папок.<br>Нажмите на кнопку <Сохранить> и мы сюда будем загружать клиент!")
        }
    } else if (response.command == "saveDirectory") {
        if (response.error == null) {
            notify_success("Директория была сохранена")
        }
    } else if (response.command == "getChronicleDirectory") {
        console.log(response.clients)
        $('#selectClient').empty();
        if (response.clients !== null) {
            var clients = JSON.parse(response.clients);
            if (Array.isArray(clients)) {
                clients.forEach(function (elem) {
                    var newOption = $('<option>', {
                        value: elem.id, text: elem.dir
                    });
                    if (elem.is_default === 1) {
                        newOption.prop('selected', true);
                    }
                    $('#selectClient').append(newOption);
                });
            } else {
                // Действия, которые нужно выполнить, если clients не является массивом
                // Например, добавление варианта по умолчанию или отображение сообщения об ошибке данных
            }
        } else {
            // Действия, которые нужно выполнить, если response.clients равно null
            // Например, добавление варианта по умолчанию или отображение сообщения об отсутствии данных
        }
    } else if (response.command == "getAllConfig") {
        $("#isClientFilesArchive").prop("checked", response.isClientFilesArchive ? true : false);
        $("#autoStartLauncher").prop("checked", response.autoStartLauncher ? true : false);
        $("#autoUpdateLauncher").prop("checked", response.autoUpdateLauncher ? true : false);
    } else if (response.command == "getVersionLauncher") {
        $(".userLauncherVersion").text(response.version)
        $(".actualLauncherVersion").text(response.actualVersion)
        if (response.actualVersion > response.version){
            $("#needUpdateMsg").removeClass("d-none");
        }
    } else if (response.command == "needClientUpdate") {

        Swal.fire({
            title: need_update,
            text: "",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: no_need_update,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: start_update
        }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire('', 'Начинается загрузка патча', 'success')
                //
                if (criticalError) {
                    notify_error(criticalErrorMessage)
                    return
                }
                if ($("#selectClient").val() == "") {
                    notify_error(need_set_dir_client)
                } else {
                    startUpdate()
                    getStatus()
                }
            }
        })

    } else if (response.command == "error") {
        Error(response.message)
    }
}


function downloadAndRunLauncher() {
    $("#showErrorStartLauncher").removeClass("d-none");
    swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success', cancelButton: 'btn btn-info'
        }, buttonsStyling: true
    })
    swalWithBootstrapButtons.fire({
        title: bad_title,
        html: bad_html,
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: bad_confirmButtonText,
        cancelButtonText: bad_cancelButtonText,
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(bad_swalWithBootstrapButtonsTitle, bad_swalWithBootstrapButtonsContent, 'success')
        } else if (/* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel) {
            window.location.href = 'web-launcher://run';
            swalWithBootstrapButtons.fire('Запустите', 'Если у Вас нет лаунчера.<br>Скачайте: <a href="https://cannabytes.github.io">https://cannabytes.github.io</a>', 'info')
        }
    })
}

function downloadAndRunLauncher_hide() {
    $("#showErrorStartLauncher").addClass("d-none");
    if (swalWithBootstrapButtons!==null){
        console.log(swalWithBootstrapButtons)
        swalWithBootstrapButtons.close();
    }
}



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
    if ($("#selectClient").val() == "") {
        notify_error("{{phrase(424)}}")
    } else {
        startUpdate()
        getStatus()
    }
});

$("#client_update").click(function () {
    if (criticalError) {
        notify_error(criticalErrorMessage)
        return
    }
    if ($("#selectClient").val() == "") {
        notify_error("{{phrase(424)}}")
    } else {
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
        command: 'removeClientDir', id: $("#selectClient").val(), chronicle: chronicle, serverID: serverID,
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
    getChronicleDirectory()
});

function direction(dirname) {
    obj = {
        command: 'getDirectory', dirname: dirname
    };
    sendToLauncher(obj)
}

function setlang() {
    obj = {
        command: 'userLang',
        lang: userLang
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
        id: parseInt($(this).val()),
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

$("#addClientDirectoryButton").on("click", function (event) {
    if (isConnect == false) {
        downloadAndRunLauncher();
    } else {
        $("#addClientDirectory").modal('show');
    }
});

//Команда на обновление лаунчера
$(".launcherUpdate").on("click", function (){
    let obj = {
        command: 'launcherUpdate',
    };
    sendToLauncher(obj);
});

$(".startL2").on("click", function (event) {
    if ($("#selectClient").val() === null) {
        $("#addClientDirectory").modal('show');
        return
    }
    obj = {
        command: 'startGame',
        application: $(this).attr("data-l2app"),
        args: $(this).attr("data-args"),
        dirID: parseInt($("#selectClient").val()), //       uid: "anygame.eu.org",
        uid: window.location.host,

    }
    socket.send(JSON.stringify(obj));
});

$("#selectClient").on("click", function (event) {
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
        command: 'start_client_update', uid: window.location.host, dirID: parseInt($("#selectClient").val()),
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
    let dirFoRefresh = path.replace(/\\$/, '');
    if(dirFoRefresh===""){
        dirFoRefresh = ".";
    }
    let result = '<i data-all-path="." aria-hidden="true" class="fa fa-home linkdir"></i> ';
    result += `<i data-all-path="${dirFoRefresh}" aria-hidden="true" class="fa fa-refresh linkdir"></i> `;
    let currentPath = "";

    for (let i = 0; i < pathParts.length; i++) {
        currentPath += pathParts[i];
        result += `<span data-all-path="${currentPath}" class="linkdir">${pathParts[i]}</span>\\`;
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
        icon: 'error', title: 'Проблемка', html: msg, //      footer: '<a href="">Why do I have this issue?</a>'
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
$(document).ready(function () {

    $("#isClientFilesArchive").on("click", function (event) {
        if (isConnect == false) {
            downloadAndRunLauncher();
        }
        obj = {
            command: 'setConfig', param: 'isClientFilesArchive', value: $("#isClientFilesArchive").prop("checked"),
        };
        sendToLauncher(obj)
    });

    $("#autoStartLauncher").on("click", function (event) {
        if (isConnect == false) {
            downloadAndRunLauncher();
        }
        obj = {
            command: 'setConfig', param: 'autoStartLauncher', value: $("#autoStartLauncher").prop("checked"),
        };
        sendToLauncher(obj)
    });

    $("#autoUpdateLauncher").on("click", function (event) {
        if (isConnect == false) {
            downloadAndRunLauncher();
        }
        obj = {
            command: 'setConfig', param: 'autoUpdateLauncher', value: $("#autoUpdateLauncher").prop("checked"),
        };
        sendToLauncher(obj)
    });

});