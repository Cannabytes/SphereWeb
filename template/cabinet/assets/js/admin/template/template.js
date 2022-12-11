
$(document).ready(function () {
    readme();

    $("#save_template").on('click',function(e) {
		e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/template/save",
            dataType: "json",
            data: {
                template: $("#template").val()
            },
            success: function(result) {
				
                if (result.ok){
                    notify_success(result.message);
                }else{
                    notify_error(result.message);
                }
            },
            error: function(result) {
                notify_error(result.message);
            }
        });
    });

    $("#template").change(function(){
        readme();
    });

});

function readme() {
        $("#version").text("0.0");
        $("#date").text("-");
        $("#author").text("No");
        $("#contact").text("No");
        $("#description").text("");
        $.ajax({
            type: "POST",
            url: "/admin/template/readme",
            dataType: "json",
            data: {
                template: $("#template").val()
            },
            success: function(result) {
                if (result.screen){
                    $("#screen").attr("src", "/template/designs/"+ $("#template").val() + "/" + result.screen);
                    $("#screen_href").attr("href", "/template/designs/"+ $("#template").val() + "/" + result.screen);
                }else{
                    $("#screen").attr("src", "/template/cabinet/assets/images/none.png");
                    $("#screen_href").attr("href", "/template/cabinet/assets/images/none.png");
                }
                $("#version").text(result.version);
                $("#author").text(result.author);
                $("#contact").text(result.contact);
                $("#description").text(result.description);

                const milliseconds = result.date * 1000
                const dateObject = new Date(milliseconds)
                const humanDateFormat = dateObject.toLocaleString() //2019-12-9 10:30:15

                $("#date").text(humanDateFormat);
            }
        });
}
 