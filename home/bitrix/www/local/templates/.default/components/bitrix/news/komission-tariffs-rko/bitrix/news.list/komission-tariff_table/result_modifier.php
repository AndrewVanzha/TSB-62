<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$topSectionList = [];
$sectionList = [];
$rs_section = \Bitrix\Iblock\SectionTable::getList([
    'select' => [
        'ID',
        'CODE',
        'NAME',
        'DESCRIPTION',
        //'IBLOCK_ID',
        'IBLOCK_SECTION_ID',
        'DEPTH_LEVEL',
        'SECTION_PAGE_URL' => 'IBLOCK.SECTION_PAGE_URL',
        //'IBLOCK_NAME' => 'IBLOCK.NAME',
    ],
    'filter' => [
        'IBLOCK_ID' => $arParams["IBLOCK_ID"],
        'DEPTH_LEVEL' => [1, 2],
        'ACTIVE' => "Y",
        //'ID' => $arParams["PARENT_SECTION"]
    ],
    'order' => [
        'IBLOCK_SECTION_ID' => 'ASC',
    ],
]);
while ($ar_section=$rs_section->fetch()) {
    $url_str = \CIBlock::ReplaceDetailUrl($ar_section['SECTION_PAGE_URL'], $ar_section, true, 'S');
    //$url_str = str_replace('_', '-', $url_str);
    if ($ar_section['DEPTH_LEVEL'] == 1 && $ar_section['CODE'] != 'obshchaya-informatsiya') {
        $topSectionList[] = [
            'ID' => $ar_section['ID'],
            'CODE' => $ar_section['CODE'],
            'NAME' => $ar_section['NAME'],
            'DESCRIPTION' => $ar_section['DESCRIPTION'],
            'IBLOCK_SECTION_ID' => $ar_section['IBLOCK_SECTION_ID'],
            'DEPTH_LEVEL' => $ar_section['DEPTH_LEVEL'],
            'SECTION_PAGE_URL' => $url_str,
        ];
    } else {
        $arResult['COMMON_INFO'] = [
            'ID' => $ar_section['ID'],
            'CODE' => $ar_section['CODE'],
            'NAME' => $ar_section['NAME'],
            'DESCRIPTION' => $ar_section['DESCRIPTION'],
            'IBLOCK_SECTION_ID' => $ar_section['IBLOCK_SECTION_ID'],
        ];
    }
    if ($ar_section['DEPTH_LEVEL'] == 2) {
        $sectionList[] = [
            'ID' => $ar_section['ID'],
            'CODE' => $ar_section['CODE'],
            'NAME' => $ar_section['NAME'],
            'DESCRIPTION' => $ar_section['DESCRIPTION'],
            'IBLOCK_SECTION_ID' => $ar_section['IBLOCK_SECTION_ID'],
            'DEPTH_LEVEL' => $ar_section['DEPTH_LEVEL'],
            'SECTION_PAGE_URL' => $url_str,
        ];
    }
}
//debugg($topSectionList);
//debugg($sectionList);
/*
debugg($arParams['PARENT_SECTION']);
debugg($arParams["IBLOCK_ID"]);

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

debugg($arSection);
*/
// Получить массив подсекций
/*
$ar_sub_sections = [];
foreach ($arResult['ITEMS'] as $arItem) {
    $ar_sub_sections[] = $arItem['IBLOCK_SECTION_ID'];
}
$arResult['AR_SECTIONS'] = array_unique($ar_sub_sections);
function compwrds($a, $b) {
    return strnatcmp($a["name"], $b["name"]);
}
usort($arResult['AR_SECTIONS'], "compwrds");
//debugg($arResult['AR_SECTIONS']);
*/
for ($ii=0; $ii<count($sectionList); $ii++) {
    for ($key=0; $key<count($arResult['ITEMS']); $key++) {
        if ($arResult['ITEMS'][$key]['IBLOCK_SECTION_ID'] == $sectionList[$ii]['ID']) {
            $sectionList[$ii]['ITEMS'][$arResult['ITEMS'][$key]['ID']] = $arResult['ITEMS'][$key];
        }
    }
}
//foreach ($arResult['ITEMS'] as $arItem) {
//    debugg($arItem['ID']);
//}

// получаю раздел Общая информация
$sectionCommon = [];
$rs_section = \Bitrix\Iblock\SectionTable::getList([
    'select' => [
        'ID',
        'CODE',
        'NAME',
        //'DESCRIPTION',
        //'IBLOCK_SECTION_ID',
    ],
    'filter' => [
        'IBLOCK_ID' => $arParams["IBLOCK_ID"],
        'CODE' => 'obshchaya-informatsiya',  // Общая информация
        'ACTIVE' => "Y",
    ],
    'order' => [
        'IBLOCK_SECTION_ID' => 'ASC',
    ],
]);
while ($ar_section=$rs_section->fetch()) {
    //debugg($ar_section);
    $sectionCommon[] = $ar_section;
}

// получаю все элементы раздела Общая информация
$rs_elements = \Bitrix\Iblock\Elements\ElementRkoTariffsTable::getList([
    'select' => [
        'ID',
        'NAME',
        'CODE',
        'IBLOCK_SECTION_ID',
        'PREVIEW_TEXT',
        'SUBHEADER' => 'ATT_SERVICE_POINT'
    ],
    'filter' => [
        'IBLOCK_SECTION_ID' => $sectionCommon[0]['ID'],
        '=ACTIVE' => 'Y'
    ],
])->fetchAll();
foreach ($rs_elements as $item) {
    //debugg($item);
    $sectionCommon[0]['ITEMS'][$item['ID']] = $item;
}
//debugg($sectionCommon);

//debugg($sectionList);
$arResult['TABLE'] = $sectionList;
$arResult['SECTION_LEVEL_1'] = $topSectionList;
$arResult['COMMON_SECTION'] = $sectionCommon[0];
//debugg($arResult['TABLE']);
//debugg($arResult);
//debugg($arResult['ITEMS']);
//debugg($arResult['COMMON_SECTION']);
unset($sectionList);
unset($sectionCommon);
