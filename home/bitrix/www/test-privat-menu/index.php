<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test_privat_menu");
?>

<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"main_slider_new_private",
			Array(
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
				"PARENT_SECTION" => "399",
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
		);?>
		<div class="wrapp-banners-main">
			<div class="container">
				<div class="banner-main1">
					<?/*div class="bg-banner-main1"></div*/?>
					<div class="card-img">
						<?/*img src="<?=SITE_TEMPLATE_PATH?>/img/card.png" alt="" class="img-banner-dt">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/card-mob.png" alt="" class="img-banner-mob"*/?>
					</div>
					<div class="text-card-online">
						<div class="title-banners-main">Подарочные монеты</div>
						<p class="description-banner-private">Популярные российские  и иностранные монеты</p>
						<a href="https://coins.tsbnk.ru/" target="_blank" class="btn-site1">Подробнее</a>
					</div>
				</div>
				<div class="banner-main2">
					<?/*div class="bg-banner-main2"></div*/?>
					<div class="title-banners-main">Индивидуальные инвестиционные счета</div>
					<p class="description-banner-private">Повышенная доходность, путем получения налогового вычета</p>
					<div class="link-banner">
						<a href="#cashServiceRequest" data-fancybox  class="btn-site1">Подробнее</a>
					</div>
					<?/*img src="<?=SITE_TEMPLATE_PATH?>/img/sofa.png" alt="" class="img-banner2 img-banner-dt">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/sofa-mob.png" alt="" class="img-banner-mob"*/?>
				</div>
			</div>
		</div>
		<?/*div class="wrapp-tsb-online">
			<div class="container">
				<div class="block-tsb-online">
					<div class="text-tsb-online">
						<div class="title-block-tsb-online">ТСБ-Онлайн</div>
						<p>Мобильный банк ТСБ-Онлайн - это легкое в использовании, доступное и безопасное приложение, позволяющее контролировать состояние Ваших банковских счетов, карт, вкладов и кредитов со смартфона в любое удобное время.</p>
						<p>Вы можете получить онлайн доступ к счетам, картам и воспользоваться услугами банка:</p>
						<ul>
							<li>- оплачивать счета;</li>
							<li>- осуществлять переводы;</li>
							<li>- получать выписки по счету;</li>
							<li>- купить или продать валюту;</li>
							<li>- узнать дату и сумму очередного платежа по кредиту;</li>
							<li>- перевести денежные средства на счет или на карту.</li>
						</ul>
						<div class="link-store">
							<a href="https://apps.apple.com/ru/app/id723491575" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/img/app-store.png" alt=""></a>
							<a href="https://play.google.com/store/apps/details?id=com.isimplelab.ibank.tsbank" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/img/google-play.png" alt=""></a>
						</div>
					</div>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/phone.png" alt="" class="img-phone-tsb-online">
				</div>
			</div>
		</div*/?>
			
		<?
		$citySes = ($_SESSION['city']) ? $_SESSION['city'] : 399;
		if ($citySes == 399 && !\GarbageStorage::get('OfficeId')) {
			\GarbageStorage::set('OfficeId', 433);
		}?>
		<?
		$APPLICATION->IncludeComponent(
			"webtu:synch.currency",
			"def",
			Array(
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CBR_IBLOCK_ID" => "116",
				"OFFICE_IBLOCK_ID" => "115"
			)
		);?>

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


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>