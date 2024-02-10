<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 25.11.2022 / 1:03:29
 *
 * Псевдонимы для линков
 * {{alias('registration_account')}} всегда будет ссылаться на зарезервированный паттерн алиаса registration_account
 * $router->get("registration/account",
 * 'Ofey\Logan22\controller\registration\account::newAccount')->alias("registration_account");
 */

namespace Ofey\Logan22\route;

use Bramus\Router\Router;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\template\tpl;

class Route extends Router {

    private static array $pluginRegister;

    //Возваращет
    static public function get_plugin_type($pluginName) {
        foreach (self::$pluginRegister as $pluginType => $pluginArray) {
            foreach ($pluginArray as $name) {
                if ($pluginName == $name) {
                    return $pluginType;
                }
            }
        }
        return false;
    }

    function __addingPlugin() {
        $dir = fileSys::get_dir("src/component/donate/");
        $payments = fileSys::file_list($dir);
        foreach ($payments as $payment) {
            if (file_exists($dir . $payment . "/route.php")) {
                include_once $dir . $payment . "/route.php";
                foreach ($routes as $route) {
                    include_once $dir . $payment . "/" . $route['file'];
                    $method = "POST";
                    if ($route['method'] == "GET") {
                        $method = "GET";
                    }
                    $this->$method($route['pattern'], function () use ($route) {
                        $route['call']();
                    });
                }
            }
        }

        $pluginCustom = fileSys::dir_list("custom/plugins/");
        $pluginsDir = fileSys::dir_list("src/component/plugins/");

        $dir = fileSys::get_dir("src/component/plugins/");
        foreach($pluginsDir AS $i => $plugin){
            if (in_array($plugin, $pluginCustom)) {
                if (isset($pluginsDir[$i])) {
                    unset($pluginsDir[$i]);
                }
                continue;
            }
            self::$pluginRegister['component'][] = $plugin;
            list($route, $method) = $this->addPluginReg($dir, $plugin, $routes);
        }

        $dir = fileSys::get_dir("custom/plugins/");
        foreach($pluginCustom AS $plugin){
            self::$pluginRegister['custom'][] = $plugin;
            list($route, $method) = $this->addPluginReg($dir, $plugin, $routes);
        }
    }

    public function __construct() {
        if(!TECHNICAL_WORK){
            $this->__addingPlugin();
        }
        //Загрузка из шаблона указанных файлов
        if ($pages = tpl::template_design_route()) {
            foreach ($pages as $page => $template) {
                parent::get($page, function (...$GET) use ($template) {
                    tpl::addVar("GET", $GET);
                    tpl::displayDemo($template);
                });
            }
        }

    }

    private static array $aliases = [];
    private static string $pattern;

    public function all($pattern, $fn) {
        parent::all($pattern, $fn);
        self::$pattern = $pattern;
        return $this;
    }

    public function get($pattern, $fn) {
        parent::get($pattern, $fn);
        self::$pattern = $pattern;
        return $this;
    }


    public function alias($alias, $pattern = null): static {
        if ($pattern == null) {
            self::add_alias($alias, '/' . self::$pattern);
        } else {
            if ($pattern[0] !== '/') {
                $pattern = '/' . $pattern;
            }
            self::add_alias($alias, $pattern);
        }
        return $this;
    }

    private function add_alias($alias, $pattern) {
        self::$aliases[] = [
            'alias' => $alias,
            'pattern' => $pattern,
        ];
    }

    public static function get_alias($alias) {
        foreach (self::$aliases as $a) {
            if ($a['alias'] == $alias) {
                return $a['pattern'];
            }
        }
        return 'No_alias';
    }

    /**
     * @param string $dir
     * @param mixed $plugin
     * @param $routes
     * @return array
     */
    private function addPluginReg(string $dir, mixed $plugin, $routes): array {
        if (file_exists($dir . $plugin . "/route.php")) {
            include_once $dir . $plugin . "/route.php";
            foreach ($routes as $route) {
                include_once $dir . $plugin . "/" . $route['file'];
                $method = "POST";
                if ($route['method'] == "GET") {
                    $method = "GET";
                }
                $this->$method($route['pattern'], function (...$var) use ($route) {
                    $route['call'](...$var);
                });
            }
        }
        return array($route, $method);
    }
}
