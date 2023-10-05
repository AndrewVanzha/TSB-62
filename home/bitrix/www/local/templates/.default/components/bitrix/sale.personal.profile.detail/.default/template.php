<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;

if(strlen($arResult["ID"])>0)
{
if(strlen($arResult["ERROR_MESSAGE"])>0){
    echo '<div class="message_err">';
	   ShowError($arResult["ERROR_MESSAGE"]);
    echo '</div>';
}
?>
<form class="new-profile clearfix" method="post" action="<?=POST_FORM_ACTION_URI?>" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />

    <label class="input-group">
        <span class="caption"><?=Loc::getMessage('SALE_PNAME')?>:<span class="req">*</span></span>
        <input type="text" name="NAME" maxlength="50" id="sale-personal-profile-detail-name" value="<?=htmlspecialcharsbx($arResult["NAME"])?>" />
    </label>

	<?foreach($arResult["ORDER_PROPS"] as $block)
	{
		if (!empty($block["PROPS"]))
		{
			echo '<h2 class="sale-personal-profile-detail-form-title">'.$block["NAME"].'</h2>';
            
			foreach($block["PROPS"] as $key => $property)
			{
				$name = "ORDER_PROP_".$property["ID"];
				$currentValue = $arResult["ORDER_PROPS_VALUES"][$name];
				$alignTop = ($property["TYPE"] === "LOCATION" && $arParams['USE_AJAX_LOCATIONS'] === 'Y') ? "vertical-align-top" : "";
                
                echo '<span class="input-group sale-personal-profile-detail-property-'.strtolower($property["TYPE"]).'">';
                    echo '<span class="caption">'.$property["NAME"].( ($property["REQUIED"] == "Y") ? " *" : "" ).'</span>';
                
					if ($property["TYPE"] == "CHECKBOX")
					{
						?>
						<input
							id="sppd-property-<?=$key?>"
							type="checkbox"
							name="<?=$name?>"
							value="Y"
							<?if ($currentValue == "Y" || !isset($currentValue) && $property["DEFAULT_VALUE"] == "Y") echo " checked";?>/>
					<?}elseif ($property["TYPE"] == "TEXT"){?>
						<input
							type="text" name="<?=$name?>"
							maxlength="50"
							id="sppd-property-<?=$key?>"
							value="<?=$currentValue?>"/>
					<?}elseif ($property["TYPE"] == "SELECT"){?>
						<select
							name="<?=$name?>"
							id="sppd-property-<?=$key?>"
							size="<?echo (intval($property["SIZE1"])>0)?$property["SIZE1"]:1; ?>">
								<?
								foreach ($property["VALUES"] as $value)
								{
									?>
									<option value="<?= $value["VALUE"]?>" <?if ($value["VALUE"] == $currentValue || !isset($currentValue) && $value["VALUE"]==$property["DEFAULT_VALUE"]) echo " selected"?>>
										<?= $value["NAME"]?>
									</option>
									<?
								}
								?>
						</select>
					<?}elseif ($property["TYPE"] == "MULTISELECT"){?>
						<select
							id="sppd-property-<?=$key?>"
							multiple name="<?=$name?>[]"
							size="<?echo (intval($property["SIZE1"])>0)?$property["SIZE1"]:5; ?>">
								<?
								$arCurVal = array();
								$arCurVal = explode(",", $currentValue);
								for ($i = 0, $cnt = count($arCurVal); $i < $cnt; $i++)
									$arCurVal[$i] = trim($arCurVal[$i]);
								$arDefVal = explode(",", $property["DEFAULT_VALUE"]);
								for ($i = 0, $cnt = count($arDefVal); $i < $cnt; $i++)
									$arDefVal[$i] = trim($arDefVal[$i]);
								foreach($property["VALUES"] as $value)
								{
									?>
									<option value="<?= $value["VALUE"]?>"<?if (in_array($value["VALUE"], $arCurVal) || !isset($currentValue) && in_array($value["VALUE"], $arDefVal)) echo" selected"?>><?echo $value["NAME"]?></option>
									<?
								}
								?>
						</select>
					<?}elseif ($property["TYPE"] == "TEXTAREA"){?>
						<textarea
							id="sppd-property-<?=$key?>"
							rows="<?echo ((int)($property["SIZE2"])>0)?$property["SIZE2"]:4; ?>"
							cols="<?echo ((int)($property["SIZE1"])>0)?$property["SIZE1"]:40; ?>"
							name="<?=$name?>"><?= (isset($currentValue)) ? $currentValue : $property["DEFAULT_VALUE"];?>
						</textarea>
					<?}elseif ($property["TYPE"] == "LOCATION"){
						$locationTemplate = ($arParams['USE_AJAX_LOCATIONS'] !== 'Y') ? "popup" : "";

						$locationValue = intval($currentValue) ? $currentValue : $property["DEFAULT_VALUE"];
						CSaleLocation::proxySaleAjaxLocationsComponent(
							array(
								"AJAX_CALL" => "N",
								'CITY_OUT_LOCATION' => 'Y',
								'COUNTRY_INPUT_NAME' => $name.'_COUNTRY',
								'CITY_INPUT_NAME' => $name,
								'LOCATION_VALUE' => $locationValue,
							),
							array(
							),
							$locationTemplate,
							true,
							'location-block-wrapper'
						);

					}elseif ($property["TYPE"] == "RADIO"){
						foreach($property["VALUES"] as $value)
						{?>
							<input
								type="radio"
								id="sppd-property-<?=$key?>"
								name="<?=$name?>"
								value="<?echo $value["VALUE"]?>"
								<?if ($value["VALUE"] == $currentValue || !isset($currentValue) && $value["VALUE"] == $property["DEFAULT_VALUE"]) echo " checked"?>>
							<?= $value["NAME"]?><br /><?
						}
					}elseif ($property["TYPE"] == "FILE"){
    					$multiple = ($property["MULTIPLE"] === "Y") ? "multiple" : '';
    					?>

    					<div class="box">
    						<label class="file-box">
                                <input type="file" name="<?=$name?>[]" style="visibility: hidden;position: absolute">
                                <span class="cap">Выбрать</span>
                            </label>
                            
    					</div>
    					<input type="button" class="btn-add" id="add-input" value="Добавить">

                        <?//=CFile::InputFile($name."[]", 20, null, false, 0, "IMAGE", "class='btn sale-personal-profile-detail-input-file' ".$multiple)?>

    					<span class="sale-personal-profile-detail-load-file-cancel sale-personal-profile-hide"></span>
                        
    					<?if(count($currentValue) > 0){?>
    						<input type="hidden" name="<?=$name?>_del" class="profile-property-input-delete-file">
                            </br></br>
    						<?$profileFiles = unserialize(htmlspecialchars_decode($currentValue));
    						if (!is_array($profileFiles)){$profileFiles = array($profileFiles);}

    						foreach ($profileFiles as $file)
    						{?>
    							<div class="sale-personal-profile-detail-form-file" style="clear: right">
    								
    								<?$fileInfo = CFile::GetByID($file);
    								$fileInfoArray = $fileInfo->Fetch();
    								
    								if($file){
	    								if (CFile::IsImage($fileInfoArray['FILE_NAME']))
	    								{
	    									?>
	    									<?=CFile::ShowImage($file, 150, 150, "border=0", "", true)?>
	   									<?}else{?>
	   										
	    									<a download="<?=$fileInfoArray["ORIGINAL_NAME"]?>" href="<?=CFile::GetFileSRC($fileInfoArray)?>">
	    										<?=Loc::getMessage('SPPD_DOWNLOAD_FILE', array("#FILE_NAME#" => $fileInfoArray["ORIGINAL_NAME"]))?>
	    									</a>
	   									<?}?>
   										<input type="checkbox" value="<?=$file?>" class="profile-property-check-file" id="profile-property-check-file-<?=$file?>">
    									<label for="profile-property-check-file-<?=$file?>"><?=Loc::getMessage('SPPD_DELETE_FILE')?></label>
    								<?}?>
    							</div>
   							<?}#end foreach
    					}#end count($currentValue)
    				}#end FILE

                    /*
					if (strlen($property["DESCRIPTION"]) > 0)
					{
						echo '<br /><small>'.$property["DESCRIPTION"].'</small>';
					}
                    */
				echo '</span>';
			}#end foreach($block["PROPS"])
		}#end if (!empty($block["PROPS"]))
	}#end foreach($arResult["ORDER_PROPS"])?>

	<div class="sale-personal-profile-submit-block">
		<input type="submit" class="button" name="save" value="<?echo GetMessage("SALE_SAVE") ?>" />
		<input type="submit" class="button"  name="apply" value="<?=GetMessage("SALE_APPLY")?>" />
		<input type="submit" class="button"  name="reset" value="<?echo GetMessage("SALE_RESET")?>" />
	</div>

	<script>
		BX.message({
			SPPD_FILE_COUNT: '<?=Loc::getMessage('SPPD_FILE_COUNT')?>',
			SPPD_FILE_NOT_SELECTED: '<?=Loc::getMessage('SPPD_FILE_NOT_SELECTED')?>'
		});
		BX.Sale.PersonalProfileComponent.PersonalProfileDetail.init();
	</script>

</form>
<?
}else{
	ShowError($arResult["ERROR_MESSAGE"]);
}
?>
