HtmlAddProgressBar()
isDisConnectSocketed()
isDebug = false;

const wsclient = {
    ws: null,
    connect() {
        return new Promise((resolve, reject) => {
            this.ws = new WebSocket('ws://localhost:17580/ws');
            this.ws.onopen = () => { resolve() }
            this.ws.onerror = e => { reject(e) }
        });
    },
    onmessage(callback) {
        this.ws.onmessage = callback;
    },
    onclose(callback) {
        this.ws.onclose = callback
    },
    send(data) {
        this.ws.send(JSON.stringify(data));
    },
    isConnecting() {
        return this.ws?.readyState === WebSocket.CONNECTING;
    },
    isConnected() {
        return this.ws?.readyState === WebSocket.OPEN;
    },
    isClosing() {
        return this.ws?.readyState === WebSocket.CLOSING;
    },
    isClosed() {
        return this.ws?.readyState === WebSocket.CLOSED;
    }
}




function reconnectionLauncher() {
    const delay = 1000

    fetch('http://localhost:17580/ajax', { method: 'POST', body: JSON.stringify({ command: 'is_connect' }) })
        .then((response) => {
            response.json().then((data) => {
                wsclient.connect().then(() => {
                    if(isDebug){
                        console.log("Connected...")
                    }
                    $("#modal-start-launcher").modal('hide')
                    if(clickToStartLauncher){
                        successMessage(getPhrase("launcher_is_started"), 700)
                        clickToStartLauncher = false
                    }
                    isConnectSocket = true
                    isConnectSocketed()
                    firstRequest()

                    wsclient.onmessage(({data}) => {
                        responseMessage(data)
                    })
                    wsclient.onclose(({code}) => {
                        if (code !== 1000) {
                            isDisConnectSocketed()
                            setTimeout(() => reconnectionLauncher(), delay)
                        }
                    })
                }).catch(() => {
                    // не удалось подключится к вебсокету лаунчера
                })
            })
        })
        .catch(() => {
            // вебсервер лаунчера не ответил
            setTimeout(() => reconnectionLauncher(), delay)
        })
}

reconnectionLauncher()


function isConnectSocketed() {
    $("#block_start_launcher").hide()
    $("#loaderConnect").hide();
    $('#launcherConnectStatusName').removeClass('text-danger')
    $('#launcherConnectStatusName').addClass('text-white')
    $("#launcherConnectStatusName").text(getPhrase("setting"));
}

function isDisConnectSocketed() {
    $("#block_start_launcher").show();
    $("#loaderConnect").show();
    $('#launcherConnectStatusName').removeClass('text-white')
    $('#launcherConnectStatusName').addClass('text-danger')
    $("#launcherConnectStatusName").text(getPhrase("setting"));
    $('#selectClient').empty();
}

function firstRequest() {
    sendToLauncher({
        command: 'getVersionLauncher'
    });
    sendToLauncher({
        command: 'fileslist'
    });
    sendToLauncher({
        command: 'getStatus'
    });
    getPathDirectoryChronicle()
    sendToLauncher({
        command: 'getDirectory', dirname: ".",
    });
    sendToLauncher({
        command: 'userLang',
        lang: userLang
    });
    sendToLauncher({
        command: 'getEvents',
    });
    sendToLauncher({
        command: 'getAllConfig',
    });
}

function sendToLauncher(obj) {
	if (!wsclient.isConnected()) {
		errorMessage(getPhrase("need_start_launcher"))
		return
	}
	
	wsclient.send(obj);
}

function getPathDirectoryChronicle() {
    let getChronicleDirectory = sendToLauncher({
        command: 'getPathDirectoryChronicle',
        chronicle: chronicle,
        domain: domain,
        serverID: serverID,
    });
}


function responseMessage(data) {
    let response = JSON.parse(data);
    if(isDebug){
        console.log(response)
    }
    ResponseStatus(response);
    ResponseEvent(response);
    ResponseEventsLog(response);
    ResponseDirection(response);
    ResponseSaveDirectory(response);
    ResponseGetChronicleDirectory(response);
    ResponseGetAllConfig(response);
    ResponseGetVersionLauncher(response);
    ResponseNeedClientUpdate(response);
    ResponseError(response)
    ResponseGetClientWay(response)
    ResponseFilesList(response)
}

function ResponseGetClientWay(response) {
    if (response.command !== "getClientWay") return;
    $("#settingWayTableInfo").html('');
    let html = ''
    response.chronicles.forEach((e) => {
        html += `<div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">` + e.name + `</h3>
            </div>
            <div class="block-content">
              <table class="table table-striped table-vcenter">
               <tbody> `
        e.directions.forEach((dir) => {
            html += `<tr id="clientWayID` + dir.id + `">
                      <td>` + dir.dir + `</td>
                      <td>
                        <div class="btn-toolbar justify-content-end">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-secondary removeClientDir" data-dir-id="` + dir.id + `" data-bs-toggle="tooltip" title="Delete">
                              <i class="fa fa-times"></i>
                            </button>
                          </div>
                        </div>
                      </td>
                    </tr>
                    `
        })
        html += `</tbody>
              </table>
            </div>
          </div>`;

    })
    $("#settingWayTableInfo").append(html)
}

