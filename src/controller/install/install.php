<?php
/**
 * Класс установщик
 */

namespace Ofey\Logan22\controller\install;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\version\version;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class install {

    private static bool $allow_install = true;

    /**
     * Установка, вывод правил, соглашения
     */
    public static function rules(): void {
        if (\Ofey\Logan22\model\install\install::exist_admin() and file_exists($_SERVER['DOCUMENT_ROOT'] . '/src/config/db.php')) {
            header("Location: /");
            die();
        }
        tpl::addVar(["need_min_version_php" => version::MIN_PHP_VERSION(),
                     "dir_permissions" => self::checkFolderPermissions(["/src/config", "/uploads",]),
                     "isLinux" => "Linux" == php_uname('s'),
                     "php_informations" => [["name" => "Версия PHP",
                                             "get" => version::MIN_PHP_VERSION(),
                                             "min" => PHP_VERSION,
                                             "allow" => self::compareUploadSizes(ini_get("upload_max_filesize"), "2M"),
                                            ],
                                            ["name" => "upload_max_filesize",
                                             "get" => ini_get("upload_max_filesize"),
                                             "min" => "2M",
                                             "allow" => self::compareUploadSizes(ini_get("upload_max_filesize"), "2M"),
                                            ],

                     ],
                     "extensions" => [["name" => "gd",
                                       "allow" => self::isExtension(extension_loaded('gd') && function_exists('gd_info')),
                                      ],
                                      ["name" => "curl",
                                       "allow" => self::isExtension(extension_loaded('curl')),
                                      ],
                                      ["name" => "pdo_mysql",
                                       "allow" => self::isExtension(extension_loaded('pdo_mysql')),
                                      ],
                                      ["name" => "mbstring",
                                       "allow" => self::isExtension(extension_loaded('mbstring')),
                                      ],
//                                      ["name" => "fileinfo",
//                                       "allow" => self::isExtension(extension_loaded('fileinfo')),
//                                      ],
                     ],
                     "allow_install" => self::$allow_install,
        ]);
        tpl::display("install/install_rules.html");
    }

    private static function checkFolderPermissions($dir = []): array {
        $dirPer = [];
        foreach ($dir as $folder) {
            $permissions = fileperms($_SERVER['DOCUMENT_ROOT'] . $folder);
            $ownerPermissions = ($permissions & 0o700) >> 6;
            $groupPermissions = ($permissions & 0o070) >> 3;
            $otherPermissions = $permissions & 0o007;
            if ($ownerPermissions === 7 && $groupPermissions === 5 && $otherPermissions === 5) {
                $dirPer[] = ["path" => $folder,
                             "per" => true,
                ];
            } else {
                if (php_uname('s') == "Windows NT") {
                    $dirPer[] = ["path" => $folder,
                                 "per" => true,
                    ];
                } else {
                    $dirPer[] = ["path" => $folder,
                                 "per" => false,
                    ];
                    self::set_allow_install(false);
                }
            }
        }
        return $dirPer;
    }

    private static function set_allow_install($b): void {
        if (!self::$allow_install) {
            return;
        }
        if (!$b) {
            self::$allow_install = false;
        }
    }

    private static function compareUploadSizes($size1, $size2): bool {
        $unit1 = strtoupper(substr($size1, -1));
        $unit2 = strtoupper(substr($size2, -1));
        $value1 = (int)substr($size1, 0, -1);
        $value2 = (int)substr($size2, 0, -1);
        switch ($unit1) {
            case 'G':
                $value1 *= 1024;
            case 'M':
                $value1 *= 1024;
            case 'K':
                $value1 *= 1024;
        }
        switch ($unit2) {
            case 'G':
                $value2 *= 1024;
            case 'M':
                $value2 *= 1024;
            case 'K':
                $value2 *= 1024;
        }
        $r = ($value1 - $value2) >= 0;
        self::set_allow_install($r);
        return $r;
    }

    private static function isExtension($v) {
        if (!$v) {
            self::set_allow_install(false);
        }
        return $v;
    }

    public static function db() {
        version::check_version_php();
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/src/config/db.php')) {
            header("Location: /install/admin");
            die();
        }
        tpl::display("install/install_db.html");
    }

    //Проверка соединения с базой данных
    public static function db_connect() {
        version::check_version_php();
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/src/config/db.php')) {
            header("Location: /");
            die();
        }
        self::connect_test_db(false);
    }

    public static function connect_test_db($only_admin = true) {
        if ($only_admin) {
            if (auth::get_access_level() != "admin") {
                board::notice(false, 'Access is denied');
            }
        }
        $host = $_POST['host'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $pdo = \Ofey\Logan22\model\install\install::test_connect_mysql($host, $user, $password, $name);
        if ($pdo) {
            self::install_sql_struct($pdo, $_SERVER["DOCUMENT_ROOT"] . "/uploads/sql/struct/*.sql");
            self::install_sql_struct($pdo, $_SERVER["DOCUMENT_ROOT"] . "/uploads/sql/data/*.sql");
            \Ofey\Logan22\model\install\install::saveConfig($host, $user, $password, $name);
            board::notice(true, 'Next install');
        } else {
            board::notice(false, 'Database connection error');
        }
    }

    private static function install_sql_struct($pdo, $dir) {
        $files = glob($dir);
        foreach ($files as $file) {
            $sql = file_get_contents($file);
            $pdo->query($sql);
        }
    }

    public static function admin() {
        if (\Ofey\Logan22\model\install\install::exist_admin()) {
            header("Location: /");
            die();
        }
        tpl::display("install/install_admin.html");
    }

    public static function add_admin() {
        \Ofey\Logan22\model\install\install::add_user_admin();
    }

}