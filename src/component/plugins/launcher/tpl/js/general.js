var socket;
//t/f клиент обновляется сейчас
var isUpdateClient = false;

var lastStatusID;
//Кол-во потоков
var countStream = 5;

var numCPU = 1;

var clickToStartLauncher = false;

$(".chronicle").text(chronicle)

var url = new URL("https://" + domain);
$(".mainDomain").text(url.hostname);
$('title').text("Launcher" + " " + chronicle);
$("#domainLauncher").text(domain)

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

function errorMessage(message) {
    console.log("xyu")
    Codebase.helpers('jq-notify', {
        align: 'center', from: 'top', type: 'danger', icon: 'fa fa-times me-2', message: message
    })
    //return false;
}

function successMessage(message, delay) {
    Codebase.helpers('jq-notify', {
        align: 'center',
        from: 'top',
        type: 'success',
        icon: 'fa fa-thumbs-up me-2',
        message: message,
        delay: delay || 3000
    });
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

function showButtonStartGame() {
    let col;

    switch (application.length) {
        case 2:
            col = 6;
            break;
        case 3:
            col = 4;
            break;
        case 4:
            col = 3;
            break;
        default:
            col = 12;
            break;
    }
    if (Array.isArray(application)) {
        application.forEach((element) => {
            const name = element.name[userLang] ?? "None";
            const desc = element.description && element.description[userLang] ? element.description[userLang] : "";
            const html = ` 
                  <div class="startL2 col-sm-6 col-xl-${col}" data-exe="${element.l2exe}" data-args="${element.args}">
                    <a class="block block-rounded block-transparent bg-image d-flex align-items-stretch h-100 mb-0" href="javascript:void(0)" style="background-image: url('/${element.background}');">
                      <div class="block-content block-sticky-options pt-3 bg-black-50">
                        <h2 class="h3 fw-bold text-white mb-1">${name}</h2>
                        <h3 class="fs-base fw-medium text-white-75">${desc}</h3>
                      </div>
                    </a>
                  </div> `;
            $("#contentMain").append(html)
        });
    } else {
        console.error("application is not an array");
    }

}

function HtmlAddProgressBar() {
    $("#progressBarData").html("");
    const color = ["primary", "success", "danger", "info", "secondary"];
    let progressBar = "";
    for (let index = 0; index <= countStream - 1; index++) {
        progressBar += `
        <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start" id="download_status_filename_${index}">${getPhrase("no_download")}</div>
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end" id="download_status_load_procent_${index}">0%</div>
                  </div>
                  <div class="progress push" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-${color[index]}" id="download_status_load_procent_csswidth_${index}" style="width: 0%;">
                    </div>
                  </div>
         `;
    }
    $("#progressBarData").html(progressBar);
}

function drawProgressBar(index, filename, size, sizeTotal) {
    let percentage = 0;
    if (size !== 0 && sizeTotal !== 0) {
        percentage = ((size / sizeTotal) * 100).toFixed(1);
    }
    $("#download_status_filename_" + (index)).attr('data-original-title', formatBytes(sizeTotal));
    $("#download_status_filename_" + (index)).text(filename)
    $("#download_status_load_procent_" + (index)).text(percentage + "%")
    $("#download_status_load_procent_csswidth_" + (index)).css("width", Math.floor(percentage) + "%");
}

function getCookie(name) {
    const cookieString = decodeURIComponent(document.cookie);
    const cookiesArray = cookieString.split("; ");

    for (const cookie of cookiesArray) {
        const [cookieName, cookieValue] = cookie.split("=");
        if (cookieName === name) {
            return cookieValue;
        }
    }
    return null;
}

function setLangNavigator(lang = null, reload = false) {
    if (lang === null) {
        lang = navigator.language;
    }
    let allow = ["ru", "en"];
    if (!allow.includes(lang)) {
        lang = "en"
    }
    setCookie("lang", lang, 365);
    if (reload) {
        location.reload()
    }
    return lang;
}

// Функция для установки куки
function setCookie(name, value, daysToExpire) {
    const expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + daysToExpire);
    const cookieValue = encodeURIComponent(value) + "; expires=" + expirationDate.toUTCString() + "; path=/";
    document.cookie = name + "=" + cookieValue;
}

function loadUserLang() {
    userLang = getCookie("lang")
    if (userLang === null) {
        userLang = setLangNavigator()
    }
}

function statusLoad(status) {
    if (lastStatusID === status) {
        switch (status) {
            case 0:
                $("#statusLauncher").text("Ожидание действий").addClass("bg-earth");
                $('#loadedFileStatusName').text('Загружено файлов');
                $('.percent').text(0);
                break;
            case 1:
                $("#statusLauncher").text("Загрузка списка").addClass("bg-gd-leaf");
                $('#loadedFileStatusName').text('Загружено файлов');
                break;
            case 2:
                $("#statusLauncher").text("Сравнение файлов").addClass("bg-gd-sea");
                $('#loadedFileStatusName').text('Обработано файлов');
                break;
            case 3:
                $("#statusLauncher").text("Загрузка файлов").addClass("bg-corporate");
                $('#loadedFileStatusName').text('Загружено файлов');
                break;
            case 4:
                $("#statusLauncher").text("Загрузка завершена").addClass("bg-success");
                $('#loadedFileStatusName').text('Загружено файлов');
                break;
            case 5:
                $("#statusLauncher").text("Загрузка остановлена").addClass("bg-earth");
                $('#loadedFileStatusName').text('Загружено файлов');
                $('.percent').text(0);
                break;
            case 6:
                $("#statusLauncher").text("Произошла ошибка").addClass("bg-gd-sun");
                $('#loadedFileStatusName').text('Загружено файлов');
                $('.percent').text(0);
                break;
        }
    }
}

