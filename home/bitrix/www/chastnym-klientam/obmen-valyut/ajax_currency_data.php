<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");?>
<?php
//file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/chastnym-klientam/konvertor-valyut/test_ajax_get.txt', $_GET);
//$last_session = $_SESSION['city'];

if(isset($_GET['office'])) {
    $office = htmlspecialchars($_GET['office']);
    \GarbageStorage::set('OfficeId', $office);
    //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/chastnym-klientam/konvertor-valyut/test_office.txt', $office);
}
$cityCode = htmlspecialchars($_GET['city']);
$currencyCode = htmlspecialchars($_GET['currency']);
?>
<?
$result = $APPLICATION->IncludeComponent(
    "webtu:currency.exchange",
    "def",
    Array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CITIES_IBLOCK_ID" => "114",
        "CITY_CODE" => $cityCode,
        "CURRENCY" => $currencyCode,
        "OFFICE_IBLOCK_ID" => "115"
    )
);

echo 'currency.exchange.result';
echo json_encode($result);