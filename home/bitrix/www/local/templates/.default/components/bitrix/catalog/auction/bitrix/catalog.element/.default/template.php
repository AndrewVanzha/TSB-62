<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'BIG_SLIDER_ID' => $strMainID.'_big_slider',
	'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BASIS_PRICE' => $strMainID.'_basis_price',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'BASKET_ACTIONS' => $strMainID.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
);

$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);

$tile_empty = $this->GetFolder().'/images/tile-empty.png';
if ($arResult['DETAIL_PICTURE']['SRC']){
	$img = $arResult['DETAIL_PICTURE']['SRC'];
}
else{
	$img = "";
}
/** --- Цена товаров --- **/
$minPrice = (isset($arResult['RATIO_PRICE']) ? $arResult['RATIO_PRICE'] : $arResult['MIN_PRICE']);

$printPrice = $minPrice['PRINT_DISCOUNT_VALUE'];
$printPrice_old = $minPrice['PRINT_VALUE'];
$price = $minPrice['DISCOUNT_VALUE'];
$price_old = $minPrice['VALUE'];

# участие в аукционе
$CAN_AUCTION = true;

# Данные о пользователе, который разместил аукцион
$USER_ID  = $arResult["PROPERTIES"]["USER_ID"]["VALUE"];

$rsUserLot = CUser::GetByID($USER_ID);
$arUserLot = $rsUserLot->Fetch();

if ( strlen($arUserLot["NAME"]) > 0) {
    $name = $arUserLot["NAME"];

    if ( strlen($arUserLot["LAST_NAME"]) > 0 ) {
        $name .= ' '.mb_strimwidth($arUserLot["LAST_NAME"], 0, 1). '.';
    }
    if ( strlen($arUserLot["SECOND_NAME"]) > 0 ) {
    	$name .= ' '.mb_strimwidth($arUserLot["SECOND_NAME"], 0, 1). '.';
    }	
}
else {
    $email = explode("@", $arUserLot["EMAIL"]);

    $name = $email[0];
}

# проверка прав пользователя
if($USER->IsAuthorized()) {
    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();

    #Проверяем уровень доступа пользователя к аукциону
    $arGroups = $USER->GetUserGroupArray();

    foreach ($arGroups as $groupID) {
        if ($groupID == $arResult["MODULE_SETTINGS"]["SETTINGS"]["GROUP_ID_BLACK"] ) {
            $CAN_AUCTION = false;
            break;
        }
    }

    #Если пользователь тот, кто разместил аукцион
    if ($USER_ID == $arUser["ID"]) {
        $CAN_AUCTION = false;
    }

    $history_bet = array();
    foreach ($arResult["PROPERTIES"]["HISTORY_BET"]["~VALUE"] as $key => $history_item) {
        $history_bet[$key] = json_decode($history_item, true);
    }

    # Сортируем массив в обратном порядке
    $history_bet = array_reverse($history_bet);
    foreach ($history_bet as $history_item) {
        if ( $arUser["ID"] == $history_item["USER_ID"]) {
            $my_price =  $history_item["PRICE"];
            break;
        }
    }

    $LAST_USER_ID = $history_bet[0]["USER_ID"];

    if ( $LAST_USER_ID == $arUser["ID"]) $CAN_AUCTION_STEP = "N";
    else $CAN_AUCTION_STEP = "Y";
}
else {
    $CAN_AUCTION = false;
    $CAN_AUCTION_STEP = "N";
}
?>

