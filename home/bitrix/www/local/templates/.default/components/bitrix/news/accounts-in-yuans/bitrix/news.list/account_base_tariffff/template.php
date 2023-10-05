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
//debugg($arResult["ITEMS"][0]["PROPERTIES"]);
?>
<? if(!empty($arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_GRACE_SCHEME"]["VALUE"])): ?>
    <!--div class="v21-section"-->
        <div class="mir-section-schemeblock">
            <h2 class="mir-section-schemeblock__header"><?= $arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_GRACE_SCHEME"]["~NAME"]; ?></h2>
            <div class="mir-section-schemeblock__image">
                <? $imgFile = CFile::ResizeImageGet($arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_GRACE_SCHEME"]["VALUE"], array('width'=>1450, 'height'=>415), 2); ?>
                <??><img src="<?=$imgFile['src']?>" alt="Схема беспроцентного периода"><??>
                <?/*?><img src="/images/grace_geriod_gcheme.svg" alt="Схема беспроцентного периода"><?*/?>
                <?/*?><img src="/images/grace_geriod_gcheme.png" alt="Схема беспроцентного периода"><?*/?>
            </div>

            <div class="mir-section-schemeblock__wrap">
                <div class="mir-section-schemeblock__left">
                    <?// Параметр схемы (слева)?>
                    <h4 class="mir-section-schemeblock__left--header"><?= $arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_LEFT_PARAM"]["~VALUE"]; ?></h4>
                    <?// Текст к параметру схемы (слева)?>
                    <? foreach ($arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_LEFT_TEXT"]["~VALUE"] as $textLine): ?>
                        <div class="mir-section-schemeblock__left--text"><?= $textLine; ?></div>
                    <? endforeach; ?>
                    <? $leftPrim = $arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_LEFT_TEXT_PRIM"]["~VALUE"]; ?>
                </div>
                <div class="mir-section-schemeblock__right">
                    <?// Параметр схемы (справа)?>
                    <h4 class="mir-section-schemeblock__right--header"><?= $arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_RIGHT_PARAM"]["~VALUE"]; ?></h4>
                    <?// Текст к параметру схемы (справа)?>
                    <? foreach ($arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_RIGHT_TEXT"]["~VALUE"] as $textLine): ?>
                        <div class="mir-section-schemeblock__right--text"><?= $textLine; ?></div>
                    <? endforeach; ?>
                    <? //$rightPrim = json_encode($arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_RIGHT_TEXT_PRIM"]["~VALUE"]); ?>
                    <? $rightPrim = $arResult["ITEMS"][0]["PROPERTIES"]["ATT_CCM_RIGHT_TEXT_PRIM"]["~VALUE"]; ?>
                </div>
                <?//debugg($leftPrim);?>
                <?//debugg($rightPrim);?>
            </div>

        </div>
    <!--/div-->
<? endif; ?>

<script>
    $(document).ready(function() {
        let leftPrim = "<?php echo $leftPrim?>";
        let rightPrim = "<?php echo $rightPrim?>";
        //console.log('leftPrim='+leftPrim);
        //console.log('rightPrim='+rightPrim);

        if(leftPrim) {
            let insertLeftBlockLine = '<div class="mir-section-schemeblock__leftprim">';
            insertLeftBlockLine = insertLeftBlockLine + '<h6></h6>';
            insertLeftBlockLine = insertLeftBlockLine + '<p>' + leftPrim + '</p>';
            insertLeftBlockLine = insertLeftBlockLine + '</div>';
            $('.v21 .mir-section-schemeblock__left--text .prim').append($(insertLeftBlockLine));
        }
        if(rightPrim) {
            let insertRightBlockLine = '<div class="mir-section-schemeblock__rightprim">';
            insertRightBlockLine = insertRightBlockLine + '<h6></h6>';
            insertRightBlockLine = insertRightBlockLine + '<p>' + rightPrim + '</p>';
            insertRightBlockLine = insertRightBlockLine + '</div>';
            $('.v21 .mir-section-schemeblock__right--text .prim').append($(insertRightBlockLine));
        }

        $('.v21 .mir-section-schemeblock__left--text .prim').click(function (elem) {
            //console.log('leftPrim=');
            //console.log(elem);
            //console.log(elem.target);
            if($(elem.target).attr('class') == 'prim' || $(elem.target)[0].tagName == 'path') {
                $('.mir-section-schemeblock__leftprim').toggleClass('mir-section-schemeblock__leftprim--show');
            }
            //$(window).on('click', (el) => {
            //    let $this = $(this);
            //});
            $('.v21 .mir-section-schemeblock__left--text .prim h6').on('click', (el) => {
                //console.log('left');
                //console.log(el);
                //console.log(el.target);
                $('.mir-section-schemeblock__leftprim').removeClass('mir-section-schemeblock__leftprim--show');
            });
        });
        $('.v21 .mir-section-schemeblock__right--text .prim').click(function (elem) {
            //console.log('rightPrim=');
            //console.log(elem);
            //console.log(elem.target);
            if($(elem.target).attr('class') == 'prim' || $(elem.target)[0].tagName == 'path') {
                $('.mir-section-schemeblock__rightprim').toggleClass('mir-section-schemeblock__rightprim--show');
            }
            //$(window).on('click', (el) => {
            //    let $this = $(this);
            //});
            $('.v21 .mir-section-schemeblock__right--text .prim h6').on('click', (el) => {
                //console.log('right');
                //console.log(el);
                //console.log(el.target);
                $('.mir-section-schemeblock__rightprim').removeClass('mir-section-schemeblock__rightprim--show');
            });
        });

        /*$('.v21 .mir-section-schemeblock__left--text .prim').click(function (elem) {
            console.log('leftPrim=');
            //console.log(elem);
            console.log(elem.target);
            //console.log($(elem.target).attr('class'));
            //console.log($(elem.target)[0].tagName);
            if($(elem.target).attr('class') == 'prim' || $(elem.target)[0].tagName == 'path') {
                let $this = $(this);
                let insertBlockLine = '<div class="mir-section-schemeblock__leftprim">';
                insertBlockLine = insertBlockLine + '<h6></h6>';
                insertBlockLine = insertBlockLine + '<p>' + leftPrim + '</p>';
                insertBlockLine = insertBlockLine + '</div>';
                $this.append($(insertBlockLine));
            }
            $('.v21 .mir-section-schemeblock__left--text .prim h6').on('click', (el) => {
                //leftF = true;
                //console.log('left');
                //console.log(el);
                //console.log(el.target);
                //console.log($(el.target).parent());
                $(el.target).parent().remove();
            });
        });
        $('.v21 .mir-section-schemeblock__right--text .prim').click(function (elem) {
            console.log('rightPrim=');
            //console.log(elem);
            console.log(elem.target);
            //console.log($(elem.target).attr('class'));
            //console.log($(elem.target)[0].tagName);
            if($(elem.target).attr('class') == 'prim' || $(elem.target)[0].tagName == 'path') {
                let $this = $(this);
                //$this.append($('<div>', {'class': 'mir-section-schemeblock__rightprim' ,'html': '' + rightPrim}));
                let insertBlockLine = '<div class="mir-section-schemeblock__rightprim">';
                insertBlockLine = insertBlockLine + '<h6></h6>';
                insertBlockLine = insertBlockLine + '<p>' + rightPrim + '</p>';
                insertBlockLine = insertBlockLine + '</div>';
                $this.append($(insertBlockLine));
            }
            $('.v21 .mir-section-schemeblock__right--text .prim h6').on('click', (el) => {
                $(el.target).parent().remove();
            });
        });*/

        /*$('.mir-section-schemeblock__right--header').click(function () {
            $(this).append($('<div>', {'class': 'zz' ,'html': 'ququ=' + rightPrim}));
        });*/
    });
</script>
