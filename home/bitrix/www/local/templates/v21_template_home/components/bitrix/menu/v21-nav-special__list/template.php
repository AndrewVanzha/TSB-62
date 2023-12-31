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

if (empty($arResult["ALL_ITEMS"]))
	return;
?>
<?// debugg($arResult);?>
<?// debugg($arResult["MENU_STRUCTURE"]);?>
<ul class="v21-nav__list v21-nav__list--outer">
	<? foreach ($arResult["MENU_STRUCTURE"] as $itemID => $arColumns) : ?>
        <?//debugg($arColumns);?>
		<!-- first level-->
		<li class="v21-nav__top-item">
			<? if (is_array($arColumns) && count($arColumns) > 0) : ?>
				<?/*?><a href="<?= $arResult["ALL_ITEMS"][$itemID]["LINK"] ?>" data-link="navMid<?= $itemID ?>" class="v21-nav__top-link v21-nav__link js-v21-side-toggle"><?*/?>
				<div data-link="navMid<?= $itemID ?>" class="v21-nav__top-link v21-nav__link js-v21-side-toggle">
					<span><?= $arResult["ALL_ITEMS"][$itemID]["TEXT"] ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none" class="v21-nav__link-icon">
                        <path d="M1.2229 10.8104L5.9329 6.03854L1.2229 1.34042" stroke="#8B979E" stroke-width="1.94453" stroke-linecap="round"/>
                    </svg>
					<?/*?><svg width="9" height="5" class="v21-nav__link-icon">
						<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#chevron"></use>
					</svg><?*/?>
				</div>
				<? foreach ($arColumns as $key => $arRow) : ?>
					<ul id="navMid<?= $itemID ?>" class="v21-nav__list v21-nav__list--ul v21-nav__list--inner share_menu hide_menu">
                        <div class="v21-nav__list--inner__back js-v21-nav__list--inner__back">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                <path d="M6.93286 10.8104L2.22286 6.03854L6.93286 1.34042" stroke="#00345E" stroke-width="1.94453" stroke-linecap="round"/>
                            </svg>
                            <?/*?><svg width="9" height="5" class="">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#chevron"></use>
                            </svg><?*/?>
                            <span><?= GetMessage("GO_BACK") ?></span>
                        </div>
                        <a href="<?= $arResult["ALL_ITEMS"][$itemID]["LINK"] ?>" class="v21-nav__list--inner__title">
                            <span><?= $arResult["ALL_ITEMS"][$itemID]["TEXT"] ?></span>
                        </a>
                        <?//debugg($arRow);?>
						<? foreach ($arRow as $itemIdLevel_2 => $arLevel_3) : ?>
                            <?//debugg($itemIdLevel_2);debugg($arLevel_3);?>
							<!-- second level-->
							<li class="v21-nav__mid-item">
								<? if (is_array($arLevel_3) && count($arLevel_3) > 0) : ?>
									<a href="#navBot<?= $itemID . $itemIdLevel_2 ?>" class="v21-nav__mid-link v21-nav__link js-v21-dropdown-toggle">
										<span><?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"] ?></span>
										<svg width="9" height="5" class="v21-nav__link-icon">
											<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#chevron"></use>
										</svg>
									</a>
									<ul id="navBot<?= $itemID . $itemIdLevel_2 ?>" class="v21-nav__list v21-nav__list--inner">
										<? foreach ($arLevel_3 as $itemIdLevel_3) : ?>
											<!-- third level-->
											<li class="v21-nav__bot-item">
												<a href="<?= $arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"] ?>" class="v21-nav__bot-link v21-nav__link"><?= $arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"] ?></a>
											</li>
										<? endforeach; ?>
									</ul>
								<? else : ?>
                                    <?//debugg($arResult["ALL_ITEMS"][$itemIdLevel_2])?>
                                    <? if (isset($arResult["ALL_ITEMS"][$itemIdLevel_2]["PARAMS"]["subheader"])) : ?>
                                        <?if ($arResult["ALL_ITEMS"][$itemIdLevel_2]["PARAMS"]["subheader"]) : ?>
                                            <div class="v21-nav__list--subtopic"><?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?></div>
                                        <? else: ?>
                                            <a href="<?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"] ?>" class="v21-nav__mid-link v21-nav__link"><?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"] ?></a>
                                        <? endif; ?>
                                    <? endif; ?>
								<? endif ?>
							</li>
						<? endforeach; ?>
					</ul>
				<? endforeach; ?>
			<? else : ?>
				<a href="<?= $arResult["ALL_ITEMS"][$itemID]["LINK"] ?>" class="v21-nav__top-link v21-nav__link"><?= $arResult["ALL_ITEMS"][$itemID]["TEXT"] ?></a>
			<? endif ?>
		</li>
	<? endforeach; ?>
</ul>
