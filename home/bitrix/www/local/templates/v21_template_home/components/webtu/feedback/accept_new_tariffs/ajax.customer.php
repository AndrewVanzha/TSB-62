<? // скрипт отключен
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
global $APPLICATION;

CModule::IncludeModule('iblock');

function sanitizePost(array $data): array
{
    if (!isset($data['CITYZENSHIP'])) {
        $data['CITYZENSHIP'] = 'Нет';
    } else {
        $data['CITYZENSHIP'] = 'Да';
    }

    if (!empty($data['FIRST_NAME'])) {
        $data['NAME'] = $data['LAST_NAME'] . ' ' . $data['FIRST_NAME'] . ' ' . $data['SECOND_NAME'];
    }
    return $data;
}

function getSex(array $data): array
{
    if ($data['SEX'] === 'Мужской') {
        $data['RECOURSE'] = 'Уважаемый';
    } else {
        $data['RECOURSE'] = 'Уважаемая';
    }
    return $data;
}

function finish(array $result): void
{
    echo json_encode($result);
    exit;
}

$arResult = [];
$arResult["status"] = true;
$arResult["captcha"] = true;
$fields = [];

if ($_POST["fields"]) {
    parse_str($_POST['fields'], $fields);
}
//file_put_contents("/home/bitrix/www".'/currency/a_post.json', json_encode($_POST));

if (count($fields)  < 1) {
    $arResult["status"] = false;
    $arResult["message"][] = [
        "text" => "Данные отсутсвуют. Повторите еще раз.",
        "type" => false, //false - сообщение об ошибке 
    ];

    finish($arResult);
}

if (!$APPLICATION->CaptchaCheckCode($fields["CAPTCHA_WORD"], $fields["CAPTCHA_ID"])) {
    $arResult["status"] = false;
    $arResult["captcha"] = false;

    finish($arResult);
}

$fields = sanitizePost($fields);
//file_put_contents("/home/bitrix/www".'/currency/a_fields_ant.json', json_encode($fields));

$arParamsProperties = json_decode($fields["PROPERTIES"]);
$arParams = (array) json_decode($fields["PARAMS"]);
//file_put_contents("/home/bitrix/www".'/currency/a_$arParams.json', json_encode($arParams));
//$iblock_id = 213;  // Согласие на новые тарифы
$iblock_id = $arParams["IBLOCK_ID"];  // Согласие на новые тарифы
/*
if ($fields["email2"]) {
    $arResult["status"] = false;
    $arResult["message"][] = [
        "text" => "Извините, но что-то пошло не так.",
        "type" => false,
    ];
    finish($arResult);
}
*/
$element = new CIBlockElement;

$properties = [];
$propertiesPost = [];

$propertiesPre = CIBlockProperty::GetList(
    [],
    //["IBLOCK_ID" => $arParams->IBLOCK_ID]
    ["IBLOCK_ID" => $iblock_id]
);
$propertiesList = [];

while ($property = $propertiesPre->Fetch()) {
    $propertiesList[$property['CODE']] = $property['ID'];
}
//file_put_contents("/home/bitrix/www".'/currency/a_$propertiesList.json', json_encode($propertiesList));

unset($property);

//foreach ($arParams->PROPERTIES as $property) {
foreach ($arParamsProperties as $property) {
    if (isset($fields[$property])) {
        $properties[$propertiesList[$property]] = $fields[$property];
        $propertiesPost[$property] = $fields[$property];
    }
}
//file_put_contents("/home/bitrix/www".'/currency/a_$properties.json', json_encode($properties));
//file_put_contents("/home/bitrix/www".'/currency/a_$propertiesPost.json', json_encode($propertiesPost));

$elementFields = array(
    "IBLOCK_SECTION_ID" => false,
    //"IBLOCK_ID"         => $arParams->IBLOCK_ID,
    "IBLOCK_ID"         => $iblock_id,
    "PROPERTY_VALUES"   => $properties,
    "ACTIVE"            => "Y",
    "DATE_CREATE"       => date('d.m.Y H:i:s', time()),
);

$elementFields['NAME']         = isset($fields['NAME'])         ? $fields['NAME']         : 'Новое обращение';
$elementFields['PREVIEW_TEXT'] = isset($fields['PREVIEW_TEXT']) ? $fields['PREVIEW_TEXT'] : '';
$elementFields['DETAIL_TEXT']  = isset($fields['DETAIL_TEXT'])  ? $fields['DETAIL_TEXT']  : '';

$elementFields['UTM_SOURCE'] = isset($fields['UTM_SOURCE'])? $fields['UTM_SOURCE'] : 'no_data';
$elementFields['UTM_MEDIUM'] = isset($fields['UTM_MEDIUM'])? $fields['UTM_MEDIUM'] : 'no_data';
$elementFields['UTM_CAMPAIGN'] = isset($fields['UTM_CAMPAIGN'])? $fields['UTM_CAMPAIGN'] : 'no_data';
$elementFields['UTM_TERM'] = isset($fields['UTM_TERM'])? $fields['UTM_TERM'] : 'no_data';
$elementFields['UTM_CONTENT'] = isset($fields['UTM_CONTENT'])? $fields['UTM_CONTENT'] : 'no_data';
$elementFields['FORM'] = 147;  //  Согласие на новые тарифы: администратор

$success_message = 'Сообщение успешно отправлено';
if ($elementFields["PROPERTY_VALUES"][803] == 'не принимаю') {
    $propertiesPost['PREVIEW_TEXT'] = 'Для подтверждения отказа от обслуживания по  новым условиям с вами свяжется наш специалист.';
    $success_message = $success_message . "<br>Для подтверждения отказа от обслуживания по  новым условиям с вами свяжется наш специалист.";
}
$propertiesPost["DATE_CREATE"] = date('d.m.Y H:i:s', time());
file_put_contents("/home/bitrix/www".'/currency/a_$elementFields.json', json_encode($elementFields));

if ($id = $element->Add($elementFields)) {
    $arResult["message"][] = [
        "text" => $success_message,
        "type" => true,
    ];

    $postFields = array_merge($elementFields, $propertiesPost);
    //file_put_contents("/home/bitrix/www".'/currency/a_$postFields.json', json_encode($postFields));
    $postFields['APPLICATION_ID'] = $id;

    $postFields = getSex($postFields);

    if ($arParams["ADMIN_EVENT"] != 'NONE') {
        CEvent::Send($arParams["ADMIN_EVENT"], $arParams["SITES"], $postFields);
    }

    if ($arParams["USER_EVENT"] != 'NONE') {
        CEvent::Send($arParams["USER_EVENT"], $arParams["SITES"], $postFields);
    }
} else {
    $arResult["status"] = false;
    $arResult["message"][] = [
        "text" => $element->LAST_ERROR,
        "type" => false,
    ];
}

finish($arResult);
