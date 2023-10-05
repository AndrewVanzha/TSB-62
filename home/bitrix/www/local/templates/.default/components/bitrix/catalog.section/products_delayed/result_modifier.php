<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$arResult["SORTS"] = array();

if(count($arParams["SORTS_SHOW_ELEMENTS"]) > 0) {
    foreach($arParams["SORTS_SHOW_ELEMENTS"] as $key => $value){

        $sort = array(
            "CODE"   => $key,
            "NAME"   => $value,
            "LABEL"  => $value,
            "ACTIVE" => $key == $arParams["ELEMENT_SORT_FIELD"].'-'.$arParams["ELEMENT_SORT_ORDER"] ? "Y" : "N"
        );
        $sort["LINK"] = $APPLICATION->GetCurPageParam(
            "sort=".$key,array("sort")
        );

        $arResult["SORTS"][] = $sort;
    }
}

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();