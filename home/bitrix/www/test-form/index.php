<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Демонстрационная версия продукта «1С-Битрикс: Управление сайтом»");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Главная страница");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news-list",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
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
		"DETAIL_URL" => "/o-banke/novosti/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "about",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
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
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
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

<a href="#callbackForm" data-fancybox="">Обратный звонок</a>
<a href="#creditRequest" data-fancybox="">Заявка на кредит</a>
<a href="#exchangeRequest" data-fancybox="">Обмен валюты</a>
<a href="#cashServiceRequest" data-fancybox="">Открытие банковского счета</a>
<a href="#depositFiz" data-fancybox="">Онлайн заявка на открытие вклада(ФЛ)</a>
<a href="#hypothec" data-fancybox="">Заявка на ипотеку</a>
<a href="#acquiring" data-fancybox="">Онлайн-заявка на эквайринг</a>
<a href="#registration" data-fancybox="">Заявка на регистрацию ИП/ООО</a>
<a href="#guarantee" data-fancybox="">Заявка на банковскую гарантию</a>
<a href="#salary" data-fancybox="">Заявка на зарплатный проект</a>
<a href="#rko" data-fancybox="">Заявка на Расчетно-кассовое обслуживание(ФЛ)</a>
<a href="#depositLegal" data-fancybox="">Заявка на открытие депозита(ЮЛ)</a>

<div class="popup-form" id="depositLegal">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"deposit_legal",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_DEPOSIT_UL_ADMIN",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"IBLOCK_ID" => "41",
			"POST_CALLBACK" => function($post){{$post['NAME']=$post['FIRST_NAME'];}return$post;},
			"PROPERTIES" => array("COMPANY_NAME","PHONE","EMAIL","SUM","CURRENCY","DATE","DEPOSIT_NAME","INTEREST_RATE","MONTH_SUM","REPLENISHABLE","CUT","CAPITALIZATION","PAY"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_DEPOSIT_UL_USER",
			"DATE" => "",
			"DEPOSIT_NAME" => "",
			"INTEREST_RATE" => "",
			"MONTH_SUM" => "",
			"REPLENISHABLE" => "",
			"CUT" => "",
			"CAPITALIZATION" => "",
			"PAY" => "",
		)
	);?>
</div>

<div class="popup-form" id="rko">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"rko_fiz",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_RKO_FIZ_ADMIN",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"EVENT_CALLBACK" => function($post){if($post['SEX']=='Мужской'){$post['RECOURSE']='Уважаемый';}else{$post['RECOURSE']='Уважаемая';};if(!isset($post['CITYZENSHIP'])){$post['CITYZENSHIP']='Нет';}else{$post['CITYZENSHIP']='Да';}return$post;},
			"IBLOCK_ID" => "39",
			"POST_CALLBACK" => function($post){$post['TYPE']=implode(',',$post['TYPE']);if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['LAST_NAME'].' '.$post['FIRST_NAME'].' '.$post['SECOND_NAME'];}return$post;},
			"PROPERTIES" => array("SEX","BIRTHDATE","PHONE","EMAIL","CITY","TYPE","CITYZENSHIP"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_RKO_FIZ_USER"
		)
	);?>
</div>

<div class="popup-form" id="salary">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"salary_project",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_SALARY_PROJECT_ADMIN",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"IBLOCK_ID" => "38",
			"POST_CALLBACK" => function($post){if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['FIRST_NAME'];}return$post;},
			"PROPERTIES" => array("PHONE","EMAIL","CITY","EMPLOYEES","COMPANY_NAME"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_SALARY_PROJECT_USER"
		)
	);?>
</div>

<div class="popup-form" id="guarantee">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"guarantee",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_GUARANTEE_ADMIN",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"IBLOCK_ID" => "36",
			"POST_CALLBACK" => function($post){if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['FIRST_NAME'];}return$post;},
			"PROPERTIES" => array("COMPANY_NAME","PHONE","EMAIL","CITY","SUM","CURRENT","DATE","PROVISION","TARGET"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_GUATANTEE_USER"
		)
	);?>
</div>

