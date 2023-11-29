<?
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Тарифы комиссионного вознаграждения за пакеты услуг расчетно-кассового обслуживания счетов юридических лиц (за исключением кредитных организаций), индивидуальных предпринимателей и физических лиц, занимающихся в установленном законодательством российской федерации порядке частной практикой, в АКБ «ТРАНССТРОЙБАНК» (АО)");
$APPLICATION->SetPageProperty("keywords", "Тарифы комиссионного вознаграждения РКО, АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Тарифы комиссионного вознаграждения РКО | АКБ «ТрансСтройБанк»");
$APPLICATION->SetTitle("Тарифы комиссионного вознаграждения РКО");
Asset::getInstance()->addCss("/assets/css/style-broker-deposit.css?v=1.0.6");
Asset::getInstance()->addCss("/corporative-clients/bankovskoe-obsluzhivanie/komission-tariffs-rko/style.css");
?>
<?php
//debugg($_REQUEST);
?>
<style>
    .v21 {
        overflow: hidden;
    }
    .v21 .v21-section {
        margin-top: 0;
        margin-bottom: 0;
    }
    .v21 .v21-container.v21-container--header {
        position: relative;
        z-index: 0;
    }
    /*.v21 .v21-wide-container {
        margin-top: 0;
        overflow: visible;
    }*/
</style>
<section class="v21-section v21-komission-tariffs-rko">
    <?$iblock_id = "223";  // Расчетно-кассовое обслуживание (Тарифы) ?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news",
        "komission-tariffs-rko",
        Array(
            "ADD_ELEMENT_CHAIN" => "Y",
            "ADD_SECTIONS_CHAIN" => "Y",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BROWSER_TITLE" => "-",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
            "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
            "DETAIL_DISPLAY_TOP_PAGER" => "N",
            "DETAIL_FIELD_CODE" => array("",""),
            "DETAIL_PAGER_SHOW_ALL" => "Y",
            "DETAIL_PAGER_TEMPLATE" => "",
            "DETAIL_PAGER_TITLE" => "Страница",
            "DETAIL_PROPERTY_CODE" => array(
                0 => "ATT_TABLE_LINE",
                1 => "ATT_SERVICE_POINT",
                2 => "ATT_SERVICE_POINT_COMPL",
                3 => "",
            ),
            "DETAIL_SET_CANONICAL_URL" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => $iblock_id,
            "IBLOCK_TYPE" => "corporative-clients",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
            "LIST_FIELD_CODE" => array("",""),
            "LIST_PROPERTY_CODE" => array(
                0 => "ATT_TABLE_LINE",
                1 => "ATT_SERVICE_POINT",
                2 => "ATT_SERVICE_POINT_COMPL",
                3 => "",
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
            "SEF_FOLDER" => "/corporative-clients/bankovskoe-obsluzhivanie/komission-tariffs-rko/",
            "SEF_MODE" => "Y",
            "SEF_URL_TEMPLATES" => Array(
                "news"=>"",
                //"section"=>"#SECTION_CODE#/",
                "section" => "#SECTION_CODE_PATH#/",
                //"detail"=>"detail/#ELEMENT_CODE#/",
                "detail" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
            ),
            "SET_LAST_MODIFIED" => "N",
            "SET_STATUS_404" => "N",
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
            "USE_SHARE" => "N"
        )
    );?>
<!--/section-->

<?/*?>
<div class="v21-section">
    <div class="v21-wide-container v21-questiones-answers-container">
        <div class="v21-container">
            <?$APPLICATION->IncludeComponent(
                "webtu:faq.block.add",
                "komission-tariffs-rko", // еще нет
                Array(
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "HIGHLOAD_IBLOCK_ID" => "10"  // Highload-блоки / ValutnyKontrolFAQ
                )
            );?>
        </div>
    </div><!-- v21-container -->
</div><!-- v21-section -->   index_block_maintext
<?*/?>

