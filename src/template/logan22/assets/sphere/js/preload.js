function preload() {
    var captchaInput = $('.captcha_img');
    if (captchaInput.length > 0) {
        get_captcha()
    }

    var prefixlist = $('.prefixlist');
    if (prefixlist.length > 0) {
        generateRandomCharacters(2, 5);
    }

    if (typeof CKEditor5 === 'undefined') {
        Codebase.helpersOnLoad(['js-ckeditor5']);
        CKEDITOR.config.extraAllowedContent = '*(*)[*]';
        window.CKEditor5 = true;
    }

    Codebase.helpersOnLoad(['jq-slick']);
    Codebase.helpersOnLoad(['cb-table-tools-checkable', 'cb-table-tools-sections']);
    Codebase.helpersOnLoad(['jq-magnific-popup']);
    Codebase.helpersOnLoad(['js-ckeditor']);
    Codebase.helpersOnLoad(['bs-tooltip']);
    Codebase.helpersOnLoad(['js-flatpickr']);
    Codebase.helpersOnLoad(['side_overlay_toggle']);

}


preload()