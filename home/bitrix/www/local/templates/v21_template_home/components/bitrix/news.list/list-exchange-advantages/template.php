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
<div class="v21-section">
    <div class="v21-advantages v21-advantages--list">
        <div class="v21-advantages__grid v21-grid">

            <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="v21-advantages__grid-item v21-grid__item v21-grid__item--1x2@sm">
                <div class="v21-advantages__item">
                    <img
                            class="v21-advantages__image"
                            src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                            width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                            height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                            alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                            title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                    />
                    <div class="v21-advantages__text">
                        <h3 class="v21-advantages__title v21-h6"><?= $arItem["DISPLAY_PROPERTIES"]["TITLE"]["DISPLAY_VALUE"] ?></h3>
                        <p class="v21-advantages__brief v21-p"><?= $arItem["~PREVIEW_TEXT"] ?></p>
                    </div>
                </div>
            </div>
            <?endforeach;?>

        </div>
    </div>
</div>
