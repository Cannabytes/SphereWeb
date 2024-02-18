/**
 * Author: Vitalii P.
 * Site: https://get-web.site
 * Version: 0.1.1
 * https://github.com/get-web/insertmedia
 */

function insertmedia(config) {

    // Pass in the objects to merge as arguments.
    // For a deep extend, set the first argument to `true`.
    const extend = function () {

        // Variables
        let extended = {};
        let deep = false;
        let i = 0;
        let length = arguments.length;

        // Check if a deep merge
        if (Object.prototype.toString.call(arguments[0]) === '[object Boolean]') {
            deep = arguments[0];
            i++;
        }

        // Merge the object into the extended object
        let merge = function (obj) {
            for (let prop in obj) {
                if (Object.prototype.hasOwnProperty.call(obj, prop)) {
                    // If deep merge and property is an object, merge properties
                    if (deep && Object.prototype.toString.call(obj[prop]) === '[object Object]') {
                        extended[prop] = extend(true, extended[prop], obj[prop]);
                    } else {
                        extended[prop] = obj[prop];
                    }
                }
            }
        };

        // Loop through each object and conduct a merge
        for (; i < length; i++) {
            let obj = arguments[i];
            merge(obj);
        }

        return extended;

    };

    const cfg = extend({
        delay: 300, // delay. default: 300
        immediately: true, // performing a delay true/false. Immediately or one at a time every "delay" seconds. default: true
        attr: 'data-insertmedia', // Processed attribute. default: data-insertmedia
    },
        config
    );

    // delay
    let counter = 1;
    const counterHandler = function () {
        if (cfg.immediately) return cfg.delay
        return cfg.delay * counter++
    }

    // youtube handler
    const youtubeHandler = function (el, options) {
        const settings = extend({
            src: "",
            width: "300",
            height: "200",
            setting: "",
        },
            options
        );
        el.innerHTML =
            `<iframe width="${settings.width}" height="${settings.height}" src="${settings.src}${settings.setting}" frameborder="0" allowfullscreen="true" scrolling="no"></iframe>`;
    };

    // twitch handler
    const twitchHandler = function (el, options) {
        const settings = extend({
            src: "",
            width: "300",
            height: "200",
            setting: "",
        },
            options
        );
        el.innerHTML = `<iframe width="${settings.width}" height="${settings.height}" src="${settings.src}${settings.setting}" frameborder="0" allowfullscreen="true" scrolling="no" ></iframe>`;
    };

    // trovo handler
    const trovoHandler = function (el, options) {
        const settings = extend({
            src: "",
            width: "300",
            height: "200",
            setting: "",
        },
            options
        );
        el.innerHTML = `<iframe width="${settings.width}" height="${settings.height}" src="${settings.src}${settings.setting}" frameborder="0" allowfullscreen="true" scrolling="no" ></iframe>`;
    };

    // frame handler
    const frameHandler = function (el, options) {
        const settings = extend({
            src: "",
            width: "300",
            height: "200",
            setting: "",
        },
            options
        );
        el.innerHTML = `<iframe width="${settings.width}" height="${settings.height}" src="${settings.src}${settings.setting}" frameborder="0" allowfullscreen="true" scrolling="no" ></iframe>`;
    };

    // images handler
    const imagesHandler = function (el, options) {
        const settings = extend({
            src: "",
            width: "300",
            height: "200",
            setting: "",
        },
            options
        );
        el.innerHTML =
            `<img width="${settings.width}" height="${settings.height}" src="${settings.src}">`;
    };

    // html5 handler
    const html5Handler = function (el, options) {
        const settings = extend({
            src: "",
            width: "300",
            height: "200",
            setting: "",
        },
            options
        );
        el.innerHTML =
            `<video src="${settings.src}" ${settings.setting}></video>`;

    };


    // elements handler
    document.querySelectorAll(`[${cfg.attr}]`).forEach(function (el, i, arr) {
        setTimeout(() => {
            const options = JSON.parse(`${el.getAttribute(cfg.attr)}`);
            if (!options.type && !options.src) return;
            if (options.type == "youtube") youtubeHandler(el, options);
            if (options.type == "twitch") twitchHandler(el, options);
            if (options.type == "trovo") trovoHandler(el, options);
            if (options.type == "frame") frameHandler(el, options);
            if (options.type == "img") imagesHandler(el, options);
            if (options.type == "html5") html5Handler(el, options);
        }, counterHandler());
    });

};