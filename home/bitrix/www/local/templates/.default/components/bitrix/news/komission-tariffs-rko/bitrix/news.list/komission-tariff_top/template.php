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
<?// debugg($arResult) ?>
<?// debugg($arResult["ITEMS"]) ?>

<? if($arParams["DISPLAY_PREVIEW_TEXT"]!="N"): ?>
    <div class="template-topblock">
            <div class="template-topblock__block">
                <? if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]): ?>
                    <h1 class="template-topblock__header"><?= $arResult["~DESCRIPTION"] ?></h1>
                <? endif; ?>

                <h3 class="template-topblock__content"><?echo $arResult["~SUBHEADER"]; ?></h3>
                <div class="template-topblock__buttons">
                    <a href="#fValutnyKontrolConsultForm" class="v21-button-2022 template-topblock__button button-1 js-valutny-kontrol__button">
                        <span>Получить консультацию</span>
                    </a>
                </div>
            </div>
            <?if($arParams["DISPLAY_PICTURE"]!="N"):?>
                <? if ($arResult["SECTION"]["PATH"][1366]) : ?>
                    <div class="template-topblock__image template-topblock__image--1366">
                        <img
                                src="<?=CFile::GetPath($arResult["SECTION"]["PATH"][1366]["PICTURE"])?>"
                                alt="картинка"
                                title="<?=$arResult["NAME"]?>"
                        />
                    </div>
                <? endif; ?>
                <? if ($arResult["SECTION"]["PATH"][1024]) : ?>
                    <div class="template-topblock__image template-topblock__image--1024">
                        <img
                                src="<?=CFile::GetPath($arResult["SECTION"]["PATH"][1024]["PICTURE"])?>"
                                alt="картинка"
                                title="<?=$arResult["NAME"]?>"
                        />
                    </div>
                <? endif; ?>
                <? if ($arResult["SECTION"]["PATH"][768]) : ?>
                    <div class="template-topblock__image template-topblock__image--768">
                        <img
                                src="<?=CFile::GetPath($arResult["SECTION"]["PATH"][768]["PICTURE"])?>"
                                alt="картинка"
                                title="<?=$arResult["NAME"]?>"
                        />
                    </div>
                <? endif; ?>
                <? if ($arResult["SECTION"]["PATH"][480]) : ?>
                    <div class="template-topblock__image template-topblock__image--480">
                        <img
                                src="<?=CFile::GetPath($arResult["SECTION"]["PATH"][480]["PICTURE"])?>"
                                alt="картинка"
                                title="<?=$arResult["NAME"]?>"
                        />
                    </div>
                <? endif; ?>
                <? if ($arResult["SECTION"]["PATH"][320]) : ?>
                    <div class="template-topblock__image template-topblock__image--320">
                        <img
                                src="<?=CFile::GetPath($arResult["SECTION"]["PATH"][320]["PICTURE"])?>"
                                alt="картинка"
                                title="<?=$arResult["NAME"]?>"
                        />
                    </div>
                <? endif; ?>
            <?endif?>
        <p class="template-topblock__content"><?echo $arResult["~TOP_TEXT"]; ?></p>
    </div>
<? endif; ?>

<script>
    $(document).ready(function () {
        $('.js-valutny-kontrol__button').on('click', function() {
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

