<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { ?>
    <? die(); ?>
<? } ?>
<? IncludeTemplateLangFile(__FILE__); ?>

<div class="form-block">
    <div class="form-block--left">
        <div class="form-block--image">
            <img src="/images/airplane_polygons_1280.png" class="form-block--image-1280">
            <img src="/images/airplane_polygons_1440.png" class="form-block--image-1440">
        </div>
        <!--p class="form-block--thank">Спасибо <i>за&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;обращение</i></p-->
    </div>

    <div class="form-block--right">
        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="card-application--form" id="applicationForm">

            <input type="hidden" name="FORM_ID" value="<?=$arResult['FORM_ID']?>">
            <input type="hidden" name="SESSION_ID" value="<?=bitrix_sessid()?>">

            <input type="hidden" name="PARAMS" value='<?= json_encode($arParams) ?>'>
            <input type="hidden" id="PROPERTIES" name="PROPERTIES" value='<?= json_encode($arParams["PROPERTIES"]) ?>'>
            <?/*?><input type="hidden" id="safes_price" name="PRICE" value=""><?*/?>
            <??><input type="hidden" id="safes_name" name="NAME_SAFES" value="Сейф для частного клиента"><??>
            <input type="hidden" id="safes_options" name="OPTIONS" value="">

            <??><input type="hidden" name="REQ_URI" value="<?= $_SERVER['SCRIPT_URL'] ?>"><??>
            <input type="hidden" name="FOLDER" value="<?= $APPLICATION->GetTitle() ?>">

            <div class="card-application--content">
                <h2 class="card-application--header">Онлайн-заявка на аренду сейфа</h2>

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


                <div class="card-application--form__section">
                    <div class="grid__item-1">
                        <label class="input-group">
                            <?/*?><span class="input-group__label"><?=GetMessage("WEBTU_FEEDBACK_3_NAME")?></span><?*/?>
                            <input type="text" name="NAME" placeholder="ФИО" class="input-group__field"
                                <?/* if (isset($arResult['POST']['FIO'])) { ?> value="<?=$arResult['POST']['FIO']?>" <? } */?>
                                <? if (isset($arResult['POST']['NAME'])) { ?> value="<?=$arResult['POST']['NAME']?>" <? } ?>
                            >
                            <??><span class="input-group__label"><?=GetMessage("WEBTU_FEEDBACK_3_NAME")?></span><??>
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        </label>
                    </div>
                </div>

                <?/*?>
                    <div class="popup-form_input-group clearfix">

                        <div class="caption">
                            <span class="aligner">
                                <?=GetMessage("WEBTU_FEEDBACK_3_SEX")?>
                            </span>
                        </div>

                        <div class="content">
                            <div class="switch-box clearfix" id="feedbackFormInputType">

                                <label class="switch-box_caption">
                                    <input type="radio" name="SEX" value="Мужской"
                                        <? if (!isset($arResult['POST']['SEX'])) { ?> checked <? } ?>
                                        <? if (isset($arResult['POST']['SEX'])) { ?>
                                            <? if ($arResult['POST']['SEX'] == 'Мужской') { ?> checked <? } ?>
                                        <? } ?>
                                    >
                                    <span>
                                        <?=GetMessage("WEBTU_FEEDBACK_3_SEX_MALE")?>
                                    </span>
                                </label>

                                <span class="switch-box_lever"></span>

                                <label class="switch-box_caption">
                                    <input type="radio" name="SEX" value="Женский"
                                        <? if (isset($arResult['POST']['SEX'])) { ?>
                                            <? if ($arResult['POST']['SEX'] == 'Женский') { ?> checked <? } ?>
                                        <? } ?>
                                    >
                                    <span>
                                        <?=GetMessage("WEBTU_FEEDBACK_3_SEX_FEMALE")?>
                                    </span>
                                </label>

                            </div>
                        </div>

                    </div>
                <?*/?>

                <?/*?>
                    <label class="popup-form_input-group clearfix">
                        <span class="caption">
                            <span class="aligner">
                                <?=GetMessage("WEBTU_FEEDBACK_3_BIRTHDATE")?>
                            </span>
                        </span>

                        <span class="content">
                            <input required type="text" name="BIRTHDATE" data-mask="date" class="input-field" placeholder="дд.мм.гггг"
                                <? if (isset($arResult['POST']['BIRTHDATE'])) { ?> value="<?=$arResult['POST']['BIRTHDATE']?>" <? } ?>
                            >
                        </span>
                    </label>
                <?*/?>

                <?/*?>
                <div class="card-application--form__section">
                    <div class="grid__item-1">
                        <div class="input-group">
                            <?/*?><span class="input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_CITY") ?></span><?*/?>
                            <?/*?><? CModule::IncludeModule('iblock'); ?>
                            <? $cities = CIblockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 114)); ?>
                            <select name="CITY" class="input-group__field select_field">
                                <? while ($city = $cities->Fetch()) : ?>
                                    <option value="<?= $city['NAME'] ?>">
                                        <?= $city['NAME'] ?>
                                    </option>
                                <? endwhile; ?>
                            </select>
                            <span class="input-group__label input-group__label--city"><?= GetMessage("WEBTU_FEEDBACK_3_CITY") ?></span>
                        </div>
                    </div>
                </div>
                <?*/?>

                <?/*?>
                    <div class="popup-form_input-group clearfix">

                        <div class="caption">
                            <span class="aligner">
                                <?=GetMessage("WEBTU_FEEDBACK_3_CITY")?>
                            </span>
                        </div>

                        <div class="content">

                            <div class="select-box">

                                <? CModule::IncludeModule('iblock'); ?>
                                <? $cities = CIblockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 114)); ?>

                                <select name="CITY">

                                    <? while ($city = $cities->Fetch()) { ?>
                                    <option value="<?=$city['NAME']?>"
                                        <? if ($arResult['POST']['CITY'] == $city['NAME']) { ?>selected<? } ?>
                                        <? if (!isset($arResult['POST']['CITY']) && $city['NAME'] == 'Москва') { ?>selected<? } ?>
                                    >
                                        <?=$city['NAME']?>
                                    </option>
                                    <? } ?>

                                </select>

                            </div>

                        </div>

                    </div>
                <?*/?>

                <div class="card-application--form__section">
                    <div class="grid__item-1">
                        <div class="input-group">
                            <?/*?><span class="input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_CITY") ?></span><?*/?>
                            <??><? CModule::IncludeModule('iblock'); ?>
                            <?
                            $arSelect = Array("ID", "NAME", "PROPERTY_ATT_SIZE");
                            $arFilter = Array("IBLOCK_ID"=>12, "ACTIVE"=>"Y");
                            $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
                            ?>
                            <select name="TYPE" class="input-group__field select_field" id="safeType">
                                <?
                                while ($ob = $res->GetNextElement()) :
                                    $arFields = $ob->GetFields();
                                    ?>
                                    <option value="<?= $arFields['NAME'] ?>" data-sfvalue="<?=$arFields['ID']?>" <?= ($_POST['TYPE'] == $arFields['NAME']) ? 'selected="selected"' : ''; ?>>
                                        <?= $arFields['NAME'] ?>
                                    </option>
                                <? endwhile; ?>
                            </select>
                            <span class="input-group__label input-group__label--city">Тип сейфа</span>
                        </div>
                    </div>
                </div>

                <?/*?>
                    <div class="popup-form_input-group clearfix">

                        <div class="caption">
                            <span class="aligner">
                                <?=GetMessage("WEBTU_FEEDBACK_3_TYPE")?>
                            </span>
                        </div>

                        <div class="content">

                            <div class="select-box select-box-type">

                                <select name="TYPE">

                                    <?
                                    $arSelect = Array("ID", "NAME", "PROPERTY_ATT_SIZE");
                                    $arFilter = Array("IBLOCK_ID"=>12, "ACTIVE"=>"Y");
                                    $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
                                    while($ob = $res->GetNextElement())
                                    {
                                        $arFields = $ob->GetFields();
                                        echo '<option value="'.$arFields['NAME'].'" data-size="'.$arFields['PROPERTY_ATT_SIZE_VALUE'].'">';
                                            echo $arFields['NAME'];
                                        echo '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>

                    </div>
                <?*/?>

                <div class="card-application--form__section">
                    <div class="grid__item-1">
                        <div class="input-group">
                            <select name="TIME" class="input-group__field select_field">
                                <option value="1 день" <?= ($_POST['TIME'] == '1 день') ? 'selected="selected"' : ''; ?>>1 день</option>
                                <option value="до 1-ой недели" <?= ($_POST['TIME'] == 'до 1-ой недели') ? 'selected="selected"' : ''; ?>>до 1-ой недели</option>
                                <option value="до 2-х недель" <?= ($_POST['TIME'] == 'до 2-х недель') ? 'selected="selected"' : ''; ?>>до 2-х недель</option>
                                <option value="до 1-го месяца" <?= ($_POST['TIME'] == 'до 1-го месяца') ? 'selected="selected"' : ''; ?>>до 1-го месяца</option>
                                <option value="до 2-х месяцев" <?= ($_POST['TIME'] == 'до 2-х месяцев') ? 'selected="selected"' : ''; ?>>до 2-х месяцев</option>
                                <option value="до 3-х месяцев" <?= ($_POST['TIME'] == 'до 3-х месяцев') ? 'selected="selected"' : ''; ?>>до 3-х месяцев</option>
                                <option value="до 6-ти месяцев" <?= ($_POST['TIME'] == 'до 6-ти месяцев') ? 'selected="selected"' : ''; ?>>до 6-ти месяцев</option>
                                <option value="до 1-го года" <?= ($_POST['TIME'] == 'до 1-го года') ? 'selected="selected"' : ''; ?>>до 1-го года</option>
                            </select>
                            <span class="input-group__label input-group__label--city">Срок пользования</span>
                        </div>
                    </div>
                </div>

                <?/*?>
                    <div class="popup-form_input-group clearfix">

                        <div class="caption">
                            <span class="aligner">
                                <?=GetMessage("WEBTU_FEEDBACK_3_TIME")?>
                            </span>
                        </div>

                        <div class="content">

                            <div class="select-box">

                                <select name="TIME">
                                    <option value="1 день">1 день</option>
                                    <option value="до 1-ой недели">до 1-ой недели</option>
                                    <option value="до 2-х недель">до 2-х недель</option>
                                    <option value="до 1-го месяца">до 1-го месяца</option>
                                    <option value="до 2-х месяцев">до 2-х месяцев</option>
                                    <option value="до 3-х месяцев">до 3-х месяцев</option>
                                    <option value="до 6-ти месяцев">до 6-ти месяцев</option>
                                    <option value="до 1-го года">до 1-го года</option>
                                </select>

                            </div>

                        </div>

                    </div>
                <?*/?>

                <?/*?>
                    <label class="agreement check-box">

                        <input type="checkbox" name="CITYZENSHIP" checked>

                        <span class="check-box_caption">
                            <?=GetMessage("WEBTU_FEEDBACK_3_CITIZENSHIP")?>
                        </span>

                    </label>
                <?*/?>

                <?/*?>
                    <?
                        $politics = GetMessage("WEBTU_FEEDBACK_3_POLITICS");
                        $politics_1 = "<a href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank'>" .GetMessage("WEBTU_FEEDBACK_3_POLITICS_1"). "</a>";
                        $politics_2 = "<a href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank'>" .GetMessage("WEBTU_FEEDBACK_3_POLITICS_2"). "</a>";
                        $politics_output = sprintf($politics, $politics_1, $politics_2);
                    ?>

                    <label class="agreement check-box">
                        <input type="checkbox" name="" checked required="">
                        <span class="check-box_caption"><?=$politics_output?></span>
                    </label>

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

                    <button class="button" name="WEBTU_FEEDBACK">
                        <?=GetMessage("WEBTU_FEEDBACK_3_BUTTON")?>
                    </button>
                <?*/?>

                <div class="card-application--form__section">
                    <div class="grid__item-2">
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

                    <div class="grid__item-2">
                        <label class="input-group">
                            <?/*?><span class="input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_EMAIL") ?></span><?*/?>
                            <?/*?><input type="email" name="EMAIL" placeholder="" class="input-group__field" required
                          <? if (isset($arResult['POST']['EMAIL'])) { ?> value="<?=$arResult['POST']['EMAIL']?>" <? } ?>
                    ><?*/?>
                            <input type="email" name="EMAIL" placeholder="email@mail.com" class="input-group__field"
                                <? if (isset($arResult['POST']['EMAIL'])) { ?> value="<?=$arResult['POST']['EMAIL']?>" <? } ?>
                            >
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                            <span class="input-group__label"><?= GetMessage("WEBTU_FEEDBACK_3_EMAIL") ?></span>
                            <?/*?><span class="v21-input-group__note"><?= GetMessage("WEBTU_FEEDBACK_3_EMAIL_LINE") ?></span><?*/?>
                        </label>
                    </div>
                </div>

                <div class="card-application--form__section">
                    <div class="grid__item-1">
                        <label class="input-group">
                            <input type="text" name="FROM_WHERE" placeholder=" " class="input-group__field"
                                <? if (isset($arResult['POST']['FROM_WHERE'])) { ?> value="<?=$arResult['POST']['FROM_WHERE']?>" <? } ?>
                            >
                            <??><span class="input-group__label">Откуда Вы узнали о нас</span><??>
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        </label>
                    </div>
                </div>

                <div class="card-application--form__section">
                    <div class="grid__item-1">
                        <div class="v21-checkbox">
                            <label class="v21-checkbox__content">
                                <?/*?><input type="checkbox" name="CITYZENSHIP" class="v21-checkbox__input" checked><?*/?>
                                <input type="checkbox" name="CITYZENSHIP" class="v21-checkbox__input">
                                <div class="v21-checkbox__text"><?=GetMessage("WEBTU_FEEDBACK_3_CITIZENSHIP")?></div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card-application--form__section card-application--form__captcha">
                    <?
                    $politics = GetMessage("WEBTU_FEEDBACK_3_POLITICS");
                    $politics_1 = "<a href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank' class='v21-link'><span>" .GetMessage("WEBTU_FEEDBACK_3_POLITICS_1"). "</span></a>";
                    $politics_2 = "<a href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank' class='v21-link'><span>" .GetMessage("WEBTU_FEEDBACK_3_POLITICS_2"). "</span></a>";
                    $politics_output = sprintf($politics, $politics_1, $politics_2);
                    ?>
                    <div class="grid__item-1">
                        <div class="v21-checkbox">
                            <label class="v21-checkbox__content">
                                <?/*?><input type="checkbox" name="" class="v21-checkbox__input" id="politics2" checked><?*/?>
                                <input type="checkbox" name="" class="v21-checkbox__input" id="politics2">
                                <div class="v21-checkbox__text"><?= $politics_output ?></div>
                            </label>
                            <span class="v21-checkbox__warn">Для подачи заявки необходимо подтвердить свое ознакомление и соглашение с правилами</span>
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

                            <a id="reloadCaptchaSafe" title="Обновить капчу"></a>
                        </div>

                        <div class="grid__item-2">
                            <?/*?><div class="captcha_input v21-input-group"><?*/?>
                            <div class="v21-input-group">
                                <input type="text" name="CAPTCHA_WORD" placeholder="<?= GetMessage('WEBTU_FEEDBACK_CAPTCHA') ?>" class="input-group__field input-captcha" id="CAPTCHA_WORD">
                                <span class="v21-input-group__warn">Неверно введен код с картинки</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-application--form__section">
                    <div class="grid__item-1">
                        <button class="grid__item-button" name="WEBTU_FEEDBACK">
                            <?= GetMessage("WEBTU_FEEDBACK_3_BUTTON") ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
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


