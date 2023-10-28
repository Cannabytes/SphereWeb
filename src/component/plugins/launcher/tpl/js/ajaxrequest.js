async function pause() {
    console.log("Начало выполнения кода");
    await new Promise(resolve => setTimeout(resolve, 2000));
    console.log("Пауза в 1 секунду прошла");
}
pause();


if (isConnectSocket===false) {
    HtmlAddProgressBar()
}

function AJAX_checkConnection() {
    if(isConnectSocket === true){
        return;
    }
    console.log("Соединение по вебсокету не установлено")
    let obj = {
        command: "is_connect"
    }
    AJAX_sendToLauncher(obj)
        .then(function (response) {
            $("#startLauncher").hide()
            console.log("Успешное соединение с ajax")
            isConnectAjax = true;
            AJAX_firstRequest();
        })
        .catch(function (error) {
            console.error("Произошла ошибка при выполнении запроса:");
            isConnectAjax = false;
        });
}




function AJAX_firstRequest() {
    AJAX_sendToLauncher({
        command: 'settingPatchData',
        'list': listPatch,
        'storage': storage,
        'enabled': enabledLauncher
    })
    AJAX_sendToLauncher({
        command: 'getVersionLauncher'
    });
    AJAX_sendToLauncher({
        command: 'getStatus'
    });
    AJAX_getPathDirectoryChronicle()
    AJAX_sendToLauncher({
        command: 'getDirectory', dirname: ".",
    });
    AJAX_sendToLauncher({
        command: 'userLang',
        lang: userLang
    });
    AJAX_sendToLauncher({
        command: 'getEvents',
    });
    AJAX_sendToLauncher({
        command: 'getAllConfig',
    });
}


function AJAX_sendToLauncher(obj) {
    const url = "http://localhost:17580/ajax"; // Замените на нужный URL
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: url,
            data: JSON.stringify(obj),
            timeout: 250,
            type: "POST",
            contentType: "application/json",
            success: function (response) {
                if (response) {
                    // console.log(response);
                    parseMultipleJSON((response))
                    // console.log(json.command)
                    resolve(response);
                }
            },
            error: function (error) {
                isDisConnectAjaxed()
                // reject(error);
            }
        });
    });
}

function parseMultipleJSON(data) {
    let jsonObjects = data.split('}{').map((json, index) => {
        if (index !== 0) {
            json = '{' + json;
        }
        if (index !== data.split('}{').length - 1) {
            json = json + '}';
        }
        return JSON.parse(json);
    });
    jsonObjects.forEach(obj => {
        AJAX_responseMessage(obj);
    });
}

function AJAX_startUpdate() {
    if (isConnectAjax === false) {
        errorMessage(word_need_start_launcher)
        return;
    }
    if ($("#selectClient").val() !== null) {
        if (getUpdateClient()) {
            //Если клиент обновляется, тогда мы запросе, мы будем слать команду на отмену загрузки
            AJAX_clientUpdateCancel()
            AJAX_setUpdateClient(false);
        } else {
            let obj = {
                command: 'start_client_update',
                uid: domain,
                dirID: parseInt($("#selectClient").val()),
            };
            AJAX_sendToLauncher(obj);
            AJAX_setUpdateClient(true);
        }
    } else {
        AJAX_OpenSelectDir()
    }
}

function isConnectAjaxed() {
    if (isConnectAjax === false) {
        AJAX_firstRequest()
    }
    isConnectAjax = true;
    $("#loaderConnect").hide();
    $('#launcherConnectStatusName').removeClass('text-danger')
    $('#launcherConnectStatusName').addClass('text-white')
    $("#launcherConnectStatusName").text(word_launcher);
}

function isDisConnectAjaxed() {
    isConnectAjax = false;
    $("#loaderConnect").show();
    $('#launcherConnectStatusName').removeClass('text-white')
    $('#launcherConnectStatusName').addClass('text-danger')
    $("#launcherConnectStatusName").text(word_connect);
}

function AJAX_getPathDirectoryChronicle() {
    let getChronicleDirectory = AJAX_sendToLauncher({
        command: 'getPathDirectoryChronicle',
        chronicle: chronicle,
        domain: domain,
        serverID: serverID,
    });
    console.log(getChronicleDirectory)
}

