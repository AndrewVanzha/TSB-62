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
<?//debugg($arResult)?>
<?/*?><h2 class="v21-h2-new v21-konversion--subheader">Условия банковского депозита «БИЗНЕС»</h2><?*/?>
<section class="detail-section">
    <div class="content-area_text">
        <?=$arResult['DETAIL_TEXT']?>
    </div>
</section>