<div class="link-back"><a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>">Назад к списку аукционов</a></div>
<div class="content-block-2">
    <div class="content-product-wrap clearfix">
        <div class="content-product">
            <? if ($arResult["IBLOCK_SECTION_ID"] != $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_PLAN"]) { ?>
                <div class="auction-wrap">
                    <? if ($arResult["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_ACTIVE"]) { ?>
                        <div class="auction">
                            <div class="auction-info clearfix">
                                <div class="auction-block">
                                    <?
                                    $datetime1 = new DateTime(date('d.m.Y H:i:s'));
                                    $datetime2 = new DateTime($arResult["PROPERTIES"]["DATE_COMPLETED"]["VALUE"]);

                                    $interval = $datetime1->diff($datetime2);

                                    $days = $interval->format('%a д');
                                    $time = $interval->format('%H:%I:%S');
                                    ?>
                                    <div class="title">До конца аукциона осталось</div>
                                    <div class="timer icon-2 aligner">
                                        <span class="timer-lot" data-time="<?=strtotime($arResult["PROPERTIES"]["DATE_COMPLETED"]["VALUE"])?>"><?=$days." ".$time?></span>
                                    </div>
                                </div>
                                <div class="auction-block">
                                    <div class="title">Текущая цена</div>
                                    <div class="price"><?=$printPrice?></div>
                                </div>
                            </div>
                            <? if ( $CAN_AUCTION ) {?>

                                <?/*--- Cтавка на лот ---*/?>
                                <?$APPLICATION->IncludeComponent(
                                    "webtu:auction.make.step",
                                    "detail",
                                    Array(
                                        "AJAX_MODE" => "N",
                                        "AJAX_OPTION_ADDITIONAL" => "",
                                        "AJAX_OPTION_HISTORY" => "N",
                                        "AJAX_OPTION_JUMP" => "N",
                                        "AJAX_OPTION_STYLE" => "Y",
                                        "MIN_STEP" => $arResult["PROPERTIES"]["STEP_RATE"]["VALUE"],
                                        "PRODUCT_ID" => $arResult["ID"],
                                        "CAN_AUCTION_STEP" => $CAN_AUCTION_STEP
                                    )
                                );?>
                            <? } else { ?>
                                <div class="note-ban aligner">
                                    <span class="icon-2">Вы не можете сделать ставку</span>
                                    <a href="#popup-help" class="fancybox"><img class="help-symbol" alt="Справка" src="/assets/images/help-symbol.png"></a>
                                </div>
                            <? } ?>
                        </div>
                        <div class="auction-price-wrap">

                            <?/*--- Моя последняя цена ---*/?>
                            <? if ( $my_price > 0 ) { ?>
                                <div class="aligner">
                                    <div class="rate-price rate-1">
                                        <div class="title">Моя цена</div>
                                        <div class="price"><?=CurrencyFormat($my_price, "RUB")?></div>
                                    </div>
                                </div>
                            <? }?>

                            <?/*--- Блиц цена ---*/?>
                            <? if( !empty($arResult["PROPERTIES"]["BLITZ_PRICE"]["VALUE"]) ) { ?>
                                <div class="aligner">
                                    <div class="rate-price rate-2">
                                        <div class="title">Блиц цена</div>
                                        <div class="price"><?=CurrencyFormat($arResult["PROPERTIES"]["BLITZ_PRICE"]["VALUE"], "RUB")?></div>
                                    </div>
                                </div>
                                <? if ( $CAN_AUCTION /*&& $CAN_AUCTION_STEP == "N"*/ ) {?>

                                    <?/*--- Купить за блиц цену ---*/?>
                                    <?$APPLICATION->IncludeComponent(
                                        "webtu:auction.by.blitz",
                                        "",
                                        Array(
                                            "AJAX_MODE" => "N",
                                            "AJAX_OPTION_ADDITIONAL" => "",
                                            "AJAX_OPTION_HISTORY" => "N",
                                            "AJAX_OPTION_JUMP" => "N",
                                            "AJAX_OPTION_STYLE" => "Y",
                                            "PRODUCT_ID" => $arResult["ID"]
                                        )
                                    );?>

                                <? } ?>
                            <? } ?>
                        </div>
                    <? } elseif ($arResult["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_COMPLETED"]) { ?>
                        <div class="auction">
                            <div class="auction-info clearfix">
                                <div class="auction-block">
                                    <div class="title">Аукцион завершен</div>
                                    <?
                                    if( !empty($arResult["PROPERTIES"]["TIME_END"]["VALUE"]) ) {

                                        $datetime1 = new DateTime($arResult["PROPERTIES"]["DATE_ACTIVE"]["VALUE"]);
                                        $datetime2 = new DateTime($arResult["PROPERTIES"]["TIME_END"]["VALUE"]);

                                        $interval = $datetime1->diff($datetime2);

                                        $days = $interval->format('%a д');
                                        $time = $interval->format('%H:%I:%S');

                                        echo '<div class="timer icon-2 aligner">'.$days.' '.$time.'</div>';
                                    }
                                    ?>
                                </div>
                                <div class="auction-block">
                                    <div class="title">Лот продан за</div>
                                    <div class="price"><?=$printPrice?></div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            <? } ?>
            <div class="product-slider">
                <div class="slider-content">

                    <? if (!empty($img)) { ?>
                        <div class="item">
                            <a href="<?=$img?>" data-fancybox="gallery">
                                <img src="<?=$img?>" alt="<?=$arResult["NAME"]?>">
                            </a>
                        </div>
                    <? } ?>
                    <? foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key => $img_id) { ?>
                        <div class="item">
                            <a href="<?=CFile::GetPath($img_id)?>" data-fancybox="gallery">
                                <img src="<?=CFile::GetPath($img_id)?>" alt="<?=$arResult["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$key]?>">
                            </a>
                        </div>
                    <? } ?>
                </div>
                <div class="slider-thumbs">
                    <? if (!empty($img)) { ?>
                        <div class="item">
                            <img src="<?=$img?>" alt="<?=$arResult["NAME"]?>">
                        </div>
                    <? } ?>
                    <? foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key => $img_id) { ?>
                        <div class="item">
                            <img src="<?=CFile::GetPath($img_id)?>" alt="<?=$arResult["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$key]?>">
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
        <div class="content-product-info">
            <div class="product-header-wrap">
                <div class="product-header clearfix">
                    <div class="left">
                        <h1 class="aligner"><?=$arResult['NAME']?></h1>
                        <time class="aligner" datetime="<?=FormatDate("j-m-Y", MakeTimeStamp($arResult["PROPERTIES"]["DATE_ACTIVE"]["VALUE"]) )?>">
                            ( <?= FormatDate(array("d" => 'j F',), MakeTimeStamp($arResult["PROPERTIES"]["DATE_ACTIVE"]["VALUE"]), time());?> )
                        </time>
                    </div>
                    <div class="right">
                        <div class="social-product">
                            <div class="label aligner">Поделиться ссылкой</div>
                            <div class="aligner">
                                <?//<a target="_blank" href="https://www.facebook.com/Transstroybank/" class="item-2">facebook</a>?>
                                <?//<a target="_blank" href="https://www.instagram.com/coins.tsbnk/" class="item-3">vk</a>?>
                                  <?$APPLICATION->IncludeComponent(
                                    "api:yashare",
                                    "",
                                    Array(
                                        "DATA_DESCRIPTION" => "",
                                        "DATA_IMAGE" => "",
                                        "DATA_TITLE" => "",
                                        "DATA_URL" => "",
                                        "LANG" => "ru",
                                        "QUICKSERVICES" => array("vkontakte","facebook"),
                                        "SHARE_SERVICES" => array(),
                                        "SIZE" => "m",
                                        "TYPE" => "icon",
                                        "UNUSED_CSS" => "N",
                                        "twitter_hashtags" => ""
                                    )
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? if ( strlen($arResult["DETAIL_TEXT"]) > 0 ) { ?>
                <div class="block">
                    <div class="title">Описание лота</div>
                    <p>
                        <?=$arResult["DETAIL_TEXT"]?>
                    </p>
                </div>
            <? } ?>

            <div class="block">
                <?
                foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty) {
                    echo '<div>';
                    echo $arProperty["NAME"].': ';
                    if (is_array($arProperty["DISPLAY_VALUE"])) {
                        echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
                    }
                    else {
                        if ($arProperty["DISPLAY_VALUE"] == 'true') {
                            $arProperty["DISPLAY_VALUE"] = 'Eсть';
                        }
                        elseif ($arProperty["DISPLAY_VALUE"] == 'false') {
                            $arProperty["DISPLAY_VALUE"] = 'Нет';
                        }
                        echo $arProperty["DISPLAY_VALUE"];
                    }
                    echo '</div>';
                }?>
            </div>


            <?/*--- Данные продовца ---*/?>
            <? if ( $USER_ID > 0 ) { ?>
                <div class="block">
                    <div class="heading-3">Продавец</div>
                    <div class="vendor-box icon-2">
                        <div><?=$name?></div>
                        <div class="vendor-item"><a href="<?=$arResult["LIST_PAGE_URL"].'?user='.$USER_ID?>" class="all-link">Все лоты продавца</a></div>
                    </div>
                </div>
            <? } ?>

            <?/*--- Подписка на лот ---*/?>
            <? if ( $arResult["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_PLAN"] ) { ?>
                <?$APPLICATION->IncludeComponent(
                    "webtu:auction.subscribe.lot",
                    "",
                    Array(
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "PRODUCT_ID" => $arResult["ID"]
                    )
                );?>
            <? } ?>
        </div>
    </div>
