<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «ТрансСтройБанк» предлагает своим клиентам выгодные условия покупки / продажи иностранных валют за российские рубли либо другую иностранную валюту. Конверсионные операции с безналичной иностранной валютой осуществляются Банком в строгом соответствии с действующим Федеральным законом от 10.12.2003 г. № 173-ФЗ «О валютном регулировании и валютном контроле»");
$APPLICATION->SetPageProperty("keywords", "Конверсионные сделки АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Конверсионные сделки | Банковское обслуживание | КОРПОРАТИВНЫМ КЛИЕНТАМ | АКБ «ТрансСтройБанк»");
$APPLICATION->SetTitle("Конверсионные сделки");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "top",
		"EDIT_TEMPLATE" => ""
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.detail", 
	"inkassatsiya", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => "5893",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"IBLOCK_ID" => "173",
		"IBLOCK_TYPE" => "en",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "ADD_INFO_BANK",
			2 => "ADD_INFO_SELF",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "inkassatsiya"
	),
	false
);?> <?
//Отображаем форму в футере
\GarbageStorage::set('feedback', true);?>&nbsp;<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>