function ResponseFilesList(response) {
    if (response.command !== "filesList") return;
    response.files?.forEach((file) => {
        all = $("#fileslist").val() + "\n"
        if (all.trim() === "") {
            all = ""
        }
        $("#fileslist").val( all + file);
    })
}

function ResponseStatus(response) {
    if (response.command !== "status") return;

    statusLoad(response.status)
    lastStatusID = response.status


    //Если идет загрузка списка, если идет сравнение файлов, если загрузка файлов
    let totalSize;
    let size;
    let filename;
    if (response.status === 0 || response.status === 1 || response.status === 2 || response.status === 3) {
        if (response.status === 0) {
            setUpdateClient(false);
        }
        $("#elapsedTimeInSeconds").text(convertSecondsToTime(response.elapsedTimeInSeconds));

        //Если приходит запрос, уведомление что идет сравнение файлов
        if (response.status === 2) {
            setUpdateClient(true);
            percentPanel = ((response.loaded / response.filesTotal) * 100).toFixed(0);
            $("#domainLauncher").text(response.domain)
            $('#processRunLevel').text(percentPanel + "%");
            $('#processName').text(getPhrase("file_comparison"));
            $('#loadedFiles').text(response.loaded);
            $('#filesTotal').text(response.filesTotal);

            $('title').text("Launcher" + " " + chronicle + " (" + percentPanel + "%)");
        }

        if (response.status === 3) {
            setUpdateClient(true);
            if (response.boot == null) {
                return
            }
            percent = ((response.loaded / response.filesTotal) * 100).toFixed(1)
            $("#domainLauncher").text(response.domain)
            $("#statusLauncher").text("Загружается").addClass("bg-gd-sea");
            $("#loadedFiles").text(response.loaded)
            $("#filesTotal").text(response.filesTotal)
            $('#processName').text(getPhrase("file_upload"));
            $('#processRunLevel').text( percent + "%");
            $('title').text("Launcher" + " " + chronicle + " (" + percent + "%)");
            for (let index = 0; index <= countStream-1; index++) {
                if (typeof response.boot[index] !== 'undefined') {
                    resp = response.boot[index]
                    filename = resp.filename;
                    size = resp.size;
                    totalSize = resp.sizeTotal;
                } else {
                    filename = getPhrase("no_download");
                    size = 0;
                    totalSize = 0;
                }
                drawProgressBar(index, filename, size, totalSize)
            }
            $('#totalSpeedDownload').text((response.downloadSpeed).toFixed(1));
        }
    } else if (response.status === 4) {
        setUpdateClient(false);
        if(isDebug){
            console.log("Загрузка завершена")
        }
        $('#processRunLevel').text("100%");
        $("#loadedFiles").text(response.loaded)
        $("#filesTotal").text(response.filesTotal)
        $('#processName').text(getPhrase("loading_is_complete"));
        $('title').text("Launcher" + " " + chronicle + " - (" + getPhrase("loading_is_complete") + ")");

    } else if (response.status === 5) {
        setUpdateClient(false);
        $('#processRunLevel').text("0%");
        $('#processName').text(getPhrase("cancel_update"));
        if(isDebug){
            console.log("Загрузка отменена")
        }
        // resetLoadPanel()
    } else if (response.status === 5) {
        setUpdateClient(false);
        $('#processName').text(getPhrase("error"));
        if(isDebug){
            console.log("Произошла ошибка при загрузке")
        }
    } else if (response.status === 6) {
        $('#processName').text(getPhrase("token_api_error"));
        setUpdateClient(false);
        if(isDebug){
            console.log("Ошибка ввода токена")
        }
    }

}



function ResponseEvent(response) {
    if (response.command !== "event") return;

    var date = new Date(response.time);
    var time = date.toLocaleTimeString();

    $('#eventNotification').prepend(`<tr>
                        <td class="d-none d-sm-table-cell">` + getPhrase(response.message, response.param) + `</td>
                        <td class="d-none d-sm-table-cell text-end"><span>` + time + `</span></td>
                      </tr>`);
}

