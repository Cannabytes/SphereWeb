$(document).on('click', '#roulette_draw', function () {

    AjaxSend('/fun/roulette', 'post', '', true)
        .then(function(response) {
            $("#attempts_left").text(response.attempts_left);

            if (response.ok === true){
                $("#winnerIconItem").attr('src', response.data.icon);
                $("#winnerMessage").text(response.message);
                $("#winnerRoulette").modal('show');
                return;
            }
            ResponseNotice(response);
        })
        .catch(function(error) {
            console.error('Произошла ошибка:', error);
        });


});

