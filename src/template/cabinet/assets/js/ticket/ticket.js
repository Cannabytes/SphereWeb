$(document).ready(function () {

    $('#search').keypress(function(e){
      if(e.which == 13){
          var searchVal = $('#search').val();
          window.location.href = '/ticket/search/' + searchVal;
      }
    });

    $("#addticket").on('click', function () {
        const formData = new FormData();
        formData.append('content', $("#content").val());

        var isPrivate = $("#isPrivate").is(":checked");
        formData.append('private', isPrivate ? 'true' : 'false');

        $('input[type=file]').each(function() {
            formData.append('files[]', $(this).get(0).files[0]);
        });

        $.ajax({
            type: "POST",
            url: "/ticket/add",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        }).done(function (data) {
            console.log(data)
            if (data.ok) {
                notify_success(data.message)
                window.location.href = data.redirect
            } else {
                notify_error(data.message)
            }
        });
    });
});
