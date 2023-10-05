<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Финансовая отчетность АКБ Трансстройбанк. Ежемесячная финансовая отчетность по российским стандартам");
$APPLICATION->SetPageProperty("keywords", "Финансовая отчетность АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Финансовая отчетность | Трансстройбанк");
$APPLICATION->SetTitle("Финансовая отчетность");
?>
<?$APPLICATION->IncludeComponent(
	"webtu:information.disclosure",
	"",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID" => "107"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
