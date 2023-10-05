<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Информация о курсах обмена иностранной валюты АКБ «ТрансСтройБанк» на сегодня. Курсы ведущих мировых валют в наших отделениях и филиалах по всей России.");
$APPLICATION->SetPageProperty("keywords", "Курс обмена валют");
$APPLICATION->SetPageProperty("title", "Курс обмена валют | ЧАСТНЫМ ЛИЦАМ | Трансстройбанк");
$APPLICATION->SetTitle("Операции с валютой");
?><h1 class="v21-h1 v21-h1--advantages">Обмен валюты в <? if (CSite::InDir('/en/')) {
    echo \GarbageStorage::get('english_name');
} else {
    echo \GarbageStorage::get('nameWhere');
}
if(isset($_GET['office'])) {
    $office = htmlspecialchars($_GET['office']);
    \GarbageStorage::set('OfficeId', $office);
}
?> </h1>
<div class="v21-section v21-section--advantages">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"list-exchange-advantages",
	Array(
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
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "201",
		"IBLOCK_TYPE" => "private_clients",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "orange",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"TITLE",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
</div>
<hr>
<?/*$APPLICATION->IncludeComponent(
    "bitrix:map.yandex.view",
    "",
    Array(
        "CONTROLS" => array("TYPECONTROL","SCALELINE"),
        "INIT_MAP_TYPE" => "MAP",
        "MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.71401996437;s:10:\"yandex_lon\";d:37.63104841832227;s:12:\"yandex_scale\";i:14;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.63104841832227;s:3:\"LAT\";d:55.71401996437624;s:4:\"TEXT\";s:54:\"г. Москва, ул. Дубининская, д. 94\";}}}",
        "MAP_HEIGHT" => "500",
        "MAP_ID" => "",
        "MAP_WIDTH" => "600",
        "OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
    )
);*/?>
<div class="v21-section v21-section-courses">
	<h2 class="v21-section__heading-title v21-h2">Курсы обмена валют</h2>
	<p class="v21-p v21-section__subtitle">Здесь вы можете найти выгодный курс покупки-продажи наличной валюты более 30 стран мира и выбрать ближайший пункт обмена.</p>
	 <?$APPLICATION->IncludeComponent(
	"webtu:calculator.exchange",
	"new_konvertor_valyut",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"OFFICE_IBLOCK_ID" => "115"
	)
);?>
</div>
<hr>
<?/* $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "rules",
        "EDIT_TEMPLATE" => ""
    )
); */?>
<div class="v21-section v21-section--rules">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"list-exchange-rules",
	Array(
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
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "202",
		"IBLOCK_TYPE" => "private_clients",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "orange",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
</div>
<div class="v21-section v21-section--laws">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "laws",
		"EDIT_TEMPLATE" => ""
	)
);?>
</div>
<div class="v21-section">
    <?$APPLICATION->IncludeComponent(
        "webtu:faq.block.add",
        "konvertor-valyut",
        Array(
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "HIGHLOAD_IBLOCK_ID" => "5"
        )
    );?>
</div>
<?/*?>
<div class="v21-section v21-questions">
	<h2 class="v21-h3 v21-questions--header">Часто задаваемые вопросы</h2>
	<div class="v21-questions--block">
		<div class="v21-questions--block__item">
			<h3 class="v21-questions--block__item-header js-do-answer">
			Можно ли зафиксировать курс валюты? </h3>
			<div class="v21-questions--block__item-box">
				 Да, зафиксировать курс возможно. Для этого нужно воспользоваться <a href="https://www.transstroybank.ru/chastnym-klientam/konvertor-valyut/?city=&office=6268">сервисом резервирования курса обмена иностранных валют.</a>
			</div>
			<hr style="margin-top: 8px; margin-bottom: 12px">
		</div>
		<div class="v21-questions--block__item">
			<h3 class="v21-questions--block__item-header js-do-answer">Какие документы нужны гражданину РФ для обмена валюты?</h3>
			<div class="v21-questions--block__item-box">
				 Для операций до 40 тысяч рублей документы не требуются. Для операций свыше 40 тыс.руб. требуется паспорт гражданина РФ. Также банк вправе дополнительно запросить документы, подтверждающие происхождение денежных средств: например, справка 2-НДФЛ, договоры купли-продажи недвижимости или автомобиля, договор банковского вклада, выписки о движении денежных средств по банковскому счету.
			</div>
            <hr style="margin-top: 8px; margin-bottom: 12px">
		</div>
		<div class="v21-questions--block__item">
			<h3 class="v21-questions--block__item-header js-do-answer">Какие документы нужны иностранцу для обмена валюты?</h3>
			<div class="v21-questions--block__item-box">
				 Паспорт, а также документы, подтверждающие законность нахождения на территории РФ: миграционная карта, виза, разрешение на временное пребывание, вид на жительство.
			</div>
            <hr style="margin-top: 8px; margin-bottom: 12px">
		</div>
		<div class="v21-questions--block__item">
			<h3 class="v21-questions--block__item-header js-do-answer">Актуальные ли курсы на сайте?</h3>
			<div class="v21-questions--block__item-box">
				 Курсы на сайте Банка актуальны, однако есть временной лаг (около 10 минут), когда курсы в системе Банка уже обновились, но еще не обновились на сайте Банка.
			</div>
            <hr style="margin-top: 8px; margin-bottom: 12px">
		</div>
		<div class="v21-questions--block__item">
			<h3 class="v21-questions--block__item-header js-do-answer">Курсы на агрегаторах отличаются от сайта Трансстройбанка, почему?</h3>
			<div class="v21-questions--block__item-box">
				 Актуальные курсы можно посмотреть на сайте Банка, а также на сайте Rbc.ru (возможна задержка до 5 мин.). За информацию, размещаемую на иных сайтах, Банк ответственности не несет.
			</div>
            <hr style="margin-top: 8px; margin-bottom: 12px">
		</div>
	</div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', function () {
        let answerSwitch = true;
        $('.js-do-answer').on('click', function () {
            let $this = $(this);
            let wTime = 100; // время срабатывания
            $this[0].classList.toggle('v21-show-answer__rotate');
            //$this.next().toggleClass('v21-show-answer');
            //$this.next().toggle(1000);
            if(answerSwitch) {
                $this.next().animate({
                    height: "100%"
                }, wTime, function () {
                    $this.next().fadeIn(wTime);
                });
                answerSwitch = false;
            } else {
                $this.next().fadeOut(wTime, function () {
                    $this.next().animate({
                        height: "0"
                    }, wTime);
                });
                answerSwitch = true;
            }
        });
    });
</script>
<?*/?>
<?
//Отображаем форму в футере
\GarbageStorage::set('feedback', true);
?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>