function notify_info(message, title) {
    Lobibox.notify('info', {
        sound: false,
        pauseDelayOnHover: true,
        icon: 'fa fa-info-circle',
        continueDelayOnInactiveTab: false,
        position: 'center top',
        size: 'mini',
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        width: 350,
        msg: message
    });
}

function notify_warning(message) {
    Lobibox.notify('warning', {
        sound: false,
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        icon: 'fa fa-exclamation-circle',
        position: 'center top',
        size: 'mini',
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        width: 350,
        msg: message
    });
}

function notify_error(message) {
    if(message==undefined){
        return
    }
    Lobibox.notify('error', {
        sound: false,
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        icon: 'fa fa-times-circle',
        position: 'center top',
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        size: 'mini',
        width: 450,
        msg: message
    });
}

function notify_success(message) {
    if(message==undefined){
        return
    }
    Lobibox.notify('success', {
        sound: false,
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        position: 'center top',
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        icon: 'icon-check',
        size: 'mini',
        width: 450,
        msg: message
    });
}