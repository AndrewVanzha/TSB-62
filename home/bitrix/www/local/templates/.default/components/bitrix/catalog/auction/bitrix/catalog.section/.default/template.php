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

global $USER;

$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

# участие в аукционе
$CAN_AUCTION = true;

# проверка прав текущего пользователя
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
}
else {
    $CAN_AUCTION = false;
}


if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/local/include/countryList.php"))
    include_once $_SERVER['DOCUMENT_ROOT'] . '/local/include/countryList.php';


if (!empty($arResult['ITEMS'])){ ?>
    <div class="product-wrap">
        <div class="row">
            <?
            foreach($arResult['ITEMS'] as $key => $arItem) {
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
                $strMainID = $this->GetEditAreaId($arItem['ID']);

                $arItemIDs = array(
                    'ID' => $strMainID,
                    'PICT' => $strMainID.'_pict',
                    'SECOND_PICT' => $strMainID.'_secondpict',
                    'STICKER_ID' => $strMainID.'_sticker',
                    'SECOND_STICKER_ID' => $strMainID.'_secondsticker',
                    'QUANTITY' => $strMainID.'_quantity',
                    'QUANTITY_DOWN' => $strMainID.'_quant_down',
                    'QUANTITY_UP' => $strMainID.'_quant_up',
                    'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
                    'BUY_LINK' => $strMainID.'_buy_link',
                    'BASKET_ACTIONS' => $strMainID.'_basket_actions',
                    'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
                    'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
                    'COMPARE_LINK' => $strMainID.'_compare_link',

                    'PRICE' => $strMainID.'_price',
                    'DSC_PERC' => $strMainID.'_dsc_perc',
                    'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',
                    'PROP_DIV' => $strMainID.'_sku_tree',
                    'PROP' => $strMainID.'_prop_',
                    'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
                    'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
                );

                #Работа с ценой
                $minPrice = false;
                if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
                    $minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);


                $printPrice = $minPrice['PRINT_DISCOUNT_VALUE'];
                $price = $minPrice['DISCOUNT_VALUE'];

                //Название товара и описание
                $productTitle = (
                isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])&& $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
                    ? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
                    : $arItem['NAME']
                );
                $imgTitle = (
                isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
                    ? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
                    : $arItem['NAME']
                );
                $img = !empty($arItem['PREVIEW_PICTURE']) ? $arItem['PREVIEW_PICTURE']['SRC'] : $arItem['PREVIEW_PICTURE_SECOND']['SRC'] ;

                if (empty($img)) $img = $this->GetFolder().'/images/no_photo.png';


                # Пользователь разместивший лот
                $USER_ID  = $arItem["PROPERTIES"]["USER_ID"]["VALUE"];

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


                # Если пользователь тот, кто разместил аукцион
                if ($USER_ID == $arUser["ID"]) {
                    $CAN_AUCTION = false;
                }

                # Получаем историю ставок
                $history_bet = array();

                foreach ($arItem["PROPERTIES"]["HISTORY_BET"]["~VALUE"] as $key => $history_item) {

                    $history_bet[$key] = json_decode($history_item, true);
                }

                # Сортируем массив в обратном порядке
                $history_bet = array_reverse($history_bet);

                $LAST_USER_ID = $history_bet[0]["USER_ID"];

                if ( $LAST_USER_ID == $arUser["ID"]) $CAN_AUCTION_STEP = "N";
                else $CAN_AUCTION_STEP = "Y";
                ?>
                <div class="product-box" id="<?=$strMainID?>">

                    <? if (!empty($arItem["PROPERTIES"]["COUNTRY"]["VALUE"])) {

                        $img_country = "";
                        $country_code = array_search($arItem["PROPERTIES"]["COUNTRY"]["VALUE"], $countries);

                        if (strlen($country_code) == 2) {
                            $img_country = '/assets/images/flags/'.strtolower($country_code).'.png';
                        }
                        ?>
                        
                        <div class="product-auction-header clearfix">
                            <div class="left">
                                <? if (!empty($img_country)) { ?>
                                    <img class="aligner" src="<?=$img_country?>" alt="<?=$arItem["PROPERTIES"]["COUNTRY"]["VALUE"]?>">
                                <? } ?>

                                <span class="aligner country"><?=$arItem["PROPERTIES"]["COUNTRY"]["VALUE"]?></span>
                            </div>
                            <div class="right">
                                <div class="aligner"><div class="bid-user icon-2"><?=$arItem["SHOW_COUNTER"]?></div></div>
                                <div class="aligner"><div class="bid-number icon-2"><?=( ( empty($arItem["PROPERTIES"]["HISTORY_BET"]["VALUE"]) ) ? 0 : count($arItem["PROPERTIES"]["HISTORY_BET"]["VALUE"]) )?></div></div>
                            </div>
                        </div>
                    <? } ?>

                    <div class="img">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=$arItem['NAME']?>">
                            <img src="<?=$img?>" alt="<?=$arItem['NAME']?>">
                        </a>
                    </div>

                    <div class="info">
                        <div class="info-visible">
                            <div class="title">
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                            </div>
                            <div class="details">
                                <?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty) {
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
                            <div class="price-wrap">

                                <? if ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_COMPLETED"]) { ?>
                                    <div class="price-end">Продано за <?=$printPrice?></div>
                                <? } elseif ($price > 0) { ?>
                                    <div class="price"><?=$printPrice?></div>
                                <? } ?>

                                <?/*--- Если планируемые  ---*/?>
                                <? if ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_PLAN"]) { ?>
                                    <div class="product-timer">
                                        <div class="text">Аукцион начнется</div>
                                        <div class="icon-2"><?=$arItem["PROPERTIES"]["DATE_ACTIVE"]["VALUE"]?></div>
                                    </div>
                                <? } elseif ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_ACTIVE"]) {

                                    $datetime1 = new DateTime(date('d.m.Y H:i:s'));
                                    $datetime2 = new DateTime($arItem["PROPERTIES"]["DATE_COMPLETED"]["VALUE"]);

                                    $interval = $datetime1->diff($datetime2);

                                    $days = $interval->format('%a д');
                                    $time = $interval->format('%H:%I:%S');
                                    ?>
                                    <div class="product-timer">
                                        <div class="icon-2">
                                            <span class="timer" data-time="<?=strtotime($arItem["PROPERTIES"]["DATE_COMPLETED"]["VALUE"])?>"><?=$days.' '.$time?></span>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                        <div class="info-hover">
                            <? if (is_array($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"])) { ?>
                                <div class="block">
                                    <div class="product-thumbs row">
                                        <? foreach ($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key => $img_id) { ?>
                                            <div class="item">
                                                <a href="<?=CFile::GetPath($img_id)?>" data-fancybox="images-<?=$arItem["ID"]?>">
                                                    <img src="<?=CFile::GetPath($img_id)?>" alt="<?=$arItem["PROPERTIES"]["MORE_PHOTO"]["DESCRIPTION"][$key]?>">
                                                </a>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                            <? } ?>

                            <? if ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_PLAN"]) { ?>
                                <?/*--- Если планируемые  ---*/?>
                                <div class="block">
                                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="add-bid">Посмотреть условия</a>
                                </div>
                            <? } elseif ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_ACTIVE"]) { ?>
                                <?/*--- Если активные  ---*/?>
                                <div class="block">
                                    <? if ( $CAN_AUCTION ) { ?>

                                        <?/*--- Фиксированная ставка на лот ---*/?>
                                        <?$APPLICATION->IncludeComponent(
                                            "webtu:auction.make.step",
                                            "",
                                            Array(
                                                "AJAX_MODE" => "N",
                                                "AJAX_OPTION_ADDITIONAL" => "",
                                                "AJAX_OPTION_HISTORY" => "N",
                                                "AJAX_OPTION_JUMP" => "N",
                                                "AJAX_OPTION_STYLE" => "Y",
                                                "MIN_STEP" => $arItem["PROPERTIES"]["STEP_RATE"]["VALUE"],
                                                "PRODUCT_ID" => $arItem["ID"],
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
                            <? } elseif ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_COMPLETED"]) { ?>
                                <?/*--- Если завершенные  ---*/?>
                                <div class="block">
                                    <div class="auction-end">Аукцион завершен</div>
                                </div>
                            <? } ?>

                            <div class="block">
                                <div class="vendor-user"><a class="icon-2">Продавец <?=$name?></a></div>
                            </div>

                        </div>

                        <? if ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_PLAN"]) { ?>

                            <?/*--- Если планируемые  ---*/?>
                            <div class="mobile-btn"><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="add-bid">Посмотреть условия</a></div>

                        <? } elseif ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_ACTIVE"]) { ?>

                            <?/*--- Если активные  ---*/?>
                            <div class="mobile-btn">
                                <? if ( $CAN_AUCTION ) {?>

                                    <?/*--- Фиксированная ставка на лот ---*/?>
                                    <?$APPLICATION->IncludeComponent(
                                        "webtu:auction.make.step",
                                        "",
                                        Array(
                                            "AJAX_MODE" => "N",
                                            "AJAX_OPTION_ADDITIONAL" => "",
                                            "AJAX_OPTION_HISTORY" => "N",
                                            "AJAX_OPTION_JUMP" => "N",
                                            "AJAX_OPTION_STYLE" => "Y",
                                            "MIN_STEP" => $arItem["PROPERTIES"]["STEP_RATE"]["VALUE"],
                                            "PRODUCT_ID" => $arItem["ID"],
                                            "CAN_AUCTION_STEP" => $CAN_AUCTION_STEP
                                        )
                                    );?>

                                <? } else { ?>
                                    <div class="note-ban aligner"><span class="icon-2">Вы не можете сделать ставку</span></div>
                                <? } ?>
                            </div>

                        <? } elseif ($arItem["IBLOCK_SECTION_ID"] == $arResult["MODULE_SETTINGS"]["AUCTION"]["SECTION_ID_COMPLETED"]) { ?>

                            <?/*--- Если завершенные  ---*/?>
                            <div class="mobile-btn"><div class="auction-end">Аукцион завершен</div></div>

                        <? } ?>

                    </div>

                </div>
                <?

            } //end foreach
            ?>
        </div>
    </div>
    <?
    if ($arParams["DISPLAY_BOTTOM_PAGER"]){
        echo $arResult["NAV_STRING"];
    }
    ?>
<?}//end empty($arResult['ITEMS'])?>

