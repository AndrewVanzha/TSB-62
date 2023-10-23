<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { ?>
    <? die(); ?>
<? } ?>
<? IncludeTemplateLangFile(__FILE__); ?>

<div class="v21-credit-application--top">
    <div class="v21-credit-application--bg"></div>
</div>

<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="v21-credit-application--form" id="fBusinessCreditForm">
    <input type="hidden" name="FORM_ID" value="<?=$arResult['FORM_ID']?>">
    <input type="hidden" name="SESSION_ID" value="<?=bitrix_sessid()?>">
    <?
    if (isset($_POST['CREDIT_NAME'])) { $creditName = $_POST['CREDIT_NAME']; } else { $creditName = ''; }
    ?>
    <input type="hidden" name="CREDIT_NAME" id="credit_name" value="<?=$creditName?>">
    <input type="hidden" name="CREDIT_CURRENCY" value="RUB">
    <input type="hidden" name="PARAMS" value='<?= json_encode($arParams) ?>'>
    <input type="hidden" id="PROPERTIES" name="PROPERTIES" value='<?= json_encode($arParams["PROPERTIES"]) ?>'>
    <input type="hidden" name="REQ_URI" value="<?= $_SERVER['REQUEST_URI'] ?>">
    <input type="hidden" name="FOLDER" value="<?= $APPLICATION->GetTitle() ?>">

    <div class="v21-credit-application--content">
        <h2 class="v21-h2 v21-credit-application--header">
            <?=GetMessage("WEBTU_FEEDBACK_3_HEADER")?>
        </h2>

        <?/* if (!empty($arResult['ERRORS'])) { ?>
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
        <? } */?>

        <?/*?>
        <div class="v21-credit-application--form__section">
            <div class="v21-grid__item-1 v21-grid__item--1x3@lg">
                <label class="v21-input-group">
                    <span class="v21-input-group__biglabel"><?=GetMessage("WEBTU_FEEDBACK_3_ORGANIZATION")?></span>
                    <input type="text" name="ORGANIZATION" placeholder="ИП/ЮЛ" class="v21-input-group__field v21-field" required
                            <? if (isset($arResult['POST']['ORGANIZATION'])) { ?> value="<?=$arResult['POST']['ORGANIZATION']?>" <? } ?>
                        >
                    <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                </label>
            </div>

            <div class="v21-grid__item-2 v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                <label class="v21-input-group">
                    <span class="v21-input-group__biglabel"><?=GetMessage("WEBTU_FEEDBACK_3_CREDIT_SUMM")?></span>
                    <input type="text" name="CREDIT_SUMM" placeholder="10 000 000" class="v21-input-group__field v21-field" required
                        <? if (isset($arResult['POST']['CREDIT_SUMM'])) { ?> value="<?=$arResult['POST']['CREDIT_SUMM']?>" <? } ?>
                    >
                    <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                    <span class="v21-input-group__add">RUB</span>
                </label>
            </div>
        </div>
        <?*/?>

        <div class="v21-grid__item-3">
            <div class="v21-grid">
                <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                    <label class="v21-input-group">
                        <span class="v21-input-group__biglabel"><?=GetMessage("WEBTU_FEEDBACK_3_ORGANIZATION")?></span>
                        <input type="text" name="ORGANIZATION" placeholder="ИП/ЮЛ" class="v21-input-group__field v21-field"
                            <? if (isset($arResult['POST']['ORGANIZATION'])) { ?> value="<?=$arResult['POST']['ORGANIZATION']?>" <? } ?>
                        >
                        <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                    </label>
                </div>

                <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                    <label class="v21-input-group">
                        <span class="v21-input-group__biglabel"><?=GetMessage("WEBTU_FEEDBACK_3_CREDIT_SUMM")?></span>
                        <input type="text" name="CREDIT_SUMM" placeholder="10 000 000" class="v21-input-group__field v21-field"
                            <? if (isset($arResult['POST']['CREDIT_SUMM'])) { ?> value="<?=$arResult['POST']['CREDIT_SUMM']?>" <? } ?>
                        >
                        <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        <span class="v21-input-group__add">RUB</span>
                    </label>
                </div>

                <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                    <label class="v21-input-group">
                        <span class="v21-input-group__biglabel">Откуда Вы узнали о нас</span>
                        <input type="text" name="FROM_WHERE" placeholder=""
                            class="v21-input-group__field v21-field"
                            <? if (isset($arResult['POST']['FROM_WHERE'])) { ?> value="<?=$arResult['POST']['FROM_WHERE']?>" <? } ?>
                        >
                        <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="v21-grid__item-3">
            <h3 class="v21-input-group__biglabel">Контактные данные</h3>
            <div class="v21-grid">
                <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                    <label class="v21-input-group">
                        <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_NAME") ?></span>
                        <input type="text" name="NAME" placeholder="ФИО" class="v21-input-group__field v21-field"
                            <? if (isset($arResult['POST']['NAME'])) { ?> value="<?=$arResult['POST']['NAME']?>" <? } ?>>
                        <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                    </label>
                </div>

                <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                    <label class="v21-input-group">
                        <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_PHONE") ?></span>
                        <input type="tel" name="PHONE" placeholder="+7 ___ _______" data-inputmask="'mask': '+7 999 9999999'" class="v21-input-group__field v21-field"
                            <? if (isset($arResult['POST']['PHONE'])) { ?> value="<?=$arResult['POST']['PHONE']?>" <? } ?>
                        >
                        <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        <span class="v21-input-group__note"><?= GetMessage("WEBTU_FEEDBACK_3_PHONE_LINE") ?></span>
                    </label>
                </div>

                <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                    <label class="v21-input-group">
                        <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_EMAIL") ?></span>
                        <input type="email" name="EMAIL" placeholder="email@mail.com" class="v21-input-group__field v21-field"
                            <? if (isset($arResult['POST']['EMAIL'])) { ?> value="<?=$arResult['POST']['EMAIL']?>" <? } ?>
                        >
                        <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        <span class="v21-input-group__note"><?= GetMessage("WEBTU_FEEDBACK_3_EMAIL_LINE") ?></span>
                    </label>
                </div>
            </div>
        </div>

        <?/*?>
        <label class="popup-form_input-group double-offset clearfix">
            <span class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_3_PHONE")?>
                </span>
            </span>
            <span class="content">
                <input type="tel" name="PHONE" data-mask="phone" class="input-field" required="" placeholder="+7 (___) ___-__-__"
                    <? if (isset($arResult['POST']['PHONE'])) { ?> value="<?=$arResult['POST']['PHONE']?>" <? } ?>
                >
                <span class="note">
                    <?=GetMessage("WEBTU_FEEDBACK_3_PHONE_LINE")?>
                </span>
            </span>
        </label>

        <label class="popup-form_input-group double-offset clearfix">
            <span class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_3_EMAIL")?>
                </span>
            </span>
            <span class="content">
                <input type="email" name="EMAIL" class="input-field" placeholder="example@site.ru"
                    <? if (isset($arResult['POST']['EMAIL'])) { ?> value="<?=$arResult['POST']['EMAIL']?>" <? } ?>
                >
                <span class="note">
                    <?=GetMessage("WEBTU_FEEDBACK_3_EMAIL_LINE")?>
                </span>
            </span>
        </label>

        <div class="popup-form_input-group clearfix">
            <div class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_3_CREDIT_SUMM")?>
                </span>
            </div>
            <div class="content">
                <div class="currency clearfix">
                    <input type="text" name="CREDIT_SUMM" class="input-field" id="CREDIT_SU" required=""
                        <? if (isset($arResult['POST']['CREDIT_SUMM'])) { ?> value="<?=$arResult['POST']['CREDIT_SUMM']?>" <? } else { ?> value="" <? } ?>
                    >
                    <div class="select-box">
                        <select name="CREDIT_CURRENCY">
                            <option value="RUB"
                                <? if ($arResult['POST']['CREDIT_CURRENCY'] == "RUB") { ?>selected<? } ?>
                            >
                                <?=GetMessage("WEBTU_FEEDBACK_3_CURRENCY_RUB")?>
                            </option>

                            <option value="EUR" 
                                <? if ($arResult['POST']['CREDIT_CURRENCY'] == "EUR") { ?>selected<? } ?>
                            >
                                <?=GetMessage("WEBTU_FEEDBACK_3_CURRENCY_EUR")?>
                            </option>

                            <option value="USD"
                                <? if ($arResult['POST']['CREDIT_CURRENCY'] == "USD") { ?>selected<? } ?>
                            >
                                <?=GetMessage("WEBTU_FEEDBACK_3_CURRENCY_USD")?>
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <?*/?>

        <div class="v21-credit-application--form__section">
            <div class="v21-grid">
                <div class="v21-grid__item v21-grid__item--2x3@lg">
                    <div class="captcha_image">
                        <input type="hidden" id="captchaSid" name="CAPTCHA_ID" value="<?= $arResult['CAPTCHA'] ?>" />
                        <img id="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult['CAPTCHA'] ?>" alt="капча">
                    </div>

                    <a id="reloadCaptcha" title="Обновить капчу"></a>

                    <div class="captcha_input v21-input-group">
                        <input type="text" name="CAPTCHA_WORD" placeholder="<?= GetMessage('WEBTU_FEEDBACK_CAPTCHA') ?>" class="v21-input-group__field v21-field v21-input-captcha" id="CAPTCHA_WORD">
                    </div>
                    <span class="v21-input-group__warn">Неверно введен код с картинки</span>
                </div><!-- /.v21-grid__item -->

                <?
                $politics = GetMessage("WEBTU_FEEDBACK_3_POLITICS");
                $politics_1 = "<a href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank' class='v21-link'><span class='v21-link__text'>" .GetMessage("WEBTU_FEEDBACK_3_POLITICS_1"). "</span></a>";
                $politics_2 = "<a href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank' class='v21-link'><span class='v21-link__text'>" .GetMessage("WEBTU_FEEDBACK_3_POLITICS_2"). "</span></a>";
                $politics_output = sprintf($politics, $politics_1, $politics_2);
                ?>

                <div class="v21-grid__item">
                    <div class="v21-checkbox">
                        <label class="v21-checkbox__content">
                            <?/*?><input type="checkbox" checked name="" class="v21-checkbox__input" id="politics2"><?*/?>
                            <input type="checkbox" name="" class="v21-checkbox__input" id="politics2">
                            <span class="v21-checkbox__text"><?= $politics_output ?></span>
                        </label>
                        <span class="v21-checkbox__warn">Для подачи заявки необходимо подтвердить свое ознакомление и соглашение с правилами</span>
                    </div><!-- /.v21-checkbox -->
                </div><!-- /.v21-grid__item -->

                <?/*?>
                <div class="v21-grid__item">
                    <label class="agreement check-box">
                        <input type="checkbox" name="" checked required="">
                        <span class="check-box_caption"><?=$politics_output?></span>
                    </label>
                </div>
                <?*/?>

                        <?/*?>
                <div class="captcha clearfix">

                    <div class="captcha_image">
                        <input type="hidden" id="captchaSid" name="CAPTCHA_ID" value="<?=$arResult['CAPTCHA']?>" />
                        <img id="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult['CAPTCHA']?>" alt="">
                    </div>

                    <a id="reloadCaptcha" title="Обновить капчу"></a>

                    <div class="captcha_input">
                        <input type="text" name="CAPTCHA_WORD" placeholder="<?=GetMessage('WEBTU_FEEDBACK_CAPTCHA')?>" class="input-field">
                    </div>

                </div>
                <?*/?>

                <div class="v21-grid__item">
                    <button class="v21-modal__button v21-button" name="WEBTU_FEEDBACK">
                        <?= GetMessage("WEBTU_FEEDBACK_3_BUTTON") ?>
                    </button>
                </div>
                <?/*?>
                <button class="button" name="WEBTU_FEEDBACK">
                    <?=GetMessage("WEBTU_FEEDBACK_3_BUTTON")?>
                </button>
                <?*/?>

            </div><!-- /.v21-grid -->
        </div><!-- /.v21-curraccount-form__section -->

        <?/* if (!empty($arResult['SUCCESS'])) {
            LocalRedirect('/thanks/');
        } */?>

    </div><!-- v21-credit-application--form__section -->
