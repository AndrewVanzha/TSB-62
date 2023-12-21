<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) { ?>
    <? die(); ?>
<? } ?>
<? IncludeTemplateLangFile(__FILE__); ?>

<div data-overlay="v21_overlay" class="v21-modal v21-fade js-v21-modal" id="v21_investOrder">
    <div class="v21-modal__window js-v21-modal-window">
        <a href="#v21_investOrder" class="v21-modal__close js-v21-modal-toggle">
            <svg width="24" height="24">
                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#close"></use>
            </svg>
        </a>
        <h2 class="v21-modal__title v21-h2"><?= GetMessage("WEBTU_FEEDBACK_8_HEADER") ?></h2>
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" class="v21-service-form" id="investOrder">
            <input type="hidden" name="FORM_ID" value="<?= $arResult['FORM_ID'] ?>">
            <input type="hidden" name="SESSION_ID" value="<?= bitrix_sessid() ?>">
            <input type="hidden" name="email2" value="">

            <input type="hidden" id="CREDIT_NAME" name="CREDIT_NAME" value="">

            <input type="hidden" id="PARAMS" name="PARAMS" value='<?= json_encode($arParams["OPTIONS"]) ?>'>

            <div class="v21-service-form__section">
                <h3 class="v21-h5">Контактные данные</h3>
                <div class="v21-grid">
                    <div class="v21-grid__item v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_8_LAST_NAME") ?></span>
                            <input type="text" name="LAST_NAME" placeholder="Пушкин" class="v21-input-group__field v21-field">
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_8_FIRST_NAME") ?></span>
                            <input type="text" name="FIRST_NAME" placeholder="Александр" class="v21-input-group__field v21-field">
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        </label>
                    </div><!-- /.v21-grid__item -->

                    
                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_8_SECOND_NAME") ?></span>
                            <input type="text" name="SECOND_NAME" placeholder="Сергеевич" class="v21-input-group__field v21-field">
                        </label>
                    </div><!-- /.v21-grid__item -->
                    

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_8_PHONE") ?></span>
                            <input type="tel" name="PHONE" placeholder="+7 ___ _______" data-inputmask="'mask': '+7 999 9999999'" class="v21-input-group__field v21-field">
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                            <span class="v21-input-group__note"><?= GetMessage("WEBTU_FEEDBACK_8_PHONE_LINE") ?></span>
                        </label>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <label class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_8_EMAIL") ?></span>
                            <input type="email" name="EMAIL" placeholder="email@mail.com" class="v21-input-group__field v21-field">
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                            <span class="v21-input-group__note"><?= GetMessage("WEBTU_FEEDBACK_8_EMAIL_LINE") ?></span>
                        </label>
                    </div><!-- /.v21-grid__item -->
                </div><!-- /.v21-grid -->

                <div class="v21-grid">
                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <div class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_8_CITY") ?></span>
                            <? CModule::IncludeModule('iblock'); ?>
                            <? $cities = CIblockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 114, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y")); ?>
                            <select name="CITY" class="v21-input-group__field v21-select js-v21-select">
                                <? while ($city = $cities->Fetch()) { ?>
                                    <option value="<?= $city['NAME'] ?>">
                                        <?= $city['NAME'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@sm v21-grid__item--1x3@lg">
                        <div class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_8_BIRTHDATE") ?></span>
                            <input type="text" inputmode="numeric" name="BIRTHDATE" data-inputmask="'mask': '99.99.9999'" placeholder="__.__.____" class="v21-input-group__field v21-field v21-datepicker js-v21-datepicker">
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        </div>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--1x2@md v21-grid__item--1x3@lg">
                        <div class="v21-input-group">
                            <span class="v21-input-group__label"><?= GetMessage("WEBTU_FEEDBACK_8_SEX") ?></span>
                            <div class="v21-switch">
                                <input type="radio" name="SEX" id="v21_genderMale" value="Мужской" checked class="v21-switch__input">
                                <label for="v21_genderMale" class="v21-switch__label"><?= GetMessage("WEBTU_FEEDBACK_8_SEX_MALE") ?></label>
                                <input type="radio" name="SEX" id="v21_genderFemale" value="Женский" class="v21-switch__input">
                                <label for="v21_genderFemale" class="v21-switch__label"><?= GetMessage("WEBTU_FEEDBACK_8_SEX_FEMALE") ?></label>
                                <div class="v21-switch__handle"></div>
                            </div>
                        </div>
                    </div><!-- /.v21-grid__item -->
                </div><!-- /.v21-grid -->
            </div><!-- /.v21-service-form__section -->

            <div class="v21-service-form__section">
                <h3 class="v21-h5"><?= GetMessage("WEBTU_FEEDBACK_8_SUM") ?></h3>
                <div class="v21-grid">
                    <div class="v21-grid__item v21-grid__item--2x3@lg">
                        <div class="v21-input-group">
                            <div class="v21-input-combo">
                                <input type="text" name="SUM" inputmode="numeric" placeholder="Укажите число" class="v21-input-combo__field v21-input-group__field v21-field js-v21-string-spaces">
                                <div class="v21-input-combo__select">
                                    <select name="CURRENCY" class="v21-select js-v21-select">
                                        <option value="RUB" selected>RUB</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                    </select>
                                </div>
                            </div>
                            <span class="v21-input-group__warn">Обязательное поле к заполнению</span>
                        </div>
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item v21-grid__item--2x3@lg">
                        <div class="captcha_image">
                            <input type="hidden" id="captchaSid" name="CAPTCHA_ID" value="<?= $arResult['CAPTCHA'] ?>" />
                            <img id="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult['CAPTCHA'] ?>" alt="">
                        </div>

                        <a id="reloadCaptcha" title="Обновить капчу"></a>

                        <div class="captcha_input">
                            <input type="text" name="CAPTCHA_WORD" placeholder="<?= GetMessage('WEBTU_FEEDBACK_CAPTCHA') ?>" class="v21-input-group__field v21-field" id="CAPTCHA_WORD">
                        </div>
                    </div>

                    <div class="v21-grid__item">
                        <div class="v21-checkbox">
                            <!-- добавить is-error для выделения при ошибке -->
                            <label class="v21-checkbox__content">
                                <input type="checkbox" name="CITYZENSHIP" class="v21-checkbox__input">
                                <span class="v21-checkbox__text"><?= GetMessage("WEBTU_FEEDBACK_8_CITIZENSHIP") ?></span>
                            </label>
                            <!-- <span class="v21-checkbox__warn">Пример сообщения об ошибке</span> -->
                        </div><!-- /.v21-checkbox -->

                        <?
                        $politics = GetMessage("WEBTU_FEEDBACK_8_POLITICS");
                        $politics_1 = "<a href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank' class='v21-link'><span class='v21-link__text'>" . GetMessage("WEBTU_FEEDBACK_8_POLITICS_1") . "</span></a>";
                        $politics_2 = "<a href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank' class='v21-link'><span class='v21-link__text'>" . GetMessage("WEBTU_FEEDBACK_8_POLITICS_2") . "</span></a>";
                        $politics_output = sprintf($politics, $politics_1, $politics_2);
                        ?>

                        <div class="v21-checkbox">
                            <label class="v21-checkbox__content">
                                <input type="checkbox" checked name="" class="v21-checkbox__input" id="politics">
                                <span class="v21-checkbox__text">
                                    <?= $politics_output ?>
                                </span>
                            </label>
                            <span class="v21-checkbox__warn">Для подачи заявки необходимо подтвердить свое ознакомление и соглашение с правилами</span>
                        </div><!-- /.v21-checkbox -->
                    </div><!-- /.v21-grid__item -->

                    <div class="v21-grid__item">
                        <button class="v21-modal__button v21-button" name="WEBTU_FEEDBACK">
                            <?= GetMessage("WEBTU_FEEDBACK_8_BUTTON") ?>
                        </button>
                    </div><!-- /.v21-grid__item -->
                </div><!-- /.v21-grid -->
            </div><!-- /.v21-service-form__section -->
        </form><!-- /.v21-service-form -->
    </div><!-- /.v21-modal__window -->
</div>

<div data-overlay="v21_overlay" class="v21-modal v21-fade js-v21-modal" id="v21_alert_investOrder">
    <div class="v21-modal__window js-v21-modal-window">
        <a href="#v21_alert_investOrder" class="v21-modal__close js-v21-modal-toggle">
            <svg width="24" height="24">
                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#close"></use>
            </svg>
        </a>
    </div>
</div>