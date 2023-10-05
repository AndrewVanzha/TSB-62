<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
?>
<div class="form-change-col">
<div class="form-change">
<?
if(strlen($arResult["ERROR_MESSAGE"])>0){
    echo '<div class="message_err">';
	   ShowError($arResult["ERROR_MESSAGE"]);
    echo '</div>';
}

if (count($arResult["PROFILES"]))
{
    echo '<div class="profile-section">';
        echo '<div class="topic-title">Адреса доставки</div>';
        
		foreach($arResult["PROFILES"] as $val)
		{
            echo '<div class="profile-address-item">';
                echo '<div class="profile-field-name">'.$val["NAME"].'</div>';
                echo '<div class="action-block">';
                    echo '<a class="edit" title="'.Loc::getMessage("SALE_DETAIL_DESCR").'" href="'.$val["URL_TO_DETAIL"].'"><span>'.Loc::getMessage("SALE_DETAIL").'</span></a>';
                    echo '<a class="button--remove" title="'.Loc::getMessage("SALE_DELETE_DESCR").'" href="javascript:if(confirm(\''.Loc::getMessage("STPPL_DELETE_CONFIRM").'\')) window.location=\''.$val["URL_TO_DETELE"].'\'"></a>';
                echo '</div>';
            echo '</div>';
        }
    echo '</div>';

	if(strlen($arResult["NAV_STRING"]) > 0)
	{
		echo '<p>'.$arResult["NAV_STRING"].'</p>';
	}
}
else
{
    echo '<div class="profile-section">';
        echo '<h3 class="page-title--3 page-title"><strong>'.Loc::getMessage("STPPL_EMPTY_PROFILE_LIST").'</strong></h3>';
    echo '</div>';
}
?>
</div>
</div>