<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main;
use \Bitrix\Main\Application;
use \Bitrix\Main\Loader;

define('LOG_FILENAME', $_SERVER['DOCUMENT_ROOT'].'/currency/log.txt'); // лог для проверки работы агента

class SynchCurrency extends CBitrixComponent
{
    public $MessageError = array();
    public $MessageSend  = array();

    private static $json_path;
    private static $csv_path;
    private static $rates_path;
    private static $xml_path;
    private static $html_path;
    private static $day_path;

    public function __construct($component)
    {
        parent::__construct($component);

        self::$json_path = $_SERVER['DOCUMENT_ROOT'] . '/currency/currency.json';
        self::$csv_path = $_SERVER['DOCUMENT_ROOT'] . '/currency/cur.csv';
        self::$rates_path = $_SERVER['DOCUMENT_ROOT'] . '/currency/rates.csv';
        self::$html_path = $_SERVER['DOCUMENT_ROOT'] . '/currency_rates_table.html';
        self::$xml_path = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=';
        self::$day_path = $_SERVER['DOCUMENT_ROOT'] . '/currency/day.json';
    }


    public function updateTest()
	{
		//AddMessage2Log(date('d-m-Y H:i:s'));
        $json = $this->checkJson();
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/test_currency.json', json_encode($json));
	}

    /**
     * Перезаписываем $this->arParams (удаляем ненужное)
     *
     * @param array $params Параметры компонента
     *
     * @return array Возвращает очищенные параметры компонента
     */
    public function onPrepareComponentParams($params)
    {
        return array(
            "CACHE_TIME" => $params['CACHE_TIME'],
            "OFFICE_IBLOCK_ID" => $params['OFFICE_IBLOCK_ID'],
            "CBR_IBLOCK_ID" => $params['CBR_IBLOCK_ID'],
        );
    }

    /**
     * Проверяет подключение необходиимых модулей
     */
    protected function checkModules()
    {
        if (!Loader::includeModule('iblock')) {
            throw new Main\LoaderException('Ошибка модуля iblock');
        }
    }

    /**
     * Вывод сообщения об ошибке
     */
    protected function actionMessage()
    {
        $this->arResult["MESSAGE_ERROR"] = $this->MessageError;
        $this->arResult["MESSAGE_SEND"] = $this->MessageSend;
        foreach ($this->arResult['MESSAGE_ERROR'] as $error) {
            echo "<p style='color: red;'>{$error}</p>";
        }
        foreach ($this->arResult['MESSAGE_SEND'] as $send) {
            echo "<p style='color: green;'>{$send}</p>";
        }
    }

    /**
     * Вывод курсов валют на сайт
     */
    protected function getResult()
    {
        try {
            $json = $this->checkJson();

            if (!empty($json['tsb']['time'])) {
                $this->arResult['MODIFY_DATE_FILE'] = $json['tsb']['time'];
            }

            try {
                $tsb = $this->getCourseTSB($json);
            } catch (Exception $e) {
                $tsb = array();
                $this->logger('error', $e->getMessage());
            }
            //debugg('$tsb');
            //debugg($tsb);

            try {
                $cbr = $this->getCourseCBR($json);
            } catch (Exception $e) {
                $cbr = array();
                $this->logger('error', $e->getMessage());
            }
            //debugg('$cbr');
            //debugg($cbr);

            // проверяем существование day.json
            if (!file_exists(self::$day_path)) {
                $day_json = $json;
                throw new Exception('файл day.json с курсами валют отсутствует, данные берем из текущего json');
            } else {
                $day_json = json_decode(file_get_contents(self::$day_path), true);
                $day_tsb = $this->getCourseTSB($day_json);
                $day_cbr = $this->getCourseCBR($day_json);
                //debugg('$day_cbr');
                //debugg($day_cbr);
            }

            foreach (self::templateCourses() as $key => $course) {
                if (!empty($tsb[$key]['buy'])) {
                    if (!empty($cbr[$key]) && !empty($cbr[$key]['course']) && !empty($cbr[$key]['status'])) {
                        $cbr_course = $cbr[$key]['course'];
                        $cbr_status = $cbr[$key]['status'];
                    } else {
                        $cbr_course = '';
                        $cbr_status = '';
                    }

                    $this->arResult['CUR'][$key] = array(
                        $course['iso_s'] . ' ' . $course['symbol'],
                        $tsb[$key]['buy'] . '/' . $tsb[$key]['status'],
                        $tsb[$key]['sell'] . '/' . $tsb[$key]['status'],
                        $cbr_course . '/' . $cbr_status,
                        $course['name'],
                        $course['iso_s'],
                        $course['symbol'],
                        '',
                    );
                }
            }
            $this->arResult['MAIN_TABLE'] = $this->makeCurrencyTableArray($this->arResult['CUR'], $day_tsb, $day_cbr);
            return $this->arResult['MAIN_TABLE'];
        } catch (Exception $e) {
            $this->logger('error', $e->getMessage());
            return [];
        }

    }

    /**
     * Выполнение компонента
     */
    public function executeComponent()
    {
        $res = [];
        try {
            $this->arResult["COMPONENT_ID"] = 'SC';
            $this->checkModules();
            //$this->updateCourses();
            $res = $this->getResult();
            $this->actionMessage();

            $this->includeComponentTemplate();
        } catch (Exception $e) {
            ShowError($e->getMessage());
        }
        return $res;
    }

