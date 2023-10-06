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
<? //debugg($arParams["SERVICES_BLOCK"]) ?>
<? //debugg($arResult["ITEMS"]) ?>
<? $ix = 0; ?>
<section class="tariff-table-tileblock">
    <h3 class="tariff-table-tileblock__header"><?= $arResult["PROPERTY_HEADER"]; ?></h3>
    <div class="tariff-table-tileblock__grid">
        <?/*?><div class="tariff-table-tileblock__grid--horline horline-1"></div>
        <div class="tariff-table-tileblock__grid--horline horline-2"></div><?*/?>
        <div class="tariff-table-tileblock__grid--item">
            <div class="tariff-table-tileblock__grid--item-box box-1">
                Вид операций и услуг, при расчетах в CNY
            </div>
        </div>
        <div class="tariff-table-tileblock__grid--item">
            <div class="tariff-table-tileblock__grid--item-box box-2">
                <?= $arResult['NOTES'][$arParams['SERVICES_BLOCK'][0]][0] ?><sup class="tariff-table-tileblock__grid--item-notesup"> 1</sup>
            </div>
        </div>
        <? foreach ($arResult["PROPERTIES"][$arParams['SERVICES_BLOCK'][0]] as $key=>$arItem) : ?>
            <div class="tariff-table-tileblock__grid--item <?= (($ix%2) == 0)? 'tariff-table-tileblock__grid--colored' : ''; ?>">
                <p class="tariff-table-tileblock__grid--item-box box-left"><?= $arItem["main"]; ?></p>
            </div>
            <div class="tariff-table-tileblock__grid--item <?= (($ix%2) == 0)? 'tariff-table-tileblock__grid--colored' : ''; ?>">
                <p class="tariff-table-tileblock__grid--item-box box-right"><?= $arItem["dop"]; ?></p>
            </div>
        <? $ix += 1; endforeach; ?>
    </div>
    <p class="tariff-table-tileblock__grid--item-note"><sup class="tariff-table-tileblock__grid--item-notesup">1 </sup><?= $arResult['NOTES'][$arParams['SERVICES_BLOCK'][0]][1] ?></p>
</section>

<?/*?>
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
<?*/?>