function dirname(path) {
    const separator = path.includes("/") ? "/" : "\\";
    const parts = path.split(separator).filter(part => part !== "");
    return parts[parts.length - 1];
}

function direction(dirname) {
    let obj = {
        command: 'getDirectory', dirname: dirname
    };
    sendToLauncher(obj)
}

function startLauncherButton() {
    window.location.href = "sphere-launcher://open";
    wsclient.connect()
}

function sendCountStream() {
    let obj = {
        command: 'setConfig', param: 'countStream', value: parseInt($("#countStream").val()),
    };
    sendToLauncher(obj)
    countStream = parseInt($("#countStream").val())
    HtmlAddProgressBar()
}

function sendMaxSizePathFile() {
    let obj = {
        command: 'setConfig', param: 'maxSizeFile', value: parseInt($("#maxSizeFile").val()),
    };
    sendToLauncher(obj)
}

showButtonStartGame()

$(document).on('click', '#getClientWay', function () {
    sendToLauncher({
        command: 'getClientWay'
    })
});

$(document).on('click', '#startUpdateGame', function () {
    startUpdate()
});

$(document).on('click', '#countStreamRecommended', function () {
    $("#countStream").val(numCPU)
    sendCountStream()
});

$(document).on('click', '#logClear', function () {
    sendToLauncher({
        command: 'logClear'
    })
    $("#eventNotification").empty();
});

$(document).on('click', '.saveDirClient', function () {
    $("#selectDirectoryModal").modal("hide");
    obj = {
        command: 'saveDirectoryClient',
        dir: $(this).attr('data-client-dir-path'),
        chronicle: chronicle,
        domain: domain,
        serverID: serverID,
    };
    sendToLauncher(obj)
    getPathDirectoryChronicle()
});

$(document).on('click', '.removeClientDir', function () {
    let dirID = parseInt($(this).attr('data-dir-id'))
    let obj = {
        command: 'removeClientDir',
        id: dirID,
        chronicle: chronicle,
    };
    sendToLauncher(obj)
    $("#clientWayID" + dirID).remove();
});

$("#isClientFilesArchive").on("click", function (event) {
    let obj = {
        command: 'setConfig', param: 'isClientFilesArchive', value: $("#isClientFilesArchive").prop("checked"),
    };
    sendToLauncher(obj)
});

$("#startLauncher").on("click", function (event) {
    clickToStartLauncher = true;
    window.location.href = "sphere-launcher://open";
    wsclient.connect()
});

$("#autoStartLauncher").on("click", function (event) {
    let obj = {
        command: 'setConfig', param: 'autoStartLauncher', value: $("#autoStartLauncher").prop("checked"),
    };
    sendToLauncher(obj)
});

$("#autoUpdateLauncher").on("click", function (event) {
    let obj = {
        command: 'setConfig', param: 'autoUpdateLauncher', value: $("#autoUpdateLauncher").prop("checked"),
    };
    sendToLauncher(obj)
});

$("#auto_disabled").on("change", function (){
    let obj = {
        command: 'setConfig', param: 'autoDisabledTime', value: parseInt($(this).val()),
    };
    sendToLauncher(obj)
});

$("#countStream").on("input", function() {
    sendCountStream()
});

$("#maxSizeFile").on("input", function() {
    sendMaxSizePathFile()
});

$(document).on('click', '.startL2', function () {

    let login = "";
    let password = "";
    let player = "";

    selectedPlayer = $('.launcherAccountsPlayer:checked');

    if (selectedPlayer.length > 0) {
         login = String(selectedPlayer.data('login'));
         password = String(selectedPlayer.data('password'));
         player = String(selectedPlayer.data('player'));
    }

    if (wsclient.isConnected() === false) {
        errorMessage(getPhrase("need_start_launcher"))
        return;
    }
    if ($("#selectClient").val() === null) {
        $("#selectDirClient").modal('show');
        return
    }

    obj = {
        command: 'startGame',
        application: $(this).data("exe"),
        args: $(this).data("args"),
        login: login,
        password: password,
        player: player,
        dirID: parseInt($("#selectClient").val()),
        uid: domain,
        tokenApi: tokenApi
    }
    sendToLauncher(obj)
});

$('.modal').on('show.bs.modal', function (event) {
    var targetModal = $(event.relatedTarget).data('bs-target');
    if (targetModal === '#launcherAbout' || targetModal === "#modal-start-launcher") {
        return true;
    }
    if (wsclient.isConnected() === false) {
        //errorMessage(getPhrase("need_start_launcher"));
        return false;
    }
    return true;
});

$("#dirfullpath").on("click", ".linkdir", function () {
    allPath = $(this).attr("data-all-path");
    direction(allPath + "\\")
});

$("#dirlist").on("click", ".direction", function () {
    allPath = $(this).attr("data-all-path");
    direction(allPath)
});

$(document).on( "click", ".launcherUpdateStart", function () {
    obj = {
        command: 'launcherUpdate',
    }
    sendToLauncher(obj)
    $("#textMsgUpdateLauncher").text("Идет обновление. Ожидайте.")
    $(".launcherUpdateStart").hide();
});

$("#save_file_black_list").on( "click", function () {
    if (wsclient.isConnected() === false) {
        errorMessage(getPhrase("need_start_launcher"))
        return;
    }
    obj = {
        command: 'fileblacklist', files: $("#fileslist").val(),
    }
    sendToLauncher(obj)
});

$(".isCheckUpdate").on( "click", function () {
    obj = {
        command: 'isCheckUpdate',
    }
    sendToLauncher(obj)
});


