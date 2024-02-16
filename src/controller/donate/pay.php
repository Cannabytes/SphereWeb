<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 30.08.2022 / 0:33:14
 */

namespace Ofey\Logan22\controller\donate;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class pay {

    public static function pay(): void {
        $all_donate_system = fileSys::get_dir_files("src/component/donate", [
            'basename'        => true,
            'fetchAll'        => true,
        ]);
        $donateSysNames = [];
        foreach($all_donate_system AS $system){
            if(!$system::isEnable()){
                continue;
            }
            if(method_exists($system, 'getDescription')){
                $donateSysNames[] = ['name' => basename($system), 'desc'=>$system::getDescription()[lang::lang_user_default()]];
            }else{
                $donateSysNames[] = ['name' => basename($system), 'desc'=>basename($system)];
            }
        }
        if(!config::getEnableDonate()) error::error404("Отключено");
        $donateInfo = require 'src/config/donate.php';
        $point = 0;
        if(auth::get_is_auth()){
            if($donateInfo['DONATE_DISCOUNT_TYPE_STORAGE']){
                $point = donate::getBonusDiscount(auth::get_id(), $donateInfo['discount']['table']);
            }
        }
        tpl::addVar("donate_history_pay_self", donate::donate_history_pay_self());
        tpl::addVar("title", lang::get_phrase(233));
        tpl::addVar("discount", $donateInfo["discount"]);
        tpl::addVar("pay_system_default", $donateInfo["pay_system_default"]);
        tpl::addVar("count_all_donate_bonus", sql::run("SELECT SUM(point) AS `count` FROM donate_history_pay WHERE user_id = ?", [auth::get_id()])->fetch()['count'] ?? 0);
        tpl::addVar("procentDiscount", $point);
        tpl::addVar("donateSysNames", $donateSysNames);
        tpl::display("/donate/pay.html");
    }

    public static function shop(): void {
        if(!config::getEnableDonate()) error::error404("Отключено");

        $donateInfo = require 'src/config/donate.php';
        $point = 0;
        if(auth::get_is_auth()){
            if($donateInfo['DONATE_DISCOUNT_TYPE_PRODUCT_ENABLE']){
                $point = donate::getBonusDiscount(auth::get_id(), $donateInfo['discount_product']['table']);
            }
        }
        tpl::addVar("DONATE_DISCOUNT_TYPE_PRODUCT_ENABLE", $donateInfo['DONATE_DISCOUNT_TYPE_PRODUCT_ENABLE']);
        tpl::addVar("DONATE_DISCOUNT_COUNT_ENABLE", $donateInfo['DONATE_DISCOUNT_COUNT_ENABLE']);
        tpl::addVar("discount_count_product_table", $donateInfo["discount_count_product"]['table']);
        tpl::addVar("discount_count_product_items", $donateInfo["discount_count_product"]['items']);
        tpl::addVar("procentProductDiscount", $point);
        tpl::addVar("products", donate::products());
        tpl::addVar("title", lang::get_phrase(233));
        tpl::display("/donate/shop.html");
    }

    public static function get_donate_type($type = null) {

        $products = donate::products();
        if ($type !== null) {
            $type = mb_strtolower($type);
            $allow = ["weapon", "armor", "jewelry", "etcitem", "pack"];

            if ($type === "other") {
                $type = "etcitem";
            }

            if (!in_array($type, $allow)) {
                $type = null;
            }

            foreach ($products as $key => $product) {
                if(!isset($product['type'])){
                    $product['type'] = "etcitem";
                }
                if($product['is_pack'] AND $type !== 'pack' ){
                    unset($products[$key]);
                }
                if (isset($product['type']) && $product['type'] !== $type) {
                    unset($products[$key]);
                } elseif ($type === "armor" && isset($product['bodypart'])) {
                    if($product['is_pack']){
                        unset($products[$key]);
                    }
                    if (
                        in_array($product['bodypart'], ["rear;lear", "neck", "rfinger;lfinger"]) ||
                        $product['type'] === "weapon" ||
                        $product['type'] === "etcitem"
                    ) {
                        unset($products[$key]);
                    }
                } elseif ($type === "jewelry" && isset($product['bodypart'])) {
                    if (!in_array($product['bodypart'], ["rear;lear", "rfinger;lfinger", "neck"])) {
                        unset($products[$key]);
                    }
                    if($product['is_pack']){
                        unset($products[$key]);
                    }
                } elseif ($type !== "weapon" && $type !== "armor" && $type !== "jewelry" && isset($product['bodypart'])) {
                    if (!in_array($product['bodypart'], ["etcitem"])) {
                        unset($products[$key]);
                    }
                    if($product['is_pack']){
                        unset($products[$key]);
                    }
                }
            }
        }
        $donateInfo = require 'src/config/donate.php';
        $point = 0;
        if(auth::get_is_auth()){
            if($donateInfo['DONATE_DISCOUNT_TYPE_PRODUCT_ENABLE']){
                $point = donate::getBonusDiscount(auth::get_id(), $donateInfo['discount_product']['table']);
            }
        }
        tpl::addVar("procentProductDiscount", $point);
        tpl::addVar("products", $products);
        tpl::display("/donate/shop.html");
    }

    public static function transaction(): void {
        validation::user_protection();
        if (!config::getEnableDonate()) error::error404("Отключено");
        if (!auth::get_is_auth()) board::notice(false, lang::get_phrase(234));
        donate::transaction();
    }

    public static function currency_exchange_info() {
        echo json_encode(require 'src/config/donate.php');
    }
}