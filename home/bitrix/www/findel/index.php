<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("findel");
?>
<?
 if(!CModule::IncludeModule("iblock")) return; 
echo 'QQ';
 $res = CIBlockElement::GetByID(187);
echo '<pre>';
var_dump($res);
echo '</pre>';
 if($ar_res = $res->GetNext()) var_dump($ar_res);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>