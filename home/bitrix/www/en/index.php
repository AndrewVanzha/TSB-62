<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "The Joint Stock Commercial Bank «Transstroibank» (Joint Stock Company), hereinafter referred to as «the Bank» or «Transstroibank», was established in April 1994.");
$APPLICATION->SetPageProperty("keywords", "Transstroibank JSC");
$APPLICATION->SetPageProperty("title", "GENERAL INFORMATION ON THE BANK | Transstroibank");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Home");
?>
<? if (SITE_TEMPLATE_ID !== "template_home") : ?>

	<div id="tabs" class="tabs-items" style="margin: 0 0 120px;">
		<div class="tab-item active" id="corporative">
			<? $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"main_slider_new",
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
					"FIELD_CODE" => array("NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_PICTURE", ""),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "184",
					"IBLOCK_TYPE" => "slider_main",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "10",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "414",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array("LINK", ""),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N"
				)
			); ?>
			<?/*div class="wrapp-banners-corporat">
			<div class="container">
				<div class="banners-corporat">
					<div class="bg-corp-banners"></div>
					<div class="title-banners">Merchant and Internet Acquiring</div>
					<p>Start accepting customer payment using bank card in 4 steps</p>
					<div class="link-banners">
						<a href="/corporative-clients/bankovskoe-obsluzhivanie/ekvayring/" class="btn-site1">Draw up application</a>
					</div>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/terminal.png" alt="">
				</div>
				<div class="banners-corporat">
					<div class="bg-corp-banners"></div>
					<div class="title-banners">Safe Deposit Box Rental</div>
					<p>A bank safe box is one of the most reliable ways to ensure the safekeeping of your valuables.</p>
					<div class="link-banners">
						<a href="/corporative-clients/arenda-seyfov/" class="btn-site1">Draw up application</a>
					</div>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/safe.png" alt="">
				</div>
			</div>
		</div*/ ?>
			<div class="wrapp-banners-corporat">
				<div class="container">
					<div class="banners-corporat" style="background: url('../local/templates/czebra_home/img/banner-corp1.png'); background-size: 100% 100%">
						<?/*div class="bg-corp-banners"></div*/ ?>
						<div class="title-banners">Cut costs</div>
						<p>Trading acquiring at a minimum rate of 1.2%</p>
						<div class="link-banners">
							<a href="/en/corporative-clients/bankovskoe-obsluzhivanie/ekvayring/torgovyy-ekvayring/" class="btn-site1">Read more</a>
						</div>
						<?/*img src="<?=SITE_TEMPLATE_PATH?>/img/terminal.png" alt=""*/ ?>
					</div>
					<div class="banners-corporat" style="background: url('../local/templates/czebra_home/img/banner-corp2.png'); background-size: 100% 100%">
						<?/*div class="bg-corp-banners"></div*/ ?>
						<div class="title-banners">Invest and make money with a professional</div>
						<p>Personal exchange broker from Transstroibank</p>
						<div class="link-banners">
							<a href="/en/chastnym-klientam/vklady-i-investitsii/investitsii/brokerskoe-obsluzhivanie/" class="btn-site1">Read more</a>
						</div>
						<?/*img src="<?=SITE_TEMPLATE_PATH?>/img/safe.png" alt=""*/ ?>
					</div>
				</div>
			</div>
			<? $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"banking_packages_main",
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
					"FIELD_CODE" => array("", ""),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "168",
					"IBLOCK_TYPE" => "corporative_clients",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "3",
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
					"PROPERTY_CODE" => array("MAX_DATE", "INTEREST_RATE", "MAX_SUM", ""),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N"
				)
			); ?>
			<div class="popup-form" id="cashServiceRequest">
				<? $APPLICATION->IncludeComponent(
					"webtu:feedback",
					"booking",
					array(
						"ADMIN_EVENT" => "WEBTU_FEEDBACK_BOOKING_ADMINISTRATOR",
						"AJAX_MODE" => "Y",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"EVENT_CALLBACK" => function ($post) {
							$post['RECOURSE'] = 'Уважаемый(ая)';
							return $post;
						},
						"IBLOCK_ID" => "28",
						"POST_CALLBACK" => function ($post) {
							$post['TYPE'] = implode(',', $post['TYPE']);
							$post['CURRENCY'] = implode(',', $post['CURRENCY']);
							if (!empty($post['FIRST_NAME'])) {
								$post['NAME'] = $post['FIRST_NAME'];
							}
							return $post;
						},
						"PROPERTIES" => array("SEX", "PHONE", "EMAIL", "CITY", "NAME_COMPANY", "INN", "LEGAL_FORM", "ONLINE_BANK", "CURRENCY", "TYPE", "ADDRESS"),
						"SITES" => array("s1"),
						"USER_EVENT" => "WEBTU_FEEDBACK_BOOKING_USER"
					)
				); ?>
			</div>

			<?/*div class="popup-form" id="salaryProjectRequest">
			<?$APPLICATION->IncludeComponent(
				"webtu:feedback",
				"salary_project",
				Array(
					"ADMIN_EVENT" => "WEBTU_FEEDBACK_SALARY_PROJECT_ADMIN",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "N",
					"EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
					"IBLOCK_ID" => "38",
					"POST_CALLBACK" => function($post){$post['TYPE']=implode(',', $post['TYPE']);$post['CURRENCY']=implode(',', $post['CURRENCY']);if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['FIRST_NAME'];}return$post;},
					"PROPERTIES" => array("PHONE","EMAIL","CITY","COMPANY_NAME","EMPLOYEES"),
					"SITES" => array("s1"),
					"USER_EVENT" => "WEBTU_FEEDBACK_SALARY_PROJECT_USER"
				)
			);?>
		</div*/ ?>
			<div class="wrapp-mobil-application-business">
				<div class="container">
					<div class="mobil-application-business">
						<div class="title">Mobile application for business</div>
						<p>The “Mobile Business Client” solution is designed to organize remote servicing of individual entrepreneurs, small and medium-sized businesses, as well as large corporate clients. The solution allows bank customers to manage the accounts of their organizations using smartphones.</p>
						<div class="link-store">
							<a href="https://apps.apple.com/ru/app/%D1%82%D1%80%D0%B0%D0%BD%D1%81%D1%81%D1%82%D1%80%D0%BE%D0%B9%D0%B1%D0%B0%D0%BD%D0%BA-%D0%BC%D0%B1%D0%BA/id1334142386" target="_blank"><img src="<?= SITE_TEMPLATE_PATH ?>/img/appstore-new.png" alt=""></a>
							<a href="https://play.google.com/store/apps/details?id=com.bssys.mbcphone.tsb" target="_blank"><img src="<?= SITE_TEMPLATE_PATH ?>/img/google-play-new.png" alt=""></a>
						</div>
						<div class="more-info-link">
							<a href="/en/corporative-clients/sistema-klient-bank#mobil-client-bank" class="btn-site1">Read more</a>
						</div>
						<img src="<?= SITE_TEMPLATE_PATH ?>/img/mobil-application-buizness.png" alt="">
					</div>
				</div>
			</div>
			<?/*div class="wrapp-useful-info">
			<div class="container">
				<div class="title-useful-info">Полезная информация для предпринимателей</div>
				<div class="wrapp-list-info">
					<div class="list-info">
						<ul>
							<li><a href="/corporative-clients/kredity-i-garantii/kredity-dlya-biznesa/#spoiler-237">Общие условия кредитования</a></li>
							<li><a href="/corporative-clients/kredity-i-garantii/kredity-dlya-biznesa/#spoiler-3925">Требования к заемщикам</a></li>
							<li><a href="/corporative-clients/kredity-i-garantii/kredity-dlya-biznesa/#spoiler-3924">Формы кредитования</a></li>
							<li><a href="/corporative-clients/kredity-i-garantii/bankovskie-garantii/#spoiler-4163">Информация о предоставлении банковских гарантий</a></li>
							<li><a href="/corporative-clients/kredity-i-garantii/bankovskie-garantii/#spoiler-4164">Виды и условия предоставления банковских гарантий</a></li>
							<li><a href="/corporative-clients/kredity-i-garantii/bankovskie-garantii/#spoiler-247">Требования к принципалу</a></li>
						</ul>
					</div>
					<div class="list-info">
						<ul>
							<li><a href="/corporative-clients/kredity-i-garantii/bankovskie-garantii/#spoiler-248">Требования к обеспечению</a></li>
							<li><a href="https://coins.tsbnk.ru/">Подарочные монеты</a></li>
							<li><a href="/corporative-clients/bankovskoe-obsluzhivanie/bankovskie-karty/karty-dlya-biznesa/#spoiler-3606">Тарифы по корпоративным картам</a></li>
							<li><a href="/corporative-clients/bankovskoe-obsluzhivanie/inkassatsiya/#spoiler-3594">Преимущества самоинкассации</a></li>
							<li><a href="/corporative-clients/razmeshchenie-sredstv/vekselya/#spoiler-297">Операции с собственными векселями</a></li>
							<li><a href="/corporative-clients/arenda-seyfov/#spoiler-3973">Особенности пользования банковским индивидуальным сейфом</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div*/ ?>
		</div>
	</div>

	<div class="v21-section">
		<div class="v21-container">
			<div class="v21-grid">
				<div class="v21-grid__item v21-grid__item--1x2@sm" style="margin: auto;">
					<a href="/en/ofisy-i-bankomaty/" class="v21-help-card">
						<div class="v21-help-card__text">
							<h3 class="v21-help-card__title v21-h3">Offices and ATMs</h3>
							<p class="v21-help-card__brief v21-p">In addition to the ATM network of Transstroybank, you can also use the services of ATMs and ATMs of our partners.</p>
							<div class="v21-help-card__button v21-button">More details</div>
						</div>
						<img src="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-help-2.png" alt="" class="v21-help-card__image">
					</a><!-- /.v21-help-card -->
				</div><!-- /.v21-grid__item -->
			</div><!-- /.v21-grid -->
		</div><!-- /.v21-container -->
	</div><!-- ./v21-section -->

	<div class="popup-form" id="agentRequest" style="overflow: none;">
		<? $APPLICATION->IncludeComponent(
			"webtu:feedback",
			"agent",
			array(
				"AJAX_MODE" => "Y",
				"COMPONENT_TEMPLATE" => "agent",
				"IBLOCK_ID" => "17",
				"PROPERTIES" => array(
					"PHONE",
					"LAST_NAME",
					"FIRST_NAME",
					"SECOND_NAME",
					"SEX",
					"BIRTHDATE",
					"EMAIL",
					"CITIZENSHIP",
					"CITY",
				),
				"ADMIN_EVENT" => "WEBTU_FEEDBACK_AGENT_ADMIN",
				"USER_EVENT"  => "WEBTU_FEEDBACK_AGENT_USER",
				"SITES" => array(
					0 => "s1",
				),
				"POST_CALLBACK" => function ($post) {
					if (!isset($post['CITIZENSHIP'])) {
						$post['CITIZENSHIP'] = 'Нет';
					} else {
						$post['CITIZENSHIP'] = 'Да';
					}

					$post['NAME'] = "{$post['FIRST_NAME']} {$post['SECOND_NAME']} {$post['LAST_NAME']}";

					return $post;
				},
				"EVENT_CALLBACK" => function ($post) {
					if ($post['SEX'] == 'Мужской') {
						$post['RECOURSE'] = 'Уважаемый';
					} else {
						$post['RECOURSE'] = 'Уважаемая';
					}

					return $post;
				},
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
			),
			false
		); ?>
	</div>


