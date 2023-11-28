<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «Трансстройбанк» (АО) предоставляет в аренду юридическим лицам и корпоративным клиентам банковские сейфы различных размеров для хранения ценных бумаг, документов, ювелирных изделий, произведений искусства и других ценностей, а также для проведения расчетов по сделкам купли-продажи недвижимости.");
$APPLICATION->SetPageProperty("keywords", "Аренда сейфов для корпоративных клиентов");
$APPLICATION->SetPageProperty("title", "Аренда индивидуальных сейфов | Корпоративным клиентам | Трансстройбанк");
$APPLICATION->SetTitle("Аренда сейфов");
?><div><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "how",
		"EDIT_TEMPLATE" => ""
	)
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"corporative-safes", 
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "ADD_INFO_BANK",
			2 => "ADD_INFO_SELF",
			3 => "ATT_SIZE",
			4 => "ATT_PRICE",
			5 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "121",
		"IBLOCK_TYPE" => "corporative-clients",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "ADD_INFO_BANK",
			2 => "ADD_INFO_SELF",
			3 => "ATT_SIZE",
			4 => "ATT_PRICE",
			5 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/corporative-clients/arenda-seyfov/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "corporative-safes",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
<div class="popup-form" id="vaultRequest">
	 <?$APPLICATION->IncludeComponent(
	"webtu:feedback",
	"safes_ul",
	Array(
		"ADMIN_EVENT" => "WEBTU_FEEDBACK_SAFES_UL_ADMIN",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"COMPONENT_TEMPLATE" => "safes",
		"EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
		"IBLOCK_ID" => "143",
		//"POST_CALLBACK" => function($post){if(!isset($post['CITIZENSHIP'])){$post['CITIZENSHIP']='Нет';}else{$post['CITIZENSHIP']='Да';}if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['LAST_NAME'].' '.$post['FIRST_NAME'].' '.$post['SECOND_NAME'];}if(!empty($post['PRICE'])){$post['PRICE']=$post['TIME']*$post['PRICE'];}return$post;},
		"PROPERTIES" => array("ORGANIZATION","PHONE","EMAIL","CITY","TYPE","PRICE","TIME","OPTIONS", "FROM_WHERE"),
		"SITES" => array(0=>"s1",),
		"USER_EVENT" => "WEBTU_FEEDBACK_SAFES_UL_USER"
	)
);?>
</div>
 <br>
 <?
 //Отображаем форму в футере
 \GarbageStorage::set('feedback', true);
 ?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>