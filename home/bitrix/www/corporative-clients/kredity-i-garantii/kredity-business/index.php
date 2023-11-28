<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>
<?
$APPLICATION->SetPageProperty("description", "АКБ «ТрансСтройБанк» предлагает воспользоваться кредитными средствами на пополнение оборотных средств и для развития бизнеса. Всем клиентам гарантирован индивидуальный подход и оптимальный порядок процедуры рассмотрения вопросов о выделении кредита, оформления и получения кредита.");
$APPLICATION->SetPageProperty("keywords", "Кредиты для бизнеса от АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Кредиты для бизнеса | КОРПОРАТИВНЫМ КЛИЕНТАМ | Трансстройбанк");
$APPLICATION->SetTitle("Кредиты для бизнеса");
?>
<?
use Bitrix\Main\Application;
$context = Application::getInstance()->getContext();
//debugg('$_REQUEST=');
//debugg($_REQUEST); // работает не в ЧПУ

//$request = Context::getCurrent()->getRequest();
$request = $context->getRequest();
//debugg('$request=');
//debugg($request);
//debugg('$context=');
//debugg($context);

$request2 = Application::getInstance()->getContext()->getRequest();
//debugg('$request2=');
//debugg($request2);

$requestUri = $request->getRequestUri();
//debugg('$requestUri=');
//debugg($requestUri);

//$requestPage = $request2->getRequestedPage();
//debugg('$requestPage=');
//debugg($requestPage);
?>
<?// debugg(1); ?>
<?// debugg($_REQUEST); ?>
<?// debugg($_REQUEST["SMART_FILTER_PATH"]); ?>

<?php/*?>
    <div class="v21-section v21-section-kredity-business--header">
        <?//?><h1 class="v21-h1">Кредиты для бизнеса</h1><??>
        <h1 class="v21-h1-new">Кредиты для бизнеса</h1>
    </div>
<?php*/?>

<?/*$APPLICATION->IncludeComponent( // для отладки - потом убрать
    "bitrix:news.list",
    "V21_kredity_business_advantages",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
        "AJAX_MODE" => "N",	// Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        "CACHE_TYPE" => "A",	// Тип кеширования
        "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
        "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
        "DISPLAY_DATE" => "Y",	// Выводить дату элемента
        "DISPLAY_NAME" => "Y",	// Выводить название элемента
        "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
        "FIELD_CODE" => array(	// Поля
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",	// Фильтр
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
        "IBLOCK_ID" => "59",	// Код информационного блока
        "PARENT_SECTION" => "565",	// ID раздела
        "IBLOCK_TYPE" => "corporative_clients",	// Тип информационного блока (используется только для проверки)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
        "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
        "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
        "NEWS_COUNT" => "20",	// Количество новостей на странице
        "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
        "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
        "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
        "PAGER_TEMPLATE" => "modern",	// Шаблон постраничной навигации
        "PAGER_TITLE" => "Новости",	// Название категорий
        "PARENT_SECTION_CODE" => "",	// Код раздела
        "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
        "PROPERTY_CODE" => array(	// Свойства
            0 => "",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
        "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
        "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "Y",	// Устанавливать статус 404
        "SET_TITLE" => "N",	// Устанавливать заголовок страницы
        "SHOW_404" => "N",	// Показ специальной страницы
        "SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
        "SORT_BY2" => "ID",	// Поле для второй сортировки новостей
        "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
        "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
        "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
    ),
    false
);*/?>

<?/*$APPLICATION->IncludeComponent( // для копирования - потом убрать
    "bitrix:catalog.smart.filter",
    //"",
    "kredity-smart-filter",
    array(
        "SHOW_ALL_WO_SECTION" => "Y", // !!!

        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CONVERT_CURRENCY" => "Y",
        "DISPLAY_ELEMENT_COUNT" => "Y",
        "FILTER_NAME" => "arrFilter",
        //"FILTER_VIEW_MODE" => "vertical",
        "FILTER_VIEW_MODE" => "horizontal",
        "HIDE_NOT_AVAILABLE" => "N",
        "IBLOCK_ID" => "60",
        "IBLOCK_TYPE" => "corporative_clients",
        "PAGER_PARAMS_NAME" => "arrPager",
        "POPUP_POSITION" => "left",
        "PREFILTER_NAME" => "smartPreFilter",
        "SAVE_IN_SESSION" => "N",
        "SECTION_CODE" => "",
        "SECTION_DESCRIPTION" => "-",
        "SECTION_ID" => 0, // !!!
        "SECTION_TITLE" => "-",
        "SECTION_CODE_PATH" => "", // !!!
        "SEF_MODE" => "N", //
        "SEF_RULE" => "/corporative-clients/kredity-i-garantii/kredity-business/filter/#SMART_FILTER_PATH#/apply/",
        "SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
        "TEMPLATE_THEME" => "",
        "XML_EXPORT" => "N",
        "CURRENCY_ID" => "RUB",
        //"COMPONENT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => "kredity-smart-filter",

        "INSTANT_RELOAD" => "Y",
        "PRICE_CODE" => array(
            0 => "BASE",
        ),
    ),
    false
);*/?>

