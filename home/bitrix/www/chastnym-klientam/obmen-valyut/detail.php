<?
// https://timeweb.com/ru/community/articles/chto-takoe-301-redirekt-i-kak-ego-nastroit

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «Трансстройбанк» (АО), в соответствии с требованиями законодательства РФ, осуществляет банковскую деятельность. В Банке работают опытные, квалифицированные специалисты, которые помогут быстро решить все проблемы, связанные с проведением платежей.");
$APPLICATION->SetPageProperty("keywords", "Обмен валют, валюта, обмен, курс, ТрансСтройБанк");
//$APPLICATION->SetPageProperty("title", "Обмен валют | АКБ «ТрансСтройБанк»");
//$APPLICATION->SetTitle("Обмен валют по офисам");
?>
<?
//debugg($_GET);
//debugg($_SERVER['REQUEST_URI']);
//debugg($_SERVER);
$query_string = '';
$parameter_string = '';
if (strpos($_SERVER['REQUEST_URI'], '/obmen-valyut/detail.php', 0)) {
    //echo 'qq';
    if (empty($_GET)) {
        header("Location: https://193.42.145.62/chastnym-klientam/currency-exchange/",TRUE,301);
        exit();
    } else {
        if (isset($_GET['city'])) {
            $query_string = $_GET['city'];  // /chastnym-klientam/obmen-valyut/detail.php?city=moskva&currency=USD&office=11239
        } else {
            $query_string = 'moskva';
        }
        if (isset($_GET['office'])) {
            $rsElements = CIBlockElement::GetList(
                Array("SORT"=>"ASC"),
                Array("IBLOCK_ID" => 203),  // Валюты с условиями
                false,
                false,
                Array("IBLOCK_ID", "ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_ATT_CODE", "CODE")
                //Array()
            );
            $arOffices = array();
            while($arElement = $rsElements->Fetch()) {
                //debugg($arElement);
                if ($arElement['PROPERTY_ATT_CODE_VALUE'] == $_GET['office']) {
                    $query_string .= '/' . $arElement['CODE'] . '/';
                }
            }
        }
        if (isset($_GET['currency'])) {
            $parameter_string = '?currency=' . $_GET['currency'];
        }
        debugg($query_string . $parameter_string);
        //header("Location: https://193.42.145.62/chastnym-klientam/currency-exchange/" . $query_string . $parameter_string,TRUE,301);
        //exit();
    }
    //debugg('$query_string');
    //debugg($query_string);
    //debugg($parameter_string);
}

$cityCode = 'moskva';
$cityName = 'Москва';
$cityNameWhere = 'Москве';
$currencyCode = 'USD';
$officeCode = '10013';

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
            $cityName = $ob->GetFields()['~NAME'];
            $cityNameWhere = $ob->GetFields()['~PROPERTY_ATT_WHERE_VALUE'];
        }
    }
}
if(isset($_GET['currency'])) {
    $currencyCode = htmlspecialchars($_GET['currency']);
}
if(isset($_GET['office'])) {
    $officeCode = htmlspecialchars($_GET['office']);
}
$rsElements = CIBlockElement::GetList(
    Array("SORT"=>"ASC"),
    Array("IBLOCK_ID"=>'114', "PROPERTY_ATT_CODE"=>$officeCode), // Банк в городах
    false,
    false,
    Array("IBLOCK_ID", "ID", "NAME", "CODE", "ACTIVE", "PROPERTY_ATT_ENGLISH", "PROPERTY_ATT_FORM", "PROPERTY_ATT_WHERE", "PROPERTY_ATT_ADDRESS")
);

