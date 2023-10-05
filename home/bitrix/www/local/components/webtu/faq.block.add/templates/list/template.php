<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
//debugg($arResult);
?>

<div class="v21-section v21-questions">
    <h2 class="v21-h3 v21-questions--header"><?= GetMessage("FAQ_BLOCK_HEADER") ?></h2>
    <div class="v21-questions--block">
        <?foreach ($arResult["FAQ_LIST"] as $arItem) : ?>
            <div class="v21-questions--block__item">
                <h3 class="v21-questions--block__item-header js-do-answer"><?= $arItem["UF_MIRPAY_QUESTION"] ?></h3>
                <div class="v21-questions--block__item-box"><?= $arItem["UF_MIRPAY_ANSWER"] ?></div>
                <hr style="margin-top: 8px; margin-bottom: 12px">
            </div>
        <?endforeach;?>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        let answerSwitch = true;
        $('.js-do-answer').on('click', function () {
            let $this = $(this);
            let wTime = 100; // время срабатывания
            $this[0].classList.toggle('v21-show-answer__rotate');
            //$this.next().toggleClass('v21-show-answer');
            //$this.next().toggle(1000);
            if(answerSwitch) {
                $this.next().animate({
                    height: "100%"
                }, wTime, function () {
                    $this.next().fadeIn(wTime);
                });
                answerSwitch = false;
            } else {
                $this.next().fadeOut(wTime, function () {
                    $this.next().animate({
                        height: "0"
                    }, wTime);
                });
                answerSwitch = true;
            }
        });
    });
</script>
