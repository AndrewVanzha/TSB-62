<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { ?>
    <? die(); ?>
<? } ?>
<? IncludeTemplateLangFile(__FILE__); ?>
<?php
$arSections = [];
$ar_filter = Array('IBLOCK_ID'=>217, 'GLOBAL_ACTIVE'=>'Y', 'ACTIVE'=>'Y'); // Страхование физлиц
$ar_select = Array('ID', 'NAME', 'CODE', 'DESCRIPTION');
//$db_list = CIBlockSection::GetList(Array('SORT'=>'ASC'), $ar_filter, true, $ar_select);
//while($ar_result = $db_list->GetNext()) {
//    $arSections[$ar_result['ID']] = $ar_result;
//}
//debugg($arSections);
//unset($arSections);

//$arSections = [];
$rsSection = \Bitrix\Iblock\SectionTable::getList(array(
    'order' => array('LEFT_MARGIN'=>'ASC'),
    'filter' => $ar_filter,
    'select' => $ar_select,
));
while ($ar_section=$rsSection->fetch()) {
    $arSections[] = $ar_section;
}
//debugg($arSections);
?>
<?//debugg($arResult);?>
<div class="form-block">
    <div class="form-block--right">
        <div class="form-block--img">
            <img src="/local/templates/v21_template_home/img/v21_v21-service-form.png" alt="самолетик">
        </div>
        <?/*?><form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="v21-card-application--form" id="fBusinessCreditForm"><?*/?>
        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="card-application--form" id="applicationForm">
            <input type="hidden" name="FORM_ID" value="<?=$arResult['FORM_ID']?>">
            <input type="hidden" name="SESSION_ID" value="<?=bitrix_sessid()?>">
            <input type="hidden" name="PARAMS" value='<?= json_encode($arParams) ?>'>
            <input type="hidden" id="PROPERTIES" name="PROPERTIES" value='<?= json_encode($arParams["PROPERTIES"]) ?>'>
            <input type="hidden" name="REQ_URI" value="<?= $_SERVER['REQUEST_URI'] ?>">
            <input type="hidden" name="FOLDER" value="<?= $APPLICATION->GetTitle() ?>">

            <input type="hidden" name="NAME" value="<?=($arResult['POST']['LAST_NAME'].$arResult['POST']['FIRST_NAME'])?>" id="<?= 'name_'.$arResult['FORM_ID']; ?>">

            <div class="card-application--content">
                <h2 class="v21-h2 card-application--header"><?=GetMessage("WEBTU_FEEDBACK_4_HEADER")?></h2>

                <?/* if (!empty($arResult['ERRORS'])) { ?>
                    <? foreach ($arResult['ERRORS'] as $error) { ?>
                        <div class="alert alert-danger"><?=$error?></div>
                    <? } ?>
                <? } ?>

                <? if (!empty($arResult['SUCCESS'])) { ?>
                    <? foreach ($arResult['SUCCESS'] as $success) { ?>
                        <div class="alert alert-success"><?=$success?></div>
                    <? } ?>
                <? } */?>

                <h3 class="card-application--subheader">Контактные данные</h3>

                <div class="v21-grid grid-bottom">
                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <!-- добавить is-error для выделения при ошибке -->
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_LAST_NAME") ?></span>
                            <input
                                type="text" name="LAST_NAME"
                                placeholder="Пушкин"
                                <??>onchange="javascript:document.getElementById('name_'+'<?=$arResult['FORM_ID']?>').value = this.value;"<??>
                                <? if (isset($arResult['POST']['LAST_NAME'])) { ?> value="<?=$arResult['POST']['LAST_NAME']?>" <? } ?>
                                class="v21-input-group__field v21-field"
                            >
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <!-- добавить is-error для выделения при ошибке -->
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_FIRST_NAME") ?></span>
                            <input
                                type="text" name="FIRST_NAME"
                                placeholder="Александр"
                                <? if (isset($arResult['POST']['FIRST_NAME'])) { ?> value="<?=$arResult['POST']['FIRST_NAME']?>" <? } ?>
                                class="v21-input-group__field v21-field"
                            >
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <!-- добавить is-error для выделения при ошибке -->
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_SECOND_NAME") ?></span>
                            <input
                                type="text" name="SECOND_NAME"
                                placeholder="Сергеевич"
                                <? if (isset($arResult['POST']['SECOND_NAME'])) { ?> value="<?=$arResult['POST']['SECOND_NAME']?>" <? } ?>
                                class="v21-input-group__field v21-field"
                            >
                            <!-- <span class="v21-input-group__warn">Пример сообщения об ошибке</span> -->
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <!-- добавить is-error для выделения при ошибке -->
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_PHONE") ?></span>
                            <input
                                type="tel" name="PHONE"
                                placeholder="+7 ___ ___ __ __"
                                data-inputmask="'mask': '+7 999 999 99 99'"
                                class="v21-input-group__field v21-field"
                                <? if (isset($arResult['POST']['PHONE'])) { ?> value="<?=$arResult['POST']['PHONE']?>" <? } ?>
                            >
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                            <span class="v21-input-group__note"><?= GetMessage("WEBTU_FEEDBACK_4_PHONE_LINE") ?></span>
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <!-- добавить is-error для выделения при ошибке -->
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_EMAIL") ?></span>
                            <input
                                type="email" name="EMAIL"
                                placeholder="email@mail.com"
                                class="v21-input-group__field v21-field"
                                <? if (isset($arResult['POST']['EMAIL'])) { ?> value="<?=$arResult['POST']['EMAIL']?>" <? } ?>
                            >
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                            <span class="v21-input-group__note"><?= GetMessage("WEBTU_FEEDBACK_4_EMAIL_LINE") ?></span>
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <?/*?>
                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group v21-input-group--empty">
                            <!-- добавить is-error для выделения при ошибке -->
                            <span class="v21-input-group__label"></span>
                            <input type="text" name="TRANSLIT" placeholder="" class="v21-input-group__field v21-field" value="empty">
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                            <span class="v21-input-group__note"></span>
                        </label>
                    </div><!-- /.v21-grid__item -->
                    <?*/?>
                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <!-- добавить is-error для выделения при ошибке -->
                            <span class="v21-input-group__label">Откуда Вы узнали о нас</span>
                            <input type="text" name="FROM_WHERE" placeholder=" " class="v21-input-group__field v21-field"
                                <? if (isset($arResult['POST']['FROM_WHERE'])) { ?> value="<?=$arResult['POST']['FROM_WHERE']?>" <? } ?>
                            >
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                            <span class="v21-input-group__note"></span>
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <? CModule::IncludeModule('iblock'); ?>
                        <?//debugg($arResult);?>
                        <div class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_CITY") ?></span>
                            <? $cities = CIblockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 114, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y")); ?>
                            <?/*?><select name="CITY" class="v21-input-group__field v21-select js-v21-select"><?*/?>
                            <select name="CITY" class="v21-input-group__field v21-field jjs-v21-select">
                                <? while ($city = $cities->Fetch()) { ?>
                                    <? if ($city['ID'] != 400) : // Исключаем Санкт-Петербург ?>
                                        <option value="<?= $city['NAME'] ?>" <? if ($arResult['POST']['CITY'] == $city['NAME']) { ?>selected<? } ?> <? if (!isset($arResult['POST']['CITY']) && $city['NAME'] == 'Москва') { ?>selected<? } ?>>
                                            <?= $city['NAME'] ?>
                                        </option>
                                    <? endif; ?>
                                <? } ?>
                            </select>
                        </div>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <!-- добавить is-error для выделения при ошибке -->
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_BIRTHDATE") ?></span>
                            <input
                                type="text" inputmode="numeric"
                                name="BIRTHDATE"
                                data-inputmask="'mask': '99.99.9999'"
                                placeholder="__.__.____"
                                <? if (isset($arResult['POST']['BIRTHDATE'])) { ?> value="<?=$arResult['POST']['BIRTHDATE']?>" <? } ?>
                                class="v21-input-group__field v21-field v21-datepicker js-v21-datepicker"
                            >
                            <!-- <span class="v21-input-group__warn">Пример сообщения об ошибке</span> -->
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@md v21-grid__item--1x3@lg">
                        <div class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_SEX") ?></span>
                            <div class="v21-switch">
                                <input type="radio" name="SEX" id="v21_genderMale" value="Мужской" class="v21-switch__input" <? if (!isset($arResult['POST']['SEX'])) { ?> checked <? } ?> <? if (isset($arResult['POST']['SEX'])) { ?> <? if ($arResult['POST']['SEX'] == 'Мужской') { ?> checked <? } ?> <? } ?>>
                                <label for="v21_genderMale" class="v21-switch__label"><?= GetMessage("WEBTU_FEEDBACK_4_SEX_MALE") ?></label>
                                <input type="radio" name="SEX" id="v21_genderFemale" value="Женский" class="v21-switch__input" <? if (isset($arResult['POST']['SEX'])) { ?> <? if ($arResult['POST']['SEX'] == 'Женский') { ?> checked <? } ?> <? } ?>>
                                <label for="v21_genderFemale" class="v21-switch__label"><?= GetMessage("WEBTU_FEEDBACK_4_SEX_FEMALE") ?></label>
                                <div class="v21-switch__handle"></div>
                            </div>
                        </div>
                    </div><!-- /.v21-grid__item -->
                </div><!-- /.v21-grid -->

                <h3 class="card-application--subheader">Страхование</h3>

                <div class="v21-grid">
                    <div class="v21-grid__item v21-grid__item--2x3@lg select_field">
                        <label class="v21-input-group">
                            <!-- добавить is-error для выделения при ошибке -->
                            <div class="v21-input-group">
                                <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_4_TRANSLIT_DESC") ?></span>
                                <?// $cities = CIblockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 114)); ?>
                                <?/*?><select name="CITY" class="v21-input-group__field v21-select js-v21-select"><?*/?>
                                <select name="TYPE" class="v21-input-group__field v21-field" id="type_select">
                                    <? for ($ii=0; $ii<count($arSections); $ii++) { ?>
                                        <?/*?><option value="<?= $arSections[$ii]['DESCRIPTION'] ?>" <? if ($arResult['GET']['type'] == $arSections[$ii]['CODE']) { ?>selected<? } ?> <? if ($arResult['POST']['TYPE'] == $arSections[$ii]['DESCRIPTION']) { ?>selected<? } ?> <? if (!isset($arResult['POST']['TYPE']) && $arSections[$ii]['DESCRIPTION'] == $arSections[0]['DESCRIPTION']) { ?>selected<? } ?>><?*/?>
                                        <option value="<?= $arSections[$ii]['DESCRIPTION'] ?>" <? if ($arResult['POST']['TYPE'] == $arSections[$ii]['DESCRIPTION']) { ?>selected<? } ?> <? if (!isset($arResult['POST']['TYPE']) && $arSections[$ii]['DESCRIPTION'] == $arSections[0]['DESCRIPTION']) { ?>selected<? } ?>>
                                            <?= $arSections[$ii]['DESCRIPTION'] ?>
                                        </option>
                                    <? } ?>
                                </select>
                            </div>
                            <!-- <span class="v21-input-group__warn">Пример сообщения об ошибке</span> -->
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--2x3@lg">
                        <div class="captcha_image">
                            <input type="hidden" id="captchaSid" name="CAPTCHA_ID" value="<?= $arResult['CAPTCHA'] ?>" />
                            <img id="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult['CAPTCHA'] ?>" alt="">
                        </div>

                        <a id="reloadCaptcha" title="Обновить капчу"></a>

                        <div class="captcha_input v21-input-group">
                            <input type="text" name="CAPTCHA_WORD" placeholder="<?= GetMessage('WEBTU_FEEDBACK_CAPTCHA') ?>" class="v21-input-group__field v21-field" id="CAPTCHA_WORD">
                        </div>
                        <span class="v21-input-group__warn">Неверно введен код с картинки</span>
                    </div>

                    <div class="v21-grid__item">
                        <div class="v21-checkbox">
                            <label class="v21-checkbox__content">
                                <input
                                        <?/*?>type="checkbox" id="politics" checked<?*/?>
                                        type="checkbox" id="politics"
                                        name="CITYZENSHIP"
                                        class="v21-checkbox__input"
                                >
                                <span class="v21-checkbox__text">
                                    <?= GetMessage("WEBTU_FEEDBACK_4_CITIZENSHIP") ?>
                                </span>
                            </label>
                            <span class="v21-checkbox__warn">Для подачи заявки необходимо подтвердить свое ознакомление и соглашение с правилами</span>
                        </div><!-- /.v21-checkbox -->
                    </div><!-- /.v21-grid__item -->

                    <?
                    $politics = GetMessage("WEBTU_FEEDBACK_4_POLITICS");
                    $politics_1 = "<a class='v21-link' href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank'><span class='v21-link__text'>" . GetMessage("WEBTU_FEEDBACK_4_POLITICS_1") . "</span></a>";
                    $politics_2 = "<a class='v21-link' href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank'><span class='v21-link__text'>" . GetMessage("WEBTU_FEEDBACK_4_POLITICS_2") . "</span></a>";
                    $politics_output = sprintf($politics, $politics_1, $politics_2);
                    ?>
                    <div class="v21-grid__item">
                        <div class="v21-checkbox">
                            <label class="v21-checkbox__content">
                                <?/*?><input id="politics2" type="checkbox" checked name="politics" class="v21-checkbox__input"><?*/?>
                                <input id="politics2" type="checkbox" name="politics" class="v21-checkbox__input">
                                <span class="v21-checkbox__text">
                                    <?= $politics_output ?>
                                </span>
                            </label>
                            <span class="v21-checkbox__warn">Для подачи заявки необходимо подтвердить свое ознакомление и соглашение с правилами</span>
                        </div><!-- /.v21-checkbox -->
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-plastic-form__controls v21-grid__item">
                        <button class="v21-plastic-form__submit v21-button" name="WEBTU_FEEDBACK">
                            <?= GetMessage("WEBTU_FEEDBACK_4_BUTTON") ?>
                        </button>
                    </div><!-- /.v21-plastic-form__controls -->
                </div>

                <?/* if (!empty($arResult['SUCCESS'])) {
                    LocalRedirect('/thanks/');
                } */?>

            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
   $(document).ready(function() {
       $('input[name=NAME]').val($('input[name=LAST_NAME]').val()); // пишу в input[name=NAME] исходное значение из input[name=COMPANY_NAME]

       $('.js-fInsuranceForm').on('click', function() {
           let href = $(this).attr('href');
           let type = $(this).data('item');
           $('html, body').animate({
               scrollTop: $(href).offset().top - 120
           }, {
               duration: 800,   // по умолчанию «400»
               easing: "linear" // по умолчанию «swing»
           });
           //displayInsuranceForm(type);
           let insurance = cnangeInsuranceForm(type);
           $(`#type_select option[value="${insurance.description}"]`).prop('selected', true);
           return false;
       });

       function cnangeInsuranceForm(type) {
           let arSections = <?php echo json_encode($arSections) ?>;
           let result = new Object();
           //console.log(arSections);
           arSections.forEach((item, ix) => {
               if (item.CODE == type) {
                   result.code = item.CODE;
                   result.description = item.DESCRIPTION;
               }
           });
           return result;
       }

       function renderCurrencyForm(data) { // не понадобился
           let key_string = 'insurance.form.result';
           let arr_start = data.indexOf(key_string);
           let html_text = data.slice(0, arr_start);
           //console.log(html_text);
           let arCurObj = JSON.parse(data.slice(arr_start + key_string.length));

           let new_select_field = $(html_text).find('.select_field');
           let old_select_field = $('.v21-grid').find('.select_field');
           $(old_select_field).html($(new_select_field));
           //console.log('new_buy_fields=');
           //console.log(new_buy_fields);
           //console.log('new_sell_fields=');
           //console.log(new_sell_fields);

           //let buy_fields = $('.currency-table').find('.exchange-table__value--buy-val');
           //let sell_fields = $('.currency-table').find('.exchange-table__value--sell-val');

           //console.log('buy_fields=');
           //console.log(buy_fields);
           //console.log('sell_fields=');
           //console.log(sell_fields);

           /*for(let ix=0; ix<buy_fields.length; ix++) {
               //console.log(buy_fields[ix]);
               //console.log(sell_fields[ix]);
               //console.log($(new_sell_fields[ix]).html());
               $(buy_fields[ix]).html($(new_buy_fields[ix]).html());
               $(sell_fields[ix]).html($(new_sell_fields[ix]).html());
           }*/
       }

       function displayInsuranceForm(type) { // не понадобился
           console.log('type='+type);
           //console.log('currency_code='+currency_code);

           let url = '/chastnym-klientam/insurance/ajax_currency_form.php' + '?type=' + type;
           let xhr = new XMLHttpRequest();
           xhr.open('GET', url, true);
           xhr.addEventListener("readystatechange", () => {
               if (xhr.readyState === 4 && xhr.status === 200) {
                   console.log(xhr.responseText);
                   //renderCurrencyForm(xhr.responseText); // прорисовка формы
               }
           });
           xhr.send();
           xhr.onerror = function() {
               console.log('error with ajax_currency_form.php');
           };

       }

       $('#reloadCaptcha').click(function() {
        $.getJSON('/local/components/webtu/feedback/reload_captcha.php', function(data) {
            $('#captchaImg').attr('src','/bitrix/tools/captcha.php?captcha_sid='+data);
            $('#captchaSid').val(data);
        });
        return false;
      });

      // Доставка карты
      /*$('.check-box-delivery, .popup-form_delivery, .popup-form_pass_inoy, .translit_name_family').hide();
      checkDeliveryCard();

       $('.select-box select[name="CITY"], .select-box select[name="TYPE"]').on('change', function(){
           checkDeliveryCard();
       });

       $('.check-box-delivery input[type="checkbox"]').on('change', function(){
           if($(this).prop('checked')){
               $('.popup-form_delivery').show();
           } else {
               $('.popup-form_delivery').hide();
               $('.popup-form_delivery input').each(function(){
                   if($(this).attr('type') === 'checkbox'){
                       $(this).prop('checked', false);
                   } else {
                       $(this).val('');
                   }
               });
           }
       });*/

       /*$('.check-box input[name="PASS_ADDR_S"]').on('change', function(){
           if($(this).prop('checked')){
               $('.input-field[name="PASS_ADDR_F"]').prop('disabled', true);
           } else {
               $('.input-field[name="PASS_ADDR_F"]').prop('disabled', false);
           }
       });

       $('.select-box-type-pass select[name="TYPE_PASS"]').on('change', function(){
           if($(this).val() === 'Иной документ'){
               $('.popup-form_pass_inoy').show();
           } else {
               $('.popup-form_pass_inoy').hide();
               $('.popup-form_pass_inoy input[name="TYPE_INOY"]').val('');
           }
       });*/
   });

   /*function checkDeliveryCard() {
        let city = $('.select-box select[name="CITY"]').val();
        let typeCard = $('.select-box select[name="TYPE"]').val();

        if(city === 'Москва' && typeCard !== ''){
            $('.check-box-delivery').show();
            $('.check-box-delivery input[type="checkbox"]').prop("disabled", false).prop("checked", false);
        } else {
            $('.check-box-delivery').hide();
            $('.check-box-delivery input[type="checkbox"]').prop("disabled", true).prop("checked", false);
        }

	    if(typeCard === 'Visa Gold' || typeCard === 'Visa Platinum'){
            $('.translit_name_family').show();
        } else {
            $('.translit_name_family').hide();
            $('.translit_name_family input[name="TRANSLIT"]').val('');
        }

        $('.check-box-delivery input[type="checkbox"]').change();
   }*/

