<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<div class="row">
<?foreach($arResult['ITEMS'] as $arItem):?>
<div class="col_3">
    <a href='<?=$arItem['PROPERTIES']['LINK']['VALUE']?>'>
        <div class='cover_type' style='background:url("<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>") no-repeat 50% 0 / cover'></div>
        <p><?=$arItem['NAME']?></p>
    </a>
</div>
<?endforeach?>
</div>