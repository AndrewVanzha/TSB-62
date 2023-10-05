<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { ?>
    <? die(); ?>
<? } ?>
<? IncludeTemplateLangFile(__FILE__); ?>
<?// debugg($arResult); ?>
<?// debugg($arParams); ?>

<div class="ved-consult">
    <div class="ved-consult--text">
        <h3 class="v21-h2 ved-consult--text_title">
            <?=GetMessage("WEBTU_FEEDBACK_2_HEADER")?>
        </h3>
        <ul class="ved-consult--box">
            <li>Консультирование по вопросам валютного законодательства</li>
            <li>Консультации в области внешнеэкономической деятельности предприятий и организаций</li>
            <li>Консультации по проведению сложных форм платежей согласно международной практике</li>
            <li>Консультации и помощь по заполнению документов по валютному регулированию и контролю</li>
        </ul>

    </div>
    <div class="ved-consult--form">
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">

            <input type="hidden" name="FORM_ID" value="<?=$arResult['FORM_ID']?>">
            <input type="hidden" name="SESSION_ID" value="<?=bitrix_sessid()?>">
            <input type="hidden" name="FOLDER" value="<?=$APPLICATION->GetTitle()?>">

            <div class="ved-consult--form_content">

                <? if (!empty($arResult['ERRORS'])) { ?>
                    <? foreach ($arResult['ERRORS'] as $error) { ?>
                        <div class="alert alert-danger">
                            <?=$error?>
                        </div>
                    <? } ?>
                <? } ?>

                <? if (!empty($arResult['SUCCESS'])) { ?>
                    <? foreach ($arResult['SUCCESS'] as $success) { ?>
                        <div class="alert alert-success">
                            <?=$success?>
                        </div>
                    <? } ?>
                <? } ?>

                <label class="ved-consult--form_input-group">
                    <span class="caption">
                        <span class="aligner">
                            <?=GetMessage("WEBTU_FEEDBACK_2_NAME")?>
                        </span>
                    </span>
                    <span class="content">
                        <input type="text" name="NAME" class="input-field" required
                            <? if (isset($arResult['POST']['NAME'])) { ?> value="<?=$arResult['POST']['NAME']?>" <? } ?>
                        >
                    </span>
                </label>

                <label class="ved-consult--form_input-group">
                    <span class="caption">
                        <span class="aligner">
                            <?=GetMessage("WEBTU_FEEDBACK_2_PHONE")?>
                        </span>
                    </span>
                    <span class="content">
                        <input type="tel" name="PHONE" data-mask="phone" class="input-field" required placeholder="+7 (___) ___-__-__"
                            <? if (isset($arResult['POST']['PHONE'])) { ?> value="<?=$arResult['POST']['PHONE']?>" <? } ?>
                        >
                    </span>
                </label>

                <?
                $politics = GetMessage("WEBTU_FEEDBACK_2_POLITICS");
                $politics_1 = "<a href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank' class='v21-link'><span class='v21-link__text'>" . GetMessage("WEBTU_FEEDBACK_2_POLITICS_1") . "</span></a>";
                $politics_2 = "<a href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank' class='v21-link'><span class='v21-link__text'>" . GetMessage("WEBTU_FEEDBACK_2_POLITICS_2") . "</span></a>";
                $politics_output = sprintf($politics, $politics_1, $politics_2);
                ?>

                <?/*?>
                <label class="ved-consult--form_agreement check-box">
                    <input type="checkbox" name="" checked required="">
                    <span class="check-box_caption"><?=$politics_output?></span>
                </label>
                <?*/?>

                <!--div class="v21-checkbox"-->
                    <label class="v21-checkbox__content ved-consult--form_agreement">
                        <input type="checkbox" checked name="" class="v21-checkbox__input">
                        <span class="check-box_captionn v21-checkbox__text"><?= $politics_output ?></span>
                        <span class="v21-checkbox__warn">Для подачи заявки необходимо подтвердить свое ознакомление и соглашение с правилами</span><?// не работает?>
                    </label>
                <!--/div-->

                <div class="ved-consult--form_captcha">
                    <div class="captcha_image">
                        <input type="hidden" id="captchaSidVEDConsult" name="CAPTCHA_ID" value="<?=$arResult['CAPTCHA']?>" />
                        <img id="captchaImgVEDConsult" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult['CAPTCHA']?>" alt="">
                    </div>
                    <a id="reloadCaptcha" title="Обновить капчу"></a>

                    <div class="captcha_input">
                        <input type="text" name="CAPTCHA_WORD" placeholder="<?=GetMessage('WEBTU_FEEDBACK_CAPTCHA')?>" class="input-field">
                        <span class="v21-input-group__warn">Неверно введен код с картинки</span>
                    </div>
                </div>

                <button class="v21-ved-contracts__button v21-button ved-consult--form_button" name="WEBTU_FEEDBACK">
                    <?=GetMessage("WEBTU_FEEDBACK_2_BUTTON")?>
                </button>

            </div>
        </form>

    </div>
</div>


<script type="text/javascript">
   $(document).ready(function(){
      $('#reloadCaptcha').click(function(){
        $.getJSON('/local/components/webtu/feedback/reload_captcha.php', function(data) {
            $('#captchaImgVEDConsult').attr('src','/bitrix/tools/captcha.php?captcha_sid='+data);
            $('#captchaSidVEDConsult').val(data);
        });
        return false;
      });
   });
</script>

<script>
    $('input[data-mask="phone"]').mask('+7 (999) 999-99-99');

    function clearFields () {
        $('textarea').val('').css('box-shadow', 'none');
        $('input:not([type="hidden"])').val('').css('box-shadow', 'none');
        $('textarea').focusout(function () {   
            $(this).css('box-shadow', '');
        });
        $('input').focusout(function () {
            $(this).css('box-shadow', '');
        });
    }

    if ($('.alert-success').length > 0) {
        clearFields ();
    }

    $('.feedback_form .button').click(function () {
        $(".alert").remove();
    });

    $('.agreement input[required]').change(function () {
        if ( $(this).is(':checked') ) {
            $(this).closest('.agreement').css('box-shadow', '');
        } else {
            $(this).closest('.agreement').css('box-shadow', '0 0 2px 1px red');
        }
    });
</script>