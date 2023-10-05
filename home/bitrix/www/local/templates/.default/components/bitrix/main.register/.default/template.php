<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>
<div class="col">
    <? if (!$USER->IsAuthorized()) { ?>
        <div class="form-contacts form-padding-top">
			<div class="title">Регистрация</div>
            <form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" id="regform" enctype="multipart/form-data">
                <? if (count($arResult["ERRORS"]) > 0) { ?>
                    <div class="message_err">
                        <? foreach ($arResult["ERRORS"] as $key => $error) {
                            if (intval($key) == 0 && $key !== 0)
                                $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);
                        }
                        ShowError(implode("<br />", $arResult["ERRORS"]));
                        ?>
                    </div>
                <? } elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y") { ?>
                    <div class="message_send">
                        <div><?=GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></div>
                    </div>
                <? } ?>

                <? if($arResult["BACKURL"] <> '') { ?>
                    <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                <? } ?>
                <? foreach ($arResult["SHOW_FIELDS"] as $FIELD) { ?>
                    <div class="form-group">
                        <? switch ($FIELD) {
                            case "LOGIN":
                                echo '<input size="30" type="hidden" name="REGISTER['.$FIELD.']" value="'.( ($arResult["VALUES"][$FIELD] ) ? $arResult["VALUES"][$FIELD] : md5(mktime())).'">';
                                break;
                            case "PASSWORD":
                                echo '<input size="30" type="password" name="REGISTER['.$FIELD.']" value="'.$arResult["VALUES"][$FIELD].'" autocomplete="off" placeholder="'.GetMessage("REGISTER_FIELD_".$FIELD).'"/>';
                                break;
                            case "CONFIRM_PASSWORD":
                                echo '<input size="30" type="password" name="REGISTER['.$FIELD.']" value="'.$arResult["VALUES"][$FIELD].'" autocomplete="off" placeholder="'.GetMessage("REGISTER_FIELD_".$FIELD).'"/>';
                                break;
                            case "EMAIL":
                                echo '<input type="email" name="REGISTER['.$FIELD.']" value="'.$arResult["VALUES"][$FIELD].'" placeholder="'.GetMessage("REGISTER_FIELD_".$FIELD).'">';
                                break;
                            default:
                                echo '<input size="30" type="text" name="REGISTER['.$FIELD.']" value="'.$arResult["VALUES"][$FIELD].'" placeholder="'.GetMessage("REGISTER_FIELD_".$FIELD).'">';
                        } ?>
                    </div>
                <? } ?>
                <? /*--- CAPTCHA ---*/ ?>
                <? if ($arResult["USE_CAPTCHA"] == "Y") { ?>
                    <div class="form-group">
                        <div class="captcha-input input-2">
                            <div id="captcha_container" style="width: 180px; height: 40px; display: inline-block">
                                <input  id="captcha_sid" type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                                <img class="captcha-img" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
                            </div>    
                            <input type="text" name="captcha_word" maxlength="50" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <a id="refresh_captcha" href="#">Обновить код</a>
                    </div>
                <? } ?>
                <div class="form-group">
                    <div class="has-input input-2">
                        <input type="checkbox" name="agreements" class="input-btn" id="agreements">
                        <label for="agreements"><span class="aligner">Ознакомлен с <a href="/pravila-prodazhi/" target="_blank">Правилами продажи</a>, соглашаюсь на обработку моих персональных данных</span></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="aligner">
                        <input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" />
                    </div>
                </div>
            </form>
        </div>
    <? } ?>
</div>
<script type="text/javascript">
   $(document).ready(function(){
      $('#refresh_captcha').click(function(){
         $.getJSON('<?=$this->__folder?>/reload_captcha.php', function(data) {
            $('.captcha-img').attr('src','/bitrix/tools/captcha.php?captcha_sid='+data);
            $('#captcha_sid').val(data);
         });
         return false;
      });
   });
</script>
