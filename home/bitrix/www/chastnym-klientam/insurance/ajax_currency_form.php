<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");?>
<?php
if(isset($_GET['type'])) {
    $type_choice = htmlspecialchars($_GET['type']);     // скрипт не понадобился
} else {
    $type_choice = '';
}

$result = 'empty';
$arSections = [];
$ar_filter = Array('IBLOCK_ID'=>217, 'GLOBAL_ACTIVE'=>'Y', 'ACTIVE'=>'Y'); // Страхование физлиц
$ar_select = Array('ID', 'NAME', 'CODE', 'DESCRIPTION');
$rsSection = \Bitrix\Iblock\SectionTable::getList(array(
    'order' => array('LEFT_MARGIN'=>'ASC'),
    'filter' => $ar_filter,
    'select' => $ar_select,
));
while ($ar_section=$rsSection->fetch()) {
    $arSections[] = $ar_section;
    if ($ar_section['CODE'] == $type_choice) {
        $result = $ar_section['CODE'];
    }
}
?>
<?
/*$result = $APPLICATION->IncludeComponent(
    "webtu:feedback",
    //"card",
    "insurance",
    Array(
        "ADMIN_EVENT" => "WEBTU_FEEDBACK_INSURANCE_ADMIN",
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "EVENT_CALLBACK" => function($post){if($post['SEX']=='Мужской'){$post['RECOURSE']='Уважаемый';}else{$post['RECOURSE']='Уважаемая';}return$post;},
        "IBLOCK_ID" => "218",  // Заявка на страхование
        "POST_CALLBACK" => function($post){if(!isset($post['CITYZENSHIP'])){$post['CITYZENSHIP']='Нет';}else{$post['CITYZENSHIP']='Да';}if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['LAST_NAME'].' '.$post['FIRST_NAME'].' '.$post['SECOND_NAME'];}return$post;},
        "PROPERTIES" => array(
            "LAST_NAME",
            "FIRST_NAME",
            "SECOND_NAME",
            "BIRTHDATE",
            "SEX",
            "PHONE",
            "EMAIL",
            "CITY",
            "CITYZENSHIP",
            "TYPE",
            "TRANSLIT",
            "FOLDER",
            "REQ_URI",
            "UTM_SOURCE",
            "UTM_MEDIUM",
            "UTM_CAMPAIGN",
            "UTM_TERM",
            "UTM_CONTENT",
        ),
        "TYPE_CHOICE" => $type_choice,
        "SITES" => array("s1"),
        "USER_EVENT" => "WEBTU_FEEDBACK_INSURANCE_USER",
        "UTM" => "154",  // Заявка на страхование: администратор
    )
);*/

echo 'insurance.form.result';
echo json_encode($result);