<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

IncludeModuleLangFile(__FILE__);

/**
 * Подключение файла настроек
 */
require($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/rbs.payment/config.php");

$psTitle = $mess["partner_name"];
$psDescription = GetMessage('RBS_PAYMENT_PAY_FROM', array('#BANK#' => $mess["partner_name"])); //'Оплата через ' . $mess["partner_name"];
$user_name_name = GetMessage('RBS_PAYMENT_LOGIN'); //"Логин";
$password_name = GetMessage('RBS_PAYMENT_PASSWORD'); //"Пароль";
$two_stage_name = GetMessage('RBS_PAYMENT_STAGING'); //"Стадийность платежа";
$two_stage_descr = GetMessage('RBS_PAYMENT_STAGING_DESCR'); //"Если значение 'Y', будет производиться двухстадийный платеж. При пустом значении будет производиться одностадийный платеж.";
$test_mode_name = GetMessage('RBS_PAYMENT_TEST_MODE'); //"Тестовый режим";
$test_mode_descr = GetMessage('RBS_PAYMENT_TEST_MODE_DESCR'); //"Если значение 'Y', плагин будет работать в тестовом режиме. При пустом значении будет стандартный режим работы.";
$logging_name = GetMessage('RBS_PAYMENT_LOGGING'); //"Логирование";
$logging_descr = GetMessage('RBS_PAYMENT_LOGGING_DESCR'); //"Если значение 'Y', плагин будет логировать свою работу в файл. При пустом значении логирование происходить не будет.";
$order_number_name = GetMessage('RBS_PAYMENT_ACCOUNT_NUMBER'); //"Уникальный идентификатор заказа в магазине";
$amount_name = GetMessage('RBS_PAYMENT_ORDER_SUM'); //"Сумма заказа";
$shipment_name = GetMessage('RBS_PAYMENT_SHIPMENT_NAME'); //"Разрешить отгрузку";
$shipment_descr = GetMessage('RBS_PAYMENT_SHIPMENT_DESCR'); //"Если значение 'Y', то после успешной оплаты будет автоматически разрешена отгрузка заказа.";
$shipment_set_payed = GetMessage('RBS_PAYMENT_SET_PAYED'); //"Устанавливать ли в статус оплачено";
$shipment_set_payed_descr = GetMessage('RBS_PAYMENT_SET_PAYED_DESCR'); //"Устанавливать ли в статус оплачено";
$ckeck_name = GetMessage('RBS_PAYMENT_CHECK'); //"Устанавливать ли в статус оплачено";
$check_description = GetMessage('RBS_PAYMENT_CHECK_DESCR'); //"Устанавливать ли в статус оплачено";

$arPSCorrespondence = array(
	"USER_NAME" => array(
		"NAME" => $user_name_name
	),
	"PASSWORD" => array(
		"NAME" => $password_name
	),
	"TWO_STAGE" => array(
		"NAME" => $two_stage_name, 
		"DESCR" => $two_stage_descr
	),
	"TEST_MODE" => array(
		"NAME" => $test_mode_name, 
		"DESCR" => $test_mode_descr, 
		"VALUE" => "Y"
	),
	"LOGGING" => array(
		"NAME" => $logging_name, 
		"DESCR" => $logging_descr
	),
	"ORDER_NUMBER" => array(
		"NAME" => $order_number_name,
		"VALUE" => "ID", 
		"TYPE" => "ORDER"
	),
	"AMOUNT" => array(
		"NAME" => $amount_name,
		"VALUE" => "SHOULD_PAY", 
		"TYPE" => "ORDER"
	),
	"SHIPMENT_ENABLE" => array(
		"NAME" => $shipment_name,
		"DESCR" => $shipment_descr, 
		"TYPE" => "VALUE"
	),
//    "RBS_SET_PAYED" => array(
//        "NAME" => $shipment_set_payed,
//        "DESCR" => $shipment_set_payed_descr,
//        "TYPE" => "VALUE",
//        "VALUE" => "Y",
//    ),
//    "CHECK" => array(
//        "NAME" => $ckeck_name,
//        "DESCR" => $check_description,
//        "TYPE" => "VALUE",
//        "VALUE" => "Y",
//    ),
);