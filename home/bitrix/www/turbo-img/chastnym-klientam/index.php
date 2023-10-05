<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «Трансстройбанк» (АО) предлагает своим клиентам - физическим лицам - обширное количество банковских продуктов для осуществления и реализации Ваших планов. Все продукты разработаны с учетом потребностей и специфики банковского сектора, и каждый обратившейся клиент сможет найти подходящий для него продукт.");
$APPLICATION->SetPageProperty("keywords", "Услуги банка для частных и физических лиц");
$APPLICATION->SetPageProperty("title", "Услуги для частных и физических лиц акционерного коммерческого банка «ТрансСтройБанк»");
$APPLICATION->SetTitle("Personal");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"root",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
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
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "136",
		"IBLOCK_TYPE" => "private_clients",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
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
		"PROPERTY_CODE" => array("TYPE","HEADER","LINK",""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
</div>
<?$APPLICATION->IncludeComponent(
	"webtu:synch.currency",
	"def",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CBR_IBLOCK_ID" => "116",
		"OFFICE_IBLOCK_ID" => "115"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"webtu:dinamic.currency",
	"def",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CBR_IBLOCK_ID" => "116"
	)
);?>
 <?
 //Отображаем форму в футере
 \GarbageStorage::set('feedback', true);
 ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>