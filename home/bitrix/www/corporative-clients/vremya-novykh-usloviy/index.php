<?
use Bitrix\Main\Page\Asset;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
LocalRedirect("/404.php", "404 Not Found");
$APPLICATION->SetPageProperty("title", "Время новых условий");
$APPLICATION->SetPageProperty("description", "Время новых условий");
$APPLICATION->SetTitle("Время новых условий");
Asset::getInstance()->addCss("/assets/css/style-broker-deposit.css?v=1.0.6");
Asset::getInstance()->addCss("/corporative-clients/vremya-novykh-usloviy/style.css");
?>
<style>
	.breadcrumbs {margin-bottom:44px}
	.popup-form_title, .fancybox-close-small, .popup-form_content .button, .popup-form .switch-box_lever::before {background-color:#A58A57}
	.popup-form_content .button:hover {background-color:#00345E}
	.popup-form .select-box .cs-box_selected, .popup-form .select-box .cs-box_list li.is-active, .popup-form a {color: #A58A57;text-decoration:none}
	.popup-form a:hover {color:#00345E}
	.popup-form_content .button {border-radius:0;height:45px;line-height:42px}
	h1.page-title {display:none}
	.doc-archive .ls-documents__item {margin-bottom: 24px}
	.doc-archive__header_two {margin-top: 24px}
</style>
<div class="page-lf">
    <div class="container">
        <section class="time-start">
            <header class="time-start__header">
                <h2 class="time-start__title page-title">Время новых условий </h2>
                <p class="time-start__description">Специальное предложение для новых клиентов</p>
            </header>
            <div class="time-start__image">
                <img src="images/main.png" alt="">
            </div>
        </section>
    </div>
    <div class="container">
        <section class="time-new-advantages">
            <div class="row">
                <header class="time-new-advantages__header col-md-10 offset-md-1">
                    <h2 class="time-new-advantages__title">При открытии расчётного счёта вам будут доступны продукты банка на льготных условиях</h2>
                    <p class="time-new-advantages__description">Предложение действует с 31.03.2021-31.05.2021</p>
                </header>
            </div>
            <div class="time-new-advantages__list">
                <div class="time-new-advantages__item">
                    <div class="time-new-advantages__item-title">0 ₽</div>
                    <div class="time-new-advantages__item-desc">за полгода <br>обслуживания РКО</div>
                </div>
                <div class="time-new-advantages__item">
                    <div class="time-new-advantages__item-title">0 ₽</div>
                    <div class="time-new-advantages__item-desc">1 год обслуживания корпоративной карты</div>
                </div>
                <div class="time-new-advantages__item">
                    <div class="time-new-advantages__item-title">1,65%</div>
                    <div class="time-new-advantages__item-desc">комиссия за эквайринг в течение 3-х месяцев</div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="time-tariff">
            <header class="time-tariff__header">
                <h3 class="time-tariff__title page-title">
                    Тарифы пакета «Старт»
                </h3>
                <p class="time-tariff__description">Обслуживание расчётного счёта</p>
            </header>
            <div class="row">
                <div class="time-tariff__item col-md-8 offset-md-2">
                    <div class="time-tariff__name">Старт</div>
                    <div class="time-tariff__conditions">0 ₽ - первые 6 месяцев, далее 990 ₽ в месяц</div>
                    <div class="time-tariff__params">
                        <div class="row">
                            <div class="time-tariff__param col-sm-6">
                                <p>Внесение наличных 0,1% (мин. 50 ₽)</p>
                                <p>Выдача наличных от 0,5%</p>
                                <p>Внутрибанковские платежи - бесплатно</p>
                            </div>
                            <div class="time-tariff__param col-sm-6">
                                <p>5 платежей в месяц - 100 ₽</p>
                                <p>30 ₽ за платёж начиная с 6-го</p>
                                <p>SMS-информирование</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="time-tariff__buttons">
                <a href="https://rezervscheta.transstroybank.ru/sa/reg" class="time-tariff__button" target="_blank">Открыть счёт</a>
            </div>
        </section>
    </div>
    <div class="container">
        <!--<section class="doc-archive time-doc-tariff">
            <header class="doc-archive__header">
                <h3 class="doc-archive__title page-title page-title__h3">
                    Тарифы и документы
                </h3>
            </header>
            <div class="doc-archive__wrapper">
                <div class="time-doc-tariff__first">
                    <div class="document-list">
                        <div class="row">
                            <div class="document-list__item col-lg-4">
                                <div class="document-list__icon">
                                    <img src="/assets/images/broker-deposit/doc.svg" alt="Document">
                                </div>
                                <div class="document-list__title">
                                    <a href="doc/Перечень%20документов%20-%20юридическое%20лицо-резидент.xlsx" download="">
                                        Перечень документов для открытия расчетного счета юридического лица
                                    </a>
                                </div>
                            </div>
                            <div class="document-list__item col-lg-8">
                                <div class="document-list__icon">
                                    <img src="/assets/images/broker-deposit/doc.svg" alt="Document">
                                </div>
                                <div class="document-list__title">
                                    <a href="doc/Перечень%20документов%20-%20ИП%20и%20физ.%20лицо,%20занимающееся%20частной%20практикой.xlsx" download="">
                                        Перечень документов для открытия расчетного счета индивидуального предпринимателя и физического лица, занимающегося частной практикой
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="doc-archive__contract archive-contract col-md-4">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="doc-archive__item time-doc-tariff__item">
                                    <div class="doc-archive__desc">
                                        Тарифы расчетно-кассового обслуживания (пакет «Старт») на отдельные виды услуг для участников акции (действуют до 30.11.2020)
                                    </div>
                                    <div class="document-list">
                                        <div class="row">

                                            <div class="document-list__item col-sm-12 col-lg-12">
                                                <div class="document-list__icon">
                                                    <img src="/assets/images/broker-deposit/doc.svg" alt="Document">
                                                </div>
                                                <div class="document-list__title">
                                                    <a href="doc/Тарифы по акции.pdf" download="">Тарифы РКО по акции</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="doc-archive__item time-doc-tariff__item">
                                    <div class="doc-archive__desc">
                                        Правила предоставления и использования системы Клиент-Банк для корпоративных клиентов (действуют с 10.06.2020)
                                    </div>
                                    <div class="document-list">
                                        <div class="row">

                                            <div class="document-list__item col-lg-12">
                                                <div class="document-list__icon">
                                                    <img src="/assets/images/broker-deposit/doc.svg" alt="Document">
                                                </div>
                                                <div class="document-list__title">
                                                    <a href="doc/Правила предоставления и использования системы Клиент-Банк для ЮЛ и ИП (действуют с 10.06.2020).pdf" download="">Правила</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doc-archive__contract archive-contract col-md-4">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="doc-archive__item time-doc-tariff__item">
                                    <div class="doc-archive__desc">
                                        Тарифы расчетно-кассового обслуживания (за пакеты услуг) для корпоративных клиентов (действуют с 01.03.2018)
                                    </div>
                                    <div class="document-list">
                                        <div class="row">

                                            <div class="document-list__item col-lg-12">
                                                <div class="document-list__icon">
                                                    <img src="/assets/images/broker-deposit/doc.svg" alt="Document">
                                                </div>
                                                <div class="document-list__title">
                                                    <a href="doc/Тарифы_пакеты.pdf" download="">Тарифы за пакеты услуг</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="doc-archive__item time-doc-tariff__item">
                                    <div class="doc-archive__desc">
                                        Правила открытия, ведения и закрытия банковских счетов для корпоративных клиентов (действуют с 01.03.2018)
                                    </div>
                                    <div class="document-list">
                                        <div class="row">

                                            <div class="document-list__item col-sm-12 col-lg-12">
                                                <div class="document-list__icon">
                                                    <img src="/assets/images/broker-deposit/doc.svg" alt="Document">
                                                </div>
                                                <div class="document-list__title">
                                                    <a href="doc/Правила%20РКО%20ЮЛ%20и%20ИП%20.pdf" download="">Правила</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doc-archive__contract archive-contract col-md-4">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="doc-archive__item time-doc-tariff__item">
                                    <div class="doc-archive__desc">
                                        Тарифы расчетно-кассового обслуживания (базовые) для корпоративных клиентов (действуют с 27.08.2020)
                                    </div>
                                    <div class="document-list">
                                        <div class="row">

                                            <div class="document-list__item col-sm-12 col-lg-12">
                                                <div class="document-list__icon">
                                                    <img src="/assets/images/broker-deposit/doc.svg" alt="Document">
                                                </div>
                                                <div class="document-list__title">
                                                    <a href="doc/Тарифы расчетно-кассового обслуживания (базовые) для корпоративных клиентов (вступают в силу с 27.08.2020).pdf" download="">Тарифы РКО базовые с 27.08.2020</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

		<section class="doc-archive time-doc-tariff">
            <header class="doc-archive__header">
                <h3 class="doc-archive__title page-title page-title__h3">
                    Тарифы
                </h3>
            </header>
            <div class="doc-archive__wrapper">
				<div class="document-list">
					<div class="row">
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
		"ELEMENT_ID" => "8891",
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
            <header class="doc-archive__header doc-archive__header_two">
                <h3 class="doc-archive__title page-title page-title__h3">
                    Документы
                </h3>
            </header>
            <div class="doc-archive__wrapper">
				<div class="document-list">
					<div class="row">
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
		"ELEMENT_ID" => "8892",
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
        </section>
    </div>
</div>
<div class="popup-form" id="cashServiceRequest">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"booking",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_BOOKING_ADMINISTRATOR",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
			"IBLOCK_ID" => "28",
			"POST_CALLBACK" => function($post){$post['TYPE']=implode(',', $post['TYPE']);$post['CURRENCY']=implode(',', $post['CURRENCY']);if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['FIRST_NAME'];}return$post;},
			"PROPERTIES" => array("SEX","PHONE","EMAIL","CITY","NAME_COMPANY","INN","LEGAL_FORM","ONLINE_BANK","CURRENCY","TYPE","ADDRESS"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_BOOKING_USER"
		)
	);?>
</div>

<script src="/assets/js/script-broker-deposit.js?v=1.0.4"></script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>