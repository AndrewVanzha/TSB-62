<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$buttonId = $this->randString();
?>
<div class="form-subs"  id="sender-subscribe">
<?$frame = $this->createFrame("sender-subscribe", false)->begin();?>
	<?if(isset($arResult['MESSAGE'])): CJSCore::Init(array("popup"));?>
		<div id="popup-hail" class="popup">
			<div class="table">
				<div class="table-cell"><img src="/assets/images/popup-hail.png" alt=""></div>
				<div class="table-cell">
					<div class="title">Поздравляем!</div>
					<div class="text">Вы стали подписчиком</div>
				</div>
			</div>
		</div>
		
		<? if ( $_GET["sender_subscription"] == "message_success" ) { ?>
			<script>
				$(window).load(function(){
	                $.fancybox.open({
	                	src  : '#popup-hail',
	                	type : 'inline',
	                	opts : {
	                		onComplete : function() {

	                		}
	                	}
	                });
	            });
			</script>
		<? } ?>
	<?endif;?>

	<script>
		BX.ready(function()
		{
			BX.bind(BX("bx_subscribe_btn_<?=$buttonId?>"), 'click', function() {
				setTimeout(mailSender, 250);
				return false;
			});
		});

		function mailSender()
		{
			setTimeout(function() {
				var btn = BX("bx_subscribe_btn_<?=$buttonId?>");
				if(btn)
				{
					var btn_span = btn.querySelector("span");
					var btn_subscribe_width = btn_span.style.width;
					BX.addClass(btn, "send");
					btn_span.outterHTML = "<span><i class='fa fa-check'></i> <?=GetMessage("subscr_form_button_sent")?></span>";
					if(btn_subscribe_width)
						btn.querySelector("span").style["min-width"] = btn_subscribe_width+"px";
				}
			}, 400);
		}
	</script>

	<form role="form" method="post" action="<?=$arResult["FORM_ACTION"]?>"  onsubmit="BX('bx_subscribe_btn_<?=$buttonId?>').disabled=true;">
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="sender_subscription" value="add">

        <div class="title">Оставьте свой e-mail и получайте наши новости</div>

		<div class="group">
			<input class="input" type="email" name="SENDER_SUBSCRIBE_EMAIL" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" placeholder="<?=htmlspecialcharsbx(GetMessage('subscr_form_email_title'))?>">
		</div>
        
        <?/*
		<?if(count($arResult["RUBRICS"])>0):?>
			<div class="bx-subscribe-desc"><?=GetMessage("subscr_form_title_desc")?></div>
		<?endif;?>
        */?>
        
		<?//foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
<!--     		<div class="bx_subscribe_checkbox_container" style="display: none;">
    			<input type="checkbox" name="SENDER_SUBSCRIBE_RUB_ID[]" id="SENDER_SUBSCRIBE_RUB_ID_<?//=$itemValue["ID"]?>" value="<?//=$itemValue["ID"]?>"<?//if($itemValue["CHECKED"]) echo " checked"?>>
    			<label for="SENDER_SUBSCRIBE_RUB_ID_<?//=$itemValue["ID"]?>"><?//=htmlspecialcharsbx($itemValue["NAME"])?></label>
    		</div> -->
		<?//endforeach;?>
        
        <div class="group">
            <div class="has-input">
                <input type="checkbox" class="input-btn" id="mail-2" checked="checked" onchange="ComplianceDispatchOnchange(this);" />
                <label for="mail-2">Даю свое согласие на получение e-mail рассылки</label>
            </div>
        </div>

        <div class="group subscribeSave-wrapper">
            <div class="disabled"></div>
            <button class="btn-subscribe" id="bx_subscribe_btn_<?=$buttonId?>"><?=GetMessage("subscr_form_button")?></button>
        </div>
	</form>
    
<?$frame->beginStub();?>
	<?if(isset($arResult['MESSAGE'])): CJSCore::Init(array("popup"));?>
		<div id="sender-subscribe-response-cont" style="display: none;">
			<div class="bx_subscribe_response_container">
				<table>
					<tr>
						<td style="padding-right: 40px; padding-bottom: 0px;"><img src="<?=($this->GetFolder().'/images/'.($arResult['MESSAGE']['TYPE']=='ERROR' ? 'icon-alert.png' : 'icon-ok.png'))?>" alt=""></td>
						<td>
							<div style="font-size: 22px;"><?=GetMessage('subscr_form_response_'.$arResult['MESSAGE']['TYPE'])?></div>
							<div style="font-size: 16px;"><?=htmlspecialcharsbx($arResult['MESSAGE']['TEXT'])?></div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<script>
			BX.ready(function(){
				var oPopup = BX.PopupWindowManager.create('sender_subscribe_component', window.body, {
					autoHide: true,
					offsetTop: 1,
					offsetLeft: 0,
					lightShadow: true,
					closeIcon: true,
					closeByEsc: true,
					overlay: {
						backgroundColor: 'rgba(57,60,67,0.82)', opacity: '80'
					}
				});
				oPopup.setContent(BX('sender-subscribe-response-cont'));
				oPopup.show();
			});
		</script>
	<?endif;?>

	<script>
		BX.ready(function()
		{
			BX.bind(BX("bx_subscribe_btn_<?=$buttonId?>"), 'click', function() {
				setTimeout(mailSender, 250);
				return false;
			});
		});

		function mailSender()
		{
			setTimeout(function() {
				var btn = BX("bx_subscribe_btn_<?=$buttonId?>");
				if(btn)
				{
					var btn_span = btn.querySelector("span");
					var btn_subscribe_width = btn_span.style.width;
					BX.addClass(btn, "send");
					btn_span.outterHTML = "<span><i class='fa fa-check'></i> <?=GetMessage("subscr_form_button_sent")?></span>";
					if(btn_subscribe_width)
						btn.querySelector("span").style["min-width"] = btn_subscribe_width+"px";
				}
			}, 400);
		}
	</script>

	<form role="form" method="post" action="<?=$arResult["FORM_ACTION"]?>"  onsubmit="BX('bx_subscribe_btn_<?=$buttonId?>').disabled=true;">
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="sender_subscription" value="add">

        <div class="title">Оставьте свой e-mail и получайте новости об аукционах</div>

		<div class="group">
			<input class="input" type="email" name="SENDER_SUBSCRIBE_EMAIL" value="" title="<?=GetMessage("subscr_form_email_title")?>" placeholder="<?=htmlspecialcharsbx(GetMessage('subscr_form_email_title'))?>">
		</div>
        
		<?if(count($arResult["RUBRICS"])>0):?>
			<div class="bx-subscribe-desc"><?=GetMessage("subscr_form_title_desc")?></div>
		<?endif;?>
        
		<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
			<div class="bx_subscribe_checkbox_container">
				<input type="checkbox" name="SENDER_SUBSCRIBE_RUB_ID[]" id="SENDER_SUBSCRIBE_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>">
				<label for="SENDER_SUBSCRIBE_RUB_ID_<?=$itemValue["ID"]?>"><?=htmlspecialcharsbx($itemValue["NAME"])?></label>
			</div>
		<?endforeach;?>
        
        <div class="group">
            <div class="has-input">
                <input type="checkbox" class="input-btn" id="mail-2" checked>
                <label for="mail-2">Даю свое согласие на получение e-mail рассылки</label>
            </div>
        </div>

        <div class="group subscribeSave-wrapper">
            <div class="disabled"></div>
            <button class="sender-btn btn-subscribe" id="bx_subscribe_btn_<?=$buttonId?>"><?=GetMessage("subscr_form_button")?></button>
        </div>
	</form>
<?$frame->end();?>
</div>