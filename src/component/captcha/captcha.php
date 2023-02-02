<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 02.02.2023 / 17:08:57
 */

namespace Ofey\Logan22\component\captcha;
use SimpleCaptcha\Builder;

class captcha {

    static function defence(): void {
        $builder = new Builder();
        $builder->bgColor = "#18191a";
        $builder->applyEffects = false;
        $builder->textColor  = "#FFF";
        $builder->build(250, 60);
        $_SESSION['phrase'] = $builder->phrase;
        echo $builder->inline();
    }

}