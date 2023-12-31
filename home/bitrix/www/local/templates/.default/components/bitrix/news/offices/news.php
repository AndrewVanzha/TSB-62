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
use Debugg\Oop\Dvlp;
?>
<!--   -->
<?
session_start();
if ( isset($_REQUEST['type']) ) {
    $_SESSION['offices']['type'] = $_REQUEST['type'];
}
if ( !empty($_REQUEST['city']) ) {
    $_SESSION['offices']['cityFilter'] = $_REQUEST['city'];
}
if ( isset($_REQUEST['maps']) ) {
    $_SESSION['offices']['maps'] = $_REQUEST['maps'];
}
//debugg($_SESSION['offices']);
//echo '<pre>';print_r($_REQUEST);echo '</pre>';
//echo '<pre>';print_r($_POST);echo '</pre>';
//echo '<pre>';print_r($_SESSION['offices']);echo '</pre>';

$maps = false;
//if (htmlspecialchars($_SESSION['offices']['maps'] != 'no')) $maps = true;
if (htmlspecialchars($_SESSION['offices']['maps'] == 'yes')) $maps = true;
$filSection = htmlspecialchars($_REQUEST['city']);
$filType = array();
if (in_array('office' ,$_REQUEST['type'])) array_push($filType, 'Офис');
if (in_array('cash', $_REQUEST['type'])) array_push($filType, 'Банкомат');
if (in_array('partners', $_REQUEST['type'])) array_push($filType, 'Банкомат партнера');

if (!empty($filType)){
	$GLOBALS['arrFilter'][] = array("PROPERTY_ATT_TYPE_VALUE" => $filType);
} else {
	$GLOBALS['arrFilter'][] = array("PROPERTY_ATT_TYPE_VALUE" => 'Офис');
}
if (!empty($filSection)){
	$GLOBALS['arrFilter'][] = array("SECTION_ID" => $filSection);
}
//$template = ($maps) ? 'maps' : 'list';
$template = ($maps) ? 'maps' : 'sectionlist';
//debugg($template);
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	$template,
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => 'arrFilter',
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
	),
	$component
);?>
<br/><br/>
<div class="page-container"><p>Уважаемые клиенты!<br/>Кроме сети банкоматов Транстройбанка, Вы можете также воспользоваться услугами банкоматов и ПВН наших партнеров (стоимость проведения операций указана в <a href='https://www.transstroybank.ru/2021/january/14.pdf' target='_blank'>Сборнике тарифных планов по банковским картам</a>):
<ul>
<li><a href='https://www.uralsib.ru/banks/services/produkty/bankomatnaya-set-atlas/' target='_blank'>Объединенная сеть ATLAS</a></li></ul></p></div>