</script>

<script>
    $('.button[data-fancybox=""]').on('click', function () {

        if ($(this).closest('.product-item').length > 0) {
            cardType = $(this).closest('.product-item').attr('data-type');
            cardName = $(this).closest('.product-item').find('.page-title').text().trim();
        } else {
            cardType = $('#CARD_TYPE').val();
            cardName = $('#CARD_NAME').val();
        }
        filterCards ();
    });

    function filterCards () {
        $('.select-box-type li').each(function () {
            $(this).removeClass('is-active');
            let currentCardName = cardName.split(' ');
            currentCardName = currentCardName[0] + ' ' + currentCardName[1];
            if ($(this).text() === currentCardName) {
                $(this).addClass('is-active');
                $('.select-box-type .cs-box_selected').text($(this).text());
            }
        });
    }

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

    function setSwitchBoxLever(obj) {
        if ( obj.find('input[type="radio"]:checked').parent().next().length ) {
            obj.find('.switch-box_lever').addClass('is-active-left').removeClass('is-active-right');
        } else if ( obj.find('input[type="radio"]:checked').parent().prev().length ) {
            obj.find('.switch-box_lever').addClass('is-active-right').removeClass('is-active-left');
        }
    }

    $('.switch-box').each( function() {
        setSwitchBoxLever( $(this) );
    } );

    $('.switch-box input[type="radio"]').change( function() {
        setSwitchBoxLever( $(this).parents('.switch-box') );
    } );

    $('.switch-box_lever').click( function() {

        if ( $(this).siblings().find('input[type="radio"]').length ) {
            if ( $(this).hasClass('is-active-left') ) {

                $(this).removeClass('is-active-left').addClass('is-active-right');
                $(this).prev().find('input[type="radio"]').prop('checked', false);
                $(this).next().find('input[type="radio"]').prop('checked', true);
            } else {
                $(this).removeClass('is-active-right').addClass('is-active-left');
                $(this).prev().find('input[type="radio"]').prop('checked', true);
                $(this).next().find('input[type="radio"]').prop('checked', false);

            }

            $(this).siblings().find('input[type="radio"]').change();

        }

    } );

    /*function toggleFeedbackFormInputType() {

        if ( $('.page-bottom .switch-box_lever').hasClass('is-active-left') ){
            $('#feedbackFormInputPhone').removeClass('hidden');
            $('#feedbackFormInputPhone').prop('required',true);
            $('#feedbackFormInputEmail').addClass('hidden');
            $('#feedbackFormInputEmail').prop('required',false);
        } else {
            $('#feedbackFormInputPhone').addClass('hidden');
            $('#feedbackFormInputPhone').prop('required',false);
            $('#feedbackFormInputEmail').removeClass('hidden');
            $('#feedbackFormInputEmail').prop('required',true);
        }
    }

    toggleFeedbackFormInputType();

    $('.feedback_form .switch-box input[type="radio"]').change( function() {
        toggleFeedbackFormInputType();
    } );*/

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

    /*$('.feedback_form .button').click(function () {
        $(".alert").remove();
    });*/

    function requiredFields() {
        let arFields = [
            'input[name="LAST_NAME"]',
            'input[name="FIRST_NAME"]',
            'input[name="BIRTHDATE"]',
            'input[name="PHONE"]',
            'input[name="EMAIL"]',
            'input[name="FROM_WHERE"]',
        ];

        let countErr = 0;

        arFields.forEach(function (value) {
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

    $('#applicationForm').submit(function (e) {
        e.preventDefault();
        console.log('form');
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
        $('input[data-mask="date"]').mask( '99.99.9999', {
            placeholder: 'дд.мм.гггг'
        } );
        $('input[data-mask="phone"]').mask('+7 (999) 999-99-99');
        $('input[data-mask="seriya"]').mask('99 99', {
            placeholder: 'SS SS'
        } );
        $('.select-box select').customSelect({
            speed: 360
        });
    </script>
<? } ?>
