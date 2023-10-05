<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="form-change-col">
    <?
        if($arResult["strProfileError"]){
            echo '<div class="alert alert-danger">';
        	   echo ShowError($arResult["strProfileError"]);
            echo '</div>';
        }
        if ($arResult['DATA_SAVED'] == 'Y'){ 
                echo '<div class="alert alert-danger">';
            	   echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
                echo '</div>';
        }
    ?>
    <form id="personal_data" method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data">
    	<?=$arResult["BX_SESSION_CHECK"]?>
    	<input type="hidden" name="lang" value="<?=LANG?>" />
    	<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
    	<input type="hidden" name="LOGIN" value="<?=$arResult["arUser"]["LOGIN"]?>" />
    	<input type="hidden" name="EMAIL" value="<?=$arResult["arUser"]["EMAIL"]?>" />
    
		<div class="form-change">
			<div class="topic-title">Персональные данные</div>
			<div class="form-group">
                <input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" placeholder="<?=GetMessage('LAST_NAME')?>" />
			</div>
            
			<div class="form-group">
                <input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" placeholder="<?=GetMessage('NAME')?>" />
			</div>
            
			<div class="form-group">
                <input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" placeholder="<?=GetMessage('SECOND_NAME')?>" />
			</div>
            
			<div class="form-group">
				<div class="row">
					<div class="size size-1">
            			<select name="PERSONAL_GENDER">
            				<option value=""><?=GetMessage('USER_GENDER')?></option>
            				<option value="M"<?=$arResult["arUser"]["PERSONAL_GENDER"] == "M" ? " SELECTED=\"SELECTED\"" : ""?>><?=GetMessage("USER_MALE")?></option>
            				<option value="F"<?=$arResult["arUser"]["PERSONAL_GENDER"] == "F" ? " SELECTED=\"SELECTED\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
            			</select>
					</div>
					<div class="size size-1 personal-birthday">
            			<?$APPLICATION->IncludeComponent(
            				'bitrix:main.calendar',
            				'',
            				array(
            					'SHOW_INPUT' => 'Y',
            					'FORM_NAME' => 'form1',
            					'INPUT_NAME' => 'PERSONAL_BIRTHDAY',
                                'INPUT_VALUE' => $arResult["arUser"]["PERSONAL_BIRTHDAY"],
            					'INPUT_ADDITIONAL_ATTR' => 'placeholder="'.GetMessage("USER_BIRTHDAY_DT").'"',
                                'SHOW_TIME' => 'N'
            				),
            				null,
            				array('HIDE_ICONS' => 'Y')
            			);?>
					</div>
				</div>
			</div>
            
			<div class="form-group">
                <input type="text" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" placeholder="<?=GetMessage('EMAIL')?><?if($arResult["EMAIL_REQUIRED"]):?>*<?endif?>" />
			</div>
            
			<div class="form-group">
                <input class="js-mask" type="text" name="PERSONAL_PHONE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" placeholder="+7 ___ ___-__-__" />
			</div>
		</div>

		<div class="form-change">
			<div class="topic-title">Прикрепить документы</div>
			<div class="form-group">
				<div>Если Вы хотите приобрести монеты с доставкой, Вам необходимо прикрепить скан паспорта с разворотом главной  страницы и страницы с пропиской. Действующее законодательство требует проводить все операции с драгоценными металлами по предъявлению паспорта.  При доставке Вашего заказа ФГУП Спецсвязь попросит Вас предъявить паспорт.</div>
				<div class="box" id="box">
					<? foreach ($arResult["USER_PROPERTIES"]["DATA"]["UF_DOCUMENTS"]["VALUE"] as $fileId) { ?>
						<label class="file-box">
							<? $file = CFile::GetByID($fileId); ?>
                            <? $file = $file->GetNext(); ?>
							<? if ($file['CONTENT_TYPE'] == 'application/pdf') { ?>
                                <?=$file['ORIGINAL_NAME']?><br>
                            <? } else { ?>
                                <a href="<?=CFile::GetPath($fileId)?>" class="fancybox">
                                    <img src="<?=CFile::GetPath($fileId)?>" style="max-width: 150px; max-height: 150px;">
                                </a>
                            <? } ?>
							<input type="hidden" name="UF_DOCUMENTS_old_id[]" value="<?=$fileId?>">
						</label>
						<div style="margin-top: 10px;">
							<input value="<?=$file?>" type="checkbox" name="UF_DOCUMENTS_del[]" id="UF_DOCUMENTS_del[]" style="display: inline-block; width: 15px; height: 15px;">
							Удалить
						</div>
						<div style="display: none;">
							<input name="UF_DOCUMENTS[]" size="0" type="file" style="visibility: hidden; position: absolute;">
						</div>
					<? } ?>
					<label class="file-box">
						<input name="UF_DOCUMENTS[]" size="0" type="file" style="visibility: hidden; position: absolute;">
						<span class="cap">Выбрать</span>
					</label>
				</div>
				<div class="box">
					<input type="button" class="btn-add" id="add-input" value="Добавить" style="line-height: initial!important;">
				</div>
			</div>
		</div>

		<div class="form-change">
			<div class="topic-title"><?=GetMessage('NEW_PASSWORD_TITLE')?></div>
			
            <div class="form-group">
                <input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off"  placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>" />
			</div>
            
			<div class="form-group">
                <input class="input-field" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" placeholder="<?=GetMessage('NEW_PASSWORD_CONFIRM')?>" />
			</div>
		</div>

        <div class="form-submit"><input type="submit" name="save" value="<?=GetMessage("MAIN_SAVE")?>" /></div>
    </form>
</div>