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
IncludeTemplateLangFile(__FILE__);
$this->setFrameMode(true);
$page_counter = 1;
?>
<?// debugg($arResult); ?>
<?// debugg($arResult["SECTION"]["PATH"][0]); ?>
<?// debugg($arResult["ITEMS"]); ?>

<div class="v21-section">
    <div class="v21-container">
    </div>
</div>

<div class="slider-window">
    <div class="textslider-window">
        <div class="v21-container" style="height: 100%;">
            <div class="textslider-wrapper" id="">

                <div class="mainpage-slider">
                    <div class="owl-carousel" id="textSlider">
                        <? foreach ($arResult['ITEMS'] as $arItem) : ?>
                            <? $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
                            <? $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>
                            <div class="slide" id="slide_<?=$arItem['CODE']?>" data-dot="<?= $page_counter; ?>">
                                <?if (CSite::InDir('/en/')): ?>
                                    <div class="text-slide">
                                        <div class="container">
                                            <div class="title-slide"><?=$arItem["PROPERTIES"]["TEXT_SLIDE_ENG"]["VALUE"]?></div>
                                            <?if($arItem["DETAIL_TEXT"] != ""):?><div class="line-title-bottom"></div><?endif;?>
                                            <div class="description-slide">
                                                <?=$arItem["DETAIL_TEXT"]?>
                                            </div>
                                            <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="link-slide"><?=$arItem["PROPERTIES"]["NAME_BTN_ENG"]["VALUE"]?></a>
                                        </div>
                                    </div>
                                <? else: ?>
                                    <div class="text-slide">
                                        <div class="container">
                                            <div class="title-slide"><?=$arItem["PROPERTIES"]["TEXT_SLIDE"]["VALUE"]?></div>
                                            <?if($arItem["PREVIEW_TEXT"] != ""):?><div class="line-title-bottom"></div><?endif;?>
                                            <div class="description-slide">
                                                <?=$arItem["PREVIEW_TEXT"]?>
                                            </div>
                                            <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="link-slide"><?=$arItem["PROPERTIES"]["NAME_BTN"]["VALUE"]?></a>
                                        </div>
                                    </div>
                                <? endif; ?>
                            </div>
                            <? $page_counter += 1; ?>
                        <? endforeach; ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="mainslider-window">
        <div class="mainslider-wrapper" id="">

            <div class="mainpage-slider">
                <div class="owl-carousel" id="mainSlider">
                    <? foreach ($arResult['ITEMS'] as $arItem) : ?>
                        <? $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
                        <? $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>
                        <div class="slide" id="slide_<?=$arItem['CODE']?>">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="картинка слайдера" class="slide-dt">
                            <img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="картинка слайдера" class="slide-mob">
                        </div>
                    <? endforeach; ?>

                    <?/*?><div class="pager" id="mainSliderPager"></div><?*/?>
                </div>

                <?/*?>
                    <ul class="mp-menu clearfix">
                        <li>
                            <a href="<?=GetMessage("PRIVATE_CLIENTS_LINK")?>" class="button">
                                <span class="mi--single mi">
                                    <?=GetMessage("PRIVATE_CLIENTS")?>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="<?=GetMessage("CORPORATE_CUSTOMER_LINK")?>" class="button">
                                <span class="mi--group mi">
                                    <?=GetMessage("CORPORATE_CUSTOMER")?>
                                </span>
                            </a>
                        </li>

                    </ul>
                    <?*/?>
                <?/*?>
    <div class="owl-carousel clearfix">

        <?foreach ($arResult['ITEMS'] as $arItem) {?>
            <? $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
            <? $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>

            <?if (mb_substr($arItem['PROPERTIES']['ATT_URL']['VALUE'], 0, 1) !== '/') {
                $target = 'target="_blank"';
            } else {
                $target = '';
            }?>


            <div class="slide" style="background-image: url(<?=$arItem['DETAIL_PICTURE']['SRC']?>);">
            <?//if (LANGUAGE_ID == "en") {$para = $arItem['PROPERTIES']['EN_NAME']['VALUE'];} else {$para = $arItem['NAME'];}?>
            <?$para = $arItem['NAME'];?>
                <div class="text">
                    <h3 class="page-title">
                        <?=$para?>
                    </h3>

                    <p>
                        <?=$arItem['DETAIL_TEXT']?>
                    </p>

                    <div class="note">
                        <?=$arItem['PREVIEW_TEXT']?>
                    </div>

                    <? if(!CSite::InDir('/en/')){ ?>
                        <a href="<?=$arItem['PROPERTIES']['ATT_URL']['VALUE']?>" class="read-more--large read-more mi--arrow-right-2 mi" <?=$target?>>
                            <span>
                                <?=GetMessage("LEARN_MORE")?>
                            </span>
                        </a>
                    <? } else {?>
					    <a href="<?='/en'.$arItem['PROPERTIES']['ATT_URL']['VALUE']?>" class="read-more--large read-more mi--arrow-right-2 mi" <?=$target?>>
                            <span>
                                <?=GetMessage("LEARN_MORE")?>
                            </span>
                        </a>

					<?}?>

                </div>

            </div>

        <?}?>

    </div>
<?*/?>
            </div>

        </div>
    </div>
</div>

<script>
    $(window).on('load', function() {
        $('#mainSlider').owlCarousel({
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoHeight: false,
            autoplay: false,
            autoplaySpeed: 720,
            autoplayTimeout: 3000,
            smartSpeed: 1500,
            dots: false,
            dotsClass: 'owl-dots',
            dotsData: true,
            //dotsContainer: '#mainSliderPager',
            items: 1,
            nav: true,
            navText: ['<', '>'],
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            resposive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1100: {
                    items: 1,
                },
            }
        });
        $('#textSlider').owlCarousel({
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoHeight: false,
            autoplay: false,
            autoplaySpeed: 720,
            autoplayTimeout: 3000,
            smartSpeed: 1500,
            dots: true,
            dotsClass: 'owl-dots',
            dotsData: true,
            //dotsContainer: '#mainSliderPager',
            items: 1,
            nav: true,
            navText: ['<', '>'],
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            resposive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1100: {
                    items: 1,
                },
            }
        });
    });
</script>