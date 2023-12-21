<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { ?>
    <? die(); ?>
<? } ?>
<? IncludeTemplateLangFile(__FILE__); ?>
<?
//debugg('$_POST');
//debugg($_POST);
//debugg($arResult["ERRORS"]);
//debugg($arResult);
    if (!empty($_POST["AGREE"])) {
        $showResp = trim(htmlspecialchars($_POST["AGREE"]));
    }
    //debugg(COption::GetOptionString("main", "email_from"));
?>

<!--div class="v21-container"-->
    <?//debugg($arResult);?>
    <div class="form-block">
        <?//debugg($arParams);?>
        <?/*?>
        <div class="form-block--left">
            <div class="form-block--triags">
            </div>
            <div class="form-block--image">
                <img src="/images/big_airplane.png">
            </div>
            <p class="form-block--thank">Спасибо <i>за&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;обращение</i></p>
        </div>
        <?*/?>
        <div class="form-block--right">
            <?/*?><form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="v21-card-application--form" id="fMirCreditCardForm"><?*/?>
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="v21-tariff-agree--form" id="applicationForm">
                <input type="hidden" name="FORM_ID" value="<?=$arResult['FORM_ID']?>">
                <input type="hidden" name="SESSION_ID" value="<?=bitrix_sessid()?>">
                <?
                if (isset($_POST['CREDIT_NAME'])) { $creditName = $_POST['CREDIT_NAME']; } else { $creditName = 'MIR'; }
                ?>
                <??><input type="hidden" name="PARAMS" value='<?= json_encode($arParams) ?>'><??>
                <??><input type="hidden" id="PROPERTIES" name="PROPERTIES" value='<?= json_encode($arParams["PROPERTIES"]) ?>'><??>
                <input type="hidden" name="REQ_URI" value="<?= $_SERVER['REQUEST_URI'] ?>">
                <input type="hidden" name="FOLDER" value="<?= $APPLICATION->GetTitle() ?>">

                <div class="v21-tariff-agree--content">
                    <h2 class="v21-tariff-agree--header"><?=GetMessage("WEBTU_FEEDBACK_3_HEADER")?></h2>

                    <?/* if (!empty($arResult['ERRORS'])) { ?>
                        <? foreach ($arResult['ERRORS'] as $error) { ?>
                            <div class="alert alert-danger"><?=$error?></div>
                        <? } ?>
                    <? } */?>

                    <?/* if (!empty($arResult['SUCCESS'])) { ?>
                        <? foreach ($arResult['SUCCESS'] as $success) { ?>
                            <div class="alert alert-success"><?=$success?></div>
                        <? } ?>
                    <? } */?>

                    <div class="v21-tariff-agree--form__section v21-tariff-agree--form__radio-operation">
                        <ul class="grid__item-1 calculator-operation--wrap">
                            <li class="calculator-operation--agree js-calculator-operation--agree">
                                <label class="calculator-operation--radio">
                                    <input type="radio" name="AGREE" value="принимаю" class="operation-box--word operation-box--word__active" checked hidden>
                                    <span>Принимаю</span>
                                </label>
                            </li>
                            <li class="calculator-operation--disagree js-calculator-operation--disagree">
                                <label class="calculator-operation--radio">
                                    <input type="radio" name="AGREE" value="не принимаю" class="operation-box--word operation-box--word__active" hidden>
                                    <span>Не принимаю</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="v21-tariff-agree--form__special <?= ($showResp === 'не принимаю')? 'v21-tariff-agree--form__special_show' : '' ?>">
                        <p>Для подтверждения отказа от обслуживания по  новым условиям с вами свяжется наш специалист.</p>
                    </div>

                    <div class="v21-tariff-agree--form__section">
                        <div class="grid__item-1">
                            <label class="input-group">
                                <?/*?><span class="input-group__label"><?=GetMessage("WEBTU_FEEDBACK_3_NAME")?></span><?*/?>
                                <input type="text" name="NAME" placeholder="ФИО" class="input-group__field"
                                    <? if (isset($arResult['POST']['NAME'])) { ?> value="<?=$arResult['POST']['NAME']?>" <? } ?>
                                >
                                <span class="input-group__label"><?=GetMessage("WEBTU_FEEDBACK_3_NAME")?></span>
                                <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                            </label>
                        </div>
                    </div>

                    <?/*?>
                    <div class="v21-tariff-agree--form__section">
                        <div class="grid__item-1">
                            <div class="input-group">
                                <??><? CModule::IncludeModule('iblock'); ?>
                                <? $cities = CIblockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 114)); ?>
                                <select name="CITY" class="input-group__field select_field">
                                    <? while ($city = $cities->Fetch()) : ?>
                                        <option value="<?= $city['NAME'] ?>">
                                            <?= $city['NAME'] ?>
                                        </option>
                                    <? endwhile; ?>
                                </select>
                                <span class="input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_CITY") ?></span>
                            </div>
                        </div>
                    </div>
                    <?*/?>

                    <div class="v21-tariff-agree--form__section">
                        <div class="grid__item-1">
                            <label class="input-group">
                                <?/*?><span class="input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_PHONE") ?></span><?*/?>
                                <?/*?><input type="tel" name="PHONE" placeholder="" data-inputmask="'mask': '+7 999 999 99 99'" class="input-group__field" required
                                    <? if (isset($arResult['POST']['PHONE'])) { ?> value="<?=$arResult['POST']['PHONE']?>" <? } ?>
                                ><?*/?>
                                <input type="tel" name="PHONE" placeholder="+7 ___ ___ __ __" data-inputmask="'mask': '+7 999 999 99 99'" class="input-group__field"
                                    <? if (isset($arResult['POST']['PHONE'])) { ?> value="<?=$arResult['POST']['PHONE']?>" <? } ?>
                                >
                                <span class="input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_PHONE") ?></span>
                                <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                                <?/*?><span class="v21-input-group__note"><?= GetMessage("WEBTU_FEEDBACK_3_PHONE_LINE") ?></span><?*/?>
                            </label>
                        </div>

                        <?/*?>
                        <div class="grid__item-2">
                            <label class="input-group">
                                <input type="email" name="EMAIL" placeholder="email@mail.com" class="input-group__field" required
                                    <? if (isset($arResult['POST']['EMAIL'])) { ?> value="<?=$arResult['POST']['EMAIL']?>" <? } ?>
                                >
                                <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                                <span class="input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_EMAIL") ?></span>
                            </label>
                        </div>
                        <?*/?>
                    </div>

                    <div class="v21-tariff-agree--form__section v21-tariff-agree--form__captcha">
                        <?
                        $politics = GetMessage("WEBTU_FEEDBACK_3_POLITICS");
                        $politics_1 = "<a href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank' class='v21-link'><span>" .GetMessage("WEBTU_FEEDBACK_3_POLITICS_1"). "</span></a>";
                        $politics_2 = "<a href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank' class='v21-link'><span>" .GetMessage("WEBTU_FEEDBACK_3_POLITICS_2"). "</span></a>";
                        $politics_output = sprintf($politics, $politics_1, $politics_2);
                        ?>

                        <div class="grid__item-1">
                            <div class="v21-checkbox">
                                <label class="v21-checkbox__content">
                                    <!--input type="checkbox" checked name="" class="v21-checkbox__input" id="politics"-->
                                    <input type="checkbox" name="" class="v21-checkbox__input" id="politics">
                                    <div class="v21-checkbox__text"><?= $politics_output ?></div>
                                </label>
                                <span class="v21-checkbox__warn">Для отправки сообщения необходимо подтвердить свое ознакомление и соглашение с правилами</span>
                                <?/*?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M4.35462 8.83905L9.85267 2.93903C9.94763 2.8316 10 2.6933 10 2.55005C10 2.4068 9.94763 2.26846 9.85267 2.16104C9.8081 2.11044 9.75321 2.06988 9.6917 2.04211C9.63019 2.01434 9.56345 2 9.49594 2C9.42842 2 9.36168 2.01434 9.30017 2.04211C9.23866 2.06988 9.18378 2.11044 9.1392 2.16104L4.00291 7.67303L0.861593 4.16403C0.816839 4.11355 0.76184 4.07313 0.700259 4.04544C0.638677 4.01776 0.571911 4.00345 0.50437 4.00345C0.436829 4.00345 0.370062 4.01776 0.308481 4.04544C0.246899 4.07313 0.191901 4.11355 0.147146 4.16403C0.0523127 4.27171 0 4.41017 0 4.55353C0 4.69689 0.0523127 4.83537 0.147146 4.94305L3.64519 8.84305C3.69037 8.89218 3.74535 8.93132 3.80659 8.95798C3.86783 8.98464 3.93395 8.99821 4.00076 8.99783C4.06758 8.99746 4.13358 8.98316 4.19451 8.95581C4.25545 8.92846 4.31001 8.88869 4.35462 8.83905Z" fill="#FFFFFF"/>
                                    </svg>
                                <?*/?>
                            </div>
                        </div>

                        <div class="grid__item-captcha">
                            <div class="grid__item-2">
                                <div class="captcha_image">
                                    <input type="hidden" id="captchaSid" name="CAPTCHA_ID" value="<?= $arResult['CAPTCHA'] ?>" />
                                    <img id="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult['CAPTCHA'] ?>" alt="капча">
                                </div>

                                <a id="reloadCaptcha" title="Обновить капчу"></a>
                            </div>

                            <div class="grid__item-2">
                                <?/*?><div class="captcha_input v21-input-group"><?*/?>
                                <div class="v21-input-group">
                                    <input type="text" name="CAPTCHA_WORD" placeholder="<?= GetMessage('WEBTU_FEEDBACK_CAPTCHA') ?>" class="input-group__field input-captcha" id="CAPTCHA_WORD">
                                    <span class="v21-input-group__warn">Неверно введен код с картинки</span>
                                    <?/* if (in_array("Неверно введен код с картинки", $arResult['ERRORS'])) : ?>
                                        <span class="v21-input-group__warn" style="display: block;">Неверно введен код с картинки</span>
                                    <? endif; */?>
                                    <!--span class="v21-input-group__warn">Обязательное поле к заполнению</span-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="v21-tariff-agree--form__section">
                        <div class="grid__item-1">
                            <button class="grid__item-button" name="WEBTU_FEEDBACK">
                                <?= GetMessage("WEBTU_FEEDBACK_3_BUTTON") ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 15 15" fill="none">
                                    <path d="M14.7307 1.51639C14.7307 0.964101 14.283 0.516386 13.7307 0.516386L4.73068 0.516387C4.1784 0.516386 3.73068 0.964102 3.73068 1.51639C3.73068 2.06867 4.1784 2.51639 4.73068 2.51639L12.7307 2.51639L12.7307 10.5164C12.7307 11.0687 13.1784 11.5164 13.7307 11.5164C14.283 11.5164 14.7307 11.0687 14.7307 10.5164L14.7307 1.51639ZM1.70711 14.9542L14.4378 2.22349L13.0236 0.80928L0.292893 13.54L1.70711 14.9542Z" fill="white"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <?/* if (!empty($arResult['SUCCESS'])) {
                        LocalRedirect('/thanks/');
                    } */?>

                </div>
            </form>
        </div>
    </div>