<? else : ?>

	<? $APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"main-slider",
		array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "N",
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
			"FIELD_CODE" => array("", ""),
			"FILTER_NAME" => "",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "130",
			"IBLOCK_TYPE" => "options",
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
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array("ATT_INFO", "ATT_URL", "ATT_PICTURE", ""),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N"
		)
	); ?>
	<? $APPLICATION->IncludeComponent(
		"webtu:synch.currency",
		"en_def",
		array(
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CBR_IBLOCK_ID" => "116",
			"OFFICE_IBLOCK_ID" => "115",
			"COMPONENT_TEMPLATE" => "en_def"
		),
		false
	); ?>
	<? $APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"main-digits",
		array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "N",
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
			"FIELD_CODE" => array(
				0 => "PREVIEW_PICTURE",
				1 => "DETAIL_PICTURE",
				2 => "",
			),
			"FILTER_NAME" => "specialFilter",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "135",
			"IBLOCK_TYPE" => "about",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "Y",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "4",
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
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "",
				2 => "",
			),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SORT_BY1" => "SORT",
			"SORT_BY2" => "ACTIVE_FROM",
			"SORT_ORDER1" => "ASC",
			"SORT_ORDER2" => "DESC",
			"STRICT_SECTION_CHECK" => "N",
			"COMPONENT_TEMPLATE" => "main-digits"
		),
		false
	); ?>

	<div class="popup-form" id="creditRequest">

		<? $APPLICATION->IncludeComponent(
			"webtu:feedback",
			"credit",
			array(
				"AJAX_MODE" => "Y",
				"COMPONENT_TEMPLATE" => "callback",
				"IBLOCK_ID" => "7",
				"PROPERTIES" => array(
					"PHONE",
					"CREDIT_NAME",
					"CREDIT_SUMM",
					"CREDIT_CURRENCY",
					"CREDIT_PERCENT",
					"CREDIT_CLIENT_TYPE",
					"CREDIT_ENSURANCE",
					"CREDIT_PLEDGE",
					"CREDIT_CLIENT_TYPE_VALUE",
					"CREDIT_ENSURANCE_VALUE",
					"CREDIT_PLEDGE_VALUE",
					"CREDIT_TIME",
					"CREDIT_PAYMENT",
					"LAST_NAME",
					"FIRST_NAME",
					"SECOND_NAME",
					"SEX",
					"BIRTHDATE",
					"EMAIL",
					"CITIZENSHIP",
				),
				"ADMIN_EVENT" => "WEBTU_FEEDBACK_CREDIT",
				"USER_EVENT"  => "WEBTU_FEEDBACK_CREDIT_USER",
				"SITES" => array(
					0 => "s1",
				),
				"POST_CALLBACK" => function ($post) {
					if (!isset($post['CITIZENSHIP'])) {
						$post['CITIZENSHIP'] = 'Нет';
					} else {
						$post['CITIZENSHIP'] = 'Да';
					}

					return $post;
				},
				"EVENT_CALLBACK" => function ($post) {
					if ($post['SEX'] == 'Мужской') {
						$post['RECOURSE'] = 'Уважаемый';
					} else {
						$post['RECOURSE'] = 'Уважаемая';
					}

					return $post;
				},
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"CREDIT_NAME"        => "Кредит 'Молодежный'",
				"CREDIT_SUMM"        => "100 000",
				"CREDIT_CURRENCY"    => "RUB",
				"CREDIT_PERCENT"     => "14%",
				"CREDIT_CLIENT_TYPE" => "Да",
				"CREDIT_ENSURANCE"   => "Да",
				"CREDIT_PLEDGE"      => "Да",
				"CREDIT_TIME"        => "1 год",
				"CREDIT_PAYMENT"     => "1000",
				"CREDIT_CLIENT_TYPE_VALUE" => "1%",
				"CREDIT_ENSURANCE_VALUE"   => "1%",
				"CREDIT_PLEDGE_VALUE"      => "1%",
			),
			false
		); ?>

	</div>

	<div class="popup-form" id="cardRequest">

		<? $APPLICATION->IncludeComponent(
			"webtu:feedback",
			"card",
			array(
				"AJAX_MODE" => "Y",
				"COMPONENT_TEMPLATE" => "card",
				"IBLOCK_ID" => "11",
				"PROPERTIES" => array(
					"PHONE",
					"LAST_NAME",
					"FIRST_NAME",
					"SECOND_NAME",
					"SEX",
					"BIRTHDATE",
					"EMAIL",
					"CITIZENSHIP",
					"CITY",
					"TYPE",
					"CARD_SUMM",
					"CARD_CURRENCY",
				),
				"ADMIN_EVENT" => "WEBTU_FEEDBACK_CARD_ADMIN",
				"USER_EVENT"  => "WEBTU_FEEDBACK_CARD_USER",
				"SITES" => array(
					0 => "s1",
				),
				"POST_CALLBACK" => function ($post) {
					if (!isset($post['CITIZENSHIP'])) {
						$post['CITIZENSHIP'] = 'Нет';
					} else {
						$post['CITIZENSHIP'] = 'Да';
					}

					$post['NAME'] = "{$post['FIRST_NAME']} {$post['SECOND_NAME']} {$post['LAST_NAME']}";

					if (isset($_COOKIE['WEBTU_GEOTARGETING_CITY'])) {
						CModule::IncludeModule('iblock');
						$city = CIblockElement::GetList(array(), array("ID" => (int)$_COOKIE['WEBTU_GEOTARGETING_CITY']));
						$city = $city->Fetch();
						$post['CITY'] = $city['NAME'];
					} else {
						$post['CITY'] = 'Город не определен';
					}

					return $post;
				},
				"EVENT_CALLBACK" => function ($post) {
					if ($post['SEX'] == 'Мужской') {
						$post['RECOURSE'] = 'Уважаемый';
					} else {
						$post['RECOURSE'] = 'Уважаемая';
					}

					return $post;
				},
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
			),
			false
		); ?>

	</div>

	<div class="popup-form" id="salaryRequest" style="overflow: none;">

		<? $APPLICATION->IncludeComponent(
			"webtu:feedback",
			"salary",
			array(
				"AJAX_MODE" => "Y",
				"COMPONENT_TEMPLATE" => "salary",
				"IBLOCK_ID" => "14",
				"PROPERTIES" => array(
					"PHONE",
					"LAST_NAME",
					"FIRST_NAME",
					"SECOND_NAME",
					"SEX",
					"BIRTHDATE",
					"EMAIL",
					"CITIZENSHIP",
					"CITY",
				),
				"ADMIN_EVENT" => "WEBTU_FEEDBACK_SALARY_ADMIN",
				"USER_EVENT"  => "WEBTU_FEEDBACK_SALARY_USER",
				"SITES" => array(
					0 => "s1",
				),
				"POST_CALLBACK" => function ($post) {
					if (!isset($post['CITIZENSHIP'])) {
						$post['CITIZENSHIP'] = 'Нет';
					} else {
						$post['CITIZENSHIP'] = 'Да';
					}

					$post['NAME'] = "{$post['FIRST_NAME']} {$post['SECOND_NAME']} {$post['LAST_NAME']}";

					return $post;
				},
				"EVENT_CALLBACK" => function ($post) {
					if ($post['SEX'] == 'Мужской') {
						$post['RECOURSE'] = 'Уважаемый';
					} else {
						$post['RECOURSE'] = 'Уважаемая';
					}

					return $post;
				},
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
			),
			false
		); ?>

	</div>

	<div class="popup-form" id="agentRequest" style="height: 853px; overflow: none;">

		<? $APPLICATION->IncludeComponent(
			"webtu:feedback",
			"agent",
			array(
				"AJAX_MODE" => "Y",
				"COMPONENT_TEMPLATE" => "agent",
				"IBLOCK_ID" => "17",
				"PROPERTIES" => array(
					"PHONE",
					"LAST_NAME",
					"FIRST_NAME",
					"SECOND_NAME",
					"SEX",
					"BIRTHDATE",
					"EMAIL",
					"CITIZENSHIP",
					"CITY",
				),
				"ADMIN_EVENT" => "WEBTU_FEEDBACK_AGENT_ADMIN",
				"USER_EVENT"  => "WEBTU_FEEDBACK_AGENT_USER",
				"SITES" => array(
					0 => "s1",
				),
				"POST_CALLBACK" => function ($post) {
					if (!isset($post['CITIZENSHIP'])) {
						$post['CITIZENSHIP'] = 'Нет';
					} else {
						$post['CITIZENSHIP'] = 'Да';
					}

					$post['NAME'] = "{$post['FIRST_NAME']} {$post['SECOND_NAME']} {$post['LAST_NAME']}";

					return $post;
				},
				"EVENT_CALLBACK" => function ($post) {
					if ($post['SEX'] == 'Мужской') {
						$post['RECOURSE'] = 'Уважаемый';
					} else {
						$post['RECOURSE'] = 'Уважаемая';
					}

					return $post;
				},
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
			),
			false
		); ?>

	</div>

<? endif; ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>