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

if (!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>

<div class="pagination">
	<ul class="aligner">

		<? if ($arResult["bDescPageNumbering"] === true) : ?>

		<? else : ?>

			<? if ($arResult["NavPageNomer"] > 1) : ?>

				<? if ($arResult["bSavePage"]) : ?>
					<li>
						<a class="mi--angle-left mi" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"></a>
					</li>
				<? else : ?>

					<? if ($arResult["NavPageNomer"] > 2) : ?>
						<li>
							<a class="mi--angle-left mi" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"></a>
						</li>
					<? else : ?>
						<li>
							<a class="mi--angle-left mi" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"></a>
						</li>
					<? endif ?>
				<? endif ?>

			<? else : ?>

			<? endif ?>

			<? while ($arResult["nStartPage"] <= $arResult["nEndPage"]) : ?>

				<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) : ?>
					<li class="is-active">
						<a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
					</li>
				<? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false) : ?>
					<li>
						<a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
					</li>
				<? else : ?>
					<li>
						<a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
					</li>
				<? endif ?>
				<? $arResult["nStartPage"]++ ?>
			<? endwhile ?>

			<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) : ?>
				<li>
					<a class="mi--angle-right mi" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"></a>
				</li>
			<? else : ?>

			<? endif ?>

		<? endif ?>

	</ul>
</div>