$(document).ready(function () {
    $(".removeDonate").on('click',function(e) {
        th = (this)
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/donate/remove",
			dataType: "json",
            encode: true,
            data: {
                productId: $(this).data("product-id"),
            },
            success: function (data) {
				if(data.ok){
                    th.closest("tr").remove();
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
