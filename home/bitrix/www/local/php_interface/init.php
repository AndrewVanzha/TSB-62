<?php
use \Bitrix\Main;
use \Bitrix\Main\Application;
use \Bitrix\Main\Loader;

require_once ($_SERVER['DOCUMENT_ROOT']."/local/php_interface/functions.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/local/php_interface/events.php"); // снял комментирование 8.9.22
require_once ($_SERVER['DOCUMENT_ROOT']."/local/php_interface/UpdateMetal/UpdateMetal.php");

function route($name) {
    $routes = array(
        'user-politics' => '/politics/'    
    );
    
    return $routes[$name];
}

function loadKursTSB(){
	CBitrixComponent::includeComponentClass("webtu:synch.currency");
	
	$kurs = new SynchCurrency();
	$kurs->updateCourses();
	
	return "loadKursTSB();";
}

function loadKursMetal(){

	$metal = new UpdateMetal();
	$metal->updateMetal();

	return "loadKursMetal();";
}

function loadTest(){
	CBitrixComponent::includeComponentClass("webtu:synch.currency");

	$kurs = new SynchCurrency();
	$kurs->updateTest();

	return "loadTest();";
}

function collectUTM(){
    CBitrixComponent::includeComponentClass("webtu:feedback");

    $utm = new WebtuFeedback();
    $utm->collectUTMstatus();

    return "collectUTM();";
}

//Данные для текущего города
if (Loader::includeModule('iblock')){
	session_start();
    $citySes = ($_SESSION['city']) ? $_SESSION['city'] : 399;
    $rsList = CIBlockElement::GetList(
        Array("SORT"=>"ASC"),
        Array("IBLOCK_ID"=>114, "ID"=>$citySes),
        false,
        false,
        Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_ATT_ENGLISH", "PROPERTY_ATT_PHONE_1", "PROPERTY_ATT_PHONE_2", "PROPERTY_ATT_EMAIL_1", "PROPERTY_ATT_EMAIL_2", "PROPERTY_ATT_ADDRESS", "PROPERTY_ATT_ADDRESS_ENGLISH", "PROPERTY_ATT_TIME", "PROPERTY_ATT_TIME_ENGLISH", "PROPERTY_ATT_WHERE")
    );
    while($arList = $rsList->Fetch()){
        //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/arlist.json', json_encode($arList));
        //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/arlist.txt', $arList);
        \GarbageStorage::set('name', $arList['NAME']);
        \GarbageStorage::set('nameWhere', $arList['PROPERTY_ATT_WHERE_VALUE'] ?? $arList['NAME']);
        \GarbageStorage::set('english_name', $arList['PROPERTY_ATT_ENGLISH_VALUE']);
    	\GarbageStorage::set('phone_1', $arList['PROPERTY_ATT_PHONE_1_VALUE']); 
    	\GarbageStorage::set('phone_2', $arList['PROPERTY_ATT_PHONE_2_VALUE']); 
    	\GarbageStorage::set('email_1', $arList['PROPERTY_ATT_EMAIL_1_VALUE']); 
    	\GarbageStorage::set('email_2', $arList['PROPERTY_ATT_EMAIL_2_VALUE']);
    	\GarbageStorage::set('address', $arList['PROPERTY_ATT_ADDRESS_VALUE']);
        \GarbageStorage::set('english_address', $arList['PROPERTY_ATT_ADDRESS_ENGLISH_VALUE']);
    	\GarbageStorage::set('time', $arList['PROPERTY_ATT_TIME_VALUE']);
        \GarbageStorage::set('english_time', $arList['PROPERTY_ATT_TIME_ENGLISH_VALUE']);
    }
}

session_start();
CModule::AddAutoloadClasses(
    '', // не указываем имя модуля
    array(
        // ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
        //'BFPict' => $_SERVER['DOCUMENT_ROOT']."/local/php_interface/classPict.php",
        '\BFPict\Pict' => "/local/php_interface/classPict.php",
    )
);
/*
function loadSessionCheck()
{
    if (Loader::includeModule('inkass')) {
        global $USER;
        $sessionPeriod = 100; // длительность сессии в секундах
        if ($_SESSION['INKASS']) {
            if ($_SESSION['INKASS'][$USER->GetID()]) {
                $session_finish = time();
                $tdiff = $session_finish - $_SESSION['INKASS'][$USER->GetID()];
                echo 'diff=' . $tdiff;
                //if ($tdiff > $sessionPeriod) { $USER->Logout(); }
            }
        }
    }
    return "loadSessionCheck();";
}
*/
CModule::AddAutoloadClasses(
    '', // не указываем имя модуля
    array(
        // ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
        '\debugg\oop\dvlp' => "/local/php_interface/debugg.oop/dvlp.php",
    )
);
function debugg($data)
{
	global $USER;
	if($USER->GetID() == 107) {
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
}

//AddEventHandler("main", "OnBeforeProlog", "OnBeforePrologHandler2");
AddEventHandler("main", "OnProlog", "OnBeforePrologHandler2");
function OnBeforePrologHandler2()
{
    //file_put_contents( '/local/a_OnBeforePrologHandler.json', json_encode(date('F j, Y, g:i a')));
    //echo '123';
}

// Возможность вести лог запуска агентов.
define("BX_AGENTS_LOG_FUNCTION","sysAgentLog");

function sysAgentLog($arAgent =false,$state = false, $eval_result = false, $e = false){
    AddMessage2Log(array('STATE' => $state,'AGENT'=> $arAgent,'EVAL' => $eval_result,'E'=>$e));
}

// Константа BX_AGENTS_LOG_FUNCTION должна содержать название функции, которая будет вызвана до начала исполнения агента и после него.
// Все вызовы агентов пишутся в лог, вместе с параметрами.
// Не забудьте удалить определение после работы иначе лог сожрет все место на диске!