<?/*?>
<div class="v21-section">
    <div class="v21-container">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "page",
                "AREA_FILE_SUFFIX" => "block_bottom",
                "EDIT_TEMPLATE" => ""
            )
        );?>
    </div><!-- v21-container -->
</div><!-- v21-section -->
<?*/?>

<section class="rko-doc">
    <div class="v21-container">
        <div class="row">
            <div class="rko-doc__block rko-doc__rate col-md-4">
                <header class="rko-doc__header">
                    <div class="rko-doc__title">Тарифы</div>
                </header>
                <div class="rko-doc__items">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.detail",
                        "documents-type-1",
                        Array(
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
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "ELEMENT_CODE" => "",
                            "ELEMENT_ID" => "8887",
                            "FIELD_CODE" => array("", ""),
                            "IBLOCK_ID" => "189",
                            "IBLOCK_TYPE" => "ls_documents",
                            "IBLOCK_URL" => "",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "MESSAGE_404" => "",
                            "META_DESCRIPTION" => "-",
                            "META_KEYWORDS" => "-",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Страница",
                            "PROPERTY_CODE" => array("", "DOCUMENTS", "CLASSES"),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_CANONICAL_URL" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "STRICT_SECTION_CHECK" => "N",
                            "USE_PERMISSIONS" => "N",
                            "USE_SHARE" => "N"
                        )
                    );?>
                </div>
            </div>
            <div class="rko-doc__block rko-doc__contract offset-md-1 col-md-4">
                <header class="rko-doc__header">
                    <div class="rko-doc__title">Договоры</div>
                </header>
                <div class="rko-doc__items">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.detail",
                        "documents-type-1",
                        Array(
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
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "ELEMENT_CODE" => "",
                            "ELEMENT_ID" => "8888",
                            "FIELD_CODE" => array("", ""),
                            "IBLOCK_ID" => "189",
                            "IBLOCK_TYPE" => "ls_documents",
                            "IBLOCK_URL" => "",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "MESSAGE_404" => "",
                            "META_DESCRIPTION" => "-",
                            "META_KEYWORDS" => "-",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Страница",
                            "PROPERTY_CODE" => array("", "DOCUMENTS", "CLASSES"),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_CANONICAL_URL" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "STRICT_SECTION_CHECK" => "N",
                            "USE_PERMISSIONS" => "N",
                            "USE_SHARE" => "N"
                        )
                    );?>
                </div>
            </div>
            <div class="rko-doc__block rko-doc__push-bank col-12">
                <header class="rko-doc__header">
                    <div class="rko-doc__title">Документы для предоставления в Банк</div>
                </header>
                <div class="rko-doc__items row">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.detail",
                        "documents-type-1",
                        Array(
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
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "ELEMENT_CODE" => "",
                            "ELEMENT_ID" => "8889",
                            "FIELD_CODE" => array("", ""),
                            "IBLOCK_ID" => "189",
                            "IBLOCK_TYPE" => "ls_documents",
                            "IBLOCK_URL" => "",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "MESSAGE_404" => "",
                            "META_DESCRIPTION" => "-",
                            "META_KEYWORDS" => "-",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Страница",
                            "PROPERTY_CODE" => array("", "DOCUMENTS", "CLASSES"),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_CANONICAL_URL" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "STRICT_SECTION_CHECK" => "N",
                            "USE_PERMISSIONS" => "N",
                            "USE_SHARE" => "N"
                        )
                    );?>
                </div>
            </div>
            <div class="rko-doc__block rko-doc__client-bank col-12">
                <header class="rko-doc__header">
                    <div class="rko-doc__title">Сертификаты и руководства пользователя системы Клиент-Банк</div>
                </header>
                <div class="rko-doc__items row">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.detail",
                        "documents-type-1",
                        Array(
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
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "ELEMENT_CODE" => "",
                            "ELEMENT_ID" => "8890",
                            "FIELD_CODE" => array("", ""),
                            "IBLOCK_ID" => "189",
                            "IBLOCK_TYPE" => "ls_documents",
                            "IBLOCK_URL" => "",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "MESSAGE_404" => "",
                            "META_DESCRIPTION" => "-",
                            "META_KEYWORDS" => "-",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Страница",
                            "PROPERTY_CODE" => array("", "DOCUMENTS", "CLASSES"),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_CANONICAL_URL" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "STRICT_SECTION_CHECK" => "N",
                            "USE_PERMISSIONS" => "N",
                            "USE_SHARE" => "N"
                        )
                    );?>
                </div>
            </div>
        </div>
        <div class="rko-doc__all">
            <a href="/arkhiv-tarifov-i-dokumentov/" class="rko-doc__all--link-button">
                <span>Архив тарифов и документов</span>
            </a>
            <a href="/arkhiv-tarifov-i-dokumentov/" target="_blank" class="rko-doc__all--link-details">
                <!--span>Подробнее </span-->
                <svg class="rko-doc__all--link-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                    <path d="M13.2371 0.989515C13.2371 0.492459 12.8342 0.0895151 12.3371 0.0895145L4.23715 0.0895146C3.74009 0.0895146 3.33714 0.492459 3.33714 0.989515C3.33714 1.48657 3.74009 1.88952 4.23714 1.88951L11.4371 1.88951L11.4371 9.08952C11.4371 9.58657 11.8401 9.98952 12.3371 9.98952C12.8342 9.98952 13.2371 9.58657 13.2371 9.08951L13.2371 0.989515ZM1.65983 12.9396L12.9735 1.62591L11.7007 0.353119L0.387041 11.6668L1.65983 12.9396Z" fill="#00345E"/>
                </svg>
            </a>
        </div>
    </div><!-- v21-container -->
