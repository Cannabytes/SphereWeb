<?php

namespace Ofey\Logan22\model\donate;

class pay_abstract {

    public static function getDescription(): ?array {
        return static::$description ?? null;
    }

    public static function isEnable(): bool{
        return static::$enable;
    }

    public static function forAdmin(): bool{
        return static::$forAdmin;
    }
}