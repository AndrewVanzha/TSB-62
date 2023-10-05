<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
LocalRedirect('/404.php');