</form>

<script type="text/javascript">
   $(document).ready(function() {
      $('#reloadCaptcha').click(function() {
        $.getJSON('/local/components/webtu/feedback/reload_captcha.php', function(data) {
            $('#captchaImg').attr('src','/bitrix/tools/captcha.php?captcha_sid=' + data);
            $('#captchaSid').val(data);
        });
        return false;
      });
   });
</script>

<script>
    /*function requiredContacts () {
        if ($('input[name="EMAIL"]').val() !== '') {
            $('input[name="EMAIL"]').attr('required', true);
            $('input[name="PHONE"]').attr('required', false);
        } else {
            $('input[name="PHONE"]').attr('required', true);
            $('input[name="EMAIL"]').attr('required', false);
        }
    }

    $('input[name="EMAIL"]').on('focusout', function () {
        requiredContacts ();
    });

    $('input[name="PHONE"]').on('focusout', function () {
        requiredContacts ();
    });*/

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
        //document.location.href = "/thanks/";
    }

    $('.feedback_form .button').click(function () {
        $(".alert").remove();
    });

    function requiredFields() {
        let arCheckFields = [
            'input[name="ORGANIZATION"]',
            'input[name="CREDIT_SUMM"]',
            'input[name="NAME"]',
            'input[name="PHONE"]',
            'input[name="EMAIL"]',
            'input[name="FROM_WHERE"]',
        ];

        let countErr = 0;

        arCheckFields.forEach(function (value) {
            if ($(value).val() == '') {
                $(value).parent().addClass("is-error");
                countErr += 1;
            } else {
                $(value).parent().removeClass("is-error");
            }
        });
        if($('#politics2').is(':checked')) {
            $('#politics2').parent().parent().removeClass("is-error");
        } else {
            countErr += 1;
            $('#politics2').parent().parent().addClass("is-error");
        }

        return (countErr > 0) ? false : true;
    }

    $('#fBusinessCreditForm').submit(function (e) {
        e.preventDefault();
        //console.log('1');
        //if ($("#politics2").prop("checked")) {
            //$('#politics2').parent().parent().removeClass("is-error");
            //console.log('2');
            if (requiredFields()) {
                //console.log('3');
                $.ajax({
                    type: "POST",
                    url: '/ajax_scripts/ajax.customer.php',
                    data: {
                        'fields': $(this).serialize(),
                    },
                    dataType: "json",
                    success: function (data) {
                        //console.log('**');
                        if (data.status) {
                            clearFields ();
                            $('input[name="CAPTCHA_WORD"]').parent().parent().removeClass("is-error");
                            $('input[name="CAPTCHA_WORD"]').css('border-color', 'rgba(32, 32, 32, 0.12)');
                            document.location.href = "/thanks/";
                        } else {
                            console.log('not OK');
                            if (!data.captcha){
                                $('input[name="CAPTCHA_WORD"]').parent().parent().addClass("is-error");
                                $('input[name="CAPTCHA_WORD"]').css('border-color', '#aa0000');
                            } else {
                                $('input[name="CAPTCHA_WORD"]').parent().parent().removeClass("is-error");
                                $('input[name="CAPTCHA_WORD"]').css('border-color', 'rgba(32, 32, 32, 0.12)');
                            }
                        }
                    }
                });
            }
        //} else {
        //    $('#politics2').parent().parent().addClass("is-error");
        //}
    });

    /*$('.agreement input[required]').change(function () {
        if ( $(this).is(':checked') ) {
            $(this).closest('.agreement').css('box-shadow', '');
        } else {
            $(this).closest('.agreement').css('box-shadow', '0 0 2px 1px red');
        }
    });*/
</script>

<? if (isset($_REQUEST['AJAX_CALL'])) { ?>
    <script>
        $('input[data-mask="phone"]').mask('+7 999 9999999');

        $('.select-box select').customSelect({
            speed: 360
        });
    </script>
<? } ?>