<?
// https://timeweb.com/ru/community/articles/chto-takoe-301-redirekt-i-kak-ego-nastroit

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «Трансстройбанк» (АО), в соответствии с требованиями законодательства РФ, осуществляет банковскую деятельность. В Банке работают опытные, квалифицированные специалисты, которые помогут быстро решить все проблемы, связанные с проведением платежей.");
$APPLICATION->SetPageProperty("keywords", "Обмен валют, валюта, обмен, курс, ТрансСтройБанк");
//$APPLICATION->SetPageProperty("title", "Обмен валют | АКБ «ТрансСтройБанк»");
//$APPLICATION->SetTitle("Обмен валют");
// 2ГИС карты
//$APPLICATION->AddHeadScript('https://maps.api.2gis.ru/2.0/loader.js');
$APPLICATION->AddHeadScript("https://maps.api.2gis.ru/2.0/loader.js?pkg=full");
?>
<?
//debugg($_GET);
//debugg($_SERVER['REQUEST_URI']);
//debugg($_SERVER);
$query_string = '';
$parameter_string = '';
if (strpos($_SERVER['REQUEST_URI'], '/obmen-valyut/', 0)) {
    if (empty($_GET)) {
        header("Location: https://193.42.145.62/chastnym-klientam/currency-exchange/",TRUE,301);
        exit();
    } else {
        if (isset($_GET['city'])) {
            $query_string = $_GET['city'] . '/';
        } else {
            $query_string = 'moskva/';
        }
        if (isset($_GET['currency'])) {
            $parameter_string = '?currency=' . $_GET['currency'];
        }
        header("Location: https://193.42.145.62/chastnym-klientam/currency-exchange/" . $query_string . $parameter_string,TRUE,301);
        exit();
    }
    //debugg('$query_string');
    //debugg($query_string);
    //debugg($parameter_string);
}

$cityCode = 'moskva';
$cityName = 'Москва';
$cityNameWhere = 'Москве';
//$currencyCode = '';
$currencyCode = 'USD';

if(isset($_GET['city'])) {
    $cityCode = htmlspecialchars($_GET['city']);
    if (CSite::InDir('/en/')) {
        $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID","CODE"=>$cityCode), false, Array(), Array("ID", "NAME", "PROPERTY_ATT_ENGLISH"));
        while ($ob = $res->GetNextElement()) {
            $cityName = $ob->GetFields()['NAME'];
            $cityNameWhere = $ob->GetFields()['PROPERTY_ATT_ENGLISH'];
        }
    } else {
        $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID","CODE"=>$cityCode), false, Array(), Array("ID", "NAME", "PROPERTY_ATT_WHERE"));
        while ($ob = $res->GetNextElement()) {
            //debugg($ob);
            $cityName = $ob->GetFields()['~NAME'];
            $cityNameWhere = $ob->GetFields()['~PROPERTY_ATT_WHERE_VALUE'];
        }
    }
}
if(isset($_GET['currency'])) {
    $currencyCode = htmlspecialchars($_GET['currency']);
}
$APPLICATION->SetTitle("Обмен валюты в " . $cityNameWhere);
//debugg('$cityCode=');
//debugg($cityCode);
?>
<section class="v21-obmen-valyut--top">
    <div class="v21-obmen-valyut--top_left">
        <h1>Обмен валюты в <?= $cityNameWhere; ?></h1>
        <??>
        <? if ($cityCode == 'moskva') : ?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "page",
                    "AREA_FILE_SUFFIX" => "block_1",
                    "EDIT_TEMPLATE" => ""
                )
            );?>
        <? else: ?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "page",
                    "AREA_FILE_SUFFIX" => "block_2",
                    "EDIT_TEMPLATE" => ""
                )
            );?>
        <? endif; ?>
        <?/*/?>
    <p><?= ($cityCode == 'moskva')? 'Популярные и редкие <br>45 валют <br>по выгодному курсу' : 'Популярные валюты по выгодному курсу'?></p>
    <?*/?>
    </div>
    <div class="v21-obmen-valyut--top_right">
        <div class="v21-obmen-valyut--top_right__text">
            <div class="v21-obmen-valyut--top_right__horline horline1">
            </div>
            <div class="v21-obmen-valyut--top_right__horline horline2">
            </div>
            <h3>Скидка на конвертацию</h3>
            <p>Чем выше суммарный объём конвертации, тем выгоднее курс</p>
        </div>
        <div class="v21-obmen-valyut--top_right__text">
            <h3>Продаём и выкупаем</h3>
            <p>Мы не только продадим, но и купим у вас редкую иностранную валюту по лучшему курсу</p>
            <div class="v21-obmen-valyut--top_right__horline horline3">
            </div>
        </div>
    </div>
</section>

<div class="v21-section v21-section-obmen-valyut">
    <div class="currency">
        <?$APPLICATION->IncludeComponent(
            "webtu:currency.exchange",
            "select",
            Array(
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CITIES_IBLOCK_ID" => "114",
                "CITY_CODE" => $cityCode,
                "CURRENCY" => $currencyCode,
                "OFFICE_IBLOCK_ID" => "115"
            )
        );?>
        <?$APPLICATION->IncludeComponent(
            "webtu:currency.exchange",
            "def",
            Array(
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CITIES_IBLOCK_ID" => "114",
                "CITY_CODE" => $cityCode,
                "CURRENCY" => $currencyCode,
                "OFFICE_IBLOCK_ID" => "115"
            )
        );?>
    </div>
