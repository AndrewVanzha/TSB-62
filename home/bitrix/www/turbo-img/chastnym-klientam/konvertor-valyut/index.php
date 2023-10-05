<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Информация о курсах обмена иностранной валюты АКБ «ТрансСтройБанк» на сегодня. Курсы ведущих мировых валют в наших отделениях и филиалах по всей России.");
$APPLICATION->SetPageProperty("keywords", "Курс обмена валют");
$APPLICATION->SetPageProperty("title", "Курс обмена валют | ЧАСТНЫМ ЛИЦАМ | Трансстройбанк");
$APPLICATION->SetTitle("Exchange Operations");
?><?$APPLICATION->IncludeComponent(
	"webtu:calculator.exchange", 
	"en_def", 
	array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"OFFICE_IBLOCK_ID" => "115",
		"COMPONENT_TEMPLATE" => "en_def"
	),
	false
);?>
</div>
<?$APPLICATION->IncludeComponent("webtu:synch.currency", "en_def", Array(
	"CACHE_TIME" => "36000000",	// Cache time (sec.)
		"CACHE_TYPE" => "A",	// Cache type
		"CBR_IBLOCK_ID" => "116",	// Инфоблок с курсами Центробанка
		"OFFICE_IBLOCK_ID" => "115",	// Инфоблок с офисами
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"safes_reply", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "117",
		"IBLOCK_TYPE" => "options",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "FILE",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "safes_reply"
	),
	false
);?>
 <?
 //Отображаем форму в футере
 \GarbageStorage::set('feedback', true);
 ?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>