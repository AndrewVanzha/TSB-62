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
<h1 class="v21-h1" style="margin-bottom: 5px;"><?= $arResult["ITEMS"][0]["DISPLAY_PROPERTIES"]["ATT_HEADER_TITLE"]["~VALUE"]; ?></h1>
<h4 class="v21-h4"><?= $arResult["ITEMS"][0]["DISPLAY_PROPERTIES"]["ATT_SUBHEADER_TITLE"]["~VALUE"]; ?></h4>
<? foreach($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="v21-intro-card v21-intro-card--biometrics" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <? if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
            <div class="v21-intro-card__image v21-intro-card__image--visible">
                <img
                        class="preview_picture"
                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                />
            </div>
        <? endif; ?>
        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
            <div class="v21-intro-card__content">
                <?echo $arItem["~PREVIEW_TEXT"];?>
            </div>
        <?endif;?>
    </div>

    <div class="v21-section">
        <div class="v21-section v21-section--xs">
            <h2 class="v21-section__subtitle v21-h6">Документы</h2>
            <div class="v21-grid">
                <? foreach ($arItem["DISPLAY_PROPERTIES"]["ATT_DOCUMENTS"]["VALUE"] as $key => $fileId) : ?>
                    <? //debugg($fileId);
                    $xml_file = pathinfo($fileId, PATHINFO_EXTENSION);
                    //debugg($xml_file);
                    $str = str_replace('/', ' ', strrchr($fileId, '/'));
                    $str = str_replace($xml_file, '', $str);
                    $str = mb_substr($str , 0, -1);;
                    //debugg($str);
                    ?>
                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <a href="<?= $fileId ?>" class="v21-document v21-link">
                            <div class="v21-document__title"><?= $str ?></div>
                            <div class="v21-document__download">
                                <span class="v21-link__text">Скачать</span>
                                <svg width="11" height="12" class="v21-document__download-icon">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#download"></use>
                                </svg>
                            </div>
                        </a>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>

<? endforeach; ?>

<?/*?>
    <script>
        $(document).ready(function () {
            $('.js-tariff-listing--details').on('click', function() {
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
<? */ ?>
