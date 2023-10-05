<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «Трансстройбанк» (АО), в соответствии с требованиями законодательства РФ, осуществляет банковскую деятельность. В Банке работают опытные, квалифицированные специалисты, которые помогут быстро решить все проблемы, связанные с проведением платежей.");
$APPLICATION->SetPageProperty("keywords", "Платежи кредитной карты МИР АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Кредитная карта МИР | АКБ «ТрансСтройБанк»");
$APPLICATION->SetTitle("Кредитная карта МИР");
?>
<script type="text/javascript">
    //$(document).ready(function() {
    //    $('.v21 .v21-container.v21-container--header').css('position', 'relative');
    //    $('.v21 .v21-container.v21-container--header').css('z-index', '1');
    //});
</script>
<??>
    <style>
        .v21 {
            overflow: hidden;
        }
        .v21 .v21-container.v21-container--header {
            position: relative;
            z-index: 0;
        }
        .v21 .v21-wide-container {
            overflow: visible;
        }
        /*.v21 > * {
            position:relative;
        }*/
        .v21 .js-color-switch .v21-kredity-interests--left, .v21 .js-color-switch .v21-kredity-interests--right {
            background-color: transparent;
            box-shadow: none;
        }
        .v21 .js-color-switch .v21-kredity-interests--right::before, .v21 .js-color-switch .v21-kredity-interests--left::before {
            content: none;
        }
    </style>
<??>
<div class="mir-page__background-blue mir-page__background-time"></div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news",
        "credit-card-mir",
        Array(
            "ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
            "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
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
            "DISPLAY_DATE" => "Y",	// Выводить дату элемента
            "DISPLAY_NAME" => "Y",	// Выводить название элемента
            "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "208",	// Инфоблок
            "IBLOCK_TYPE" => "private_clients",	// Тип инфоблока
            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
            "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
            "LIST_FIELD_CODE" => array(	// Поля
                0 => "",
                1 => "",
            ),
            "LIST_PROPERTY_CODE" => array(	// Свойства
                0 => "ATT_CCM_CREDIT_LIMIT",
                1 => "ATT_CCM_GRACE_PERIOD",
                2 => "ATT_CCM_RATE",
                3 => "ATT_CCM_SERVICE",
                4 => "ATT_CCM_SMS",
                5 => "ATT_CCM_CASHBACK",
                6 => "ATT_CCM_LEFT_PARAM",
                7 => "ATT_CCM_LEFT_TEXT",
                8 => "ATT_CCM_RIGHT_PARAM",
                9 => "ATT_CCM_RIGHT_TEXT",
                10 => "ATT_CCM_GRACE_SCHEME",
                11 => "",
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
            "COMPONENT_TEMPLATE" => "credit-card-mir",
            //"COMPONENT_TEMPLATE" => ".default",
            "VARIABLE_ALIASES" => array(
                "SECTION_ID" => "SECTION_ID",
                "ELEMENT_ID" => "ELEMENT_ID",
            )
        ),
        false
    );?>
    </div><!-- v21-container -->
</div><!-- v21-section -->

<div class="v21-wide-container">
    <div class="v21-card-application" id="fMirCardRequest">
        <div class="v21-container">
            <?$APPLICATION->IncludeComponent(
                "webtu:feedback",
                "kredity_card_mir",
                Array(
                    "ADMIN_EVENT" => "WEBTU_FEEDBACK_CARD_MIR_ADMIN",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "COMPONENT_TEMPLATE" => "kredity_card_mir",
                    "EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
                    "IBLOCK_ID" => "209",  // Заявка на кредитную карту МИР
                    "PROPERTIES" => array("PHONE","CREDIT_SUMM","LATIN","NAME","EMAIL","ORGANIZATION","CITY","FOLDER","REQ_URI","FROM_WHERE","UTM_SOURCE","UTM_MEDIUM","UTM_CAMPAIGN","UTM_TERM","UTM_CONTENT"),
                    //"PROPERTIES" => array("PHONE","CREDIT_SUMM","CREDIT_CURRENCY","FIO","EMAIL","ORGANIZATION","CREDIT_NAME"),
                    "SITES" => array(0=>"s1",),
                    "USER_EVENT" => "WEBTU_FEEDBACK_CARD_MIR_USER",
                    "UTM" => "135",
                    /*"UTM" => [
                            "UTM_SOURCE" => 'source',
                            "UTM_MEDIUM" => 'medium',
                            "UTM_CAMPAIGN" => 'campaign',
                            "UTM_TERM" => 'term',
                            "UTM_CONTENT" => 'content',
                    ]*/
                )
            );?>
        </div>
    </div>
</div>

<div class="v21-section v21-popproducts--top">
    <!--div class="v21-section"-->
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "page",
                "AREA_FILE_SUFFIX" => "bottom",
                "EDIT_TEMPLATE" => ""
            )
        );?>
    <!--/div-->
    <div class="v21-section">
    <div class="v21-container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "v21_safes_docs",
            array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "Y",
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
                "IBLOCK_ID" => "210",
                "IBLOCK_TYPE" => "-",
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
                "PAGER_TITLE" => "Документы",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array(
                    0 => "FILE",
                    1 => "",
                ),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "COMPONENT_TEMPLATE" => ".default",
    			"UTM_SOURCE" => "no_data-1",
	    		"UTM_MEDIUM" => "no_data-2",
		    	"UTM_CAMPAIGN" => "no_data-3",
			    "UTM_TERM" => "no_data-4",
			    "UTM_CONTENT" => "no_data-5",
                "DOC_OUTPUT_LINK_HTML" => "Y", // выбираю только документ с наличием "22.04.2022" в названии
                "DOC_OUTPUT_LINK_HTML_PATTERN" => "22.04.2022",
            ),
            false
        ); ?>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>