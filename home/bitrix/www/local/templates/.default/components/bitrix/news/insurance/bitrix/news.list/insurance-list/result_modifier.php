<?
$arSections = [];
$ar_filter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'ACTIVE'=>'Y');
$ar_select = Array('ID', 'NAME', 'CODE', 'PICTURE', 'DESCRIPTION');
//$db_list = CIBlockSection::GetList(Array('SORT'=>'ASC'), $ar_filter, true, $ar_select);
//while($ar_result = $db_list->GetNext()) {
//    $arSections[$ar_result['ID']] = $ar_result;
//}
//debugg($arSections);
//unset($arSections);

//$arSections = [];
$rsSection = \Bitrix\Iblock\SectionTable::getList(array(
    'order' => array('LEFT_MARGIN'=>'ASC'),
    'filter' => $ar_filter,
    'select' => $ar_select,
));
while ($ar_section=$rsSection->fetch()) {
    //debugg($ar_section);
    $arSections[$ar_section['ID']] = $ar_section;
}
//debugg($arSections);

$arResult['SECTIONS'] = $arSections;
for ($ii=0; $ii<count($arResult['ITEMS']); $ii++) {
    //debugg($arSections[$arResult['ITEMS'][$ii]['IBLOCK_SECTION_ID']]);
    $arResult['ITEMS'][$ii]['SECTION'] = $arSections[$arResult['ITEMS'][$ii]['IBLOCK_SECTION_ID']];
}
//debugg($arResult);
unset($arSections);
?>