<script type="text/javascript">
   $(document).ready(function(){
      $('#reloadCaptchaSafe').click(function(){
        $.getJSON('/local/components/webtu/feedback/reload_captcha.php', function(data) {
            $('#captchaImg').attr('src','/bitrix/tools/captcha.php?captcha_sid='+data);
            $('#captchaSid').val(data);
        });
        return false;
      });

       function changeColors(scrollTop) {
           let opacityLevel = 1;
           let param1;  // rgba(21,24,45,1);
           let param2;  // rgba(0,52,94,1);
           const inversionOffset = 100; // метка первой смены цвета, привязана к блоку - не нужна
           const opacityOffset = 0; // метка отмены смены цвета, привязана к блоку - не нужна
           const classOffset = 150; // не нужна
           const windowInnerWidth = window.innerWidth;
           let formBlockTop = $('.card-application--form').offset().top;
           let fixLevel1 = formBlockTop - windowInnerWidth * .17; // уровень первого переключения было .35
           let fixLevel2 = formBlockTop + $('.card-application--form').height() * .6 - opacityOffset; // уровень второго переключения
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
               //$('.v21-card-application').css('background', 'linear-gradient(106.11deg, '+param1+' 27.82%, '+param2+' 100%)');
               $('.safes-page__background-blue').css('opacity', '0');
               $('.v21 .v21-card-application').removeClass('js-color-switch');
               $('.v21 .v21-safe-info').removeClass('js-color-switch');
               $('.v21 .v21-safes-advantages').removeClass('js-color-switch');
           } else if(scrollTop > fixLevel1) {
               $('.safes-page__background-blue').css('opacity', '1');
               $('.v21 .v21-card-application').addClass('js-color-switch');
               $('.v21 .v21-safe-info').addClass('js-color-switch');
               $('.v21 .v21-safes-advantages').addClass('js-color-switch');
           } else {
               //$('.v21-card-application').css('background', 'linear-gradient(106.11deg, '+param1+' 27.82%, '+param2+' 100%)');
               $('.safes-page__background-blue').css('opacity', '0');
               $('.v21 .v21-card-application').removeClass('js-color-switch');
               $('.v21 .v21-safe-info').removeClass('js-color-switch');
               $('.v21 .v21-safes-advantages').removeClass('js-color-switch');
           }

           /*if(scrollTop > (fixLevel2+200)) {
               $('.safes-page__background-blue').css('position', 'unset'); // для нижний блоков отработать стилем z-index
           } else if(scrollTop > (fixLevel1-200)) {
               $('.safes-page__background-blue').css('position', 'fixed');
           } else {
               $('.safes-page__background-blue').css('position', 'unset');
           }*/

           /*if(scrollTop > fixLevel3) {
               $('.v21-card-application').addClass('js-color-switch');
           } else {
               $('.v21-card-application').removeClass('js-color-switch');
           }*/
       }
       changeColors($(window).scrollTop());

       $(window).on('scroll',function(){
           let $window = $(window);
           let scrollTop = $window.scrollTop();
           //console.log('scrollTop='+scrollTop);

           changeColors(scrollTop);
       });


       /*
       $('.button[data-fancybox=""]').on('click', function () {

           if ($(this).closest('.product-item').length > 0) {
               safeName = $(this).closest('.product-item').find('.page-title').text().trim();
           } else {
               safeName = $('#safes_name').val();
           }

           $('.select-box-type li').each(function () {
               if ($(this).text() == safeName) {
                   $(this).addClass('is-active');
                   $('.select-box-type .cs-box_selected').text(safeName);
               } else {
                   $(this).removeClass('is-active');
               }
           });

           $('select[name="TYPE"]').val(safeName);

       });

       $('select[name="TYPE"]').on('change', function () {
           options = $('select[name="TYPE"] option:selected').data('size');
           $('#safes_options').val(options);
       });
       */

       /*
       function requiredContacts () {
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
       });

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

       function toggleFeedbackFormInputType() {

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
       */

       //toggleFeedbackFormInputType();

       //$('.feedback_form .switch-box input[type="radio"]').change( function() {
       //    toggleFeedbackFormInputType();
       //} );

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

       /*$('.agreement input[required]').change(function () {
           if ( $(this).is(':checked') ) {
               $(this).closest('.agreement').css('box-shadow', '');
           } else {
               $(this).closest('.agreement').css('box-shadow', '0 0 2px 1px red');
           }
       });*/
       function requiredFields() {
           let arFields = [
               'input[name="NAME"]',
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
                   "id": 'TYPE',
                   "name": data.TYPE,
                   "price": entry.PRICE,
                   "category": entry.DETAIL_PAGE_URL,
                   "quantity": entry.QUANTITY,
                   "position": pos++,
                   "xml": entry.XML_ID,
               },
           );
           ar_product.push(
               {
                   "id": 'TIME',
                   "name": data.TIME,
                   "price": entry.PRICE,
                   "category": entry.DETAIL_PAGE_URL,
                   "quantity": entry.QUANTITY,
                   "position": pos++,
                   "xml": entry.XML_ID,
               },
           );
           ar_product.push(
               {
                   "id": 'FROM_WHERE',
                   "name": data.FROM_WHERE,
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
           //if ($("#politics2").prop("checked")) {
           //$('#politics2').parent().parent().removeClass("is-error");
           //console.log('2');
           if (requiredFields()) {
               //console.log('3');
               $.ajax({
                   type: "POST",
                   //url: '/local/components/webtu/feedback/templates/safes_fl/ajax.customer.php',
                   url: '/ajax_scripts/ajax.customer.php',
                   data: {
                       'fields': $(this).serialize(),
                   },
                   dataType: "json",
                   success: function (data) {
                       //console.log(data);
                       if (data.status) {
                           let response = data.message[0];
                           if(response.type) {
                               //console.log(response.data);
                               console.log(response.data.APPLICATION_ID);
                               ar_product = makeArProduct(response.data);
                               makeDataLayer(response.data.APPLICATION_ID, ar_product);
                               console.log(window.dataLayer);
                               //yandexMetrikaForm();
                           }

                           clearFields ();
                           $('input[name="CAPTCHA_WORD"]').parent().removeClass("is-error");
                           document.location.href = "/thanks/";
                       } else {
                           console.log('not OK');
                           if (!data.captcha){
                               $('input[name="CAPTCHA_WORD"]').parent().addClass("is-error");
                           } else {
                               $('input[name="CAPTCHA_WORD"]').parent().removeClass("is-error");
                           }
                       }
                   }
               });
           }
           //} else {
           //    $('#politics2').parent().parent().addClass("is-error");
           //}
       });
   });
</script>

<? if (isset($_REQUEST['AJAX_CALL'])) { ?>
    <script>
        $('input[data-mask="date"]').mask( '99.99.9999', {
            placeholder: 'дд.мм.гггг'
        } );
        $('input[data-mask="phone"]').mask('+7 (999) 999-99-99');

        $('.select-box select').customSelect({
            speed: 360
        });
    </script>
<? } ?>
