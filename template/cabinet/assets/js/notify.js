
function notify_info(message, title){
	if(title==null)title = 'Info';
	Lobibox.notify('info', {
	   pauseDelayOnHover: true,
	   title : title,
	   icon: 'fa fa-info-circle',
	   continueDelayOnInactiveTab: false,
	   position: 'center top',
	   showClass: 'bounceIn',
	   hideClass: 'bounceOut',
	   width: 600,
	   msg: message
	   });
 }

function notify_warning(message, title){
	if(title==null)title = 'Warning';
	Lobibox.notify('warning', {
	   pauseDelayOnHover: true,
	   title : title,
	   continueDelayOnInactiveTab: false,
	   icon: 'fa fa-exclamation-circle',
	   position: 'center top',
	   showClass: 'zoomIn',
	   hideClass: 'zoomOut',
	   width: 600,
	   msg: message
	   });
 }

function notify_error(message, title){
	if(title==null)title = 'Error';
	Lobibox.notify('error', {
	   pauseDelayOnHover: true,
	   title : title,
	   continueDelayOnInactiveTab: false,
	   icon: 'fa fa-times-circle',
	   position: 'center top',
	   showClass: 'lightSpeedIn',
	   hideClass: 'lightSpeedOut',
	   width: 600,
	   msg: message
	   });
 }

function notify_success(message, title){
	if(title==null)title = 'Success';
	Lobibox.notify('success', {
	   pauseDelayOnHover: true,
	   title : title,
	   continueDelayOnInactiveTab: false,
	   position: 'center top',
	   showClass: 'rollIn',
	   hideClass: 'rollOut',
	   icon: 'fa fa-check-circle',
	   width: 600,
	   msg: message
	   });
 }