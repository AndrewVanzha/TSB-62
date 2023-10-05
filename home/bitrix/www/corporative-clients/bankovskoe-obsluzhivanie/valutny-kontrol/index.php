<?
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «Трансстройбанк» (АО), в соответствии с требованиями законодательства РФ, осуществляет банковскую деятельность. В Банке работают опытные, квалифицированные специалисты, которые помогут быстро решить все проблемы, связанные с проведением платежей.");
$APPLICATION->SetPageProperty("keywords", "Валютный контроль в АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Валютный контроль | АКБ «ТрансСтройБанк»");
$APPLICATION->SetTitle("Валютный контроль");
Asset::getInstance()->addCss("/assets/css/style-broker-deposit.css?v=1.0.6");
Asset::getInstance()->addCss("/corporative-clients/bankovskoe-obsluzhivanie/valutny-kontrol/style.css");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
Text here....
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>