    /**
     * Делаем таблицу с курсами валют для сайта
     */
    public function makeCurrencyTableArray($arCurrency, $day_tsb, $day_cbr)
    {
        function compare_currency_words($a, $b) {
            return strnatcmp($a["name"], $b["name"]);
        }

        \Bitrix\Main\Loader::IncludeModule('highloadblock');

        $ID = 2; // CurrencyOutCbrf
        $hlData = \Bitrix\Highloadblock\HighloadBlockTable::getById($ID)->fetch();
        $hlEntity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlData)->getDataClass();

        $arCurrencyOutCbrf = [];
        $result = $hlEntity::getList([
            'select' => ["*"],
            //"select" => array("ID", "UF_NAME", "UF_XML_ID"), // Поля для выборки
            'filter' => [],
            "order" => array(),
            //"order" => array("UF_SORT" => "ASC"),
        ]);
        while ($res = $result->fetch()) {
            $arCurrencyOutCbrf[] = $res;
        }


        $ID = 3; // CurrencyMultiplicity
        $hlData = \Bitrix\Highloadblock\HighloadBlockTable::getById($ID)->fetch();
        $hlEntity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlData)->getDataClass();

        $arCurrencyMultiplicity = [];
        $result = $hlEntity::getList([
            'select' => ["*"],
            'filter' => [],
            "order" => array(),
        ]);
        while ($res = $result->fetch()) {
            $arCurrencyMultiplicity[] = $res;
        }
        //debugg('$arCurrencyMultiplicity');
        //debugg($arCurrencyMultiplicity);

        $arShowTable = [];
        $arShowLine = [];
        $ii = 1;
        foreach ($arCurrency as $key=>$arCur) {
            if ($arCur[1] !== '/') {
                $arShowLine['name'] = $arCur[4];
                $symbol = $arCur[5];
                $arShowLine['symbol'] = $symbol;

                $arElement = explode("/", $arCur[1]);
                $arShowLine['buy'] = $arElement[0];
                $arShowLine['buy_move0'] = $arElement[1];
                if($arShowLine['buy'] > $day_tsb[$symbol]['buy']) $arShowLine['buy_move'] = '>';
                if($arShowLine['buy'] < $day_tsb[$symbol]['buy']) $arShowLine['buy_move'] = '<';
                if($arShowLine['buy'] == $day_tsb[$symbol]['buy']) $arShowLine['buy_move'] = '=';

                $arElement = explode("/", $arCur[2]);
                $arShowLine['sell'] = $arElement[0];
                $arShowLine['sell_move0'] = $arElement[1];
                if($arShowLine['sell'] > $day_tsb[$symbol]['sell']) $arShowLine['sell_move'] = '>';
                if($arShowLine['sell'] < $day_tsb[$symbol]['sell']) $arShowLine['sell_move'] = '<';
                if($arShowLine['sell'] == $day_tsb[$symbol]['sell']) $arShowLine['sell_move'] = '=';

                $arElement = explode("/", $arCur[3]);
                $arShowLine['cb'] = $arElement[0];
                $arShowLine['cb_move0'] = $arElement[1];
                if(!empty($arElement[0])) {
                    if($arShowLine['cb'] > $day_cbr[$symbol]['course']) $arShowLine['cb_move'] = '>';
                    if($arShowLine['cb'] < $day_cbr[$symbol]['course']) $arShowLine['cb_move'] = '<';
                    if($arShowLine['cb'] == $day_cbr[$symbol]['course']) $arShowLine['cb_move'] = '=';
                } else {
                    $arShowLine['cb_move'] = '';
                }

                $arShowLine['note'] = '';
                $arShowLine['mark'] = '';
                $arShowLine['multi'] = '';

                /*foreach ($arCurrencyOutCbrf as $item) {                  // сначала сортировка
                    if($symbol == $item['UF_CURRENCY_OUT_CB']) {
                        $arShowLine['note'] = "<sup>" . $ii . "</sup>";
                        $ii += 1;
                        $arShowLine['mark'] = 'cb';
                    }
                }

                foreach ($arCurrencyMultiplicity as $item) {
                    if($symbol == $item['UF_CURR_WITH_MULT']) {
                        if($arShowLine['mark'] === 'cb') {
                            $arShowLine['mark'] = 'both';
                        } else {
                            $arShowLine['mark'] = 'multi';
                            $arShowLine['note'] = "<sup>" . $ii . "</sup>";
                            $ii += 1;
                        }
                        $arShowLine['multi'] = $item['UF_MULT_COEFF'];
                    }
                }*/
            }
            $arShowTable[$key] = $arShowLine;
        }
        usort($arShowTable, "compare_currency_words");

        $ii = 1;
        foreach ($arShowTable as $key=>$arCur) {
            $symbol = $arCur['symbol'];
            foreach ($arCurrencyOutCbrf as $item) {
                if($symbol == $item['UF_CURRENCY_OUT_CB']) {
                    $arShowTable[$key]['note'] = "<sup>" . $ii . "</sup>";
                    $ii += 1;
                    $arShowTable[$key]['mark'] = 'cb';
                }
            }

            foreach ($arCurrencyMultiplicity as $item) {
                if($symbol == $item['UF_CURR_WITH_MULT']) {
                    if($arShowTable[$key]['mark'] === 'cb') {
                        $arShowTable[$key]['mark'] = 'both';
                    } else {
                        $arShowTable[$key]['mark'] = 'multi';
                        $arShowTable[$key]['note'] = "<sup>" . $ii . "</sup>";
                        $ii += 1;
                    }
                    $arShowTable[$key]['multi'] = $item['UF_MULT_COEFF'];
                    if (isset($item['UF_CURR_TEXT_MULT'])) {
                        $arShowTable[$key]['genetive'] = $item['UF_CURR_TEXT_MULT'];
                    } else {
                        $arShowTable[$key]['genetive'] = ' единиц валюты';
                    }
                }
            }
        }
        return $arShowTable;
    }


    /**
     * Обновляем курсы валют на сайте
     */
    public function updateCourses()
    {
        try {
            // проверяем существование json-файла и его валидность
            $json = $this->checkJson();

            // проверяем существование csv-файла
            if (!file_exists(self::$csv_path)) {
                throw new Exception('CSV-файл с курсами валют отсутствует');
            }

            // если время последнего обновления курсов ТСБ < времени обновления файла с актуальными курсами, то обновляем курсы в json
            if ($json['tsb']['time'] < filectime(self::$csv_path)) { //- делает по cron
                $tsb_courses = $this->parseCoursesTSB();

                //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/tsb_courses_agent.json', json_encode($tsb_courses));

                if (!empty($tsb_courses)) {
                    $json = $this->updateCoursesTSB($tsb_courses, $json);
                    $update = true;
                }
            }

            // если курсы валют ЦБ сегодня ещё не обновлялись, то обновляем - делает по cron
            file_put_contents(self::$base_path . '/currency/cbr_mktime_agent.json', json_encode(mktime(0, 0, 0, date('m'), date('d'), date('Y'))));
            if ($json['cbr']['time'] < mktime(0, 0, 0, date('m'), date('d'), date('Y'))) {
                $cbr_courses = $this->parseCoursesCBR(); //- делает по cron
                file_put_contents(self::$base_path . '/currency/cbr_courses_agent.json', json_encode($cbr_courses));

                $this->loadCurrencyTemplate();
                //$data = $this->loadCoursesCBR();
                //$this->parseCoursesCBR();
                //$this->addCourseForDynamic($json['cbr']['data']);
                // обновляем html-файл для банки.ру
                //$this->createHtml($json);
                //$this->add_history_rate($json);

                if (!empty($cbr_courses)) {
                    $json = $this->updateCoursesCBR($cbr_courses, $json);
                    $update = true;

                    $this->addCourseForDynamic($json['cbr']['data']);
                }
            }

            // если обновлились данные по курсам ТСБ или ЦБ, то записываем всё в json-файл
            /*if (!empty($update)) {
                file_put_contents(self::$json_path, json_encode($json)); - делает по cron

                // если запись в json-файл не произошла, заносим в логи ошибку
                if (filectime(self::$json_path) < time() - 120) {
                    $this->logger('error', 'При обновлении json-файла возникла ошибка'); - делает по cron
                } else {
                    $this->logger('notice', 'Json-файл успешно обновлен');

                    // обновляем html-файл для банки.ру
                    $this->createHtml($json);
                    $this->add_history_rate($json);
                }
            }*/
        } catch (Exception $e) {
            $this->logger('error', $e->getMessage());
        }
    }

    /**
     * Проверка json-файла с курсами валют
     *
     * @return array
     */
    private function checkJson()
    {
        try {
            if (!file_exists(self::$json_path)) {
                throw new Exception('Файл json отстутствует. Будет создан новый файл.');
            }

            $json = json_decode(file_get_contents(self::$json_path), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Невалидный json. Данные будут полностью заменены новыми.');
            }
        } catch (Exception $e) {
            $json = array(
                'tsb' => array(
                    'time' => time() - 365 * 24 * 60 * 60,
                    'data' => []
                ),
                'cbr' => array(
                    'time' => time() - 365 * 24 * 60 * 60,
                    'data' => []
                )
            );

            $this->logger('warning', $e->getMessage());
        }
        return $json;
    }

    /**
     * Обновляем курсы валют по банку ТСБ
     *
     * @param array $courses Массив с актуальными курсами валют ТСБ банка
     * @param array $json Массив последних обновленных данных по курсам валют
     *
     * @return array Обновленный массив данных по курсам валют
     */
    private function updateCoursesTSB(array $courses, array $json)
    {
        $currency_out = [];

        foreach ($courses as $key => $course) {
            $currency_out[$key] = $course;

            if (empty($json['tsb']['data'][$key])) {
                continue;
            }

            $currency_out[$key] = $this->updateCoursesTSBStatus($course, $json['tsb']['data'][$key]);
        }

        $json['tsb']['time'] = time();
        $json['tsb']['data'] = $currency_out;

        return $json;
    }

    /**
     * Обновляем курсы валют по ЦБ РФ
     *
     * @param array $courses Массив с актуальными курсами валют ЦБ РФ
     * @param array $json Массив последних обновленных данных по курсам валют
     *
     * @return array Обновленный массив данных по курсам валют
     */
    private function updateCoursesCBR(array $courses, array $json)
    {
        $currency_out = [];

        foreach ($courses as $key => $course) {
            $currency_out[$key] = $course;

            if (empty($json['cbr']['data'][$key])) {
                continue;
            }

            $currency_out[$key] = $this->updateCoursesCBRStatus($course, $json['cbr']['data'][$key]);
        }

        $json['cbr']['time'] = time();
        $json['cbr']['data'] = $currency_out;

        return $json;
    }

    /**
     * Обновляем статусы курса валюты ТСБ
     *
     * @param array $course Актуальный курс валюты
     * @param array $json Массив последних обновленных данных по курсам валют
     *
     * @return array Возвращает массив с обновленными статусами курсов валют ТСБ
     */
    private function updateCoursesTSBStatus(array $course, array $json)
    {
        foreach ($course['currency'] as $key => $currency) {
            if (!empty($json['currency'][$key])) {
                if ($json['currency'][$key]['buy'] === $currency['buy'] && $json['currency'][$key]['sell'] === $currency['sell']) {
                    $course['currency'][$key]['status'] = $json['currency'][$key]['status'];
                } elseif ($json['currency'][$key]['buy'] > $currency['buy']) {
                    $course['currency'][$key]['status'] = '<';
                } else {
                    $course['currency'][$key]['status'] = '>';
                }
            }
        }

        return $course;
    }

    /**
     * Обновляем статусы курса валюты ЦБ РФ
     *
     * @param array $course Актуальный курс валюты
     * @param array $json Массив последних обновленных данных по курсам валют
     *
     * @return array Возвращает массив с обновленными статусами курсов валют ЦБ РФ
     */
    private function updateCoursesCBRStatus(array $course, array $json)
    {
        if ($json['course'] === $course['course']) {
            $course['status'] = $json['status'];
        } elseif ($json['course'] > $course['course']) {
            $course['status'] = '<';
        } else {
            $course['status'] = '>';
        }

        return $course;
    }

    /**
     * Парсим CSV-файл с курсами валют банка ТСБ
     *
     * @return array
     */
    private function parseCoursesTSB()
    {
        try {
            $fd = @fopen(self::$csv_path, "r");

            if (!$fd) {
                throw new Exception('CSV-файл с курсами валют не доступен.');
            }

            $result = [];

            while (($data = fgetcsv($fd, 1000, ";")) !== false) {
                $num = count($data);
                if ($num == 6) {
                    for ($c = 0; $c < $num; $c++) {
                        $result[$data['0']]['code'] = $data['0'];
                        $result[$data['0']]['name'] = $data['1'];
                        $result[$data['0']]['date'] = $data['2'];
                        $result[$data['0']]['currency'][$data['3']]['buy'] = $data['4'];
                        $result[$data['0']]['currency'][$data['3']]['sell'] = $data['5'];
                        $result[$data['0']]['currency'][$data['3']]['status'] = '>';
                    }
                }
            }

            @fclose($fd);

            return $result;
        } catch (Exception $e) {
            $this->logger('error', $e->getMessage());

            return [];
        }
    }

    /**
     * Парсим XML-файл с курсами валют ЦБ РФ
     *
     * @return array
     */
    private function parseCoursesCBR()
    {
        try {
            $data = $this->loadCoursesCBR();

            if (empty($data)) {
                throw new Exception('Данные по курсам валют ЦБ РФ отсутствуют');
            }

            $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
            preg_match_all($pattern, $data, $courses, PREG_SET_ORDER);

            $result = [];

            foreach ($courses as $course) {
                foreach (self::templateCourses() as $template) {
//if ($course[2] == $template['iso_n'] && $template['iso_n'] !== 376 && $template['iso_n'] !== 784 && $template['iso_n'] !== 941 && $template['iso_n'] !== 764 && $template['iso_n'] !== 818 && $template['iso_n'] !== 682 && $template['iso_n'] !== 410) { // кроме ILS, AED, RSD, THB, SAR, KRW
//if ($course[2] == $template['iso_n'] && $template['iso_n'] !== 376 && $template['iso_n'] !== 784 && $template['iso_n'] !== 941 && $template['iso_n'] !== 764 && $template['iso_n'] !== 818 && $template['iso_n'] !== 682) { // кроме ILS, AED, RSD, THB, SAR
if ($course[2] == $template['iso_n'] && $template['iso_n'] !== 376 && $template['iso_n'] !== 784 && $template['iso_n'] !== 941 && $template['iso_n'] !== 764 && $template['iso_n'] !== 818 && $template['iso_n'] !== 682 && $template['iso_n'] !== 634 && $template['iso_n'] !== 484) { // кроме ILS, AED, RSD, THB, SAR, QAR, MXN
                        $result[$template['iso_s']]['course'] = str_replace(",", ".", $course[4]);
                        $result[$template['iso_s']]['status'] = '>';
                    }
                }
            }
            //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/cur_cbr.json', json_encode($result));

            return $result;

        } catch (Exception $e) {
            $this->logger('error', $e->getMessage());

            return [];
        }
    }

    /**
     * Загрузка курсов валют с ЦБ РФ
     *
     * @return string Данные по курсам валют
     * @throws Exception
     */
    private function loadCoursesCBR()
    {
        $date = date('d/m/Y');
        $link = self::$xml_path . $date;

        $fd = @fopen($link, "r");

        if (!$fd) {
            throw new Exception('Сервер данных ЦБ РФ не отвечает.');
        }

        $data = '';

        while (!feof($fd)) {
            $data .= @fgets($fd, 4096);
        }

        @fclose($fd);

        //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/cur_cbr.xml', $data);
        //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/cur_cbr.txt', $data);

        return $data;
    }

    /**
     * Загрузка курсов валют с ЦБ РФ
     *
     * @return string Данные по курсам валют
     * @throws Exception
     */
    private function loadCurrencyTemplate()
    {
        $data = self::templateCourses();

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/cur_template.txt', json_encode($data));
    }

    /**
     * Получение списка городов
     *
     * @return array
     */
    private function getCity()
    {
        $cities = [];

        $rsCities = CIBlockElement::GetList(
            array(),
            array('IBLOCK_ID' => 114, 'ACTIVE' => 'Y'),
            false,
            false,
            array('ID', 'NAME', 'PROPERTY_ATT_CODE')
        );
        while ($arCity = $rsCities->Fetch()) {
            $cities[] = $arCity;
        }

        return $cities;
    }

    /**
     * Создание HTML-файла с курсами валют
     *
     * @param array $json Массив с данными по курсам валют
     */
    private function createHTML(array $json)
    {
        $date = date('d.m.y', $json['tsb']['time']);

        $output = '<!DOCTYPE html>';
        $output .= '<html lang="ru">';
        $output .= '<head>';
        $output .= '<title>Курсы обмена наличной иностранной валюты, установленные банком на ' . $date . '</title>';
        $output .= '<style type="text/css">table {border-collapse: collapse;}td, th {padding: 5px 10px; border-bottom: 1px #999 solid;}th {text-align: left; border-width: 2px;}tr:hover td {background-color: #F3F3F3; border-color: #555;}</style>';
        $output .= '</head>';
        $output .= '<body>';

        $cities = $this->getCity();

        foreach ($cities as $city) {
            $output .= '<h2>' . $city['NAME'] . '</h2>';
            $output .= '<table>';
            $output .= '<thead>';
            $output .= '<tr><th>код</th><th>единиц</th><th>название валюты</th><th>покупка</th><th>продажа</th></tr>';
            $output .= '</thead>';

            if (!empty($city['PROPERTY_ATT_CODE_VALUE'])) {
                $courses = $this->minimumCourse($city, $json);

                foreach ($courses as $key => $course) {
                    if ($course['buy'] == 0) {
                        continue;
                    }

					//if (in_array($key, ['BYN', 'TRY', 'ILS'])) {
					//if (in_array($key, ['BYN', 'TRY', 'ILS', 'CAD', 'SAR', 'INR', 'AZN', 'QAR', 'SGD', 'AUD', 'KZT'])) {
					//if (in_array($key, ['BYN', 'TRY', 'ILS', 'CAD', 'SAR', 'INR', 'AZN', 'QAR', 'SGD', 'AUD', 'KZT', 'AED', 'EGP'])) {
					//if (in_array($key, ['KGS', 'ZAR' ,'BYN', 'TRY', 'ILS', 'CAD', 'SAR', 'INR', 'AZN', 'QAR', 'SGD', 'AUD', 'KZT', 'AED', 'EGP'])) {
					//if (in_array($key, ['KGS', 'ZAR' ,'BYN', 'TRY', 'ILS', 'CAD', 'SAR', 'INR', 'AZN', 'QAR', 'SGD', 'AUD', 'KZT', 'AED', 'EGP', 'KRW'])) {
					//if (in_array($key, ['KGS', 'ZAR' ,'BYN', 'TRY', 'ILS', 'CAD', 'SAR', 'INR', 'AZN', 'QAR', 'SGD', 'AUD', 'KZT', 'AED', 'EGP', 'KRW', 'DKK'])) {
					if (in_array($key, ['KGS', 'ZAR' ,'BYN', 'TRY', 'ILS', 'CAD', 'SAR', 'INR', 'AZN', 'QAR', 'SGD', 'AUD', 'KZT', 'AED', 'EGP', 'KRW', 'DKK', 'QAR', 'MXN', 'MDL', 'CZK', 'THB', 'TJS', 'BGN', 'TJS', 'RSD', 'HKD', 'HUF', 'AMD', 'UZS'])) {
                        continue; 
					} /* AUD TRY AZN BYN ILS QAR SAR AED EGP INR KZT CAD SGD */ /* KGS ZAR */

                    $output .= '<tr>';
                    $output .= '<td>' . $key . '</td>';
                    $output .= '<td>' . self::templateCourses()[$key]['count'] . '</td>';
                    $output .= '<td>' . self::templateCourses()[$key]['name'] . '</td>';
                    $output .= '<td>' . str_replace('.', ',', $course['buy']) . '</td>';
                    $output .= '<td>' . str_replace('.', ',', $course['sell']) . '</td>';
                    $output .= '</tr>';
                }
            }

            $output .= '</table>';
        }

        file_put_contents(self::$html_path, $output);
    }

    /**
     * Формирование минимальных курсов валют для выбранного города
     *
     * @param array $city Данные по городу и офисам
     * @param array $json Массив с данными по курсам валют
     *
     * @return array Возвращает минимальные курсы валют под текущий город
     */
    private function minimumCourse(array $city, array $json)
    {
        $courses = [];

        foreach ($city['PROPERTY_ATT_CODE_VALUE'] as $code) {
            if (empty($json['tsb']['data'][$code])
                || ($city['ID'] == 399 && $code != 10013)
                || ($city['ID'] == 400 && $code != 10017)
            ) {
                continue;
            }

            $course_code = $json['tsb']['data'][$code]['currency'];

            foreach ($course_code as $key => $course) {
                if (empty($courses[$key]) || $courses[$key]['buy'] > $course['buy']) {
                    $courses[$key]['buy'] = $course['buy'];
                    $courses[$key]['sell'] = $course['sell'];
                    $courses[$key]['status'] = $course['status'];
                }
            }
        }

        return $courses;
    }

    /**
     * Получаем курсы валют ТСБ для вывода на сайт
     *
     * @param array $json Массив с курсами валют
     *
     * @return array Возвращает массив курсов валют ТСБ
     * @throws Exception
     */
    private function getCourseTSB(array $json)
    {
        if (empty($json['tsb']['data'])) {
            throw new Exception('Данные по курсам валют ТСБ отсутствуют');
        }

        $data = $json['tsb']['data'];

        $office_id = \GarbageStorage::get('OfficeId');
        //debugg('$selectCity');
        //debugg($_SESSION['city']);
        //debugg('getCourseTSB / $office_id=');
        //debugg($office_id);
        //debugg($data);

        if (!empty($office_id)) {
            $result = $this->getCourseByOffice($office_id, $data);
            //debugg('getCourseTSB / $tsb / $office_id = ');
            //debugg($result);
        } else {
            session_start();

            if (isset($_SESSION['city'])) {
                $selectCity = $_SESSION['city'];
            } else {
                $selectCity = 399;
            }

            $result = $this->getCourseByCity($selectCity, $json);
            //debugg('getCourseTSB / $tsb / getCourseByCity = ');
            //debugg($result);
        }
        //debugg('$tsb=');
        //debugg($result);
        return $result;
    }

    /**
     * Получаем курсы валют ТСБ конкретного офиса
     *
     * @param int $office_id ID офиса банка ТСБ
     * @param array $data Данные курсов валют
     *
     * @return array Возвращает курсы валют по текущему офису
     * @throws Exception
     */
    private function getCourseByOffice($office_id, array $data)
    {
        $rsOffices = CIBlockElement::GetList(
            array("SORT" => "ASC"),
            array("IBLOCK_ID" => 115, "ID" => $office_id),
            false,
            false,
            array("IBLOCK_ID", "ID", "PROPERTY_ATT_CODE")
        );

        while ($arOffice = $rsOffices->Fetch()) {
            //debugg('getCourseByOffice=');
            //debugg($arOffice);
            if (!empty($arOffice['PROPERTY_ATT_CODE_VALUE'])) {
                return $data[$arOffice['PROPERTY_ATT_CODE_VALUE']]['currency'];
            }
        }

        throw new Exception('Не удалось получить данные курсов валют по офису');
    }

    /**
     * Получаем курсы валют ТСБ конкретного города
     *
     * @param int $city ID города
     * @param array $json Данные курсов валют
     *
     * @return array Возвращает курсы валют по текущему городу
     * @throws Exception
     */
    private function getCourseByCity($city, array $json)
    {
        $cities = CIBlockElement::GetList(
            array("SORT" => "ASC"),
            array("IBLOCK_ID" => "114", "ID" => $city, 'ACTIVE' => 'Y'),
            false,
            false,
            array("IBLOCK_ID", "ID", "NAME", "PROPERTY_ATT_CODE")
        );

        while ($city = $cities->Fetch()) {
            if (!empty($city['PROPERTY_ATT_CODE_VALUE'])) {
                return $this->minimumCourse($city, $json);
            }
        }

        throw new Exception('Не удалось получить данные курсов валют по городу');
    }

    /**
     * Получаем курсы валют ЦБ РФ для вывода на сайт
     *
     * @param array $json Массив с курсами валют
     *
     * @return array Возвращает массив курсов валют ЦБ РФ
     * @throws Exception
     */
    private function getCourseCBR(array $json)
    {
        if (empty($json['cbr']['data'])) {
            throw new Exception('Данные по курсам валют ЦБ РФ отсутствуют');
        }
        return $json['cbr']['data'];
    }

    /**
     * Шаблонные данные по курсам валют
     * @return array
     */
    private static function templateCourses()
    {
        $courses = [];

        $courses['USD']['name'] = 'Доллар США';
        $courses['USD']['symbol'] = '$';
        $courses['USD']['count'] = 1;
        $courses['USD']['iso_n'] = 840;
        $courses['USD']['iso_s'] = 'USD';

        $courses['EUR']['name'] = 'Евро';
        $courses['EUR']['symbol'] = '€';
        $courses['EUR']['count'] = 1;
        $courses['EUR']['iso_n'] = 978;
        $courses['EUR']['iso_s'] = 'EUR';

        $courses['AED']['name'] = 'Дирхам ОАЭ';  // добавка с 20.12.21
        $courses['AED']['symbol'] = 'DH';
        $courses['AED']['count'] = 1;
        $courses['AED']['iso_n'] = 784;
        $courses['AED']['iso_s'] = 'AED';

        $courses['AMD']['name'] = 'Армянский драм';  // добавка с 10.12.21
        $courses['AMD']['symbol'] = '֏';
        $courses['AMD']['count'] = 100;
        $courses['AMD']['iso_n'] = '051';
        $courses['AMD']['iso_s'] = 'AMD';

        $courses['AUD']['name'] = 'Австралийский доллар';  // добавка с 5.12.21
        $courses['AUD']['symbol'] = '$';
        $courses['AUD']['count'] = 1;
        $courses['AUD']['iso_n'] = '036';
        $courses['AUD']['iso_s'] = 'AUD';

        $courses['AZN']['name'] = 'Азербайджанский манат';  // добавка с 5.12.21
        $courses['AZN']['symbol'] = '₼';
        $courses['AZN']['count'] = 1;
        $courses['AZN']['iso_n'] = 944;
        $courses['AZN']['iso_s'] = 'AZN';

        $courses['BGN']['name'] = 'Болгарский лев';  // добавка с 5.12.21
        $courses['BGN']['symbol'] = 'лв';
        $courses['BGN']['count'] = 1;
        $courses['BGN']['iso_n'] = 975;
        $courses['BGN']['iso_s'] = 'BGN';

        $courses['BYN']['name'] = 'Белорусский рубль';
        $courses['BYN']['symbol'] = 'Br';
        $courses['BYN']['count'] = 1;
        $courses['BYN']['iso_n'] = 933;
        $courses['BYN']['iso_s'] = 'BYN';

        $courses['CAD']['name'] = 'Канадский доллар';  // добавка с 5.12.21
        $courses['CAD']['symbol'] = 'C$';
        $courses['CAD']['count'] = 1;
        $courses['CAD']['iso_n'] = 124;
        $courses['CAD']['iso_s'] = 'CAD';

        $courses['CHF']['name'] = 'Швейцарский франк';
        $courses['CHF']['symbol'] = '₣';
        $courses['CHF']['count'] = 1;
        $courses['CHF']['iso_n'] = 756;
        $courses['CHF']['iso_s'] = 'CHF';

        $courses['CNY']['name'] = 'Китайский юань';
        $courses['CNY']['symbol'] = '¥';
        $courses['CNY']['count'] = 10;
        $courses['CNY']['iso_n'] = 156;
        $courses['CNY']['iso_s'] = 'CNY';

        $courses['CZK']['name'] = 'Чешская крона';  // добавка с 5.12.21
        $courses['CZK']['symbol'] = 'Kč';
        $courses['CZK']['count'] = 10;
        $courses['CZK']['iso_n'] = 203;
        $courses['CZK']['iso_s'] = 'CZK';

        $courses['DKK']['name'] = 'Датская крона';  // добавка с 11.1.22
        $courses['DKK']['symbol'] = 'kr';
        $courses['DKK']['count'] = 1;
        $courses['DKK']['iso_n'] = 208;
        $courses['DKK']['iso_s'] = 'DKK';

        $courses['EGP']['name'] = 'Египетский фунт';  // добавка с 22.12.21
        $courses['EGP']['symbol'] = 'ДУ';
        $courses['EGP']['count'] = 10;
        $courses['EGP']['iso_n'] = 818;
        $courses['EGP']['iso_s'] = 'EGP';

        $courses['GBP']['name'] = 'Фунт стерлингов';
        $courses['GBP']['symbol'] = '£';
        $courses['GBP']['count'] = 1;
        $courses['GBP']['iso_n'] = 826;
        $courses['GBP']['iso_s'] = 'GBP';

        $courses['GEL']['name'] = 'Грузинский лари';  // добавка с 22.2.22
        $courses['GEL']['symbol'] = '₾';
        $courses['GEL']['count'] = 1;
        $courses['GEL']['iso_n'] = 981;
        $courses['GEL']['iso_s'] = 'GEL';

        $courses['HKD']['name'] = 'Гонконгский доллар';  // добавка с 14.12.21
        $courses['HKD']['symbol'] = 'HK$';
        $courses['HKD']['count'] = 10;
        $courses['HKD']['iso_n'] = 344;
        $courses['HKD']['iso_s'] = 'HKD';

        $courses['HUF']['name'] = 'Венгерский форинт';  // добавка с 5.12.21
        $courses['HUF']['symbol'] = 'F';
        $courses['HUF']['count'] = 100;
        $courses['HUF']['iso_n'] = 348;
        $courses['HUF']['iso_s'] = 'HUF';

        $courses['ILS']['name'] = 'Новый израильский шекель';  // добавка с 16.12.21
        $courses['ILS']['symbol'] = 'ש';
        $courses['ILS']['count'] = 1;
        $courses['ILS']['iso_n'] = 376;
        $courses['ILS']['iso_s'] = 'ILS';

        $courses['INR']['name'] = 'Индийская рупия';  // добавка с 5.12.21
        $courses['INR']['symbol'] = 'Rs';
        $courses['INR']['count'] = 10;
        $courses['INR']['iso_n'] = 356;
        $courses['INR']['iso_s'] = 'INR';

        $courses['JPY']['name'] = 'Японская иена';
        $courses['JPY']['symbol'] = '¥';
        $courses['JPY']['count'] = 100;
        $courses['JPY']['iso_n'] = 392;
        $courses['JPY']['iso_s'] = 'JPY';

        $courses['KGS']['name'] = 'Киргизский сом';  // добавка с 5.12.21
        $courses['KGS']['symbol'] = 'с';
        $courses['KGS']['count'] = 100;
        $courses['KGS']['iso_n'] = 417;
        $courses['KGS']['iso_s'] = 'KGS';

        $courses['KRW']['name'] = 'Южнокорейская вона';  // добавка с 10.1.22
        $courses['KRW']['symbol'] = '₩';
        $courses['KRW']['count'] = 1000;
        $courses['KRW']['iso_n'] = 410;
        $courses['KRW']['iso_s'] = 'KRW';

        $courses['KZT']['name'] = 'Казахстанский тенге';  // добавка с 5.12.21
        $courses['KZT']['symbol'] = '₸';
        $courses['KZT']['count'] = 1;
        $courses['KZT']['iso_n'] = 398;
        $courses['KZT']['iso_s'] = 'KZT';

        $courses['MDL']['name'] = 'Молдавский лей';  // добавка с 14.12.21
        $courses['MDL']['symbol'] = 'L';
        $courses['MDL']['count'] = 10;
        $courses['MDL']['iso_n'] = 498;
        $courses['MDL']['iso_s'] = 'MDL';

        $courses['MXN']['name'] = 'Мексиканское песо';  // добавка с 14.1.22
        $courses['MXN']['symbol'] = '$';
        $courses['MXN']['count'] = 10;
        $courses['MXN']['iso_n'] = 484;
        $courses['MXN']['iso_s'] = 'MXN';

        $courses['PLN']['name'] = 'Польский злотый';
        $courses['PLN']['symbol'] = 'zł';
        $courses['PLN']['count'] = 1;
        $courses['PLN']['iso_n'] = 985;
        $courses['PLN']['iso_s'] = 'PLN';

        $courses['QAR']['name'] = 'Катарский риал';  // добавка с 13.1.22
        $courses['QAR']['symbol'] = 'QR';
        $courses['QAR']['count'] = 1000;
        $courses['QAR']['iso_n'] = 634;
        $courses['QAR']['iso_s'] = 'QAR';

        $courses['RSD']['name'] = 'Сербский динар';  // добавка с 20.12.21  THB
        $courses['RSD']['symbol'] = 'din';
        $courses['RSD']['count'] = 1;
        $courses['RSD']['iso_n'] = 941;
        $courses['RSD']['iso_s'] = 'RSD';

        $courses['SAR']['name'] = 'Саудовский риял';  // добавка с 28.12.21
        $courses['SAR']['symbol'] = 'SR';
        $courses['SAR']['count'] = 1;
        $courses['SAR']['iso_n'] = 682;
        $courses['SAR']['iso_s'] = 'SAR';

        $courses['SGD']['name'] = 'Сингапурский доллар';  // добавка с 5.12.21
        $courses['SGD']['symbol'] = '$';
        $courses['SGD']['count'] = 1;
        $courses['SGD']['iso_n'] = 702;
        $courses['SGD']['iso_s'] = 'SGD';

        $courses['THB']['name'] = 'Тайский бат';  // добавка с 20.12.21
        $courses['THB']['symbol'] = '฿';
        $courses['THB']['count'] = 1;
        $courses['THB']['iso_n'] = 764;
        $courses['THB']['iso_s'] = 'THB';

        $courses['TJS']['name'] = 'Таджикский сомони';  // добавка с 10.12.21
        $courses['TJS']['symbol'] = 'c';
        $courses['TJS']['count'] = 10;
        $courses['TJS']['iso_n'] = 972;
        $courses['TJS']['iso_s'] = 'TJS';

        $courses['TRY']['name'] = 'Турецкая лира';
        $courses['TRY']['symbol'] = '₺';
        $courses['TRY']['count'] = 10;
        $courses['TRY']['iso_n'] = 949;
        $courses['TRY']['iso_s'] = 'TRY';

        $courses['UZS']['name'] = 'Узбекский сум';  // добавка с 31.1.22
        $courses['UZS']['symbol'] = "So'm";
        $courses['UZS']['count'] = 10000;
        $courses['UZS']['iso_n'] = 860;
        $courses['UZS']['iso_s'] = 'UZS';

        $courses['ZAR']['name'] = 'Южноафриканский рэнд';  // добавка с 5.12.21
        $courses['ZAR']['symbol'] = 'R';
        $courses['ZAR']['count'] = 10;
        $courses['ZAR']['iso_n'] = 710;
        $courses['ZAR']['iso_s'] = 'ZAR';

        return $courses;
    }

    /**
     * Добавляем курсы валют ЦБ РФ для динамического графика
     *
     * @param array $data Данные по курсам валют ЦБ РФ
     */
    private function addCourseForDynamic(array $data)
    {
        $el = new CIBlockElement;
        $props = [];

        foreach ($data as $key => $course) {
            $props['ATT_' . $key] = $course['course'];
        }

        $el->Add(array(
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID" => $this->arParams['CBR_IBLOCK_ID'],
            "PROPERTY_VALUES" => $props,
            "NAME" => date("Y-m-d", time()),
            "ACTIVE" => "Y",
            "PREVIEW_TEXT" => "",
            "DETAIL_TEXT" => ""
        ));
    }

    /**
     * Логирование ошибок, предупреждений, действий
     *
     * @param string $type Тип лог-данных
     * @param string $message Сообщение для записи в логи
     */
    private function logger($type, $message)
    {
        file_put_contents(
            $_SERVER['DOCUMENT_ROOT'] . $this->GetPath() . '/log/' . $type . '.log',
            '[' . date('d.m.Y H:i:s') . ']' . $message . PHP_EOL,
            FILE_APPEND
        );
    }

    /**
     * История курсов валюты
     * @param $json
     */
    private function add_history_rate($json)
    {
        $settings = ['10013' => ['USD', 'EUR']];
        $path = $_SERVER['DOCUMENT_ROOT'] . '/currency/history/';
        $filename = date('dmY') . '_rate.json';
        $content = file_exists($path . $filename)
            ? json_decode(file_get_contents($path . $filename), true)
            : [];

        foreach ($settings as $key => $value) {
            if (!$office = $json['tsb']['data'][$key]) {
                continue;
            }

            foreach ($value as $currency) {
                if (!$office['currency'][$currency]) {
                    continue;
                }

                $update = true;
                $output_currency = $content[$key][$currency] ? $content[$key][$currency] : [];

                if (isset($content[$key][$currency]) && count($content[$key][$currency]) > 0) {
                    $last_history_item = end($content[$key][$currency]);
                    $update = $last_history_item['buy'] != $office['currency'][$currency]['buy']
                        || $last_history_item['sell'] != $office['currency'][$currency]['sell'];
                }

                if ($update) {
                    $output_currency[] = [
                        'date' => date('d.m.Y H:i:s'),
                        'buy' => $office['currency'][$currency]['buy'],
                        'sell' => $office['currency'][$currency]['sell']
                    ];
                }

                $content[$key][$currency] = $output_currency;
            }
        }

        file_put_contents(
            $path . $filename,
            json_encode($content)
        );
    }
}