<?php
//use \Bitrix\Main;
//use \Bitrix\Main\Application;
//use \Bitrix\Main\Loader;

//require_once ($_SERVER['DOCUMENT_ROOT']."/local/php_interface/functions.php");

class ScriptSynchCurrency {
    public $MessageError = array();
    public $MessageSend  = array();

    private static $base_path;
    private static $json_path;
    private static $csv_path;
    private static $rates_path;
    private static $xml_path;
    private static $day_path;

    public function __construct($component)
    {
        //parent::__construct($component);

        self::$base_path = "/home/bitrix/www";
        self::$json_path = self::$base_path . '/currency/currency.json';
        //self::$json_path = $_SERVER['DOCUMENT_ROOT'] . '/currency/currency.json';
        self::$csv_path = self::$base_path . '/currency/cur.csv';
        self::$rates_path = $_SERVER['DOCUMENT_ROOT'] . '/currency/rates.csv';
        //self::$csv_path = $_SERVER['DOCUMENT_ROOT'] . '/currency/cur.csv';
        self::$xml_path = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=';
        self::$day_path = self::$base_path . '/currency/day.json';
    }

    public function updateTest()
    {
        //AddMessage2Log(date('d-m-Y H:i:s'));
        $filename = self::$base_path . "/chastnym-klientam/konvertor-valyut/test" . "_" . date("Y-m-d_H-i-s") . ".txt";
        file_put_contents($filename, self::$json_path . ' ' . self::$csv_path);
        //file_put_contents($filename, ' ');
        //file_put_contents($filename, self::$csv_path);
        echo $filename;
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
            //file_put_contents(self::$base_path . '/currency/tsb_filectime_cron.json', json_encode(filectime(self::$csv_path)));
            if ($json['tsb']['time'] < filectime(self::$csv_path)) {
                $tsb_courses = $this->parseCoursesTSB();
                //file_put_contents(self::$base_path . '/currency/tsb_courses.json', json_encode($tsb_courses));

                if (!empty($tsb_courses)) {
                    $json = $this->updateCoursesTSB($tsb_courses, $json);
                    $update = true;
                }
            }

            // если курсы валют ЦБ сегодня ещё не обновлялись, то обновляем
            //file_put_contents(self::$base_path . '/currency/cbr_mktime_cron.json', json_encode(mktime(0, 0, 0, date('m'), date('d'), date('Y'))));
            if ($json['cbr']['time'] < mktime(0, 0, 0, date('m'), date('d'), date('Y'))) {
                $cbr_courses = $this->parseCoursesCBR();
                //file_put_contents(self::$base_path . '/currency/cbr_courses_cron.json', json_encode($cbr_courses));

                if (!empty($cbr_courses)) {
                    $json = $this->updateCoursesCBR($cbr_courses, $json);
                    $update = true;

                    //$this->addCourseForDynamic($json['cbr']['data']);  - делает отдельно в агенте битрикса
                }
            }

            // если обновились данные по курсам ТСБ или ЦБ, то записываем всё в json-файл
            if (!empty($update)) {
                file_put_contents(self::$json_path, json_encode($json));

                // если запись в json-файл не произошла, заносим в логи ошибку
                if (filectime(self::$json_path) < time() - 120) {
                    $this->logger('error', 'При обновлении json-файла возникла ошибка');
                } else {
                    $this->logger('notice', 'Json-файл успешно обновлен');

                    // обновляем html-файл для банки.ру
                    //$this->createHtml($json);   - делает отдельно в агенте битрикса
                    //$this->add_history_rate($json);   - делает отдельно в агенте битрикса
                }
            }

            // обновляю json-файл данных day.json с курсами ТСБ и ЦБ для сравнения на завтра
            $current_time = getdate();
            if($current_time['hours'] == 23 && $current_time['minutes'] == 50) {
            //if($current_time['hours'] == 0 && $current_time['minutes'] < 5) {
                file_put_contents(self::$day_path, json_encode($json));
            }
            //$this->test_logger('test', ' qq ');
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
     * Парсим CSV-файл с курсами валют банка ТСБ
     *
     * @return array
     */
    private function parseCoursesTSB()
    {
        //file_put_contents(self::$base_path . '/currency/parser.json', json_encode($day_json));
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
            //file_put_contents(self::$base_path . '/currency/parser.json', json_encode($result));

            return $result;
        } catch (Exception $e) {
            $this->logger('error', $e->getMessage());

            return [];
        }
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

            foreach ($courses as $key=>$course) {
                //foreach (self::templateCourses() as $template) {
                foreach ($this->templateCourses() as $tt=>$template) {
//if ($course[2] == $template['iso_n'] && $template['iso_n'] !== 376 && $template['iso_n'] !== 784 && $template['iso_n'] !== 941 && $template['iso_n'] !== 764 && $template['iso_n'] !== 818 && $template['iso_n'] !== 682) { // кроме ILS, AED, RSD, THB, SAR
                    if ($course[2] == $template['iso_n'] && $template['iso_n'] !== 376 && $template['iso_n'] !== 784 && $template['iso_n'] !== 941 && $template['iso_n'] !== 764 && $template['iso_n'] !== 818 && $template['iso_n'] !== 682 && $template['iso_n'] !== 634 && $template['iso_n'] !== 484) { // кроме ILS, AED, RSD, THB, SAR, QAR, MXN
                        $result[$template['iso_s']]['course'] = str_replace(",", ".", $course[4]);
                        $result[$template['iso_s']]['status'] = '>';
                    }
                }
            }

            return $result;

        } catch (Exception $e) {
            $this->logger('error', $e->getMessage());

            return [];
        }
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
     * Загрузка курсов валют с ЦБ РФ
     *
     * @return string Данные по курсам валют
     * @throws Exception
     */
    private function loadCoursesCBR()
    {
        $date = date('d/m/Y');
        $link = self::$xml_path . $date; // - это все делается в агенте битрикса

        $fd = @fopen($link, "r");

        if (!$fd) {
            throw new Exception('Сервер данных ЦБ РФ не отвечает.');
        }

        $data = '';

        while (!feof($fd)) {
            $data .= @fgets($fd, 4096);
        }

        @fclose($fd);

        file_put_contents(self::$base_path . '/currency/cur_cbr.xml', $data);

        /*$data = '';
        try {
            $filename = self::$base_path . '/currency/cur_cbr.json';
            $data = json_decode(file_get_contents($filename), true); // чтение сделанного в агенте файла
            if ($data == false) {
                throw new Exception('Файл ' . $filename . ' с данными по курсам валют ЦБ РФ отсутствует');
            }

        } catch (Exception $e) {
            $this->logger('error', $e->getMessage());
        }*/

        return $data;
    }

