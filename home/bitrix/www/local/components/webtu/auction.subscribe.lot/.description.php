<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	"NAME"        => Loc::getMessage("ASL_NAME"),
	"DESCRIPTION" => Loc::getMessage("ASL_DESCRIPTION"),
	"ICON" => "/images/sale_account.gif",
	"SORT" => 40,
	"PATH" => array(
		"ID"   => "WEBTU",
		"NAME" => Loc::getMessage("WEBTU_PATH_ADDITIONAL"),
		"CHILD" => array(
			"ID" => "auc",
			"NAME" => GetMessage("AUC_PATH_ADDITIONAL"),
			"SORT" => 20,
   			"CHILD" => array(
				"ID" => "auc_cmpx",
			),
		),
	)
); 
?>