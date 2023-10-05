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
<section class="card-section">
	<article class="card-section__wrap">
        <? if (!empty($arResult['DETAIL_PICTURE']['SRC'])) { ?>
		    <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="детальная картинка" class="content-area__image">
        <? } ?>

        <div class="card-section__left">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
        <div class="card-section__right">
            <div class="card-section__button">
                <?/*?><a href="#fBusinessCardForm" onclick="$('#typeCard').val('<?=$arResult["NAME"]?>')" data-fancybox class="button">Подать заявку</a><?*/?>
                <a href="#fBusinessCardForm" class="v21-button-2022 card-section__button--body js-card-section__button--body">
                    <span>Оставить заявку</span>
                </a>
            </div>
        </div>
	</article>
</section>

<script>
    $(document).ready(function () {
        $('.js-card-section__button--body').on('click', function() {
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

<?/*$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/corporative-clients/bankovskoe-obsluzhivanie/karty-dlya-biznesa/index_advantages.php"
	)
);*/?>
<?/*$APPLICATION->IncludeComponent(
    "webtu:spoiler",
    ".default",
    array(
        "AJAX_MODE" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "ADD_INFO_BANK" => $arResult['PROPERTIES']['ADD_INFO_BANK']['VALUE'],
        "ADD_INFO_SELF" => $arResult['PROPERTIES']['ADD_INFO_SELF']['VALUE'],
        "NAME" => $arResult['NAME'],
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
    ),
    false
);*/?>
