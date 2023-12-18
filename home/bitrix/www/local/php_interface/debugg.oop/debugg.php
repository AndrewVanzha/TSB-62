<?php

namespace Debugg\Oop;

//class Logger
class My
{
    public static function debug($data)
    {
        global $USER;
        if($USER->GetID() == 107) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        }
    }
    /**
     * Запись логов в файл
     *
     * @param $type
     * @param $message
     */
    public static function logger($type, $message)
    {
        if (in_array($type, ['warning', 'error', 'rbs']) && !empty($message)) {
            file_put_contents(
                $_SERVER["DOCUMENT_ROOT"] .
                '/logs/' .
                $type .  '_' . date('YW') .'.log',
                '[' . date('d.m.Y H:i:s') . '] ' .
                $message . PHP_EOL,
                FILE_APPEND
            );
        }
    }
}