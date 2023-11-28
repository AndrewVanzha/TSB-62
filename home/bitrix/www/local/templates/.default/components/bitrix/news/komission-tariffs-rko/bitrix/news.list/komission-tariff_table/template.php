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
?>
<? //debugg($arParams["SERVICES_BLOCK"]); ?>
<?// debugg($arResult); ?>
<? //debugg($arResult["PROPERTIES"]); ?>

<div class="template-topblock">
    <div class="template-topblock__block">
        <!--h1 class="template-topblock__header">Тарифы комиссионного вознаграждения за пакеты услуг расчетно-кассового обслуживания счетов юридических лиц (за исключением кредитных организаций), индивидуальных предпринимателей и физических лиц, занимающихся в установленном законодательством российской федерации порядке частной практикой, в АКБ «ТРАНССТРОЙБАНК» (АО)</h1-->
        <h1 class="template-topblock__header"><?= $arResult['COMMON_SECTION']['ITEMS'][10758]['PREVIEW_TEXT']; ?></h1>
        <h2 class="template-topblock__anno"><?= $arResult['COMMON_SECTION']['ITEMS'][10757]['PREVIEW_TEXT']; ?></h2>
        <?/*?><h2 class="template-topblock__anno">УТВЕРЖДЕНЫ<br>
            Приказом<br>
            Председателя Правления<br>
            АКБ «Трансстройбанк» (АО)<br>
            № 422 от «12» августа 2021 г.<br>
            Вступают в силу с «01» сентября 2021 г.</h2><?*/?>
        <div class="template-topblock__buttons">
            <a href="#fTariffConsultForm" class="v21-button-2022 template-topblock__button button-1 js-tariff-table__button">
                <span>Получить консультацию</span>
            </a>
        </div>
    </div>
    <!--h3 class="template-topblock__subheader">Условия предоставления пакетов</h3-->
    <h3 class="template-topblock__subheader"><?= $arResult['COMMON_SECTION']['ITEMS'][10716]['SUBHEADERVALUE']; ?></h3>

    <div class="template-topblock__image">
        <div class="template-topblock__image template-topblock__image--1366">
            <img
                    src="<?=CFile::GetPath($arResult['PICTURE'])?>"
                    alt="картинка"
                    title="<?=$arResult["NAME"]?>"
            />
        </div>
        <div class="template-topblock__image template-topblock__image--1024">
            <img
                    src="<?=CFile::GetPath($arResult['PICTURE'])?>"
                    alt="картинка"
                    title="<?=$arResult["NAME"]?>"
            />
        </div>
        <div class="template-topblock__image template-topblock__image--768">
            <img
                    src="<?=CFile::GetPath($arResult['PICTURE'])?>"
                    alt="картинка"
                    title="<?=$arResult["NAME"]?>"
            />
        </div>
        <div class="template-topblock__image template-topblock__image--480">
            <img
                    src="<?=CFile::GetPath($arResult['PICTURE'])?>"
                    alt="картинка"
                    title="<?=$arResult["NAME"]?>"
            />
        </div>
    </div>
    <?/*?><p class="template-topblock__content"><?echo $arResult["~DESCRIPTION"]; ?></p><?*/?>
    <p class="template-topblock__content"><?echo $arResult['COMMON_SECTION']['ITEMS'][10716]['PREVIEW_TEXT']; ?></p>
</div>

<script>
    $(document).ready(function () {
        $('.js-tariff-table__button').on('click', function() {
            let href = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(href).offset().top - 120
            }, {
                duration: 800,   // по умолчанию «400»
                easing: "linear" // по умолчанию «swing»
            });
            return false;
        });
    });
</script>

<div>
    <div>Пакет</div>
    <? foreach ($arResult['SECTION_LEVEL_1'] as $section) : ?>
        <a href="<?= $section['SECTION_PAGE_URL'] ?>"><?= $section['DESCRIPTION'] ?></a>
    <? endforeach; ?>
</div>

<div>
    <div>№ п/п</div>
    <div>Вид операций и услуг</div>
    <div>Пакет<br><? echo $arResult['SECTION']['PATH'][0]['~DESCRIPTION']; ?></div>
