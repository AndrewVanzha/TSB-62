<?
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("ROBOTS", "Биометрические данные");
$APPLICATION->SetPageProperty("title", "Единая биометрическая система");
$APPLICATION->SetPageProperty("description", "Биометрические данные");
$APPLICATION->SetTitle("Единая биометрическая система");
Asset::getInstance()->addCss("/chastnym-klientam/drugie-uslugi/biometricheskie-dannye/style.css");
?>
<h1 class="v21-h1" style="margin-bottom: 5px;">Единая биометрическая система</h1>
<h4 class="v21-h4">Ваш ключ к услугам банка не выходя из дома</h4>
<div class="v21-intro-card v21-intro-card--biometrics">
    <div class="v21-intro-card__image v21-intro-card__image--visible">
        <img src="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-biometrics.png" alt="">
    </div><!-- /.intro-card__image -->
    <div class="v21-intro-card__content">
        <?/*?>
        <h2 class="v21-h5 v21-intro-card__title v21-intro-card__width v21-intro-card__width--lg">
            Услуга по регистрации в Единой биометрической системе оказывается в офисах Трансстройбанка при личном присутствии
            физического лица и предъявлении паспорта гражданина РФ и СНИЛС
        </h2>
        <p class="v21-p v21-intro-card__brief v21-intro-card__width v21-intro-card__width--sm">
            После прохождения процедуры сбора биометрических данных и обновления статуса в личном кабинете на портале Госуслуг
            вам станет доступна возможность получения финансовых и государственных услуги дистанционно
        </p>
        <?*/?>

        <h2 class="v21-h5 v21-intro-card__title v21-intro-card__width v21-intro-card__width--lg">
            Услуги, которые можно получить
        </h2>
        <p class="v21-p v21-intro-card__brief v21-intro-card__width v21-intro-card__width--sm">
            Открыть вклад или счет, совершить перевод, а также иные услуги и сервисы доступные в Интернет-банке или Мобильном приложении ТСБ-онлайн.
        </p>
        <h2 class="v21-h5 v21-intro-card__title v21-intro-card__width v21-intro-card__width--lg">
            Как получить доступ к услугам банка через биометрию
        </h2>
        <ul class="v21-p v21-intro-card__brief v21-intro-card__width v21-intro-card__width--sm">
            Если вы уже ранее зарегистрировали биометрию, получите доступ в Интернет-банк или Мобильное приложение ТСБ-онлайн:
            <li>перейдите на страницу <a href="https://ubi.transstroybank.ru">Удаленной биометрической идентификации</a>;</li>
            <li>введите необходимые параметры на странице;</li>
            <li>страница перенаправит Вас на портал государственных услуг для ввода Логина и Пароля (ранее подтвержденной учетной записи на портале gosuslugi.ru);</li>
            <li>система удаленной идентификации сделает запись Вашего лица и голоса, сообщит о результате проверки биометрии;</li>
            <li>ознакомьтесь  и подтвердите условия договора;</li>
            <li>получите данные для доступа в интернет-банк.</li>
        </ul>
        <h2 class="v21-h5 v21-intro-card__title v21-intro-card__width v21-intro-card__width--lg">
            Регистрация биометрии:
        </h2>
        <p class="v21-p v21-intro-card__brief v21-intro-card__width v21-intro-card__width--sm">
            Услуга по регистрации в ЕСИА и ЕБС оказывается Трансстройбанком при личном присутствии физического лица и предъявлении документа, удостоверяющего личность, и СНИЛС.
            Список офисов Трансстройбанка и режим работы, в которых доступна услуга, рекомендуем предварительно уточнить по телефону 8 (800) 505-37-73. После прохождения процедуры сбора биометрических данных и обновления статуса в личном кабинете на портале Госуслуг вам станет доступна возможность получения финансовых и государственных услуг дистанционно.
        </p>

    </div><!-- /.v21-intro-card__content -->
</div><!-- /.v21-intro-card -->

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
        "UTM_SOURCE" => "no_data",
        "UTM_MEDIUM" => "no_data",
        "UTM_CAMPAIGN" => "no_data",
        "UTM_TERM" => "no_data",
        "UTM_CONTENT" => "no_data",
        "DOC_OUTPUT_LINK_HTML" => "Y", // выбираю только документ с наличием "22.04.2022" в названии
        "DOC_OUTPUT_LINK_HTML_PATTERN" => "22.04.2022",
    ),
    false
); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>