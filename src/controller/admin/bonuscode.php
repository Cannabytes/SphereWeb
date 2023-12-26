<?php

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\bonus\bonus;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\template\tpl;

class bonuscode {

    public static function show() {
        validation::user_protection("admin");
        tpl::display('admin/bonuscode/bonus.html');
    }

    public static function genereate(){
        validation::user_protection("admin");
        bonus::genereateCode();
    }


    public static function show_code(){
        validation::user_protection("admin");
        $sql = "SELECT 
            item_id,
            start_date_code,
            end_date_code,
            server_id 
        FROM
            bonus_code 
        GROUP BY
            start_date_code,
            end_date_code,
            item_id";
        $codeTable = sql::getRows($sql);
        if($codeTable){
            foreach($codeTable AS &$code){
                $data = client_icon::get_item_info($code['item_id']);
                $code['icon'] = $data['icon'];
                $code['name'] = $data['name'];
                $code['additionalname'] = $data['additionalname'];
                $code['items'] = sql::getRows("SELECT * FROM bonus_code WHERE server_id = ? AND start_date_code = ? AND end_date_code = ? AND item_id = ?",[
                    $code['server_id'],
                    $code['start_date_code'],
                    $code['end_date_code'],
                    $code['item_id'],
                ]);
            }
        }
        tpl::addVar('codeTable', $codeTable);
        tpl::display("admin/bonuscode/show_code.html");
    }

    public static function remove(){
        validation::user_protection("admin");
        $codes = $_POST['codes'];
        foreach($codes AS $code){
            sql::run("DELETE FROM `bonus_code` WHERE `id` = ?", [$code]);
        }
        board::alert([
            "remove" => true,
        ]);
    }

}