function AJAX_responseMessage(response) {
    console.log(response)
    AJAX_ResponseisConnectAjax(response);
    AJAX_ResponseStatus(response);
    AJAX_ResponseEvent(response);
    AJAX_ResponseEventsLog(response);
    AJAX_ResponseDirection(response);
    AJAX_ResponseSaveDirectory(response);
    AJAX_ResponseGetChronicleDirectory(response);
    AJAX_ResponseGetAllConfig(response);
    AJAX_ResponseGetVersionLauncher(response);
    AJAX_ResponseError(response)
    AJAX_ResponseGetClientWay(response)
}

function AJAX_ResponseisConnectAjax(response) {
    if (response.command !== "isConnectAjax") return;
    isConnectAjaxed();
}

function AJAX_ResponseGetClientWay(response) {
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

let statusInterval = 300; // Интервал отправки запросов по умолчанию (1 секунда)
function AJAX_ResponseStatus(response) {
    if (response.command !== "status") return;
    if (isConnectAjax === false) {
        isConnectAjaxed()
    }

    let totalSize;
    let size;
    let filename;

    if (response.status === 0 || response.status === 1 || response.status === 2 || response.status === 3) {
        if (response.status === 0) {
            AJAX_setUpdateClient(false);
        }

        if (response.status === 2) {
            AJAX_setUpdateClient(true);
            percentPanel = ((response.loaded / response.filesTotal) * 100).toFixed(0);
            $('#processRunLevel').text(percentPanel + "%");
            $('#processName').text(word_file_comparison);
        }

        if (response.status === 3) {
            AJAX_setUpdateClient(true);
            if (response.boot == null) {
                return;
            }
            $('#processRunLevel').text(((response.loaded / response.filesTotal) * 100).toFixed(2) + "%");
            $('#processName').text(word_file_upload);

            for (let index = 0; index <= 4; index++) {
                if (typeof response.boot[index] !== 'undefined') {
                    resp = response.boot[index];
                    filename = resp.filename;
                    size = resp.size;
                    totalSize = resp.sizeTotal;
                } else {
                    filename = word_no_download;
                    size = 0;
                    totalSize = 0;
                }
                drawProgressBar(index, filename, size, totalSize);
            }
        }
        if (response.status === 1 || response.status === 2 || response.status === 3) {
            statusInterval = 200;
        } else {
            statusInterval = 1000;
        }

    } else if (response.status === 4) {
        if (lastStatusID !== response.status) {
            AJAX_setUpdateClient(false);
            console.log("Загрузка завершена");
            $('#processRunLevel').text("100%");
            $('#processName').text(word_loading_is_complete);
        }
    } else if (response.status === 5) {
        if (lastStatusID !== response.status) {
            AJAX_setUpdateClient(false);
            $('#processRunLevel').text("0%");
            $('#processName').text(word_download_canceled);
            console.log("Загрузка отменена");
        }
    } else if (response.status === 6) {
        if (lastStatusID !== response.status) {
            AJAX_setUpdateClient(false);
            $('#processName').text(word_error);
            console.log("Произошла ошибка при загрузке");
        }
    }

    if (lastStatusID !== response.status) {
        lastStatusID = response.status;
    }
    if (lastStatusID !== response.status && response.status === 0) {
        $('.chart').data('easyPieChart').update(0);
        $('.percent').text(0);
    }

}

setInterval(function () {
    if (isConnectSocket) {
        if (isConnectAjax === true) {
            isConnectAjax = false;
        }
        return;
    }
    if (isConnectAjax === false) {
        AJAX_checkConnection()
        return;
    }
    AJAX_sendToLauncher({command: 'getStatus'});
}, statusInterval);


function AJAX_ResponseEvent(response) {
    if (response.command !== "event") return;

    var date = new Date(response.time);
    var time = date.toLocaleTimeString();
    let color = "";
    if (response.level === 0) {
        color = "light";
    } else if (response.level === 1) {
        color = "primary";
    } else if (response.level === 2) {
        color = "secondary";
    } else if (response.level === 3) {
        color = "danger";
    } else if (response.level === 4) {
        color = "info";
    } else if (response.level === 5) {
        color = "success";
    }
    $('#eventNotification').prepend(`<tr>
                        <td class="d-none d-sm-table-cell">` + response.message + `</td>
                        <td class="d-none d-sm-table-cell text-end"><span>` + time + `</span></td>
                      </tr>`);
    console.log(response.message)
}

function AJAX_ResponseEventsLog(response) {
    if (response.command !== "eventslog") return;
    for (let index = 0; index < response.events.length; ++index) {
        var date = new Date(response.events[index].time);
        var time = date.toLocaleTimeString();

        $('#eventNotification').prepend(`<tr>
                        <td class="d-none d-sm-table-cell">` + response.events[index].message + `</td>
                        <td class="d-none d-sm-table-cell text-end"><span>` + time + `</span></td>
                      </tr>`);
    }
}

function AJAX_ResponseDirection(response) {
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
            $('#dirlist').append('<figure data-all-path="' + (elem) + '" class="cursor-pointer highlight direction"><img src="/tpl/assets/media/dir/' + image + '.png" style="width: 80px;" alt="Folder Icon"><figcaption class="name">' + dirname(elem) + '</figcaption></figure>');
        });
    } else {
        $("#dirlist").html(word_not_dir)
    }
}

