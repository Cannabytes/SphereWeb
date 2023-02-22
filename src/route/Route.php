<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 25.11.2022 / 1:03:29
 *
 * Псевдонимы для линков
 * {{alias('registration_account')}} всегда будет ссылаться на зарезервированный паттерн алиаса registration_account
 * $router->get("registration/account",
 * 'Ofey\Logan22\controller\registration\account::newAccount')->alias("registration_account");
 */

namespace Ofey\Logan22\route;

use Bramus\Router\Router;
use Ofey\Logan22\template\tpl;

class Route extends Router {

    public function __construct() {
        //Загрузка из шаблона указанных файлов
        foreach(tpl::template_design_route() AS $page => $template){
            parent::get($page, function() use ($template){
                tpl::display($template, true);
            });
        }

    }

    private static array  $aliases = [];
    private static string $pattern;

    public function get($pattern, $fn) {
        parent::get($pattern, $fn);
        self::$pattern = $pattern;
        return $this;
    }

    public function alias($alias, $pattern = null): static {
        if($pattern == null) {
            self::add_alias($alias, self::$pattern);
        } else {
            self::add_alias($alias, $pattern);
        }
        return $this;
    }

    private function add_alias($alias, $pattern) {
        self::$aliases[] = [
            'alias'   => $alias,
            'pattern' => $pattern,
        ];
    }

    public static function get_alias($alias) {
        foreach(self::$aliases as $a) {
            if($a['alias'] == $alias) {
                return $a['pattern'];
            }
        }
        return 'No_alias';
    }
}
