<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//debugg($arParams['PARENT_SECTION']);
//debugg($arParams["SERVICES_BLOCK"]);

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
//debugg('$arSection');
//debugg($arSection);
$arResult["DESCRIPTION"] = $arSection[0]['DESCRIPTION'];
$arResult["~DESCRIPTION"] = $arSection[0]['~DESCRIPTION'];

foreach ($arResult['ITEMS'] as $arItem) {
    if ($arItem['ID'] == $arParams["SERVICES_BLOCK"][0]) {
        $arResult["SUBHEADER"] = $arItem['NAME'];
        $arResult["~SUBHEADER"] = $arItem['~NAME'];
        $arResult["TOP_TEXT"] = $arItem['PREVIEW_TEXT'];
        $arResult["~TOP_TEXT"] = $arItem['~PREVIEW_TEXT'];
    }
}

$arResult["SECTION"]["PATH"] = [];
for ($ii=0; $ii<count($arSection[0]['UF_KOMISSION_TARIFFS_IMG']); $ii++) {
    if ($ii == 0) {
        $arResult["SECTION"]["PATH"]['320']['PICTURE'] = $arSection[0]['UF_KOMISSION_TARIFFS_IMG'][0];
        $arResult["SECTION"]["PATH"]['320']['STYLE'] = '320';
    }
    if ($ii == 1) {
        $arResult["SECTION"]["PATH"]['480']['PICTURE'] = $arSection[0]['UF_KOMISSION_TARIFFS_IMG'][1];
        $arResult["SECTION"]["PATH"]['480']['STYLE'] = '480';
    }
    if ($ii == 2) {
        $arResult["SECTION"]["PATH"]['768']['PICTURE'] = $arSection[0]['UF_KOMISSION_TARIFFS_IMG'][2];
        $arResult["SECTION"]["PATH"]['768']['STYLE'] = '768';
    }
    if ($ii == 3) {
        $arResult["SECTION"]["PATH"]['1024']['PICTURE'] = $arSection[0]['UF_KOMISSION_TARIFFS_IMG'][3];
        $arResult["SECTION"]["PATH"]['1024']['STYLE'] = '1024';
    }
    if ($ii == 4) {
        $arResult["SECTION"]["PATH"]['1366']['PICTURE'] = $arSection[0]['UF_KOMISSION_TARIFFS_IMG'][4];
        $arResult["SECTION"]["PATH"]['1366']['STYLE'] = '1366';
    }
}
//debugg($arResult["SECTION"]["PATH"]);
/*
\Bitrix\Main\Loader::includeModule('iblock');
$res = \Bitrix\Iblock\Elements\ElementValutnyKontrolTable::getList([
    'select' => ['ID', 'SECTIONS'],
    'filter' => [
        "ACTIVE" => "Y",
    ],
])->fetchAll();
debugg('$res');
debugg($res);
*/

unset($arSection);

//debugg($arParams);
//debugg($arResult["SECTION"]["PATH"][0]);
//debugg($arResult["SECTION"]["PATH"][0]["~DESCRIPTION"]);
//debugg($arResult["SECTION"]["PATH"][0]["PICTURE"]);

//debugg($arResult["ITEMS"]);
//debugg($arResult);
//debugg($arResult["DESCRIPTION"]);
