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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if ($arResult["SECTIONS_COUNT"] > 0) {
    echo '<div class="filter-btn filter-btn-2 aligner">';
        foreach ($arResult['SECTIONS'] as $arSection){
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

            $count = CIBlockSection::GetSectionElementsCount($arSection["ID"], Array("CNT_ACTIVE"=>"Y"));
            
            if ($arSection['SECTION_PAGE_URL'] == $arResult['SECTION']['SECTION_PAGE_URL'])
                echo '<a href="'.$arSection['SECTION_PAGE_URL'].'" class="is-active">'.$arSection['NAME'].' ('.$count.')</a>';
            else
                echo '<a href="'.$arSection['SECTION_PAGE_URL'].'">'.$arSection['NAME'].' ('.$count.')</a>';
        }
    echo '</div>';
} ?>