$(document).ready(function () {
	var add_item_form = $('#add_item_form');
    add_item_form.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/donate/add",
			dataType: "json",
            encode: true,
            data: add_item_form.serialize(),
            success: function (data) {
				if(data.ok){
					notify_success(data.message)
				}else{
					notify_warning(data.message)
				}            
			},
            error: function (data) {
                notify_warning(data.message);
            },
        });
    });
});
