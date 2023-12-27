var socket;
var isCreatedPatch = false;
var totalFiles = -1;
initWebSocket();

var isConnectSocket = false;

// Создаем функцию для инициализации соединения с сервером
function initWebSocket() {
    const serverUrl = 'ws://localhost:17580/ws';
    socket = new WebSocket(serverUrl);
    function connect() {
        socket = new WebSocket(serverUrl);
        socket.onopen = () => {
            console.log('Соединение установлено по WebSocket');
            isConnectSocket = true;
            isConnectSocketed();
            firstRequest()
        };
        socket.onmessage = (event) => {
            console.log(event)
            responseMessage(event)
        };
        socket.onclose = (event) => {
            console.log('Соединение закрыто', event);
            isDisConnectSocketed();
            setTimeout(connect, 1000);
        };
        socket.onerror = (error) => {
            console.error('Ошибка веб-сокета:', error);
        };
    }
    connect();
    return socket;
}


function isConnectSocketed() {
    $("#block_start_launcher").hide()
    $("#loaderConnect").hide();
    $('#launcherConnectStatusName').removeClass('text-danger')
    $('#launcherConnectStatusName').addClass('text-white')
    $("#launcherConnectStatusName").text("word_launcher");
}

function isDisConnectSocketed() {
    $("#block_start_launcher").show();
    $("#loaderConnect").show();
    $('#launcherConnectStatusName').removeClass('text-white')
    $('#launcherConnectStatusName').addClass('text-danger')
    $("#launcherConnectStatusName").text("word_connect");
}


function firstRequest(){
    sendToLauncher({
        command: 'getDirectory', dirname: ".",
    });
    sendToLauncher({
        command: 'getStatus'
    });
}

$(document).on('click', '#startCreatePatch', function () {
    if(!isConnectSocket){
        errorMessage("Лаунчер не запущен")
        return
    }
    sendToLauncher({
        command: 'startGenerationArchive',
        'clientDirectory': $("#clientDirectory").val(),
        'saveArchiveDirectory': $("#saveArchiveDirectory").val(),
    })
});

$(document).on('click', '#stopGenerationArchive', function () {
    if(!isConnectSocket){
        errorMessage("Лаунчер не запущен")
        return
    }
    sendToLauncher({
        command: 'stopGenerationArchive',
    })
});

function sendToLauncher(obj) {
    socket.send(JSON.stringify(obj));
}

function responseMessage(event){
    let response = JSON.parse(event.data);
    RequestCreateProcessInfo(response);
    ResponseDirection(response);
    ResponseError(response);
}

function RequestCreateProcessInfo(response) {
    if (response.command !== "createProcessInfo") return;
    if(isCreatedPatch===false){
        isCreatedPatch = true;
        totalFiles = response.totalFiles;
        hideShowButtonLoad()
    }
    if(response.files === totalFiles){
        isCreatedPatch = false;
        hideShowButtonLoad()
    }
    percentage = Math.floor( (response.files / response.totalFiles) * 100 )
    $("#styleLoad").css("width", percentage + "%");
    $("#procentLoad").text(percentage + "%");
}

function hideShowButtonLoad(){
    if(isCreatedPatch){
        $("#startCreatePatch").addClass("d-none");
        $("#stopGenerationArchive").removeClass("d-none");
    }else{
        $("#stopGenerationArchive").addClass("d-none");
        $("#startCreatePatch").removeClass("d-none");
    }
}

function ResponseDirection(response) {
    if (response.command !== "directry") return;
    $("#dirfullpath").text(response.directory)
    $('.saveDirClient').attr('data-client-dir-path', response.directory)
    $("#dirlist").html("")
    $("#dirfullpath").html(parsePathToLinks(response.directory))
    image = "folder"
    if (response.directory === "") {
        image = "local_disk"
    }
    if (response.folders != null) {
        response.folders.forEach(function (elem) {
            $('#dirlist').append('<figure data-all-path="' + (elem) + '" class="cursor-pointer highlight direction"><img src="/src/component/plugins/launcher/tpl/img/' + image + '.png" style="width: 80px;" alt="Folder Icon"><figcaption class="name">' + dirname(elem) + '</figcaption></figure>');
        });
    } else {
        $("#dirlist").html(word_not_dir)
    }
}

function errorMessage(message) {
    Codebase.helpers('jq-notify', {
        align: 'center',
        from: 'top',
        type: 'danger',
        icon: 'fa fa-times me-2',
        message: message
    });
}

function dirname(path) {
    const separator = path.includes("/") ? "/" : "\\";
    const parts = path.split(separator).filter(part => part !== "");
    return parts[parts.length - 1];
}

function parsePathToLinks(path) {
    const pathParts = path.split("\\");
    let dirFoRefresh = path.replace(/\\$/, '');
    if (dirFoRefresh === "") {
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

function direction(dirname) {
    let obj = {
        command: 'getDirectory', dirname: dirname
    };
    sendToLauncher(obj)
}

function ResponseError(response) {
    if (response.command !== "error") return;
    errorMessage(response.message)
}

$("#dirfullpath").on("click", ".linkdir", function () {
    allPath = $(this).attr("data-all-path");
    direction(allPath + "\\")
});

$("#dirlist").on("click", ".direction", function () {
    allPath = $(this).attr("data-all-path");
    direction(allPath)
});

$(document).on("click", "#buttonOpenDirPath", function () {
    //Проверка является ли лаунчер запущенным
    if(!isConnectSocket){
        errorMessage("Лаунчер не запущен")
        return
    }
    $("#selectDirClient").attr("data-input-name", "clientDirectory");
});

$(document).on("click", "#buttonOpenDirSavePath", function () {
    if(!isConnectSocket){
        errorMessage("Лаунчер не запущен")
        return
    }
    $("#selectDirClient").attr("data-input-name", "saveArchiveDirectory");
});

$(document).on('click', '.saveDirClient', function () {
    $("#selectDirectoryModal").modal("hide");
    dir = $(this).attr("data-client-dir-path");
    ThisInputName = $("#selectDirClient").attr("data-input-name");
    console.log(dir, ThisInputName)
    $("#"+ThisInputName).val(dir);
});