<!--/div-->

    <?/*?>
    <div data-overlay="v21_overlay" class="v21-modal v21-fade js-v21-modal" id="v21_alert_fNewTariffsForm">
        <div class="v21-modal__window js-v21-modal-window">
            <a href="#v21_alert_fNewTariffsForm" class="v21-modal__close js-v21-modal-toggle">
                <svg width="24" height="24">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#close"></use>
                </svg>
            </a>
        </div>
    </div>
    <?*/?>

<script type="text/javascript">
    $(document).ready(function() {
        function changeColors(scrollTop) {
            let opacityLevel = 1;
            let param1;  // rgba(21,24,45,1);
            let param2;  // rgba(0,52,94,1);
            const inversionOffset = 100; // метка первой смены цвета, привязана к блоку - не нужна
            const opacityOffset = 0; // метка отмены смены цвета, привязана к блоку - не нужна
            const classOffset = 150; // не нужна
            const windowInnerWidth = window.innerWidth;
            let formBlockTop = $('.v21-tariff-agree--form').offset().top;
            let fixLevel1 = formBlockTop - windowInnerWidth * .35; // уровень первого переключения
            let fixLevel2 = formBlockTop + $('.v21-tariff-agree--form').height() * .6 - opacityOffset; // уровень второго переключения
            let fixLevel3 = formBlockTop - inversionOffset + classOffset; // не нужен
            let fixLevel = (fixLevel1 - scrollTop) / opacityOffset; // диапазон смены прозрачности - не нужен
            //console.log('scrollTop=' + scrollTop);
            //console.log('formBlockTop=' + formBlockTop);
            //console.log('fixLevel1=' + fixLevel1);
            //console.log('fixLevel2=' + fixLevel2);
            //console.log('windowInnerWidth=' + windowInnerWidth);

            if(scrollTop > fixLevel2) {
                //console.log('scrollTop=' + scrollTop);
                /*if(fixLevel < 0) {
                    opacityLevel = 1;
                } else if(fixLevel >= 1) {
                    opacityLevel = 0;
                } else {
                    opacityLevel = 1 - fixLevel;
                }*/
                param1 = "rgba("+21+","+24+","+45+","+opacityLevel+")"; // не нужен
                param2 = "rgba("+0+","+52+","+94+","+opacityLevel+")";  // не нужен
                //$('.v21-card-application').css('background', 'linear-gradient(106.11deg, '+param1+' 27.82%, '+param2+' 100%)');
                $('.tariff-page__background-blue').css('opacity', '0');
                $('.tariff-listing').addClass('js-initial-switch');
                $('.tariff-listing').removeClass('js-color-switch');
                $('.v21 .v21-tariff-agree').removeClass('js-color-switch');
                $('.v21 .v21-footer').removeClass('js-color-switch');
            } else if(scrollTop > fixLevel1) {
                $('.tariff-page__background-blue').css('opacity', '1');
                $('.tariff-listing').removeClass('js-initial-switch');
                $('.tariff-listing').addClass('js-color-switch');
                $('.v21 .v21-tariff-agree').addClass('js-color-switch');
                $('.v21 .v21-footer').addClass('js-color-switch');
            } else {
                param1 = "rgba("+21+","+24+","+45+",1)";
                param2 = "rgba("+0+","+52+","+94+",1)";
                //$('.v21-card-application').css('background', 'linear-gradient(106.11deg, '+param1+' 27.82%, '+param2+' 100%)');
                $('.tariff-page__background-blue').css('opacity', '0');
                $('.tariff-listing').addClass('js-initial-switch');
                $('.tariff-listing').removeClass('js-color-switch');
                $('.v21 .v21-tariff-agree').removeClass('js-color-switch');
                $('.v21 .v21-footer').removeClass('js-color-switch');
            }

        }
        changeColors($(window).scrollTop());

        $(window).on('scroll',function(){
            let $window = $(window);
            let scrollTop = $window.scrollTop();
            //console.log('scrollTop='+scrollTop);

            changeColors(scrollTop);
        });

        $('#reloadCaptcha').click(function() {
            $.getJSON('/local/components/webtu/feedback/reload_captcha.php', function(data) {
                $('#captchaImg').attr('src','/bitrix/tools/captcha.php?captcha_sid=' + data);
                $('#captchaSid').val(data);
            });
            return false;
        });

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

        //$('input[name="EMAIL"]').on('focusout', function () {
        //    requiredContacts ();
        //});

        //$('input[name="PHONE"]').on('focusout', function () {
        //    requiredContacts ();
        //});

        function requiredContacts () {
            if ($('input[name="NAME"]').val() !== '') {
                //$('input[name="EMAIL"]').attr('required', true);
                $('input[name="PHONE"]').attr('required', false);
            } else {
                $('input[name="PHONE"]').attr('required', true);
                //$('input[name="EMAIL"]').attr('required', false);
            }
        }

        $('.agreement input[required]').change(function () {
            if ( $(this).is(':checked') ) {
                $(this).closest('.agreement').css('box-shadow', '');
            } else {
                $(this).closest('.agreement').css('box-shadow', '0 0 2px 1px red');
            }
        });

        $('.js-calculator-operation--disagree').click(function () {
            $('.v21-tariff-agree--content').addClass('v21-tariff-agree--form__disagree');
        });
        $('.js-calculator-operation--agree').click(function () {
            $('.v21-tariff-agree--content').removeClass('v21-tariff-agree--form__disagree');
        });

        if ($('.alert-success').length > 0) {
            clearFields ();
            //document.location.href = "/thanks/";
        }

        $('.feedback_form .button').click(function () {
            $(".alert").remove();
        });

        function requiredFields() {
            var arFields = [
                'input[name="NAME"]',
                'input[name="PHONE"]',
                'input[name="CAPTCHA_WORD"]',
                //'input[name="EMAIL"]',
            ];

            var countErr = 0;

            arFields.forEach(function (value) {
                if ($(value).val() == '') {
                    $(value).parent().addClass("is-error");
                    countErr++;
                } else {
                    $(value).parent().removeClass("is-error");
                }
            });

            return (countErr > 0) ? false : true;
        }

        function makeDataLayer(id, ar_product) {
            window.dataLayer.push({
                "ecommerce": {
                    "currencyCode": "RUB",
                    "purchase": {
                        "actionField": {
                            "id" : id
                        },
                        "products": ar_product,
                    }
                }
            });
        }

        function makeArProduct(data) {
            let pos = 0;
            let ar_product = [];
            let entry = {
                'PRODUCT_ID': '<?= $_SERVER['SCRIPT_URL'] ?>',
                'NAME': '<?= $_SERVER['SCRIPT_URL'] ?>',
                'PRICE': 1,
                'DETAIL_PAGE_URL': '<?= $_SERVER['REQUEST_URI'] ?>',
                'QUANTITY': 1,
                'XML_ID': 'xml'
            };

            ar_product.push(
                {
                    "id": 'AGREE',
                    "name": data.AGREE,
                    "price": entry.PRICE,
                    "category": entry.DETAIL_PAGE_URL,
                    "quantity": entry.QUANTITY,
                    "position": pos++,
                    "xml": entry.XML_ID,
                },
            );
            ar_product.push(
                {
                    "id": 'REQ_URI',
                    "name": data.REQ_URI,
                    "price": entry.PRICE,
                    "category": entry.DETAIL_PAGE_URL,
                    "quantity": entry.QUANTITY,
                    "position": pos++,
                    "xml": entry.XML_ID,
                },
            );
            ar_product.push(
                {
                    "id": 'UTM_CAMPAIGN',
                    "name": data.UTM_CAMPAIGN,
                    "price": entry.PRICE,
                    "category": entry.DETAIL_PAGE_URL,
                    "quantity": entry.QUANTITY,
                    "position": pos++,
                    "xml": entry.XML_ID,
                },
            );
            ar_product.push(
                {
                    "id": 'UTM_CONTENT',
                    "name": data.UTM_CONTENT,
                    "price": entry.PRICE,
                    "category": entry.DETAIL_PAGE_URL,
                    "quantity": entry.QUANTITY,
                    "position": pos++,
                    "xml": entry.XML_ID,
                },
            );
            ar_product.push(
                {
                    "id": 'UTM_MEDIUM',
                    "name": data.UTM_MEDIUM,
                    "price": entry.PRICE,
                    "category": entry.DETAIL_PAGE_URL,
                    "quantity": entry.QUANTITY,
                    "position": pos++,
                    "xml": entry.XML_ID,
                },
            );
            ar_product.push(
                {
                    "id": 'UTM_SOURCE',
                    "name": data.UTM_SOURCE,
                    "price": entry.PRICE,
                    "category": entry.DETAIL_PAGE_URL,
                    "quantity": entry.QUANTITY,
                    "position": pos++,
                    "xml": entry.XML_ID,
                },
            );
            ar_product.push(
                {
                    "id": 'UTM_TERM',
                    "name": data.UTM_TERM,
                    "price": entry.PRICE,
                    "category": entry.DETAIL_PAGE_URL,
                    "quantity": entry.QUANTITY,
                    "position": pos++,
                    "xml": entry.XML_ID,
                },
            );

            return ar_product;
        }

        $('#applicationForm').submit(function (e) {
            e.preventDefault();
            console.log('form');
            let ar_product = [];
            //console.log('submit='+$("#politics").prop("checked"));

            if ($("#politics").prop("checked")) {
                $('#politics').parent().parent().removeClass("is-error");
                if (requiredFields()) {
                    $.ajax({
                        type: "POST",
                        //url: '/local/templates/v21_template_home/components/webtu/feedback/accept_new_tariffs/ajax.customer.php',
                        url: '/ajax_scripts/ajax.customer.php',
                        data: {
                            'fields': $(this).serialize(),
                        },
                        dataType: "json",
                        success: function (data) {
                            //$('#reloadCaptcha').click();
                            //console.log(data);
                            if (data.status) {
                                let response = data.message[0];
                                //console.log(response);
                                if(response.type) {
                                    console.log(response.data.APPLICATION_ID);
                                    ar_product = makeArProduct(response.data);
                                    makeDataLayer(response.data.APPLICATION_ID, ar_product);
                                    console.log(window.dataLayer);
                                    //yandexMetrikaForm();
                                }

                                /*if (data.message && data.message.length > 0) {
                                    $(".v21_alert_fNewTariffsForm_item").remove()
                                    $.each(data.message, function (key, field) {
                                        $('#v21_alert_fNewTariffsForm .v21-modal__window').append(
                                            '<div class="v21-grid__item v21_alert_fNewTariffsForm_item" style="font-size: 20px; padding: 0; text-align: center;">' + field.text + '</div>'
                                        );

                                        if (!field.type) {
                                            $('.v21_alert_fNewTariffsForm_item').css("color", "red");
                                        }
                                    });
                                }*/
                                //$("#fNewTariffsForm")[0].reset();
                                clearFields ();
                                $('input[name="CAPTCHA_WORD"]').parent().removeClass("is-error");
                                document.location.href = "/thanks/";
                            }  else {
                                console.log('not OK');
                                if (!data.captcha){
                                    $('input[name="CAPTCHA_WORD"]').parent().addClass("is-error");
                                } else {
                                    $('input[name="CAPTCHA_WORD"]').parent().removeClass("is-error");
                                    //tsb21.modal.toggleModal('v21_alert_fNewTariffsForm');
                                }
                            }
                        }
                    });
                }
            } else {
                $('#politics').parent().parent().addClass("is-error");
            }
        });
    });
</script>

<? if (isset($_REQUEST['AJAX_CALL'])) { ?>
    <script>
        $('input[data-mask="phone"]').mask('+7 999 9999999');

        $('.select-box select').customSelect({
            speed: 360
        });
    </script>
<? } ?>