</div>
<? foreach ($arResult['TABLE'] as $key=>$arItems) : ?>
    <div>
        <div><?=$key+1?>.</div>
        <div><?= $arItems['DESCRIPTION'] ?></div>
        <div></div>
        <? foreach ($arItems['ITEMS'] as $arItem) : ?>
            <div><?= $arItem['PROPERTIES']['ATT_TABLE_LINE']['VALUE']; ?></div>
            <? if ($arItem['PROPERTIES']['ATT_SERVICE_POINT']['VALUE']) : ?>
                <div><?= $arItem['PROPERTIES']['ATT_SERVICE_POINT']['~VALUE']; ?></div>
                <div><?= $arItem['PROPERTIES']['ATT_SERVICE_POINT']['~DESCRIPTION']; ?></div>
            <? endif; ?>
            <? if ($arItem['PROPERTIES']['ATT_SERVICE_POINT_COMPL']['VALUE']) : ?>
                <? for ($kk=0; $kk<count($arItem['PROPERTIES']['ATT_SERVICE_POINT_COMPL']['~VALUE']); $kk++) : ?>
                    <div><?= $arItem['PROPERTIES']['ATT_SERVICE_POINT_COMPL']['~VALUE'][$kk]; ?></div>
                    <div><?= $arItem['PROPERTIES']['ATT_SERVICE_POINT_COMPL']['~DESCRIPTION'][$kk]; ?></div>
                <? endfor; ?>
            <? endif; ?>
        <? endforeach; ?>
    </div>
<? endforeach; ?>

<?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
        <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
                        class="preview_picture"
                        border="0"
                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                        width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                        height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                        style="float:left"
                /></a>
        <?else:?>
            <img
                    class="preview_picture"
                    border="0"
                    src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                    width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                    height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                    alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                    title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                    style="float:left"
            />
        <?endif;?>
    <?endif?>
    <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
        <span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
    <?endif?>
    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
        <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
        <?else:?>
            <b><?echo $arItem["NAME"]?></b><br />
        <?endif;?>
    <?endif;?>
    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
        <?echo $arItem["PREVIEW_TEXT"];?>
    <?endif;?>
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
        <div style="clear:both"></div>
    <?endif?>
    <?foreach($arItem["FIELDS"] as $code=>$value):?>
        <small>
            <?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
        </small><br />
    <?endforeach;?>
    <?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
        <small>
            <?=$arProperty["NAME"]?>:&nbsp;
            <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
                <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
            <?else:?>
                <?=$arProperty["DISPLAY_VALUE"];?>
            <?endif?>
        </small><br />
    <?endforeach;?>
    </div>
<?endforeach;?>

<?/*?>
<section class="consultations-tileblock">
    <h3 class="consultations-tileblock__header"><?= $arResult["PROPERTY_HEADER"] ?></h3>
    <div class="consultations-tileblock__grid">
        <? foreach ($arResult["PROPERTIES"][$arParams['SERVICES_BLOCK'][0]] as $key=>$arItem) : ?>
            <div class="consultations-tileblock__grid--item">
                <div class="consultations-tileblock__grid--item-box item-box-<?= $key ?>">
                    <div class="consultations-tileblock__grid--img">
                        <img
                                src="<?=CFile::GetPath($arItem["icon"])?>"
                                alt="иконка"
                                title="<?=$arItem["main"]?>"
                        />
                    </div>
                    <h4 class="consultations-tileblock__grid--title"><?= $arItem["main"]; ?></h4>
                    <p class="consultations-tileblock__grid--subtitle">
                        <? if ($arItem["dop"]) : ?>
                            <span><?= $arItem["dop"]; ?></span>
                        <? endif; ?>
                    </p>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</section>
<?*/?>
<??>
<script>
    $(document).ready(function () {
        $('.js-base-account__button').on('click', function() {
            let href = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(href).offset().top - 120
            }, {
                duration: 800,   // по умолчанию «400»
                easing: "linear" // по умолчанию «swing»
            });
            return false;
        });

        $('.js-show-notetext').hover(
            function() { $(this).find('.brief-text--subline').addClass("brief-text--subline_show"); },
            function() { $(this).find('.brief-text--subline').removeClass("brief-text--subline_show"); }
        );
    });
</script>
<??>