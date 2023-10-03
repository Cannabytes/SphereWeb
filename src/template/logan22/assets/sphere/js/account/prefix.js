function generateRandomCharacters(length, count) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    const prefixArray = [];
    for (let j = 0; j < count; j++) {
        let result = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            result += characters.charAt(randomIndex);
        }
        prefixArray.push(result);
    }
    var elementType = $('.prefixlist').data('type');
    $(".prefixlist [data-prefix='true']").remove();
    prefixArray.forEach(prefix => {
        if(elementType==="prefix"){
            $(".prefixlist").prepend(`<option value="${prefix}_" data-prefix="true">${prefix}_</option>`);
        }
        if(elementType==="suffix"){
            $(".prefixlist").prepend(`<option value="_${prefix}" data-prefix="true">_${prefix}</option>`);
        }
    });
    $(".prefixlist").val($(".prefixlist [data-prefix='true']:first").val());
}


