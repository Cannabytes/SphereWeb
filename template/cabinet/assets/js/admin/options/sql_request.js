$(document).ready(function () {
    $(".sql_request").click(function(e) {
		e.preventDefault();
        var sql_text = $("#"+$(this).data("id")).val();
        if (sql_text==null){
            alert("ERROR: sql text is null")
            return;
        }
        $.ajax({
            type: "POST",
            url: "/admin/options/server/sql/request",
            dataType: "json",
            data: {
                sql_name: $(this).data("id"),
                sql_text: sql_text,
                sql_prepare: $("#"+$(this).data("id")+"_prepare").val(),
                db_id: $("#db_id").val(),
            },
            success: function(result) {
                if (result.ok){
                    notify_success("Запрос успешный" + "<br>"+result.message);
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
 