</section><!-- v21-section -->

<?/*?>
<div class="v21-section">
    <div class="v21-wide-container v21-documents-vkontrol-container">
        <div class="v21-container">
            <section class="v21-documents-vkontrol-tileblock">
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
                        //"IBLOCK_ID" => "207", - и-блок не нужен
                        "IBLOCK_ID" => "83",
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
                        "UTM_SOURCE" => "no_data",
                        "UTM_MEDIUM" => "no_data",
                        "UTM_CAMPAIGN" => "no_data",
                        "UTM_TERM" => "no_data",
                        "UTM_CONTENT" => "no_data",
                        //"DOC_OUTPUT_LINK_HTML" => "Y", // выбираю только документ с наличием "22.04.2022" в названии
                        //"DOC_OUTPUT_LINK_HTML_PATTERN" => "22.04.2022",
                    ),
                    false
                ); ?>
                <div class="rko-doc__all">
                    <a href="/arkhiv-tarifov-i-dokumentov/" class="rko-doc__all--link-button">
                        <span>Архив тарифов и документов</span>
                    </a>
                    <a href="/arkhiv-tarifov-i-dokumentov/" target="_blank" class="rko-doc__all--link-details">
                        <!--span>Подробнее </span-->
                        <svg class="rko-doc__all--link-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                            <path d="M13.2371 0.989515C13.2371 0.492459 12.8342 0.0895151 12.3371 0.0895145L4.23715 0.0895146C3.74009 0.0895146 3.33714 0.492459 3.33714 0.989515C3.33714 1.48657 3.74009 1.88952 4.23714 1.88951L11.4371 1.88951L11.4371 9.08952C11.4371 9.58657 11.8401 9.98952 12.3371 9.98952C12.8342 9.98952 13.2371 9.58657 13.2371 9.08951L13.2371 0.989515ZM1.65983 12.9396L12.9735 1.62591L11.7007 0.353119L0.387041 11.6668L1.65983 12.9396Z" fill="#00345E"/>
                        </svg>
                    </a>
                </div>
            </section>
        </div><!-- v21-container -->
    </div><!-- v21-container -->

</div><!-- v21-section -->

<div class="">
<?*/?>
    <div class="">
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>