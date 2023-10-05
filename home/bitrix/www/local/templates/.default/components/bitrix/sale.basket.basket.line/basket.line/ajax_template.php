<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

require(realpath(dirname(__FILE__)).'/top_template.php');

if ($arParams["SHOW_PRODUCTS"] == "Y" && $arResult['NUM_PRODUCTS'] > 0)  { ?>
    <div class="cart-toggle">
        <div class="table" id="<?=$cartId?>products">
            <? foreach ($arResult["CATEGORIES"] as $category => $items) {
                if (empty($items)) continue;

                foreach ($items as $v) { ?>
                    <div class="table-row">
                        <? if ($arParams["SHOW_IMAGE"] == "Y" && $v["PICTURE_SRC"]) { ?>
                            <div class="table-cell">
                                <? if($v["DETAIL_PAGE_URL"]) {?>
                                    <a href="<?=$v["DETAIL_PAGE_URL"]?>" class="img">
                                        <img src="<?=$v["PICTURE_SRC"]?>" alt="<?=$v["NAME"]?>">
                                    </a>
                                <? } else { ?>
                                    <img src="<?=$v["PICTURE_SRC"]?>" alt="<?=$v["NAME"]?>" />
                                <? } ?>
                            </div>
                        <? } ?>
                        <div class="table-cell">
                            <div class="name">
                                <? if ($v["DETAIL_PAGE_URL"]) {?>
                                    <a href="<?=$v["DETAIL_PAGE_URL"]?>" class="name-link"><?=$v["NAME"]?></a>
                                <? } else { ?>
                                    <?=$v["NAME"]?>
                                <? } ?>
                                <? if (true) {/*$category != "SUBSCRIBE") TODO */ ?>
                                    <? if ($arParams["SHOW_SUMMARY"] == "Y") { ?>
                                        <div class="price"><?=$v["SUM"]?></div>
                                    <? } ?>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                <? } ?>
            <? } ?>
        </div>

        <div class="result clearfix">
            <div class="left uppercase">Сумма:</div>
            <div class="right"><?=$arResult["TOTAL_PRICE"]?></div>
        </div>
        <div class="link-cart">
            <a href="<?=$arParams["PATH_TO_BASKET"]?>" onclick="ga('send','event','goToCart','clicked');yaCounter44820226.reachGoal('goToCart');">Перейти в корзину</a>
        </div>
    </div>

	<script>
		BX.ready(function(){
			<?=$cartId?>.fixCart();
		});
	</script>
<?
}