<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use BFPict\Pict;
/*
$arOffices = [];
$arCities = [];
if(CModule::IncludeModule("iblock")) {
    $rsList = CIblockElement::GetList(
        array("SORT" => "ASC"),
        array("IBLOCK_ID" => 114, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y"),
        false,
        false,
        array("IBLOCK_ID", "ID", "NAME", "CODE")
        //array()
    );
    while ($city = $rsList->Fetch()) {
        $arCities[] = $city;
    }
    //debugg($arCities);

    $rsList = CIBlockElement::GetList(
        array("SORT" => "ASC"),
        array("IBLOCK_ID" => 115, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y"),
        false,
        false,
        array("IBLOCK_ID", "ID", "NAME", "CODE", "PROPERTY_ATT_ADDRESS", "PROPERTY_ATT_CITY")
        //array()
    );
    while ($arList = $rsList->Fetch()) {
        //debugg($arList);
        $ar_office['NAME'] = $arList['NAME'];
        $ar_office['ADDRESS'] = $arList['PROPERTY_ATT_ADDRESS_VALUE'];
        $ar_office['CITY'] = $arList['PROPERTY_ATT_CITY_VALUE'];
        $ar_office['SORT'] = $arList['SORT'];
        $arOffices[] = $ar_office;
    }
    //debugg($arOffices);
}
*/
if (count($arResult["ITEMS"]) > 0) {
?>
	<? foreach ($arResult["ITEMS"] as $arItem) : ?>
		<?
        //debugg($arItem);
        //debugg($arItem["DETAIL_PICTURE"]);
        $new_pic = Pict::getWebp($arItem["DETAIL_PICTURE"]);
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="v21-plastic-card" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
			<div class="v21-plastic-card__image">
                <?/*?><img src="<?= $new_pic["WEBP_SRC"]?>" alt="<?= $arItem["NAME"] ?>"><?*/?>
				<img src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>">
			</div><!-- /.v21-plastic-card__image -->
			<div class="v21-plastic-card__text">
				<h3 class="v21-plastic-card__title v21-h4"><?= $arItem["NAME"] ?></h3>
				<? if ($arItem["DISPLAY_PROPERTIES"]["DESCRIPTION"]["VALUE"]) {
				?>
					<p class="v21-plastic-card__brief"><?= $arItem["DISPLAY_PROPERTIES"]["DESCRIPTION"]["VALUE"] ?></p>
				<?
				} ?>

				<div class="v21-plastic-card__stats v21-grid">

					<?= $arItem["PREVIEW_TEXT"] ?? "" ?>

					<div class="v21-plastic-card__controls v21-grid__item">
						<a href="#v21_plasticOrder1" data-name="<?= $arItem["NAME"] ?>" class="v21-plastic-card__controls-order v21-button js-v21-modal-toggle open">Заказать карту</a>
						<? if ($arItem["DETAIL_TEXT"]) { ?>
							<a href="#v21_plasticInfo<?= $arItem["ID"] ?>" data-scroll-anchor=".v21-plastic-card__controls" class="v21-plastic-card__controls-more v21-button v21-button--link js-v21-dropdown-toggle">
								<div class="v21-plastic-card__controls-caption-1">Узнать больше</div>
								<div class="v21-plastic-card__controls-caption-2">Свернуть информацию</div>
								<svg width="9" height="9" class="v21-plastic-card__controls-icon v21-button__icon">
									<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#arrowDownSmall"></use>
								</svg>
							</a>
						<? } ?>
					</div><!-- /.v21-plastic-card__controls -->
				</div><!-- /.v21-plastic-card__stats -->

				<div class="v21-plastic-card__info" id="v21_plasticInfo<?= $arItem["ID"] ?>">
					<div class="v21-plastic-card__info-content v21-content">
						<?= $arItem["DETAIL_TEXT"] ?>
					</div>
				</div><!-- /.v21-plastic-card__info -->
			</div><!-- /.v21-plastic-card__text -->
		</div><!-- /.v21-plastic-card -->
	<? endforeach; ?>
<? } ?>