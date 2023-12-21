<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { ?>
    <? die(); ?>
<? } ?>
<? IncludeTemplateLangFile(__FILE__); ?>

<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">

    <h4 class="popup-form_title page-title--4 page-title">
        <?=GetMessage("WEBTU_FEEDBACK_6_HEADER")?>
    </h4>

    <input type="hidden" name="FORM_ID" value="<?=$arResult['FORM_ID']?>">
    <input type="hidden" name="SESSION_ID" value="<?=bitrix_sessid()?>">

    <div class="popup-form_content">

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

        <label class="popup-form_input-group clearfix">

            <span class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_5_LAST_NAME")?>
                </span>
            </span>

            <span class="content">

                <input type="text" name="LAST_NAME" class="input-field" required
                    <? if (isset($arResult['POST']['LAST_NAME'])) { ?> value="<?=$arResult['POST']['LAST_NAME']?>" <? } ?>
                >

            </span>

        </label>

        <label class="popup-form_input-group clearfix">

            <span class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_5_FIRST_NAME")?>
                </span>
            </span>

            <span class="content">

                <input type="text" name="FIRST_NAME" class="input-field" required
                    <? if (isset($arResult['POST']['FIRST_NAME'])) { ?> value="<?=$arResult['POST']['FIRST_NAME']?>" <? } ?>
                >

            </span>

        </label>

        <label class="popup-form_input-group clearfix">

            <span class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_5_SECOND_NAME")?>
                </span>
            </span>

            <span class="content">

                <input type="text" name="SECOND_NAME" class="input-field" required
                    <? if (isset($arResult['POST']['SECOND_NAME'])) { ?> value="<?=$arResult['POST']['SECOND_NAME']?>" <? } ?>
                >

            </span>

        </label>

        <div class="popup-form_input-group clearfix">

            <div class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_5_SEX")?>
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
                            <?=GetMessage("WEBTU_FEEDBACK_5_SEX_MALE")?>
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
                            <?=GetMessage("WEBTU_FEEDBACK_5_SEX_FEMALE")?>
                        </span>

                    </label>

                </div>

            </div>

        </div>

        <label class="popup-form_input-group clearfix">

            <span class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_5_BIRTHDATE")?>
                </span>
            </span>

            <span class="content">

                <input type="text" name="BIRTHDATE" data-mask="date" class="input-field" required
                    <? if (isset($arResult['POST']['BIRTHDATE'])) { ?> value="<?=$arResult['POST']['BIRTHDATE']?>" <? } ?>
                >

            </span>

        </label>

        <label class="popup-form_input-group double-offset clearfix">

            <span class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_5_PHONE")?>
                </span>
            </span>

            <span class="content">

                <input type="tel" name="PHONE" data-mask="phone" class="input-field" required placeholder="+7 (___) ___-__-__"
                    <? if (isset($arResult['POST']['PHONE'])) { ?> value="<?=$arResult['POST']['PHONE']?>" <? } ?>
                >

                <span class="note">
                    <?=GetMessage("WEBTU_FEEDBACK_5_PHONE_LINE")?>
                </span>

            </span>

        </label>

        <label class="popup-form_input-group double-offset clearfix">

            <span class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_5_EMAIL")?>
                </span>
            </span>

            <span class="content">

                <input type="email" name="EMAIL" class="input-field" required placeholder="example@site.ru"
                    <? if (isset($arResult['POST']['EMAIL'])) { ?> value="<?=$arResult['POST']['EMAIL']?>" <? } ?>
                >

                <span class="note">
                    <?=GetMessage("WEBTU_FEEDBACK_5_EMAIL_LINE")?>
                </span>

            </span>

        </label>

        <div class="popup-form_input-group clearfix">

            <div class="caption">
                <span class="aligner">
                    <?=GetMessage("WEBTU_FEEDBACK_5_CITY")?>
                </span>
            </div>

            <div class="content">

                <div class="currency clearfix">

                    <div class="select-box">
                        
                        <? CModule::IncludeModule('iblock'); ?>
                        <? $cities = CIblockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 114, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y")); ?>

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

        </div>

        <label class="agreement check-box">

            <input type="checkbox" name="CITIZENSHIP" checked>

            <span class="check-box_caption">
                <?=GetMessage("WEBTU_FEEDBACK_5_CITIZENSHIP")?>
            </span>

        </label>

		<? 
			$politics = GetMessage("WEBTU_FEEDBACK_5_POLITICS");
			$politics_1 = "<a href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank'>" .GetMessage("WEBTU_FEEDBACK_5_POLITICS_1"). "</a>";
			$politics_2 = "<a href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank'>" .GetMessage("WEBTU_FEEDBACK_5_POLITICS_2"). "</a>";
			$politics_output = sprintf($politics, $politics_1, $politics_2);
		?>
		
		<label class="agreement check-box">
			<input type="checkbox" name="" checked required="">
			<span class="check-box_caption"><?=$politics_output?></span>
		</label>

        <div class="captcha clearfix">

            <div class="captcha_image">
                <input type="hidden" name="CAPTCHA_ID" value="<?=$arResult['CAPTCHA']?>" />
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult['CAPTCHA']?>" alt="">
            </div>

            <div class="captcha_input">
                <input type="text" name="CAPTCHA_WORD" placeholder="<?=GetMessage("WEBTU_FEEDBACK_CAPTCHA")?>" class="input-field">
            </div>

        </div>

        <button class="button" name="WEBTU_FEEDBACK">
            <?=GetMessage("WEBTU_FEEDBACK_6_BUTTON")?>
        </button>

    </div>

</form>

<? if (isset($_REQUEST['AJAX_CALL'])) { ?>
    <script>
        $('#brokerRequest input[data-mask="phone"]').mask('+7 (999) 999-99-99');
        $('#brokerRequest .select-box select').customSelect({
            speed: 360
        });
    </script>
<? } ?>