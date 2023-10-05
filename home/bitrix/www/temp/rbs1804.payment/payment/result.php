<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeModuleLangFile(__FILE__);
/* Поддержка сессий */
session_start();
/* Посление обновление 28.09.2017 */
/* Подключение файла настроек */
if (!CModule::IncludeModule('sale')) return;
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/rbs.payment/config.php");
/* Вывод ошибок */
// error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING);
// ini_set('display_errors', 1);

$isOrderConverted = \Bitrix\Main\Config\Option::get("main", "~sale_converted_15", 'N');
$errorMessage = '';

if(isset($_GET["orderId"])) {
	$order_id = $_GET["ORDER_ID"];
	$order_number = isset($_SESSION['ORDER_NUMBER']) ? $_SESSION['ORDER_NUMBER'] : $_REQUEST["ID"];
    if(!($arOrder = CSaleOrder::GetList(array(), array('ACCOUNT_NUMBER' => $order_number))->Fetch()))
	    $arOrder = CSaleOrder::GetByID($order_number);
	$paysystem = new CSalePaySystemAction();
    $paysystem->InitParamArrays($arOrder, $arOrder["ID"]);
    $order_number = $arOrder["ID"];
	/* Подключение класса RBS */
	require_once("rbs.php");
	if ($paysystem->GetParamValue("TEST_MODE") == 'Y') {$test_mode = true;} else {$test_mode = false;}
	if ($paysystem->GetParamValue("TWO_STAGE") == 'Y') {$two_stage = true;} else {$two_stage = false;}
	if ($paysystem->GetParamValue("LOGGING") == 'Y') {$logging = true;} else {$logging = false;}
	$rbs = new RBS($paysystem->GetParamValue("USER_NAME"), $paysystem->GetParamValue("PASSWORD"), $two_stage, $test_mode, $logging);

	$response = $rbs->get_order_status_by_orderId($_GET["orderId"]);
	
    if(($response['errorCode'] == 0) && (($response['orderStatus'] == 1) || ($response['orderStatus'] == 2))) {
	    // Сохранение ифнормации о заказе
		$arOrderFields = array(
			"PS_SUM" => $response["amount"]/100,
			"PS_CURRENCY" => $response["currency"],
			"PS_RESPONSE_DATE" => Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat("FULL", LANG))),
			"PS_STATUS" => "Y",
			"PS_STATUS_DESCRIPTION" => $response["cardAuthInfo"]["pan"].";".$response['cardAuthInfo']["cardholderName"],
			"PS_STATUS_MESSAGE" => $response["paymentAmountInfo"]["paymentState"],
			"PS_STATUS_CODE" => "Y",
		);
		
        CSaleOrder::StatusOrder($order_number, RESULT_ORDER_STATUS);// Изменяем статус заказа на значение RESULT_ORDER_STATUS взятое из "Настройка параметров модуля"
        //if($paysystem->GetParamValue("RBS_SET_PAYED") == 'Y')
        CSaleOrder::PayOrder($order_number, "Y", true, true); // Изменяем статус оплаты на Y

        if($paysystem->GetParamValue("SHIPMENT_ENABLE") == 'Y') {
            if ($isOrderConverted != "Y")
            {
                CSaleOrder::DeliverOrder($order_number, "Y");
            } else {
                $r = \Bitrix\Sale\Compatible\OrderCompatibility::allowDelivery($order_number, true);
                if (!$r->isSuccess(true))
                {
                    foreach($r->getErrorMessages() as $error)
                    {
                        $errorMessage .= " ".$error;
                    }
                }
            }
        }

        $orderNumberPrint = $paysystem->GetParamValue('ORDER_NUMBER');
		// Вывод на экран
		$title = GetMessage('RBS_PAYMENT_ORDER_THANK');
		if ($response['orderStatus'] == 1) {
			$message = GetMessage('RBS_PAYMENT_ORDER_AUTH', array('#ORDER_ID#' => $orderNumberPrint));
		} else {
			$message = GetMessage('RBS_PAYMENT_ORDER_FULL_AUTH', array('#ORDER_ID#' => $orderNumberPrint));
		}
		CSaleOrder::Update($order_number, $arOrderFields);
		header('Location: /sale/payment/result.php?ID='.$_GET['ID'], true, 301);
    } else if ($response['errorCode'] == 0) {
		$arOrderFields["PS_STATUS_MESSAGE"] = "[".$response["orderStatus"]."] ".$response["actionCodeDescription"];
		$title = GetMessage('RBS_PAYMENT_ORDER_PAY', array('#ORDER_ID#' => $orderNumberPrint));
		$message = GetMessage('RBS_PAYMENT_ORDER_STATUS', array('#ORDER_ID#' => $response["orderStatus"], '#DESCRIPTION#' => $response["actionCodeDescription"]));
		CSaleOrder::Update($order_number, $arOrderFields);
    } else {
		$arOrderFields["PS_STATUS_MESSAGE"] = GetMessage('RBS_PAYMENT_ORDER_ERROR', array('#ERROR_CODE#' => $response["errorCode"], '#ERROR_MESSAGE#' => $response["errorMessage"]));
		$title = GetMessage('RBS_PAYMENT_ORDER_PAY', array('#ORDER_ID#' => $orderNumberPrint));
		$message = GetMessage('RBS_PAYMENT_ORDER_ERROR2', array('#ERROR_CODE#' => $response["errorCode"], '#ERROR_MESSAGE#' => $response["errorMessage"]));
		CSaleOrder::Update($order_number, $arOrderFields);
	}
} else if(isset($_GET["ID"])){
	$title = GetMessage('RBS_PAYMENT_ORDER_THANK');
	$message = GetMessage('RBS_PAYMENT_ORDER_PAY1', array('#ORDER_ID#' => $_GET["ID"]));
} else {
	$title = GetMessage('RBS_PAYMENT_ORDER_ERROR3');
	$message = GetMessage('RBS_PAYMENT_ORDER_NOT_FOUND', array('#ORDER_ID#' => htmlspecialchars(\Bitrix\Main\Application::getInstance()->getContext()->getRequest()->get('ORDER_ID'), ENT_QUOTES)));
}
$APPLICATION->SetTitle($title);
echo $message;	
?>