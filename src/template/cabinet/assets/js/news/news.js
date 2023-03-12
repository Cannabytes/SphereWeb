$(document).ready(function () {
	$(".open_news").on('click',function(e) {
		e.preventDefault();
		th = $(this);
        $.ajax({
            type: "POST",
            url: "/ajax/get/news",
            dataType: "json",
            data: {
                news_id: th.data('id'),
            },
            success: function(result) {
                if (result.ok){
					$('#modal-open').modal('show');
                    $("#modal_title").text(result.name);
                    $("#modal_content").html(result.description);
                }else{
					$('#modal').modal('toggle');
                    notify_error(result.message);
                }
            },
            error: function(result) {
				$('#modal').modal('toggle');
                notify_error(result.message);
            }
        });
    });
});
 