function ResponseEventsLog(response) {
    if (response.command !== "eventslog") return;
    $('#eventNotification').empty();
    for (let index = 0; index < response.events.length; ++index) {
        var date = new Date(response.events[index].time);
        var time = date.toLocaleTimeString();

        $('#eventNotification').prepend(`<tr>
                        <td class="d-none d-sm-table-cell">` + getPhrase(response.events[index].message, response.events[index].param) + `</td>
                        <td class="d-none d-sm-table-cell text-end"><span>` + time + `</span></td>
                      </tr>`);
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
        $("#dirlist").html(getPhrase("not_dir"))
    }
}

function ResponseSaveDirectory(response) {
    if (response.command !== "saveDirectory") return;

}

//Имеется ли директории для данных хроник
function ResponseGetChronicleDirectory(response) {
    if (response.command !== "getChronicleDirectory") return;
    if (response.clients !== "null") {
        $('#selectClient').empty();
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
        }
    } else {
        $('#selectClient').empty();
    }
}

function ResponseGetAllConfig(response) {
    if (response.command !== "getAllConfig") return;
    numCPU = response.numCPU ?? 1
    $("#isClientFilesArchive").prop("checked", response.isClientFilesArchive ? true : false);
    $("#autoStartLauncher").prop("checked", response.autoStartLauncher ? true : false);
    $("#autoUpdateLauncher").prop("checked", response.autoUpdateLauncher ? true : false);
    $("#maxSizeFile").val(response.maxSizeFile);
    $("#countStream").val(response.countStream);
    $("#countStreamRecommended").html(numCPU);
    $("#auto_disabled").val(response.autoDisabledTime ?? 0).prop('selected', true);
    countStream = response.countStream;
    HtmlAddProgressBar()
}

function ResponseGetVersionLauncher(response) {
    if (response.command !== "getVersionLauncher") return;

    $(".launcherVersion").text(response.version);
    $(".lastLauncherVersion").text(response.actualVersion);

    if(response.actualVersion > response.version){
        $("#msgUpdLauncher").removeClass("d-none");
    }else {
        if (!$("#msgUpdLauncher").hasClass("d-none")) {
            $("#msgUpdLauncher").addClass("d-none");
        }
    }
}

function ResponseError(response) {
    if (response.command !== "error") return;
    errorMessage(getPhrase(response.message, response.param))
}

function ResponseNeedClientUpdate(response) {
    if (response.command !== "needClientUpdate") return;
    errorMessage(getPhrase(response.message, response.param))
}


//Начать обновление
function startUpdate() {
    if (wsclient.isConnected()===false){
        return errorMessage(getPhrase("need_start_launcher"))
    }
    if ($("#selectClient").val() !== null) {
        if (getUpdateClient()) {
            //Если клиент обновляется, тогда мы запросе, мы будем слать команду на отмену загрузки
            clientUpdateCancel()
            setUpdateClient(false);
        } else {
            let obj = {
                command: 'start_client_update',
                uid: domain,
                dirID: parseInt($("#selectClient").val()),
                serverID: serverID,
                tokenApi: tokenApi
            };
            sendToLauncher(obj);
            setUpdateClient(true);
        }
    } else {
        OpenSelectDir()
    }
}

function setUpdateClient(loadupdate) {
    if (getUpdateClient() === loadupdate) return;
    if (loadupdate) {
        isUpdateClient = true;
        $("#startUpdateGame").text(getPhrase("cancel_update"))
    } else {
        isUpdateClient = false;
        $("#startUpdateGame").text(getPhrase("start_update"))
    }

    for (let index = 0; index <= countStream-1; index++) {
        $("#download_status_filename_" + (index)).attr('data-original-title', formatBytes(0));
        $("#download_status_filename_" + (index)).text(getPhrase("no_download"))
        $("#download_status_load_procent_" + (index)).text("0%")
        $("#download_status_load_procent_csswidth_" + (index)).css("width", "0%");
    }

}

function getUpdateClient() {
    return isUpdateClient;
}


$('#selectClient').change(function () {
    obj = {
        command: 'setDefaultServer',
        id: parseInt($(this).val()),
        chronicle: chronicle,
        domain: domain,
        serverID: serverID,
    }
    sendToLauncher(obj)
});


function clientUpdateCancel() {
    let obj = {
        command: 'client_update_cancel',
    };
    sendToLauncher(obj);
}


function OpenSelectDir() {
    $("#selectDirClient").modal("show");
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

function convertSecondsToTime(seconds) {
    if (isNaN(seconds) || seconds < 0) {
        console.log("Ошибка введенного времени");
    }
    var hours = Math.floor(seconds / 3600);
    var minutes = Math.floor((seconds % 3600) / 60);
    var remainingSeconds = Math.floor(seconds % 60);
    hours = (hours < 10) ? "0" + hours : hours;
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    remainingSeconds = (remainingSeconds < 10) ? "0" + remainingSeconds : remainingSeconds;
    return hours + ":" + minutes + ":" + remainingSeconds;
}
