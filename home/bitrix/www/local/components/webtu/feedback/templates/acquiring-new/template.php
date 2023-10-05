<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { ?>
    <? die(); ?>
<? } ?>
<? IncludeTemplateLangFile(__FILE__); ?>

<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">

    <input type="hidden" name="FORM_ID" value="<?=$arResult['FORM_ID']?>">
    <input type="hidden" name="SESSION_ID" value="<?=bitrix_sessid()?>">
    <input type="hidden" name="REQ_URI" value="<?= $_SERVER['REQUEST_URI'] ?>">
    <input type="hidden" name="FOLDER" value="<?= $APPLICATION->GetTitle() ?>">

	<div class="eq-form__row">
		<input required type="text" name="NAME" class="eq-form__input" placeholder="<?=GetMessage("WEBTU_FEEDBACK_9_NAME")?>"
            <? if (isset($arResult['POST']['NAME'])) { ?> value="<?=$arResult['POST']['NAME']?>" <? } ?>
        >
	</div>
	
	<div class="eq-form__row">
		<input required type="tel" name="PHONE" class="eq-form__input" data-mask="phone" placeholder="+7 (___) ___-__-__"
            <? if (isset($arResult['POST']['PHONE'])) { ?> value="<?=$arResult['POST']['PHONE']?>" <? } ?>
        >
	</div>
	
	<div class="eq-form__row">
		<input required type="text" name="COMPANY_INN" class="eq-form__input" placeholder="<?=GetMessage("WEBTU_FEEDBACK_9_COMPANY_INN")?>"
            <? if (isset($arResult['POST']['COMPANY_INN'])) { ?> value="<?=$arResult['POST']['COMPANY_INN']?>" <? } ?>
        >
	</div>
	
	<div class="eq-form__row">
		<input type="email" name="EMAIL" class="eq-form__input" placeholder="example@site.ru"
            <? if (isset($arResult['POST']['EMAIL'])) { ?> value="<?=$arResult['POST']['EMAIL']?>" <? } ?>
        >
	</div>
	
	<div class="eq-form__row">
		<input required type="text" name="REGION" class="eq-form__input" placeholder="<?=GetMessage("WEBTU_FEEDBACK_9_REGION")?>"
            <? if (isset($arResult['POST']['REGION'])) { ?> value="<?=$arResult['POST']['REGION']?>" <? } ?>
        >
	</div>

    <div class="eq-form__row">
        <input required type="text" name="FROM_WHERE" class="eq-form__input" placeholder="Откуда Вы узнали о нас"
            <? if (isset($arResult['POST']['FROM_WHERE'])) { ?> value="<?=$arResult['POST']['FROM_WHERE']?>" <? } ?>
        >
    </div>

	<? 
		$politics = GetMessage("WEBTU_FEEDBACK_9_POLITICS");
		$politics_1 = "<a href='/assets/docs/Правила оформления онлайн заявок.pdf' target='_blank'>" .GetMessage("WEBTU_FEEDBACK_9_POLITICS_1"). "</a>";
		$politics_2 = "<a href='/assets/docs/Согласие на обработку ПД для сайта.pdf' target='_blank'>" .GetMessage("WEBTU_FEEDBACK_9_POLITICS_2"). "</a>";
		$politics_output = sprintf($politics, $politics_1, $politics_2);
	?>

	<div class="eq-form__row policy">
		<input type="checkbox" id="eq-policy-online" checked required>
		<label for="eq-policy-online"><?=$politics_output?></label>
	</div>
	
	<div class="eq-form__row captcha clearfix">

            <div class="captcha_image">
                <input type="hidden" id="captchaSid" name="CAPTCHA_ID" value="<?=$arResult['CAPTCHA']?>" />
                <img id="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult['CAPTCHA']?>" alt="">
            </div>

            <a id="reloadCaptcha" title="Обновить капчу"></a>

            <div class="captcha_input">
                <input type="text" name="CAPTCHA_WORD" placeholder="<?=GetMessage('WEBTU_FEEDBACK_CAPTCHA')?>" class="input-field">
            </div>

        </div>

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
	
	<div class="eq-form__row">
		<button class="eq-form__button" name="WEBTU_FEEDBACK"><?=GetMessage("WEBTU_FEEDBACK_9_BUTTON")?></button>
	</div>

</form>

<script type="text/javascript">

   $(document).ready(function(){
      $('#reloadCaptcha').click(function(){
        $.getJSON('/local/components/webtu/feedback/reload_captcha.php', function(data) {
            $('#captchaImg').attr('src','/bitrix/tools/captcha.php?captcha_sid='+data);
            $('#captchaSid').val(data);
        });
        return false;
      });
   });

</script>

<script>

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

    $('.eq-form__wrapper .eq-form__button').click(function () {
        $(".alert").remove();
    });

</script>

<? if (isset($_REQUEST['AJAX_CALL'])) { ?>
    <script>
        $('input[data-mask="phone"]').mask('+7 (999) 999-99-99');
    </script>
<? } ?>