<div class="popup-form" id="registration">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"registration",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_REGISTRATION_ADMIN",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"IBLOCK_ID" => "35",
			"POST_CALLBACK" => function($post){if(!isset($post['OPENING'])){$post['OPENING']='Нет';}else{$post['OPENING']='Да';}if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['FIRST_NAME'];}return$post;},
			"PROPERTIES" => array("COMPANY_NAME","PHONE","EMAIL","CITY","TAXATION","OPENING"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_REGISTRATION_USER"
		)
	);?>
</div>

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
			"POST_CALLBACK" => function($post){if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['LAST_NAME'].' '.$post['FIRST_NAME'].' '.$post['SECOND_NAME'];}return$post;},
			"PROPERTIES" => array("PHONE","EMAIL","CITY","COMPANY_NAME"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_USER"
		)
	);?>
</div>

<div class="popup-form" id="hypothec">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"hypothec",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_HYPOTEC_ADMIN",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"EVENT_CALLBACK" => function($post){if($post['SEX']=='Мужской'){$post['RECOURSE']='Уважаемый';}else{$post['RECOURSE']='Уважаемая';}return$post;},
			"IBLOCK_ID" => "33",
			"POST_CALLBACK" => function($post){if(!isset($post['CITYZENSHIP'])){$post['CITYZENSHIP']='Нет';}else{$post['CITYZENSHIP']='Да';}if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['LAST_NAME'].' '.$post['FIRST_NAME'].' '.$post['SECOND_NAME'];}return$post;},
			"PROPERTIES" => array("BIRTHDATE","SEX","PHONE","EMAIL","CITYZENSHIP","CURRENCY","SUM","CREDIT_NAME","PERCENT","DATE","SUM_MONTH"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_HYPOTEC_USER"
		)
	);?>
</div>


<div class="popup-form" id="depositFiz">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"deposit_fiz",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_DEPOSIT_ADMINISTRATOR",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"IBLOCK_ID" => "32",
			"PROPERTIES" => array("BIRTHDATE","SEX","PHONE","EMAIL","CITY","CITYZENSHIP","CURRENCY","SUM"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_DEPOSIT_USER",
			"EVENT_CALLBACK" => function($post){if($post['SEX']=='Мужской'){$post['RECOURSE']='Уважаемый';}else{$post['RECOURSE']='Уважаемая';}return$post;},
			"POST_CALLBACK" => function($post){if(!isset($post['CITYZENSHIP'])){$post['CITYZENSHIP']='Нет';}else{$post['CITYZENSHIP']='Да';}if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['LAST_NAME'].' '.$post['FIRST_NAME'].' '.$post['SECOND_NAME'];}return$post;},

		)
	);?>
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
			"EVENT_CALLBACK" => function($post){if($post['SEX']=='Мужской'){$post['RECOURSE']='Уважаемый';}else{$post['RECOURSE']='Уважаемая';}return$post;},
			"IBLOCK_ID" => "28",
			"POST_CALLBACK" => function($post){$post['TYPE']=implode(',', $post['TYPE']);$post['CURRENCY']=implode(',', $post['CURRENCY']);if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['FIRST_NAME'];}return$post;},
			"PROPERTIES" => array("SEX","PHONE","EMAIL","CITY","NAME_COMPANY","INN","LEGAL_FORM","ONLINE_BANK","CURRENCY","TYPE","ADDRESS"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_BOOKING_USER"
		)
	);?>
</div>

<div class="popup-form" id="exchangeRequest">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"exchange",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_EXCHANGE_ADMINISTRATOR",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"EVENT_CALLBACK" => function($post){if($post['SEX']=='Мужской'){$post['RECOURSE']='Уважаемый';}else{$post['RECOURSE']='Уважаемая';}return$post;},
			"IBLOCK_ID" => "27",
			"POST_CALLBACK" => function($post){if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['FIRST_NAME'];}return$post;},
			"PROPERTIES" => array("PHONE","EMAIL","SEX"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_EXCHANGE_USER"
		)
	);?>
</div>

    <div class="popup-form" id="creditRequest">

        <?$APPLICATION->IncludeComponent(
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
        );?>

    </div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
