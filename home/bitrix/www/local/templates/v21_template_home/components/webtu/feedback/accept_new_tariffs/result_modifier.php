<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
    die();

$arSelect = ["ID", "IBLOCK_ID", "NAME", "CODE", "VALUE", "PROPERTY_*"];
//$arSelect = [];
//$arFilter = ["IBLOCK_ID" => "212", "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "PROPERTY_ID" => $arResult["PROPERTIES"]["CREDIT_OFFICES"]["VALUE"]];
$arFilter = ["IBLOCK_ID" => "212", "ACTIVE_DATE" => "Y", "ACTIVE" => "Y"]; // Обслуживание счетов физлиц
$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement()) {
    //$arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();
    $arResult["CREDIT_LIMITS"] = $arProps;
    //$arResult["CREDIT_LIMITS"] = [
    //    $arFields,
    //    $arProps
    //];
}
//debugg($arResult["CREDIT_LIMITS"]);

$arParams["OPTIONS"] = [
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "PROPERTIES" => $arParams["PROPERTIES"],
    "ADMIN_EVENT" => $arParams["ADMIN_EVENT"],
    "USER_EVENT" => $arParams["USER_EVENT"],
    "SITES" => $arParams["SITES"]
];
