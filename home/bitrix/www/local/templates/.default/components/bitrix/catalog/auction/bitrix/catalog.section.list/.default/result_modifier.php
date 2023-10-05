<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

unset($arResult["SECTIONS"]);

$arFilter = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "GLOBAL_ACTIVE" => "Y", "DEPTH_LEVEL" => 1);
$db_list = CIBlockSection::GetList(Array(), $arFilter, false);

while($ar_result = $db_list->GetNext()) {

    $arResult["SECTIONS"][] = $ar_result;
    $arResult["SECTIONS_COUNT"] = $arResult["SECTIONS_COUNT"] + 1;
}

?>