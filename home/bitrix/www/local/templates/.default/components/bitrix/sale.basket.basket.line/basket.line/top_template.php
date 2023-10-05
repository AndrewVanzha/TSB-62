<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>

<div id="top_bar_cart">
    <? if ($arResult["NUM_PRODUCTS"] > 0) {?>
        <a title="Перейти в корзину" href="<?=$arParams['PATH_TO_BASKET']?>" class="header-cart icon is-active" onclick="ga('send','event','goToCart','clicked');yaCounter44820226.reachGoal('goToCart');">
            <?if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y')){
                echo $arResult['NUM_PRODUCTS'];
            }?>
        </a>
    <? } else {?>
        <a title="Перейти в корзину" href="<?=$arParams['PATH_TO_BASKET']?>" class="header-cart icon" onclick="ga('send','event','goToCart','clicked');yaCounter44820226.reachGoal('goToCart');">0</a>
    <? } ?>
</div>
