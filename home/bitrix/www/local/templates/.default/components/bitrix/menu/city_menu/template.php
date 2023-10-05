<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<!--div class="left-menu"-->
<div class="popup-form_block">
    <div class="popup-form_content">
        <ul class="city-selector_list clearfix">
            <?
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>
                <?if($arItem["SELECTED"]):?>
                <?/*?><li><a href="<?=$arItem["LINK"].'?city='.$arItem["TEXT"].'&id='.$arItem["SESSION_ID"]?>" class="selected"><?=$arItem["TEXT"]?></a></li><?*/?>
                <li class="selected"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
            <?else:?>
                <?/*?><li><a href="<?=$arItem["LINK"].'?city='.$arItem["TEXT"].'&id='.$arItem["SESSION_ID"]?>"><?=$arItem["TEXT"]?></a></li><?*/?>
                <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
            <?endif?>

            <?endforeach?>
        </ul>
    </div>

</div>
<?endif?>