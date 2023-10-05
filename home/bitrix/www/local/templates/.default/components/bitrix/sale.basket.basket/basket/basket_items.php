<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @var array $arUrls */
/** @var array $arHeaders */
use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
	ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
$bPriceType    = false;

if ($normalCount > 0):
    //Удаляем всё содержимое корзины
    if (isset($_REQUEST["BasketClear"]) && $_REQUEST["BasketClear"] == "1"  ) {
        CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
        header('Location: /personal/cart/');
    }
?>
<div id="basket_items_list">
	<div class="table-container">
		<table id="basket_items" class="content-table">
				<tr>
                    <th>№</th>
                    <th>Фото</th>
					<?
					foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):
						$arHeaders[] = $arHeader["id"];

						// remember which values should be shown not in the separate columns, but inside other columns
						if (in_array($arHeader["id"], array("TYPE")))
						{
							$bPriceType = true;
							continue;
						}
						elseif ($arHeader["id"] == "PROPS")
						{
							$bPropsColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "DELAY")
						{
							$bDelayColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "DELETE")
						{
							$bDeleteColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "WEIGHT")
						{
							$bWeightColumn = true;
						}

						if ($arHeader["id"] == "NAME"):
						?>
							<th id="col_<?=$arHeader["id"];?>">
						<?
						elseif ($arHeader["id"] == "PRICE"):
						?>
							<th id="col_<?=$arHeader["id"];?>">
						<?
						else:
						?>
							<th id="col_<?=$arHeader["id"];?>">
						<?
						endif;
						?>
							<?=$arHeader["name"]; ?>
							</th>
					<?
					endforeach;

					if ($bDeleteColumn):
					?>
						<th class="custom">Удалить</th>
					<?
					endif;
					?>
				</tr>

				<?
				$skipHeaders = array('PROPS', 'DELAY', 'DELETE', 'TYPE');

                $count = 1;

				foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):


					if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
					?>
					<tr id="<?=$arItem["ID"]?>"
						 data-item-name="<?=$arItem["NAME"]?>"
						 data-item-brand="<?=$arItem[$arParams['BRAND_PROPERTY']."_VALUE"]?>"
						 data-item-price="<?=$arItem["PRICE"]?>"
						 data-item-currency="<?=$arItem["CURRENCY"]?>"
					>
						<?
						foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):

							if (in_array($arHeader["id"], $skipHeaders)) // some values are not shown in the columns in this template
								continue;

							if ($arHeader["name"] == '')
								$arHeader["name"] = GetMessage("SALE_".$arHeader["id"]);

							if ($arHeader["id"] == "NAME"):
							?>
                                <td><?=$count?></td>
                                <td>
                                    <?
                                    if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
                                        $url = $arItem["PREVIEW_PICTURE_SRC"];
                                    elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
                                        $url = $arItem["DETAIL_PICTURE_SRC"];
                                    else:
                                        $url = $templateFolder."/images/no_photo.png";
                                    endif;
                                    ?>
                                    <div class="images">
                                        <? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?>
                                            <a href="<?=$arItem["DETAIL_PAGE_URL"] ?>">
                                        <?endif;?>
                                                <img src="<?=$url?>" alt="<?=$arItem["NAME"]?>">
                                        <? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?>
                                            </a>
                                        <?endif;?>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-product">
                                        <div class="title"><?=$arItem["NAME"]?></div>
                                        <div class="bx_ordercart_itemart">
                                            <?
                                            if ($bPropsColumn):
                                                foreach ($arItem["PROPS"] as $val):

                                                    if (is_array($arItem["SKU_DATA"]))
                                                    {
                                                        $bSkip = false;
                                                        foreach ($arItem["SKU_DATA"] as $propId => $arProp)
                                                        {
                                                            if ($arProp["CODE"] == $val["CODE"])
                                                            {
                                                                $bSkip = true;
                                                                break;
                                                            }
                                                        }
                                                        if ($bSkip)
                                                            continue;
                                                    }

                                                    echo htmlspecialcharsbx($val["NAME"]).":&nbsp;<span>".$val["VALUE"]."</span><br/>";
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </td>
							<?
							elseif ($arHeader["id"] == "QUANTITY"):
							?>
                                <td>
                                    <div class="cart-count clearfix">
                                        <?
                                        $ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
                                        $useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
                                        $useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");

                                        if (!isset($arItem["MEASURE_RATIO"])) {
                                            $arItem["MEASURE_RATIO"] = 1;
                                        }
                                        if (floatval($arItem["MEASURE_RATIO"]) != 0) {
                                        ?>
                                            <button type="button" class="minus" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'down', <?=$useFloatQuantityJS?>); ">-</button>
                                            <input
                                                    type="text"
                                                    id="QUANTITY_INPUT_<?=$arItem["ID"]?>"
                                                    name="QUANTITY_INPUT_<?=$arItem["ID"]?>"
                                                    maxlength="18"
                                                    class="num"
                                                    value="<?=$arItem["QUANTITY"]?>"
                                                    onchange="updateQuantity('QUANTITY_INPUT_<?=$arItem["ID"]?>', '<?=$arItem["ID"]?>', <?=$ratio?>, <?=$useFloatQuantityJS?>)"
                                            >
                                            <button type="button" class="plus" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'up', <?=$useFloatQuantityJS?>);return false;">+</button>
                                        <? } ?>
                                        <input type="hidden" id="QUANTITY_<?=$arItem['ID']?>" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem["QUANTITY"]?>" />
                                    </div>
                                </td>
							<?
							elseif ($arHeader["id"] == "PRICE"):
							?>
                                <td>
                                    <div class="cart-price">
                                        <div class="price-old" id="old_price_<?=$arItem["ID"]?>">
                                            <?if (floatval($arItem["DISCOUNT_PRICE_PERCENT"]) > 0):?>
                                                <?=$arItem["FULL_PRICE_FORMATED"]?>
                                            <?endif;?>
                                        </div>
                                        <div class="price" id="current_price_<?=$arItem["ID"]?>"><?=$arItem["PRICE_FORMATED"]?></div>
                                    </div>
                                </td>
							<?
							elseif ($arHeader["id"] == "DISCOUNT"):
							?>
								<td class="custom">
									<div id="discount_value_<?=$arItem["ID"]?>"><?=$arItem["DISCOUNT_PRICE_PERCENT_FORMATED"]?></div>
								</td>
							<?
							elseif ($arHeader["id"] == "WEIGHT"):
							?>
								<td class="custom">
									<span><?=$arHeader["name"]; ?>:</span>
									<?=$arItem["WEIGHT_FORMATED"]?>
								</td>
							<?
							else:
							?>
								<td>
									<?
									if ($arHeader["id"] == "SUM"):
									?>
										<div id="sum_<?=$arItem["ID"]?>" class="price">
									<?
									endif;

									echo $arItem[$arHeader["id"]];

									if ($arHeader["id"] == "SUM"):
									?>
										</div>
									<?
									endif;
									?>
								</td>
							<?
							endif;
						endforeach;

						if ($bDelayColumn || $bDeleteColumn):
						?>
							<td>
								<?
								if ($bDeleteColumn):
									?>
                                    <div class="remove-btn">
                                        <a href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>" onclick="return deleteProductRow(this)"></a>
                                    </div>
									<?
								endif;
								?>
							</td>
						<?
						endif;
						?>
					</tr>
					<?
					endif;
                    $count += 1;
				endforeach;
				?>
			</>
		</table>
	</div>
	<input type="hidden" id="column_headers" value="<?=htmlspecialcharsbx(implode($arHeaders, ","))?>" />
	<input type="hidden" id="offers_props" value="<?=htmlspecialcharsbx(implode($arParams["OFFERS_PROPS"], ","))?>" />
	<input type="hidden" id="action_var" value="<?=htmlspecialcharsbx($arParams["ACTION_VARIABLE"])?>" />
	<input type="hidden" id="quantity_float" value="<?=($arParams["QUANTITY_FLOAT"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="price_vat_show_value" value="<?=($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="hide_coupon" value="<?=($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="use_prepayment" value="<?=($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="auto_calculation" value="<?=($arParams["AUTO_CALCULATION"] == "N") ? "N" : "Y"?>" />

	<div class="content-cart-result clearfix">

		<div class="left" id="coupons_block">
		<?
		if ($arParams["HIDE_COUPON"] != "Y")
		{
		?>
            <div class="promo-cart">
                <div class="label-text"><?=GetMessage("STB_COUPON_PROMT")?></div>
                <input type="text" class="text" id="coupon" name="COUPON" value="" onchange="enterCoupon();">
                <input type="submit" class="submit" onclick="enterCoupon();return false;" value="<?=GetMessage('SALE_COUPON_APPLY'); ?>">

            </div>
        <? } ?>
		</div>
		<div class="right">
            <div class="cart-result">
                <div class="table">
                    <?if ($bWeightColumn && floatval($arResult['allWeight']) > 0):?>
                        <div class="table-row">
                            <div class="table-cell"><?=GetMessage("SALE_TOTAL_WEIGHT")?></div>
                            <div class="table-cell" id="allWeight_FORMATED"><?=$arResult["allWeight_FORMATED"]?></div>
                        </div>
                    <?endif;?>
                    <?if ($arParams["PRICE_VAT_SHOW_VALUE"] == "Y"):?>
                        <div class="table-row">
                            <div class="table-cell"><?echo GetMessage('SALE_VAT_EXCLUDED')?></div>
                            <div class="table-cell" id="PRICE_WITHOUT_DISCOUNT"><?=$arResult["PRICE_WITHOUT_DISCOUNT"];?></div>
                        </div>
                        <?if (floatval($arResult["DISCOUNT_PRICE_ALL"]) > 0):?>
                            <div class="table-row result-1">
                                <div class="table-cell">Вы экономите:</div>
                                <div class="table-cell" id="DISCOUNT_PRICE_ALL">
                                    <?=$arResult["DISCOUNT_PRICE_ALL_FORMATED"]?>
                                </div>
                            </div>
                        <?endif;?>
                        <?
                        if (floatval($arResult['allVATSum']) > 0):
                            ?>
                            <div class="table-row">
                                <div class="table-cell"><?echo GetMessage('SALE_VAT')?></div>
                                <div class="table-cell" id="allVATSum_FORMATED"><?=$arResult["allVATSum_FORMATED"]?></div>
                            </div>
                            <?
                        endif;
                        ?>
                    <?endif;?>
                    <div class="table-row result-2">
                        <div class="table-cell"><?=GetMessage("SALE_TOTAL")?></div>
                        <div class="table-cell" id="allSum_FORMATED"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="remove-product left"><a href="/personal/cart/?BasketClear=1" class="icon-2">Очистить корзину</a></div>
                    <div class="right"><a href="javascript:void(0)" onclick="checkOut();" class="button" onclick="ga('send','event','goToBuy','clicked');yaCounter44820226.reachGoal('goToBuy');"><?=GetMessage("SALE_ORDER")?></a></div>
                </div>
            </div>
		</div>
	</div>
</div>
<?
else:
?>
<div id="basket_items_list">
	<table>
		<tbody>
			<tr>
				<td style="text-align:center">
					<div class=""><?=GetMessage("SALE_NO_ITEMS");?></div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
endif;