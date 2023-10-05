<?
IncludeModuleLangFile(__FILE__);

require_once('bank.php');

/**
 * ����������� ��� ��������� � ��� ���������
 */
global $mess;
$mess["module_name"] = GetMessage('MODULE_NAME_' . BANK);//"����� �������� ����� ���� ��������";
$mess["module_description"] = GetMessage('MODULE_DESCRIPTION_' . BANK); //"���� �������� - http://www.open.ru/";
$mess["partner_name"] = GetMessage('PARTNER_NAME_' . BANK);//"���� ��������";
$mess["partner_uri"] = GetMessage('PARTNER_URI_' . BANK);//"http://www.open.ru/";

/**
 * ������ �������
 */
if (!defined('VERSION'))
    define(VERSION, '2.18.5');
if (!defined('VERSION_DATE'))
    define(VERSION_DATE, '2018-01-25 00:00:00');

$status = COption::GetOptionString("rbs.payment", "result_order_status", "P");
if (!defined('RESULT_ORDER_STATUS'))
    define('RESULT_ORDER_STATUS', $status);

$arDefaultIso = array(
    'USD' => 840,
    'EUR' => 978,
    'CNY' => 643
);

/**
 * URL API
 */
switch (BANK) {

    case 'OTKRITIE':
        if (!defined('PROD_URL'))
            define('PROD_URL', 'https://secure.openbank.ru/payment/rest/'); // ��������/���
        if (!defined('TEST_URL'))
            define('TEST_URL', 'https://securetest.openbank.ru/testpayment/rest/'); // ����
        $arDefaultIso['RUB'] = $arDefaultIso['RUR'] = 810;
        break;

}

if (!defined('DEFAULT_ISO'))
    define(DEFAULT_ISO, serialize($arDefaultIso));