    /**
     * Шаблонные данные по курсам валют
     * @return array
     */
    //private static function templateCourses()
    private function templateCourses()
    {
        $courses = [];

        /*$courses['USD']['name'] = 'Доллар США';
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

        $courses['GBP']['name'] = 'Фунт стерлингов Соединенного королевства';
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
        $courses['ZAR']['iso_s'] = 'ZAR';*/

        try {
            $filename = self::$base_path . '/currency/cur_template.txt';
            $courses = json_decode((file_get_contents($filename)),true); // чтение сделанного в агенте файла
            if ($courses == false) {
                throw new Exception('Файл ' . $filename . ' с данными по отображаемым банком курсам валют отсутствует');
            }
        } catch (Exception $e) {
            $this->logger('error', $e->getMessage());
        }

        return $courses;
    }

    /**
     * Логирование ошибок, предупреждений, действий
     *
     * @param string $type Тип лог-данных
     * @param string $message Сообщение для записи в логи
     */
    private function logger($type, $message)
    {
        $log_path = '/local/components/webtu/synch.currency'; // error logs files path
        file_put_contents(
            self::$base_path . $log_path . '/log/' . $type . '.log',
            //$_SERVER['DOCUMENT_ROOT'] . $this->GetPath() . '/log/' . $type . '.log',
            '[' . date('d.m.Y H:i:s') . ']' . $message . PHP_EOL,
            FILE_APPEND
        );
    }

    /*private function test_logger($type, $message)
    {
        $log_path = '/local/components/webtu/synch.currency';
        file_put_contents(
            self::$base_path . $log_path . '/log/' . $type . '.log',
            '[' . date('d.m.Y H:i:s') . ']' . $message . PHP_EOL,
            FILE_APPEND
        );
    }*/


}


function updateKursTSB(){
    $kurs = new ScriptSynchCurrency();
    //$kurs->updateTest();

    $kurs->updateCourses();

    sleep(15);
    $kurs->updateCourses();

    sleep(15);
    $kurs->updateCourses();

    sleep(15);
    $kurs->updateCourses();

    //return "updateKursTSB();";
}

updateKursTSB();
