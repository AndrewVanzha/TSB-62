<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «ТрансСтройБанк» предлагает организациям современные и удобные решения применения торгового и интернет-эквайринга для расширения возможностей по приему платежей. Наши предложения разработаны с учетом потребностей каждого сегмента рынка");
$APPLICATION->SetPageProperty("keywords", "Acquiring АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Acquiring | АКБ «ТрансСтройБанк»");
$APPLICATION->SetTitle("Acquiring");
?>
<?$APPLICATION->IncludeComponent("bitrix:news", "ekvayring_en", Array(
	"ADD_ELEMENT_CHAIN" => "Y",	// Add element name to breadcrumbs
		"ADD_SECTIONS_CHAIN" => "Y",	// Add Section name to breadcrumb navigation
		"AJAX_MODE" => "N",	// Enable AJAX mode
		"AJAX_OPTION_ADDITIONAL" => "",	// Additional ID
		"AJAX_OPTION_HISTORY" => "N",	// Emulate browser navigation
		"AJAX_OPTION_JUMP" => "N",	// Enable scrolling to component's top
		"AJAX_OPTION_STYLE" => "Y",	// Enable styles loading
		"BROWSER_TITLE" => "-",	// Set browser window title from property value
		"CACHE_FILTER" => "N",	// Cache if the filter is active
		"CACHE_GROUPS" => "Y",	// Respect Access Permissions
		"CACHE_TIME" => "36000000",	// Cache time (sec.)
		"CACHE_TYPE" => "A",	// Cache type
		"CHECK_DATES" => "Y",	// Show only currently active elements
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Date display format
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",	// Display at the bottom of the list
		"DETAIL_DISPLAY_TOP_PAGER" => "N",	// Display at the top of the list
		"DETAIL_FIELD_CODE" => array(	// Fields
			0 => "",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",	// Show the ALL link
		"DETAIL_PAGER_TEMPLATE" => "",	// Name of the pager template
		"DETAIL_PAGER_TITLE" => "Страница",	// Category name
		"DETAIL_PROPERTY_CODE" => array(	// Properties
			0 => "ADD_INFO_BANK",
			1 => "ADD_INFO_SELF",
			2 => "COMISSION",
			3 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",	// Set canonical URL
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Display at the bottom of the list
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",	// Display element title
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",	// Display at the top of the list
		"FILE_404" => "",	// Show this page (/404.php by default)
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Hide link to the details page if no detailed description provided
		"IBLOCK_ID" => "171",	// Information block
		"IBLOCK_TYPE" => "en",	// Type of information block
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Include information block into navigation chain
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Date display format
		"LIST_FIELD_CODE" => array(	// Fields
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(	// Properties
			0 => "ADD_INFO_BANK",
			1 => "ADD_INFO_SELF",
			2 => "COMISSION",
			3 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",	// Set page description from property
		"META_KEYWORDS" => "-",	// Set page keywords from property
		"NEWS_COUNT" => "200",	// News per page
		"PAGER_BASE_LINK_ENABLE" => "N",	// Enable link processing
		"PAGER_DESC_NUMBERING" => "N",	// Use reverse page navigation
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Cache time for pages with reverse page navigation
		"PAGER_SHOW_ALL" => "N",	// Show the ALL link
		"PAGER_SHOW_ALWAYS" => "N",	// Always show the pager
		"PAGER_TEMPLATE" => ".default",	// Breadcrumb navigation template
		"PAGER_TITLE" => "Новости",	// Category name
		"PREVIEW_TRUNCATE_LEN" => "",	// Maximum preview text length (for Text type only)
		"SEF_FOLDER" => "/en/corporative-clients/bankovskoe-obsluzhivanie/ekvayring/",	// Folder for SEF (site-root-relative)
		"SEF_MODE" => "Y",	// Enable SEF (Search Engine Friendly Urls) support
		"SET_LAST_MODIFIED" => "N",	// Set page last modified date to response header
		"SET_STATUS_404" => "Y",	// Set status 404
		"SET_TITLE" => "Y",	// Set page title
		"SHOW_404" => "Y",	// Show page
		"SORT_BY1" => "ACTIVE_FROM",	// Field for the news first sorting pass
		"SORT_BY2" => "SORT",	// Field for the news second sorting pass
		"SORT_ORDER1" => "DESC",	// Direction for the news first sorting pass
		"SORT_ORDER2" => "ASC",	// Direction for the news second sorting pass
		"STRICT_SECTION_CHECK" => "N",	// Use strict section check
		"USE_CATEGORIES" => "N",	// Show Related Information
		"USE_FILTER" => "N",	// Show filter
		"USE_PERMISSIONS" => "N",	// Use additional access restriction
		"USE_RATING" => "N",	// Enable Rating
		"USE_REVIEW" => "N",	// Allow Writing Reviews
		"USE_RSS" => "N",	// Allow RSS Export
		"USE_SEARCH" => "N",	// Enable Search
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "ekvayring",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
<div class="popup-form" id="acquiring">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"acquiring",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_ADMIN",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"IBLOCK_ID" => "34",
			"EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
			"POST_CALLBACK" => function($post){if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['LAST_NAME'].' '.$post['FIRST_NAME'].' '.$post['SECOND_NAME'];}return$post;},
			"PROPERTIES" => array("PHONE","EMAIL","CITY","COMPANY_NAME"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_USER"
		)
	);?>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
