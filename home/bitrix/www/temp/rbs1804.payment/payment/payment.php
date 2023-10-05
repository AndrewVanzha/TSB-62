<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

IncludeModuleLangFile(__FILE__);

CModule::IncludeModule('sale');
CModule::IncludeModule('catalog');

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/update_class.php');

/**
 * Поддержка сессий
 */
session_start();

/**
 * Подключение файла настроек
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/rbs.payment/config.php");

/**
 * Подключение класса RBS
 */
require_once("rbs.php");
if (CSalePaySystemAction::GetParamValue("TEST_MODE") == 'Y') {
    $test_mode = true;
} else {
    $test_mode = false;
}
if (CSalePaySystemAction::GetParamValue("TWO_STAGE") == 'Y') {
    $two_stage = true;
} else {
    $two_stage = false;
}
if (CSalePaySystemAction::GetParamValue("LOGGING") == 'Y') {
    $logging = true;
} else {
    $logging = false;
}
$rbs = new RBS(CSalePaySystemAction::GetParamValue("USER_NAME"), CSalePaySystemAction::GetParamValue("PASSWORD"), $two_stage, $test_mode, $logging);
		
$app = \Bitrix\Main\Application::getInstance();

$request = $app->getContext()->getRequest();

/**
 * Запрос register.do или regiterPreAuth.do в ПШ
 */

$order_number = CSalePaySystemAction::GetParamValue("ORDER_NUMBER");

$entityId = CSalePaySystemAction::GetParamValue("ORDER_PAYMENT_ID");

if (CUpdateSystem::GetModuleVersion('sale') <= "16.0.11") {
    $orderId = $order_number;
} else {
    list($orderId, $paymentId) = \Bitrix\Sale\PaySystem\Manager::getIdsByPayment($entityId);
}

if (!$order_number)
    $order_number = $orderId;
if (!$order_number)
    $order_number = $GLOBALS['SALE_INPUT_PARAMS']['ID'];

if (!$order_number)
    $order_number = $_REQUEST['ORDER_ID'];

$arOrder = CSaleOrder::GetByID($orderId);

$currency = $arOrder['CURRENCY'];

$amount = CSalePaySystemAction::GetParamValue("AMOUNT") * 100;

if(is_float($amount)){// Если сумма с плавающей точкой
	$amount = ceil($amount); // Производим округление в большую сторону
}

$return_url = 'http://' . $_SERVER['SERVER_NAME'] . '/sale/payment/result.php?ID=' . $order_number;

$FISCALIZATION = COption::GetOptionString("sberbank.ecom", "FISCALIZATION", serialize(array()));
$FISCALIZATION = unserialize($FISCALIZATION);

/* Фискализация */
if ($FISCALIZATION['ENABLE'] == 'Y') {

	$arFiscal = array(
		'orderBundle' => array(
			'orderCreationDate' => strtotime($arOrder['DATE_INSERT']),
			'customerDetails' => array(
				'email' => false,
				'contact' => false,
			),
			'cartItems' => array(
				'items' => array(),
			),
		),
		'taxSystem' => $FISCALIZATION['TAX_SYSTEM']
	);
	$db_props = CSaleOrderPropsValue::GetOrderProps($arOrder['ID']);

	while ($props = $db_props->Fetch()) {
		if ($props['IS_PAYER'] == 'Y') {
			$arFiscal['orderBundle']['customerDetails']['contact'] = $props['VALUE'];
		} elseif ($props['IS_EMAIL'] == 'Y') {
			$arFiscal['orderBundle']['customerDetails']['email'] = $props['VALUE'];
		}
	}
	if (!$arFiscal['orderBundle']['customerDetails']['email'] || !$arFiscal['orderBundle']['customerDetails']['contact']) {
		global $USER;
		if (!$arFiscal['orderBundle']['customerDetails']['email'])
			$arFiscal['orderBundle']['customerDetails']['email'] = $USER->GetEmail();
		if (!$arFiscal['orderBundle']['customerDetails']['contact'])
			$arFiscal['orderBundle']['customerDetails']['contact'] = $USER->GetFullName();
	}

	$measureList = array();
	$dbMeasure = CCatalogMeasure::getList();
	while ($arMeasure = $dbMeasure->GetNext()) {
		$measureList[$arMeasure['ID']] = $arMeasure['MEASURE_TITLE'];
	}

	$vatList = array();
	$dbRes = CCatalogVat::GetListEx(
		array(), //order
		array(), //filter
		false, //group
		false, //nav
		array() //select
	);
	while ($arRes = $dbRes->Fetch()) {
		$vatList[$arRes['ID']] = $arRes['RATE'];
	}

	$vatGateway = array(
		-1 => 0,
		0 => 1,
		10 => 2,
		18 => 3,
	);


	$itemsCnt = 1;
	$arCheck = null;

    $dbRes = CSaleBasket::GetList(array(), array('ORDER_ID' => $orderId));
    while ($arRes = $dbRes->Fetch()) {

        $arProduct = CCatalogProduct::GetByID($arRes['PRODUCT_ID']);

        $taxType = $arProduct['VAT_ID'] > 0 ? intval($vatList[$arProduct['VAT_ID']]) : -1;

        $itemAmount = $arRes['PRICE'] * 100;
        if($itemAmount % 1)
            $itemAmount = round($itemAmount);

        $arFiscal['orderBundle']['cartItems']['items'][] = array(
            'positionId' => $itemsCnt++,
            'name' => $arRes['NAME'],
            'quantity' => array(
                'value' => $arRes['QUANTITY'],
                'measure' => $measureList[$arProduct['MEASURE']],
            ),
            'itemAmount' => $itemAmount * $arRes['QUANTITY'],
            'itemCode' => $arRes['PRODUCT_ID'],
			'itemPrice' => $itemAmount,
            'tax' => array(
                'taxType' => $vatGateway[$taxType],
            ),
        );
    }
	if ($arOrder['PRICE_DELIVERY'] > 0) {
		$arFiscal['orderBundle']['cartItems']['items'][] = array(
			'positionId' => $itemsCnt++,
			'name' => GetMessage('RBS_PAYMENT_DELIVERY_TITLE'),
			'quantity' => array(
				'value' => 1,
				'measure' => GetMessage('RBS_PAYMENT_MEASURE_DEFAULT'),
			),
			'itemAmount' => intval($arOrder['PRICE_DELIVERY'] * 100),
			'itemCode' => $arOrder['ID'] . "_DELIVERY",
			'itemPrice' => intval($arOrder['PRICE_DELIVERY'] * 100),
			'tax' => array(
				'taxType' => 0,
			),
		);
	}
}

