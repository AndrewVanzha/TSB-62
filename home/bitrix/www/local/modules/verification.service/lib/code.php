<?php

namespace Verification\Service;

use Bitrix\Main\Config\Option;
use Bitrix\Main\ORM\Data\UpdateResult;
use Bitrix\Main\Type\DateTime as DateTimeBitrix;
use DateInterval;
use DateTime;
use Exception;
use Verification\Service\Entity\CodeTable;

class Code
{
    /**
     * Генерация хэша для валидации email
     * @param int $length
     * @return string
     */
    public static function generate_hash($length = 16)
    {
        return bin2hex(openssl_random_pseudo_bytes($length));
    }

    /**
     * Генерация кода для верификации смс
     * @return string
     */
    public static function generate_sms_code()
    {
        $min = 0;
        $max = 9999;

        return str_pad(rand($min, $max), 4, 0, STR_PAD_LEFT);
    }

    /**
     * Получение кода
     * @param $params
     * @return array|null
     * @throws Exception
     */
    public static function get_code($params)
    {
        return CodeTable::getRow([
            'filter' => $params,
            'order' => ['id' => 'desc']
        ]);
    }

    /**
     * Получение всех кодов
     * @param $params
     * @return \Bitrix\Main\ORM\Query\Result
     * @throws Exception
     */
    public static function get_code_all($params)
    {
        return CodeTable::getList([
            'filter' => $params
        ]);
    }

    /**
     * Обновление кода
     * @param $id
     * @param $params
     * @return UpdateResult
     * @throws Exception
     */
    public static function update_code($id, $params)
    {
        return CodeTable::update($id, $params);
    }

    /**
     * Создание кода в БД
     * @param $data
     * @return string
     * @throws Exception
     */
    public static function add_code($data)
    {
        $time_link = Option::get('verification.service', 'other_time_link');
        $time_code = Option::get('verification.service', 'other_time_key');
        $date_start = new DateTimeBitrix();
        $date_end = new DateTime();
        $date_end->add(DateInterval::createFromDateString(
            $data['type'] === 'email'
                ? $time_link . ' minutes'
                : $time_code . ' minutes'
        ));
        $date_end = DateTimeBitrix::createFromPhp($date_end);
        $code = $data['type'] === 'email'
            ? self::generate_hash()
            : self::generate_sms_code();

        $params = [
            'date' => $date_start,
            'date_expired' => $date_end,
            'order_id' => $data['order_id'],
            'type' => $data['type'],
            'code' => $code
        ];

        // добавление кода в БД
        if (CodeTable::add($params)) {
            if ($data['type'] === 'email') {
                // отправка кода по email
                General::send_email([
                    'email' => $data['from'],
                    'code' => $code
                ]);
                // добавление события отправки
                Event::add_event([
                    'name' => 'send_email_code',
                    'order_id' => $data['order_id']
                ]);
            } else {
                // отправка кода по sms
                General::send_sms_message([
                    'phone' => $data['from'],
                    'code' => $code
                ]);
                // добавление события отправки
                Event::add_event([
                    'name' => 'send_sms_code',
                    'order_id' => $data['order_id']
                ]);
            }
        }

        return $code;
    }

    /**
     * Создание нового кода
     * @param $order
     * @return false|string
     * @throws Exception
     */
    public static function renew_code($order)
    {
        $code = self::get_code(['order_id' => $order['id'], 'status' => 0]);
        if (!empty($code['id'])) {
            self::update_code($code['id'], ['status' => 3]);
        }

        return self::add_code([
            'order_id' => $order['id'],
            'type' => $order['type'],
            'from' => $order['type'] === 'email'
                ? $order['email']
                : $order['phone_number']
        ]);
    }
}