$arOffice = [];
while($arElement = $rsElements->Fetch()) {
    //debugg($arElement);

    if ($arElement['ACTIVE'] == 'Y') {
        $arOffice = array();

        $id = $arElement['ID'];
        $name = $arElement['NAME'];
        $nameWhere = $arElement['PROPERTY_ATT_WHERE_VALUE'] ?? $arElement['NAME'];
        $nameEnglish = $arElement['PROPERTY_ATT_ENGLISH_VALUE'];
        $codeName = $arElement['CODE'];
    }

    $rsOffices = CIBlockElement::GetList(
        Array("SORT"=>"ASC"),
        Array("IBLOCK_ID"=>'115', "PROPERTY_ATT_CODE"=>$officeCode), //  Курсы валют банка
        false,
        false,
        Array("IBLOCK_ID", "ID", "NAME", "ID", "PROPERTY_ATT_CODE", "PROPERTY_ATT_2GIS_LOCATION", "PROPERTY_ATT_YANDEX_LOCATION", "PROPERTY_ATT_PHONE_LINK", "PROPERTY_ATT_PHONE", "PROPERTY_ATT_ADDRESS", "PROPERTY_ATT_YANDEX_POS", "PROPERTY_ATT_OFFICE_HOURS", "PROPERTY_ATT_NAME_WHERE")
    );
    while($arOffices = $rsOffices->Fetch()){
        $arOffice = $arOffices;
    }
}
$title_h1 = ($arOffice['PROPERTY_ATT_NAME_WHERE_VALUE'])? $arOffice['PROPERTY_ATT_NAME_WHERE_VALUE'] : $arOffice['NAME'];
$APPLICATION->SetTitle("Обмен валюты в " . $title_h1);
//debugg('$cityCode=');
//debugg($cityCode);
//debugg($arOffice);
//debugg($_SERVER);
?>
    <section class="v21-obmen-valyut--top">
        <div class="v21-obmen-valyut--top_left">
            <?/*?><h1> Обмен валюты в <?= ($arOffice['PROPERTY_ATT_NAME_WHERE_VALUE'])? $arOffice['PROPERTY_ATT_NAME_WHERE_VALUE'] : $arOffice['NAME']; ?></h1><?*/?>
            <h1> Обмен валюты в <?= $title_h1 ?></h1>
        </div>
        <div class="v21-obmen-valyut--top_right">
            <div class="v21-obmen-valyut--top_right__link">
                <a href="/chastnym-klientam/obmen-valyut/?city=<?=$cityCode?>&currency=<?=$currencyCode?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                        <path d="M1.79883 6.16667L11.7988 6.16667V11.5H8.46549M1.79883 6.16667L5.79883 10.8333M1.79883 6.16667L5.79883 1.5" stroke="#00345E" stroke-width="1.7"/>
                    </svg>
                    <span>Вернуться к списку офисов</span>
                </a>
            </div>
            <div class="v21-obmen-valyut--top_right__box">
                <? if ($arOffice['NAME'] != 'iSimple') :
                    $office_name = $arOffice['NAME']; ?>
                    <div class="v21-obmen-valyut--top_right__textbox">
                        <p class="js-v21-intro-card" data-office="<?=$arOffice['ID']?>">Контакты</p>
                        <p class="v21-p--address"><?= $arOffice['PROPERTY_ATT_ADDRESS_VALUE']; ?></p>
                        <p>
                            <span class="v21-p--hours_add"><?= $arOffice['PROPERTY_ATT_OFFICE_HOURS_VALUE'] . ' | '; ?></span>
                            <a href="tel:<?= $arOffice['PROPERTY_ATT_PHONE_LINK_VALUE']; ?>"><?= $arOffice['PROPERTY_ATT_PHONE_VALUE']; ?></a>
                        </p>
                    </div>
                    <?/* else:
                        $office_name = 'ТСБ-онлайн'; ?>
                        <p class="js-v21-intro-card" data-office="<?=$arOffice['ID']?>" data-city="<?=$arResult['CITY']['ID']?>" data-num="<?=$key?>"><?= $office_name?></p>
                        <?*/?>
                    <div class="v21-obmen-valyut--top_right__geobox">
                        <div class="v21-obmen-valyut--top_right__geobox_link js-select-yandex-geobox"
                             data-office="<?=$arOffice['ID']?>"
                             data-position="<?=$arOffice['PROPERTY_ATT_YANDEX_POS_VALUE']?>"
                        >
                            <a href="<?=$arOffice["PROPERTY_ATT_YANDEX_LOCATION_VALUE"]?>" target="_blank">
                                <img src="/images/Yandex_icon.svg" alt="яндекс карта">
                                <span>Яндекс.Карты</span>
                            </a>
                            <??>
                        </div>
                        <div class="v21-obmen-valyut--top_right__geobox_link js-select-gis-geobox"
                             data-office="<?=$arOffice['ID']?>"
                             data-position="<?=$arOffice['PROPERTY_ATT_YANDEX_POS_VALUE']?>"
                        >
                            <a href="<?=$arOffice["PROPERTY_ATT_2GIS_LOCATION_VALUE"]?>" target="_blank">
                                <img src="/images/2GIS_icon.svg" alt="2gis карта">
                                <span>2ГИС</span>
                            </a>
                        </div>
                    </div>
                <? endif; ?>

            </div>
        </div>
        <div class="v21-obmen-valyut--undertop">
            <div class="v21-obmen-valyut--undertop_left">
                <div class="v21-obmen-valyut--top_right__horline horline1"></div>
                <div class="v21-obmen-valyut--top_right__horline horline2"></div>
                <h3>Скидка на конвертацию</h3>
                <p>Чем выше суммарный объём конвертации, тем выгоднее курс</p>
            </div>
            <div class="v21-obmen-valyut--undertop_right">
                <h3>Продаём и выкупаем</h3>
                <p>Мы не только продадим, но и выкупим у вас редкую иностранную валюту по лучшему курсу</p>
                <div class="v21-obmen-valyut--top_right__horline horline3"></div>
            </div>
        </div>
    </section>

    <div class="v21-section v21-section-obmen-valyut-detail">
        <?$APPLICATION->IncludeComponent(
            "webtu:currency.exchange",
            "table",
            Array(
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CITY_CODE" => $cityCode,
                "CITIES_IBLOCK_ID" => "114",
                "OFFICE_IBLOCK_ID" => "115",
                "CURRENCY" => $currencyCode,
            )
        );?>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            function renderCurrencyTable(data) {
                let key_string = 'currency.exchange.result';
                let arr_start = data.indexOf(key_string);
                let html_text = data.slice(0, arr_start);
                //console.log(html_text);
                let arCurObj = JSON.parse(data.slice(arr_start + key_string.length));

                let new_buy_fields = $(html_text).find('.exchange-table__value--buy-val');
                let new_sell_fields = $(html_text).find('.exchange-table__value--sell-val');
                //console.log('new_buy_fields=');
                //console.log(new_buy_fields);
                //console.log('new_sell_fields=');
                //console.log(new_sell_fields);

                let buy_fields = $('.currency-table').find('.exchange-table__value--buy-val');
                let sell_fields = $('.currency-table').find('.exchange-table__value--sell-val');
                //console.log('buy_fields=');
                //console.log(buy_fields);
                //console.log('sell_fields=');
                //console.log(sell_fields);

                for(let ix=0; ix<buy_fields.length; ix++) {
                    //console.log(buy_fields[ix]);
                    //console.log(sell_fields[ix]);
                    //console.log($(new_sell_fields[ix]).html());
                    $(buy_fields[ix]).html($(new_buy_fields[ix]).html());
                    $(sell_fields[ix]).html($(new_sell_fields[ix]).html());
                }
            }

            function displayCurrencyTable () {
                let office_code = '<?=$officeCode?>';
                let city_code = '<?=$cityCode?>';
                let currency_code = '<?=$currencyCode?>';
                console.log('office_code='+office_code);
                console.log('city_code='+city_code);
                console.log('currency_code='+currency_code);

                let url = '/chastnym-klientam/obmen-valyut/ajax_currency_table.php' + '?city=' + city_code + '&currency=' + currency_code + '&office=' + office_code;
                let xhr = new XMLHttpRequest();
                xhr.open('GET', url, true);
                xhr.addEventListener("readystatechange", () => {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        //console.log(xhr.responseText);
                        renderCurrencyTable(xhr.responseText); // прорисовка таблицы
                    }
                });
                xhr.send();
                xhr.onerror = function() {
                    console.log('error with ajax_currency_table.php');
                };

            }
            //displayCurrencyTable();
            let timerCurrencyId = setInterval(() => displayCurrencyTable(), 5000);
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
                //"COMPONENT_TEMPLATE" => ".default",
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>