//TODO
function AJAX_ResponseSaveDirectory(response) {
    if (response.command !== "saveDirectory") return;

}

function AJAX_ResponseGetChronicleDirectory(response) {
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

function AJAX_ResponseGetAllConfig(response) {
    if (response.command !== "getAllConfig") return;
    $("#isClientFilesArchive").prop("checked", response.isClientFilesArchive ? true : false);
    $("#autoStartLauncher").prop("checked", response.autoStartLauncher ? true : false);
    $("#autoUpdateLauncher").prop("checked", response.autoUpdateLauncher ? true : false);
}

function AJAX_ResponseGetVersionLauncher(response) {
    if (response.command !== "getVersionLauncher") return;

    $(".launcherVersion").val(response.version);
    $(".lastLauncherVersion").val(response.actualVersion);

    if(response.actualVersion > response.version){
        $("#isNeedUpdateInfo").html("Необходимо обновление. <a href='#' class='launcherUpdateStart'>Нажмите для обновления</a>.")
        $("#msgUpdLauncher").removeClass("d-none");
    }else {
        if (!$("#msgUpdLauncher").hasClass("d-none")) {
            $("#msgUpdLauncher").addClass("d-none");
            $("#isNeedUpdateInfo").val("Обновление не требуется.")
        }
    }

}

function AJAX_ResponseError(response) {
    if (response.command !== "error") return;
    errorMessage(response.message)
}

function AJAX_setUpdateClient(loadupdate) {
    if (getUpdateClient() === loadupdate) return;
    if (loadupdate) {
        isUpdateClient = true;
        $("#startUpdateGame").text(word_cancel_update)
    } else {
        isUpdateClient = false;
        $("#startUpdateGame").text(word_start_update)
    }

    for (let index = 0; index <= 4; index++) {
        $("#download_status_filename_" + (index)).attr('data-original-title', formatBytes(0));
        $("#download_status_filename_" + (index)).text(word_no_download)
        $("#download_status_load_procent_" + (index)).text("0%")
        $("#download_status_load_procent_csswidth_" + (index)).css("width", "0%");
    }

}

function getUpdateClient() {
    return isUpdateClient;
}

$('#selectClient').change(function () {
    if (isConnectAjax === false) {
        errorMessage(word_need_start_launcher)
        return;
    }
    obj = {
        command: 'setDefaultServer',
        id: parseInt($(this).val()),
        chronicle: chronicle,
        domain: domain,
        serverID: serverID,
    }
    AJAX_sendToLauncher(obj)
});

function AJAX_clientUpdateCancel() {
    let obj = {
        command: 'client_update_cancel',
    };
    AJAX_sendToLauncher(obj);
}

function AJAX_OpenSelectDir() {
    if (isConnectAjax === false) {
        errorMessage(word_need_start_launcher)
        return;
    }
    $("#selectDirClient").modal("show");
}


