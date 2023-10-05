<?
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Прием СБП-платежей");
Asset::getInstance()->addCss("/corporative-clients/priem-sbp-platezhey/style.css");
?>
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
        .v21 .js-color-switch .v21-sbp-interests--left,
        .v21 .js-color-switch .v21-sbp-interests--right {
            background-color: transparent;
            box-shadow: none;
        }
        .v21 .js-color-switch .v21-sbp-interests--right::before,
        .v21 .js-color-switch .v21-sbp-interests--left::before {
            content: none;
        }
    </style>
<??>
    <div class="sbp-page__background-blue sbp-page__background-time"></div>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "block_top",
        "EDIT_TEMPLATE" => ""
    )
);?>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "block_1",
        "EDIT_TEMPLATE" => ""
    )
);?>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "block_2",
        "EDIT_TEMPLATE" => ""
    )
);?>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "block_3",
        "EDIT_TEMPLATE" => ""
    )
);?>

        </div><!-- v21-container -->
    </div><!-- v21-section -->

    <div class="v21-wide-container v21-sbp-wide-container">
        <div class="v21-card-application" id="fSBPForm">
            <div class="v21-container">
                <?$APPLICATION->IncludeComponent(
                    "webtu:feedback",
                    //"acquiring",
                    "qr_podkluch",
                    Array(
                        "ADMIN_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_ADMIN",
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "COMPONENT_TEMPLATE" => "qr_podkluch",
                        "EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
                        "IBLOCK_ID" => "34",  // Заявка на эквайринг
                        "PROPERTIES" => array("PHONE","COMPANY_NAME","COMPANY_INN","NAME","EMAIL","CITY","FROM_WHERE"),
                        //"PROPERTIES" => array("PHONE","CREDIT_SUMM","CREDIT_CURRENCY","FIO","EMAIL","ORGANIZATION","CREDIT_NAME"),
                        "SITES" => array(0=>"s1",),
                        "USER_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_USER"
                    )
                );?>
            </div>
        </div>
    </div>

    <div class="v21-section v21-sbp-popproducts--top">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "page",
                "AREA_FILE_SUFFIX" => "block_bottom",
                "EDIT_TEMPLATE" => ""
            )
        );?>
    <div class="v21-section v21-sbp-section-documents">
    <div class="v21-container">
        <section class="eq-docs">
            <h2 class="eq-docs__title page-title">Документы</h2>
            <div class="eq-docs__list">
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
                            "ELEMENT_ID" => "10212", // Документы по СБП
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
        </section>
        <?/* $APPLICATION->IncludeComponent(
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
                "UTM_SOURCE" => "no_data",
                "UTM_MEDIUM" => "no_data",
                "UTM_CAMPAIGN" => "no_data",
                "UTM_TERM" => "no_data",
                "UTM_CONTENT" => "no_data",
                "DOC_OUTPUT_LINK_HTML" => "Y", // выбираю только документ с наличием "22.04.2022" в названии
                "DOC_OUTPUT_LINK_HTML_PATTERN" => "22.04.2022",
            ),
            false
        ); */?>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

