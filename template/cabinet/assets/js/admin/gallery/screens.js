$(document).ready(function () {
	$(".save").on('click',function(e) {
		e.preventDefault();
		th = $(this);
        var id = th.data("id");
        $.ajax({
            type: "POST",
            url: "/admin/gallery/screen/enable",
            dataType: "json",
            data: {
                id: $(this).data("id")
            },
            success: function(result) {
				
                if (result.ok){
                    notify_success(result.message);
					$(`#screen_status_${id}`).html('<span class="text-success">Опубликовано</span>');
					$(`#screen_hr_${id}`).remove();
					th.remove();
                }else{
                    notify_error(result.message);
                }
            },
            error: function(result) {
                notify_error(result.message);
            }
        });
    });
	
	$(".remove").on('click',function(e) {
		e.preventDefault();
		th = $(this);
        var id = th.data("id");
        $.ajax({
            type: "POST",
            url: "/admin/gallery/screen/remove",
            dataType: "json",
            data: {
                id: $(this).data("id")
            },
            success: function(result) {
                if (result.ok){
                    th.closest("tr").remove();
                }else{
                    notify_error(result.message);
                }
            },
            error: function(result) {
                notify_error(result.message);
            }
        });
    });
	
});
 