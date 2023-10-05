<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «Трансстройбанк» (АО), в соответствии с требованиями законодательства РФ, осуществляет банковскую деятельность. В Банке работают опытные, квалифицированные специалисты, которые помогут быстро решить все проблемы, связанные с проведением платежей.");
$APPLICATION->SetPageProperty("keywords", "Тарифы на обслуживание счетов физических лиц АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Тарифы | АКБ «ТрансСтройБанк»");
$APPLICATION->SetTitle("Тарифы на обслуживание счетов физических лиц");
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news",
    "new-tariffs-fizl",
    Array(
        "ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
        "AJAX_MODE" => "N",	// Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
        "BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        "CACHE_TYPE" => "A",	// Тип кеширования
        "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
        "DETAIL_DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
        "DETAIL_FIELD_CODE" => array(	// Поля
            0 => "",
            1 => "",
        ),
        "DETAIL_PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
        "DETAIL_PAGER_TEMPLATE" => "",	// Название шаблона
        "DETAIL_PAGER_TITLE" => "Страница",	// Название категорий
        "DETAIL_PROPERTY_CODE" => array(	// Свойства
            0 => "",
            1 => "",
        ),
        "DETAIL_SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
        "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
        "DISPLAY_DATE" => "N",	// Выводить дату элемента
        "DISPLAY_NAME" => "N",	// Выводить название элемента
        "DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
        "IBLOCK_ID" => "212",	// Инфоблок Обслуживание счетов физлиц
        "IBLOCK_TYPE" => "private_clients",	// Тип инфоблока
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
        "LIST_FIELD_CODE" => array(	// Поля
            0 => "",
            1 => "",
        ),
        "LIST_PROPERTY_CODE" => array(	// Свойства
            0 => "ATT_TARIFFS_PAGE_HEADER",
            1 => "ATT_ACCOUNT_OPEN",
            2 => "ATT_RUB_ACCOUNT_HOLD",
            3 => "ATT_CUR_ACCOUNT_HOLD",
            4 => "ATT_INBANK_TRANFERS_FL",
            5 => "ATT_INBANK_TRANFERS_UL",
            6 => "ATT_BANK_TRANFERS_OUT",
            7 => "ATT_BANK_TRANFERS_CNY",
            8 => "ATT_BANK_TRANFERS_OTHER",
            9 => "ATT_BANK_TRANFERS_ONLINE",
            10 => "ATT_DATE",
            11 => "ATT_DOCUMENTS",
            12 => "ATT_DOCUMENTS_LIST",
            13 => "",
        ),
        "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
        "META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
        "META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
        "NEWS_COUNT" => "20",	// Количество новостей на странице
        "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
        "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
        "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
        "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
        "PAGER_TITLE" => "Новости",	// Название категорий
        "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
        "SEF_MODE" => "N",	// Включить поддержку ЧПУ
        "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
        "SET_STATUS_404" => "N",	// Устанавливать статус 404
        "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
        "SHOW_404" => "N",	// Показ специальной страницы
        "SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
        "SORT_BY2" => "ACTIVE_FROM",	// Поле для второй сортировки новостей
        "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
        "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
        "STRICT_SECTION_CHECK" => "Y",	// Строгая проверка раздела
        "USE_CATEGORIES" => "Y",	// Выводить материалы по теме
        "USE_FILTER" => "N",	// Показывать фильтр
        "USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
        "USE_RATING" => "N",	// Разрешить голосование
        "USE_REVIEW" => "N",	// Разрешить отзывы
        "USE_RSS" => "N",	// Разрешить RSS
        "USE_SEARCH" => "N",	// Разрешить поиск
        "USE_SHARE" => "N",	// Отображать панель соц. закладок
        "COMPONENT_TEMPLATE" => "new-tariffs-fizl",
        //"COMPONENT_TEMPLATE" => ".default",
        "VARIABLE_ALIASES" => array(
            "SECTION_ID" => "SECTION_ID",
            "ELEMENT_ID" => "ELEMENT_ID",
        )
    ),
    false
);?>
<?/*$APPLICATION->IncludeComponent(
	"webtu:faq.form",
	"",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"FORMAT_DATE" => "d.m.Y",
		"IBLOCK_ID" => "51",
		"IBLOCK_TYPE" => ""
	)
);*/?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>