<? $APPLICATION->IncludeComponent(
	"bitrix:news", 
	"kredity-dlya-biznesa", 
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
			0 => "ID",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "ADD_INFO_BANK",
			1 => "ADD_INFO_SELF",
			2 => "MAX_SUM",
			3 => "MAX_DATE",
			4 => "INTEREST_RATE",
			5 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILE_404" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "60",
		"IBLOCK_TYPE" => "corporative-clients",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "ADD_INFO_BANK",
			1 => "ADD_INFO_SELF",
			2 => "MAX_SUM",
			3 => "MAX_DATE",
			4 => "INTEREST_RATE",
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
		//"SEF_FOLDER" => "/corporative-clients/kredity-i-garantii/kredity-dlya-biznesa/", // было
		"SEF_FOLDER" => "/corporative-clients/kredity-i-garantii/kredity-business/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
        "SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
        "SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "kredity-dlya-biznesa",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);
// было
// URL страницы информационного блока: #SITE_DIR#/corporative-clients/kredity-i-garantii/kredity-dlya-biznesa/
// URL страницы раздела: #SITE_DIR#/corporative-clients/kredity-i-garantii/kredity-dlya-biznesa/#SECTION_CODE#/
// URL страницы детального просмотра: #SITE_DIR#/corporative-clients/kredity-i-garantii/kredity-dlya-biznesa/#ELEMENT_CODE#/
?>
<div class="v21-section v21-credit-application" id="businessCreditRequest">
    <?$APPLICATION->IncludeComponent(
        "webtu:feedback",
        //"credit_ul",
        "kredity_business",
        Array(
            "ADMIN_EVENT" => "WEBTU_FEEDBACK_CREDIT_UL",
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "COMPONENT_TEMPLATE" => "kredity_business",
            "EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
            "IBLOCK_ID" => "141",
            "PROPERTIES" => array("PHONE","CREDIT_SUMM","CREDIT_CURRENCY","NAME","EMAIL","ORGANIZATION","CREDIT_NAME","FOLDER","REQ_URI","FROM_WHERE","UTM_SOURCE","UTM_MEDIUM","UTM_CAMPAIGN","UTM_TERM","UTM_CONTENT"),
            //"PROPERTIES" => array("PHONE","CREDIT_SUMM","CREDIT_CURRENCY","FIO","EMAIL","ORGANIZATION","CREDIT_NAME"),
            "SITES" => array(0=>"s1",),
            "USER_EVENT" => "WEBTU_FEEDBACK_CREDIT_UL_USER",
            "UTM" => "118",
        )
    );?>
</div>

<?/*?>
<div class="popup-form" id="creditRequestUl">
	 <?$APPLICATION->IncludeComponent(
	"webtu:feedback",
	"credit_ul",
	Array(
		"ADMIN_EVENT" => "WEBTU_FEEDBACK_CREDIT_UL",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"COMPONENT_TEMPLATE" => "credit_ul",
		"EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
		"IBLOCK_ID" => "141",
		"PROPERTIES" => array("PHONE","CREDIT_SUMM","CREDIT_CURRENCY","NAME","EMAIL","ORGANIZATION","CREDIT_NAME"),
		"SITES" => array(0=>"s1",),
		"USER_EVENT" => "WEBTU_FEEDBACK_CREDIT_UL_USER"
	)
);?>
</div>
<?*/?>
<div class="v21-section">
    <?$APPLICATION->IncludeComponent(
        "webtu:faq.block.add",
        "kredity-biznes",
        Array(
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "HIGHLOAD_IBLOCK_ID" => "6"
        )
    );?>
</div>
<?
//Отображаем форму в футере
\GarbageStorage::set('feedback', true);?> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>