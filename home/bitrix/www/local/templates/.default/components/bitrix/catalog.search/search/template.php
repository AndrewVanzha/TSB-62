<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
$this->SetViewTarget("formSearch");
    $arElements = $APPLICATION->IncludeComponent(
    	"bitrix:search.page",
    	"",
    	Array(
    		"AJAX_MODE" => "N",
    		"AJAX_OPTION_ADDITIONAL" => "N",
    		"AJAX_OPTION_HISTORY" => "N",
    		"AJAX_OPTION_JUMP" => "N",
    		"AJAX_OPTION_SHADOW" => "Y",
    		"AJAX_OPTION_STYLE" => "N",
    		"CACHE_TIME" => "36000000",
    		"CACHE_TYPE" => "N",
    		"CHECK_DATES" => "N",
    		"DEFAULT_SORT" => "rank",
    		"DISPLAY_BOTTOM_PAGER" => "N",
    		"DISPLAY_TOP_PAGER" => "N",
    		"FILTER_NAME" => "",
    		"NO_WORD_LOGIC" => "N",
    		"PAGER_SHOW_ALWAYS" => "Y",
    		"PAGER_TEMPLATE" => ".default",
    		"PAGER_TITLE" => "Результаты поиска",
    		"PAGE_RESULT_COUNT" => "50",
    		"PATH_TO_USER_PROFILE" => "",
    		"RATING_TYPE" => "",
    		"RESTART" => "Y",
    		"SHOW_ITEM_DATE_CHANGE" => "N",
    		"SHOW_ITEM_TAGS" => "N",
    		"SHOW_ORDER_BY" => "N",
    		"SHOW_RATING" => "",
    		"SHOW_TAGS_CLOUD" => "N",
    		"SHOW_WHEN" => "N",
    		"SHOW_WHERE" => "Y",
    		"USE_LANGUAGE_GUESS" => "N",
    		"USE_SUGGEST" => "Y",
    		"USE_TITLE_RANK" => "N",
    		"arrFILTER" => array("no"),
    		"arrFILTER_iblock_catalog" => array("all"),
    		"arrFILTER_iblock_news" => array("all"),
    		"arrFILTER_iblock_services" => array("all"),
    		"arrFILTER_main" => array(""),
    		"arrWHERE" => array("iblock_catalog","iblock_content")
    	),
		$component,
		array('HIDE_ICONS' => 'Y')
    );
$this->EndViewTarget();

#варианты сортировки
$arSorts = array(
    "sort-desc"                 => "По умолчанию",
	"shows-desc"                => "По популярности",
	"catalog_PRICE_1-desc"      => "По цене (дороже)",
	"catalog_PRICE_1-asc"       => "По цене (дешевле)",
	"name-asc"                  => "По названию (возр.)",
	"name-desc"                 => "По названию (убыв.)",
);

$sort = array_key_exists( $_REQUEST["sort"], $arSorts ) ? $_REQUEST["sort"] : "sort-desc";
$sort_masiv = explode("-", $sort);

$arParams["SORTS"] = array();

if(count($arSorts) > 0) {
	foreach($arSorts as $key => $value){

		$sort_variant = array(
			"CODE"   => $key,
			"NAME"   => $value,
			"LABEL"  => $value,
			"ACTIVE" => $key == $sort_masiv[0].'-'.$sort_masiv[1] ? "Y" : "N"
		);
		$sort_variant["LINK"] = $APPLICATION->GetCurPageParam(
			"sort=".$key,array("sort")
		);

        $arParams["SORTS"][] = $sort_variant;
	}
}
?>
<script>
	$('h1:first').remove();
</script>
<div class="filter-wrap">
	<div class="block clearfix">
		<div class="title">
			<h1 class="aligner"><?=$APPLICATION->ShowTitle()?></h1>
		</div>
		<div class="controls-wrap clearfix">
            <? if(count($arParams["SORTS"]) > 0) { ?>
				<div class="size size-1">
					<select name="sort-product" id="sort-product">
                        <? foreach ($arParams["SORTS"] as $key => $sort) {
                            if ($sort["ACTIVE"] == 'Y') $selected = " selected";
                            else $selected = "";
                            ?>
							<option value="<?=$sort["LINK"]?>" <?=$selected?>><?=$sort["LABEL"]?></option>
                        <? } ?>
					</select>
				</div>
				<script>
                    $( "#sort-product" ).change(function() {
                        window.location = $(this).val();
                    });
				</script>
            <? } ?>
			<div class="controls-view-wrap">
                <div class="controls-view list <?= ( ($_COOKIE['view'] == "list") ? 'active' : '')?>"></div>
                <div class="controls-view table <?= ( ($_COOKIE['view'] == "table" || empty($_COOKIE['view'])) ? 'active' : '')?>"></div>
			</div>
		</div>
	</div>
    <?$APPLICATION->ShowViewContent('formSearch');?>
</div>
<?
if (!empty($arElements) && is_array($arElements))
{
    global $searchFilter;
    $searchFilter = array(
    	"=ID" => $arElements,
    );

	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"products_search",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_SORT_FIELD" => !empty($sort_masiv[0])?$sort_masiv[0]:"sort",
			"ELEMENT_SORT_FIELD2" => "",
			"ELEMENT_SORT_ORDER" => count($sort_masiv)>1?$sort_masiv[1]:"desc",
			"ELEMENT_SORT_ORDER2" => "",
			"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
			"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
			"PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"OFFERS_FIELD_CODE" => $arParams["OFFERS_FIELD_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
			"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
			"OFFERS_LIMIT" => $arParams["OFFERS_LIMIT"],
			"SECTION_URL" => $arParams["SECTION_URL"],
			"DETAIL_URL" => "/katalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"DISPLAY_COMPARE" => $arParams["DISPLAY_COMPARE"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
			"USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
			"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
			"CURRENCY_ID" => $arParams["CURRENCY_ID"],
			"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"FILTER_NAME" => "searchFilter",
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"SORTS_SHOW_ELEMENTS" => $arSorts,
			"SECTION_USER_FIELDS" => array(),
			"INCLUDE_SUBSECTIONS" => "Y",
			"SHOW_ALL_WO_SECTION" => "Y",
			"META_KEYWORDS" => "",
			"META_DESCRIPTION" => "",
			"BROWSER_TITLE" => "",
			"ADD_SECTIONS_CHAIN" => "N",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "N",
		),
		$arResult["THEME_COMPONENT"],
		array('HIDE_ICONS' => 'Y')
	);
}
elseif (is_array($arElements))
{
	echo GetMessage("CT_BCSE_NOT_FOUND");
}
?>