/* END Фискализация */

for ($i = 0; $i <= 10; $i++) {
    $response = $rbs->register_order($order_number . '_' . $i, $amount, $return_url, $currency, $arOrder['USER_DESCRIPTION'], $arFiscal);

    if ($response['errorCode'] != 1) break;
}

/**
 * Разбор ответа
 */
?>
<div class="sale-paysystem-wrapper">
    <? if (in_array($response['errorCode'], array(999, 1, 2, 3, 4, 5, 7, 8))) {
        $error = GetMessage('RBS_PAYMENT_PAY_ERROR_NUMBER').' ' . $response['errorCode'] . ': ' . $response['errorMessage'];
        ?><span><?= $error ?></span><?
    } elseif ($response['errorCode'] == 0) {
        $_SESSION['ORDER_NUMBER'] = $order_number;
		
		/* Если после нажатия кнопки "Оформить заказ" необходимо производить переход на платежную страницу банка
		или если включена опция "Открывать в новом окне" в "Параметрах платежной системы", то после нажатия кнопки "Оформить заказ"
		необходимо производить переход на платежную страницу банка в новом окне
		Раскоментируйте код ниже*/
		if($request->get('ORDER_ID') && $request->get('PAYMENT_ID'))
			echo '<script>window.location="'.$response['formUrl'].'"</script>';
		else
			header("Location:".$response['formUrl']);
	
		/* Если после нажатия кнопки "Оформить заказ" необходимо производить переход на доп. страницу, а после платежную страницу банка
		или если включена опция "Открывать в новом окне" в "Параметрах платежной системы", то после нажатия кнопки "Оформить заказ"
		необходимо производить переход на доп. страницу, а после платежную страницу банка в новом окне
		Раскоментируйте код ниже*/
		/*
        $arUrl = parse_url($response['formUrl']);
        parse_str($arUrl['query'], $arQuery);
        ?>
        <span><?= GetMessage('RBS_PAYMENT_PAY_SUM') ?><?= CurrencyFormat(CSalePaySystemAction::GetParamValue("AMOUNT"), $currency) ?></span>
        <form action="<?= $response['formUrl'] ?>" method="get">
            <? foreach ($arQuery as $key => $value): ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
            <? endforeach ?>
            <div class="sale-paysystem-button-container">
			<span class="sale-paysystem-button">
				<button><?= GetMessage('RBS_PAYMENT_PAY_BUTTON') ?></button>
			</span>
                <span class="sale-paysystem-button-descrition">
				<?= GetMessage('RBS_PAYMENT_PAY_REDIRECT') ?>
			</span>
            </div>
            <p>
			<span class="tablebodytext sale-paysystem-description">
                <?= GetMessage('RBS_PAYMENT_PAY_DESCRIPTION') ?>
			</span>
            </p>
        </form>
        <?
		*/
		
    } else {
        $error = GetMessage('RBS_PAYMENT_PAY_ERROR');
        ?><span><?= $errod ?></span><?
    }
    ?>
</div>