</div>
<div class="special-zone"></div>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        function renderCurrencyData(data) {
            let key_string = 'currency.exchange.result';
            let arr_start = data.indexOf(key_string);
            let html_text = data.slice(0, arr_start);
            //console.log(html_text);
            let arCurObj = JSON.parse(data.slice(arr_start + key_string.length));

            const exchange_block_table = document.querySelector('.currency-table');
            //const exchange_block_table = document.querySelector('.special-zone');
            //exchange_block_table.innerHTML = html_text;
            let new_buy_fields = $(html_text).find('.v21-exchange-table__value--buy-value');
            let new_sell_fields = $(html_text).find('.v21-exchange-table__value--sell-value');
            //console.log('new_buy_fields=');
            //console.log(new_buy_fields);
            //console.log('new_sell_fields=');
            //console.log(new_sell_fields);

            let buy_fields = $('.currency-table').find('.v21-exchange-table__value--buy-value');
            let sell_fields = $('.currency-table').find('.v21-exchange-table__value--sell-value');
            //console.log('buy_fields=');
            //console.log(buy_fields);
            //console.log('sell_fields=');
            //console.log(sell_fields);

            for(let ix=0; ix<buy_fields.length; ix++) {
                //console.log(buy_fields[ix]);
                //console.log($(new_sell_fields[ix]).html());
                $(buy_fields[ix]).html($(new_buy_fields[ix]).html());
                $(sell_fields[ix]).html($(new_sell_fields[ix]).html());
            }
        }

        function displayCurrencyData () {
            let city_code = '<?=$cityCode?>';
            let currency_code = '<?=$currencyCode?>';
            //console.log('city_code='+city_code);
            //console.log('currency_code='+currency_code);

            let url = '/chastnym-klientam/obmen-valyut/ajax_currency_data.php' + '?city=' + city_code + '&currency=' + currency_code;
            let xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.addEventListener("readystatechange", () => {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    //console.log(xhr.responseText);
                    renderCurrencyData(xhr.responseText); // прорисовка таблицы
                }
            });
            xhr.send();
            xhr.error = function() {
                console.log('error with ajax_currency_table.php');
            };

        }
        //displayCurrencyData();
        let timerCurrencyId = setInterval(() => displayCurrencyData(), 5000);
    });
</script>
<div class="v21-section v21-section--rules">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"list-obmen-rules",
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
		"COMPONENT_TEMPLATE" => "list-obmen-rules",
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
<div class="v21-section">
	 <?$APPLICATION->IncludeComponent(
	"webtu:faq.block.add",
	"obmen-valyut",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"HIGHLOAD_IBLOCK_ID" => "5"
	)
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?php
/*
$APPLICATION->IncludeComponent(
	"bitrix:news",
	"currency-exchange",
	Array(
		"ADD_ELEMENT_CHAIN" => "Y",	// Включать название элемента в цепочку навигации
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
			0 => "ATT_ADDRESS",
			1 => "ATT_CURRENCY_RATED",
			2 => "ATT_CODE",
			3 => "ATT_NAME_WHERE",
			4 => "ATT_OFFICE",
			5 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FILE_404" => "",	// Страница для показа (по умолчанию /404.php)
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "203",	// Инфоблок
		"IBLOCK_TYPE" => "options",	// Тип инфоблока
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"LIST_FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(	// Свойства
			0 => "ATT_ADDRESS",
			1 => "ATT_CURRENCY_RATED",
			2 => "ATT_CODE",
			3 => "ATT_NAME_WHERE",
			4 => "ATT_OFFICE",
			5 => "",
		),
		"MESSAGE_404" => "",
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
		"SEF_FOLDER" => "/chastnym-klientam/currency-exchange/",	// Каталог ЧПУ (относительно корня сайта)
		"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_STATUS_404" => "Y",	// Устанавливать статус 404
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_404" => "Y",	// Показ специальной страницы
		"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
		"SORT_BY2" => "ACTIVE_FROM",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "DESC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела
		"USE_CATEGORIES" => "N",	// Выводить материалы по теме
		"USE_FILTER" => "N",	// Показывать фильтр
		"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
		"USE_RATING" => "N",	// Разрешить голосование
		"USE_REVIEW" => "N",	// Разрешить отзывы
		"USE_RSS" => "N",	// Разрешить RSS
		"USE_SEARCH" => "N",	// Разрешить поиск
		"USE_SHARE" => "N",	// Отображать панель соц. закладок
		"COMPONENT_TEMPLATE" => "currency-exchange",
		"UTM_SOURCE" => "no_data",
		"UTM_MEDIUM" => "no_data",
		"UTM_CAMPAIGN" => "no_data",
		"UTM_TERM" => "no_data",
		"UTM_CONTENT" => "no_data",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "#SECTION_CODE#/",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);
*/
?>