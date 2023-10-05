<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//debugg($arParams['PARENT_SECTION']);
//debugg($arParams["IBLOCK_ID"]);

$arSelect = array(
    'NAME',
    'DESCRIPTION',
    'PICTURE',
    'UF_*' // все пользовательские поля, можно перечислять конкретные
);
$secRes = CIBlockSection::GetList(
    false,
    array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ID" => $arParams["PARENT_SECTION"]
    ),
    false,
    $arSelect
);
while ($sectionProp = $secRes->GetNext()) {
    $arSection[] = $sectionProp;
}

//debugg($arSection);

$arResult["SECTION"]["PATH"][0]["PICTURE_1"] = $arSection[0]['UF_SYMBOL_YUAN_903_677'];
$arResult["SECTION"]["PATH"][0]["PICTURE_2"] = $arSection[0]['UF_SYMBOL_YUAN_730_547'];
$arResult["SECTION"]["PATH"][0]["PICTURE_3"] = $arSection[0]['UF_SYMBOL_YUAN_611_458'];
$arResult["SECTION"]["PATH"][0]["PICTURE_4"] = $arSection[0]['UF_SYMBOL_YUAN_4'];
$arResult["SECTION"]["PATH"][0]["PICTURE_5"] = $arSection[0]['UF_SYMBOL_YUAN_5'];

unset($arSection);

//debugg($arParams);
//debugg($arResult["SECTION"]["PATH"][0]);
//debugg($arResult["SECTION"]["PATH"][0]["~DESCRIPTION"]);
//debugg($arResult["SECTION"]["PATH"][0]["PICTURE"]);

//debugg($arParams["CREDIT_CARD_PARAMS"]);

//debugg($arResult["ITEMS"]);
//debugg($arResult);