</div>
<div class="content-block-2">
    <div class="row">
        <?/*--- История ставок ---*/?>
        <? if ( !empty($arResult["PROPERTIES"]["HISTORY_BET"]["VALUE"]) ) { ?>
            <div class="col">
                <div class="content-header">
                    <div class="heading aligner">История ставок</div>
                    <div class="number aligner">( <?=count($arResult["PROPERTIES"]["HISTORY_BET"]["VALUE"])?> )</div>
                </div>
                <div class="history-bid-wrap">
                <?if($USER->IsAuthorized()):?>
                    <? foreach ($history_bet as $key => $history_item) {

                        if ($key < 6) {

                            echo '<div class="history-bid table">';
                                echo '<div class="table-cell">';

                                    if ( strlen( $history_item["USER_NAME"]) > 1 ) {
                                        $name =  explode(' ', $history_item["USER_NAME"]);
                                        $name[1] = mb_strimwidth($name[1], 0, 1). '.';
                                        $name = implode(' ', $name);
                                    }
                                    else {
                                        $email = explode("@", $history_item["EMAIL"]);

                                        $name = $email[0];
                                    }
                                    echo '<div class="title">'.$name.'</div>';
                                    echo '<time class="aligner">'.$history_item["DATE"].'</time>';
                                    echo '<time class="aligner">'.$history_item["TIME"].'</time>';
                                echo '</div>';
                                echo '<div class="table-cell"><div class="bid">Ставка</div></div>';
                                echo '<div class="table-cell"><div class="price">'.CurrencyFormat($history_item["PRICE"], "RUB").'</div></div>';
                            echo '</div>';
                        }
                    } ?>
                    <div class="history-bid-hidden">
                        <? $count = 0; ?>
                        <? foreach ($history_bet as $key => $history_item) {

                            if ($key > 5) {
                                $count += 1;

                                echo '<div class="history-bid table">';
                                    echo '<div class="table-cell">';

                                        if ( strlen( $history_item["USER_NAME"]) > 1 ) {
                                            $name =  $history_item["USER_NAME"];
                                        }
                                        else {
                                            $email = explode("@", $history_item["EMAIL"]);

                                            $name = $email[0];
                                        }

                                        echo '<div class="title">'.$name.'</div>';
                                        echo '<time class="aligner">'.$history_item["DATE"].'</time>';
                                        echo '<time class="aligner">'.$history_item["TIME"].'</time>';
                                    echo '</div>';
                                    echo '<div class="table-cell"><div class="bid">Ставка</div></div>';
                                    echo '<div class="table-cell"><div class="price">'.CurrencyFormat($history_item["PRICE"], "RUB").'</div></div>';
                                echo '</div>';
                            }
                        } ?>
                    </div>
                    <?else:?>
                        <div class="note-ban aligner">
                            <span class="icon-2">Вы не можете просматривать историю ставок</span>
                            <a href="#popup-history-help" class="fancybox"><img class="help-symbol" alt="Справка" src="/assets/images/help-symbol.png"></a>
                        </div>
                    <?endif;?>
                </div>
                <? if ($count > 0) {?>
                    <div class="history-bid-all show-all"><span>Ещё <?=$count?></span></div>
                <? } ?>
            </div>
        <? } ?>




        <?// FAQ?>
        <div class="col">
        <?$APPLICATION->IncludeComponent(
            "webtu:faq.form",
            "",
            Array(
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "FORMAT_DATE" => "d.m.Y",
                "IBLOCK_ID" => "20",
                "IBLOCK_TYPE" => "feedback_form",
				"ID" => $arResult['ID']
            )
        );?>
<?$GLOBALS['arrFilter'] = array('PROPERTY_ID_AUKTSION' => $arResult['ID']);?>

			<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"faq", 
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
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "20",
		"IBLOCK_TYPE" => "feedback_form",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
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
		"PROPERTY_CODE" => array(
			0 => "ID_AUKTSION",
			1 => "DATE_ANSWER",
			2 => "NAME",
			3 => "",
		),
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
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "faq"
	),
	false
);?>
       

           

        </div>
    </div>
</div><!-- /.content-block-2 -->



<?/*--- Запись товара в просмотренные ---*/?>
<script type="text/javascript">
    var viewedCounter = {
        path: '/bitrix/components/bitrix/catalog.element/ajax.php',
        params: {
            AJAX: 'Y',
            SITE_ID: "<?= SITE_ID ?>",
            PRODUCT_ID: "<?= $arResult['ID'] ?>",
            PARENT_ID: "<?= $arResult['ID'] ?>"
        }
    };
    BX.ready(
        BX.defer(function(){
            BX.ajax.post(
                viewedCounter.path,
                viewedCounter.params
            );
        })
    );
</script>
