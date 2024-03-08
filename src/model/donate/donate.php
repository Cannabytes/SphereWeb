<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 05.09.2022 / 17:41:12
 */

namespace Ofey\Logan22\model\donate;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\ip;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\userlog;
use Ofey\Logan22\model\bonus\bonus;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class donate {

    private static int $COOLDOWN_SECONDS = 5; // Время задержки в секундах до последующей попытки купить что-то

    /**
     * @param $uuid
     * @param $pay_system_name
     * @return mixed
     *
     * Чтение для проверки уже ранее записыванных индификаторов транзакций от платежных системах.
     *
     * Это создано с целью безопастности, на тот случай, если платежная система НЕ предоставляет данных
     * о своих IP и не имеет криптографических ключей для проверки подлинности транзакции
     */
    public static function get_uuid($uuid, $pay_system_name): mixed {
        return sql::getRow("SELECT * FROM donate_uuid WHERE uuid = ? AND pay_system = ?", [$uuid, $pay_system_name]);
    }

    /**
     * @param $uuid
     * @param $pay_system_name
     * @return false|\PDOStatement|null
     * @throws Exception
     *
     * Записываем сюда уникальные ID транзакций от платежных системах.
     *
     * Это создано с целью безопастности, на тот случай, если платежная система НЕ предоставляет данных
     * о своих IP и не имеет криптографических ключей для проверки подлинности транзакции
     */
    public static function set_uuid($uuid, $pay_system_name): false|\PDOStatement|null {
        $request = '';
        if(isset($_REQUEST) && !empty($_REQUEST)) {
            $request = json_encode($_REQUEST, JSON_UNESCAPED_UNICODE);
        }
        return sql::sql("INSERT INTO `donate_uuid` (`uuid`, `pay_system`, `ip`, `request`, `date`) VALUES (?, ?, ?, ?, ?);", [$uuid, $pay_system_name, ip::getIp(), $request, time::mysql()]);
    }

    /**
     * @param $uuid - Индификатор
     * @param string $pay_system_name - Название платежной системы
     * @return void
     * @throws Exception
     *
     * Проверяем существование индефикатора и сохраняем его.
     * Если индификатор уже был в системе, тогда останавливаем зачисление.
     */
    public static function control_uuid($uuid = null, string $pay_system_name = 'NoNamePaySystem'): void {
        if($uuid === null){
            return;
        }
        if(self::get_uuid($uuid, $pay_system_name)){
            die('This UUID was previously determined');
        }
        self::set_uuid($uuid, $pay_system_name);
    }

    /**
     * Список товаров для покупки за донат очки
     *
     * @return array
     * @throws Exception
     */
    static public function products() {
        $server_id = auth::get_default_server();
        if (!$server_id) {
            tpl::addVar("message", "Not Server");
            tpl::display("page/error.html");
        }
        $donate = sql::getRows("SELECT * FROM `donate` WHERE server_id = ? ORDER BY id DESC", [
            $server_id,
        ]);
        foreach ($donate as &$item) {
            //Если установлен пак
            if($item['is_pack']){
                $item['pack'] = [];
                $packData = self::get_pack($item['id']);
                foreach ($packData AS $pack_item){
                    $item_info = client_icon::get_item_info($pack_item['item_id'], false, false);
                    $item_info['count'] = $pack_item['count'];
                    $item['pack'][] = $item_info;
                }
            }else{
                $item_info = client_icon::get_item_info($item['item_id'], false, false);
                if(!$item_info){
                    $item_info['item_id'] = $item['id'];
                    $item_info['name'] = "No Item Name";
                    $item_info['icon'] = fileSys::localdir("/uploads/images/icon/NOIMAGE.webp");
                }
                $item = array_merge($item, $item_info);
            }
        }
        return $donate;
    }

    public static function get_pack($pack_id): array {
       return sql::getRows("SELECT * FROM `donate_pack` WHERE pack_id = ?", [$pack_id]);
    }

    /*
     * Покупка предмета, передача предмета игровому персонажу
     */
    public static function transaction(): void {
        //Формальная проверка что у пользователя вообще есть ли деньги.
        if(auth::get_donate_point() < 0){
            board::notice(false, "Not enough money");
        }
        $lastUsage = $_SESSION['COOLDOWN_DONATE_TRANSACTION'] ?? 0;
        if (time() - $lastUsage < self::$COOLDOWN_SECONDS) {
            board::error("Покупка разрешена только раз в " . self::$COOLDOWN_SECONDS . " сек.");
        }
        $_SESSION['COOLDOWN_DONATE_TRANSACTION'] = time();

        $id = $_POST['id'] ?? board::error("Error");
        $server_id = filter_input(INPUT_POST, 'server_id', FILTER_VALIDATE_INT);
        $user_value = filter_input(INPUT_POST, 'user_value', FILTER_VALIDATE_INT);
        if ($user_value <= 0) {
            board::notice(false, lang::get_phrase(255));
        }
        $char_name = trim($_POST['char_name']);
        if ($char_name == "") {
            board::notice(false, lang::get_phrase(148));
        }
        $donat_info = self::donate_item_info($id, $server_id);
        if (!$donat_info) {
            board::notice(false, lang::get_phrase(152));
        }
        if(isset($donat_info['is_pack'])){
            $user_value = 1;
        }
        $donat_info_cost = $donat_info['cost'];
        $cost_product = $donat_info_cost * $user_value;

        //Проверка на скидку по товару
        $donateInfo = __config__donate;

        if ($donateInfo['DONATE_DISCOUNT_TYPE_PRODUCT_ENABLE']) {
            $procentDiscount = donate::getBonusDiscount(auth::get_id(), $donateInfo['discount_product']['table']);
            $decrease_factor = 1 - ($procentDiscount / 100);
            $cost_product *= $decrease_factor;
        }

        if ($donateInfo['DONATE_DISCOUNT_COUNT_ENABLE']) {
            $discount_count_product_table = $donateInfo["discount_count_product"]['table'] ?? [];
            $discount_count_product_items = $donateInfo["discount_count_product"]['items'] ?? [];
            if (in_array($donat_info['item_id'], $discount_count_product_items) or empty($discount_count_product_items)) {
                $procentDiscount = self::findValueForN($user_value, $discount_count_product_table);
                if ($procentDiscount) {
                    $decrease_factor = 1 - ($procentDiscount / 100);
                    $cost_product *= $decrease_factor;
                }
            }
        }
        if ((auth::get_donate_point() - $cost_product) < 0) {
            board::notice(false, lang::get_phrase(149, $cost_product, auth::get_donate_point()));
        }

        $addToUserItems = $donat_info['count'] * $user_value;
        $server_info = server::server_info($server_id);
        if (!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }

        $player_info = player_account::is_player($server_info, [$char_name]);
        $player_info = $player_info->fetch();
        if (!$player_info)
            board::notice(false, lang::get_phrase(151, $char_name));
        $player_id = $player_info["player_id"];

        //Если это пак
        if(isset($donat_info['is_pack'])){
            $pack_list = self::get_pack($donat_info['id']);
            foreach ($pack_list AS $pack){
                $is_stack = client_icon::is_stack($pack['item_id']);
                $donat_info['item_id'] = $pack['item_id'];
                $addToUserItems = $pack['count'] * $user_value;
                self::sending_implementation($server_info, $player_info, $char_name, $player_id, $is_stack, $donat_info, $addToUserItems);
            }
        }else{
            $is_stack = client_icon::is_stack($donat_info['item_id']);
            self::sending_implementation($server_info, $player_info, $char_name, $player_id, $is_stack, $donat_info, $addToUserItems);
        }

        self::taking_money($cost_product, auth::get_id());

        userlog::add("donate", 539, [$donat_info['item_id'], $addToUserItems, $cost_product, $char_name]);
        auth::set_donate_point(auth::get_donate_point() - $cost_product);

        sql::run("INSERT INTO `donate_history` (`user_id`, `item_id`, `amount`, `cost`, `char_name`, `server_id`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?)", [
            auth::get_id(),
            $donat_info['item_id'],
            $addToUserItems,
            $cost_product,
            $char_name,
            $server_id,
            time::mysql(),
        ]);
        board::alert([
            'ok' => true,
            'message' => lang::get_phrase(304),
            'donate_bonus' => auth::get_donate_point(),
        ]);
    }

    //Имлементация отправки на персонажа
    private static function sending_implementation($server_info, $player_info, $char_name, $player_id, $is_stack, $donat_info, $addToUserItems ){

        //Если для выдачи предмета, персонаж должен быть ВНЕ игры
        if ($server_info['collection_sql_base_name']::need_logout_player_for_item_add()) {
            /**
             * Проверка чтоб игрок был оффлайн для выдачи предмета
             */
            if ($player_info["online"]) {
                board::notice(false, lang::get_phrase(153, $char_name));
            }

            /**
             * Нужно определить, это стыкуемый ли предмет
             */

            /**
             * Если предмет стакуем
             * Есть ли на персонаже X предмет N
             * Если есть, добавим к числу N+N предметов
             */
            if ($is_stack) {
                $checkPlayerItem = player_account::check_item_player($server_info, [
                    $donat_info['item_id'],
                    $player_id,
                ]);
                $checkPlayerItem = $checkPlayerItem->fetch();
                //Если предмет есть у игрока
                if ($checkPlayerItem) {
                    player_account::update_item_count_player($server_info, [
                        ($checkPlayerItem['count'] + $addToUserItems),
                        $checkPlayerItem['object_id'],
                    ]);
                } else {
                    self::add_item_max_val_id($server_info, $player_id, $donat_info['item_id'], $addToUserItems);
                }
            } else {
                self::add_item_max_val_id($server_info, $player_id, $donat_info['item_id'], $addToUserItems);
            }
        } else { //Если персонаж может быть в игре для выдачи предмета
            player_account::add_item($server_info, [
                $player_id,
                $donat_info['item_id'],
                $addToUserItems,
                0,
            ]);
        }
}

    /**
     * Получение информации о предмете из БД
     */
    static private function donate_item_info($item_id, $server_id) {
        return sql::run("SELECT * FROM donate WHERE id = ? AND server_id = ?", [
            $item_id,
            $server_id,
        ])->fetch();
    }

    public static function add_item_max_val_id($server_info, $player_id, $donat_item_id, $addToUserItems, $enchantLevel = 0) {
        $max_obj_id = player_account::max_value_item_object($server_info)->fetch()['max_object_id'];
        player_account::add_item($server_info, [
            $player_id,
            time() - $max_obj_id - $player_id,
            $donat_item_id,
            $addToUserItems,
            $enchantLevel,
            "INVENTORY",
        ]);
    }

    //Уменьшение коинов
    public static function taking_money($dp, $user_id) {
        if(auth::get_donate_point() < 0){
            board::notice(false, "Not enough money");
        }
        if(auth::get_donate_point() == 0){
            board::notice(false, "Вам необходимо иметь на балансе {$dp} SphereCoin");
        }
        if ((auth::get_donate_point() - $dp) >= 0) {
            sql::run("UPDATE `users` SET `donate_point` = `donate_point`-? WHERE `id` = ?", [
                $dp,
                $user_id,
            ]);
            auth::set_donate_point(auth::get_donate_point() - $dp);
        }else{
            board::error("Ошибка");
        }
    }

    public static function donate_history_pay_self($user_id = null): array {
        if (!$user_id) {
            $user_id = auth::get_id();
        }
        $pays = sql::getRows("SELECT
                                donate_history_pay.point, 
                                donate_history_pay.pay_system, 
                                donate_history_pay.date
                            FROM
                                donate_history_pay
                            WHERE
                                donate_history_pay.user_id = ?
                            ORDER BY
                                donate_history_pay.id DESC", [
            $user_id,
        ]);
        $trs = sql::getRows("SELECT
                                        log_transfer_spherecoin.*, 
                                        sender.`name` AS sender_name,
                                        receiver.`name` AS receiver_name
                                    FROM
                                        log_transfer_spherecoin
                                    LEFT JOIN
                                        users AS sender
                                        ON log_transfer_spherecoin.user_sender = sender.id
                                    LEFT JOIN
                                        users AS receiver
                                        ON log_transfer_spherecoin.user_receiving = receiver.id
                                    WHERE
                                        user_sender = ? OR
                                        user_receiving = ?
                                    ORDER BY
                                        log_transfer_spherecoin.id DESC", [$user_id, $user_id]);
        $result = array_merge($pays, $trs);
        usort($result, function ($a, $b) {
            return $a['date'] <=> $b['date'];
        });
        return array_reverse($result);
    }

    //Сумма зачисления денег с учетом курса валют конфига
    public static function currency(int|float $sum, string $currency): float|int {
        $config = __config__donate;
        return match ($currency) {
            "RUB" => ($sum / $config['coefficient']['RUB']) * $config['quantity'],
            "UAH" => ($sum / $config['coefficient']['UAH']) * $config['quantity'],
            "EUR" => ($sum / $config['coefficient']['EUR']) * $config['quantity'],
            default => ($sum / $config['coefficient']['USD']) * $config['quantity'],
        };
    }


    //Возвращает процент скидки
    public static function getBonusDiscount($user_id, $table) {
        $amount = sql::run("SELECT SUM(point) AS `count` FROM donate_history_pay WHERE user_id = ? and sphere=0", [$user_id])->fetch()['count'] ?? 0;
        $rangeKey = null;
        $discountValue = null;
        $lastValue = null;
        $keys = array_keys($table);
        $firstKey = reset($keys);
        if ($amount < $firstKey) {
            return 0;
        } else {
            $reversedTable = array_reverse($table, true);
            foreach ($reversedTable as $key => $value) {
                if ($amount >= $key) {
                    $rangeKey = $key;
                    $discountValue = $value;
                    break;
                }
                $lastValue = $value;
            }
            if ($rangeKey && $discountValue) {
                return $discountValue;
            } else {
                return $lastValue;
            }
        }
    }

    //Возвращает % скидки
    private static function findValueForN($inputN, $keyValueObject = 0) {
        if (!is_array($keyValueObject)) {
            return 0;
        }
        $result = null;
        foreach ($keyValueObject as $key => $value) {
            $currentKey = (int)$key;
            if ($currentKey > $inputN) {
                break;
            }
            $result = $value;
        }
        return $result;
    }


    public static function findReplenishmentBonus($amount, $bonusTable) {
        $matchingKey = 0; // Изначально устанавливаем значение 0
        foreach ($bonusTable as $key => $value) {
            if ($amount >= $key) {
                $matchingKey = $value;
            } else {
                break;
            }
        }
        return $matchingKey;
    }



    /**
     * @return false
     * Выдача бонуса предметом, за N сумму доната единоразвым платежем
     */
    public static function AddDonateItemBonus($user_id, $sphereCoin): bool {
        $item = false;
        $donateConfig = __config__donate;
        if(!$donateConfig['DONATE_BONUS_ITEM_ENABLE']){
            return $item;
        }
        $donateBonusList = $donateConfig['donate_bonus_list'];
        foreach ($donateBonusList as $bonus) {
            if ($sphereCoin >= $bonus['sc']) {
                $item = $bonus;
            }
        }
        if(!$item){
            return false;
        }
        foreach($item['items'] AS $bonus){
            $item_id = $bonus['id'];
            $count = $bonus['count'] ?? 1;
            $enchant = $bonus['enchant'] ?? 0;
            userlog::add("add_to_inventory", "log_bonus_donate", [$enchant, $item_id, $count] );
            bonus::addToInventory(
                $user_id,
                auth::get_default_server(),
                $item_id,
                $count,
                $enchant,
                "add_item_donate_bonus"
            );
        }
        return true;
    }

    //Проверка: Если донат система в тестировании, тогда проверяем, что она доступна только для администратора
    public static function isOnlyAdmin($donateClass): void {
        if(method_exists($donateClass, 'forAdmin')){
            if($donateClass::forAdmin() AND auth::get_access_level() != 'admin'){
                board::error('Only for Admin');
            }
        }
    }

}