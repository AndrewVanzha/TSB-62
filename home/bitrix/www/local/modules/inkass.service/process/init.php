<?
/**
 * @var $APPLICATION
 * @var $USER
 */

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Inkass\Service\General;
use Inkass\Service\Logger;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Чек-лист инассатора");

global $USER;
$module_id = 'inkass.service';


//$user_id = \Bitrix\Main\UserTable::getUserGroupIds($USER->GetID());
//echo '<pre>';print_r('$id=');print_r($user_id);echo '</pre>';
//$user_group = \Bitrix\Main\Engine\CurrentUser::get()->getUserGroups();
//echo '<pre>';print_r('$id=');print_r($user_group);echo '</pre>';

// Проверяю текущего пользователя на присутствие в группе Инкассация
$arUserGroups = [];
$user_group = \Bitrix\Main\UserGroupTable::getList(array(
    'filter' => array('USER_ID'=>$USER->GetID(), 'GROUP.ACTIVE'=>'Y', 'GROUP.STRING_ID'=>'inkass'),
    'select' => array('GROUP_ID','GROUP_CODE'=>'GROUP.STRING_ID'), // выбираем идентификатор группы и символьный код группы
    'order' => array('GROUP.C_SORT'=>'ASC'), // сортируем в соответствии с сортировкой групп
));
while ($arGroup = $user_group->fetch()) {
    $arUserGroups[] = $arGroup;
}
//echo '<pre>';print_r($arUserGroups);echo '</pre>';
if (empty($arUserGroups)) {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/a_inkass_init.json', json_encode(['пользователя '.$USER->getID().' нет в группе Инкассации']), FILE_APPEND);
    $USER->logout(); // пользователь не в группе Инкассации
}
unset($arUserGroups);


/*
$arGroups = [];
$key = false;
// Определяю id Инкассации в группе
$result = \Bitrix\Main\GroupTable::getList(array(
    'select'  => array('NAME','ID','STRING_ID','C_SORT'), // выберем название, идентификатор, символьный код, сортировку
    'filter'  => array('!ID'=>'1') // все группы, кроме основной группы администраторов
));
while ($arGroup = $result->fetch()) {
    $arGroups[] =$arGroup;
}
//echo '<pre>';print_r($arGroups);echo '</pre>';

foreach ($arGroups as $ix=>$arGroup) {
    if (array_search('inkass', $arGroup) != false) { // ищу в группах пользователей inkass
        $key = $ix; // id Инкассации в группе
        break;
    }
}
if ($key != false) {
    $user_group = \Bitrix\Main\Engine\CurrentUser::get()->getUserGroups();
    //echo '<pre>';print_r($user_group);echo '</pre>';
    //echo '<pre>';print_r('$id=');print_r($arGroups[$key]['ID']);echo '</pre>';
    if (array_search($arGroups[$key]['ID'], $user_group) == false) {  //  ищу id inkass у текущего пользователя
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/a_inkass_init.json', json_encode(['пользователя '.$USER->getID().' нет в группе Инкассации']), FILE_APPEND);
        //$USER->logout(); // пользователь не в группе Инкассации
    }
} else {
    //echo '<pre>';print_r('нет группы');echo '</pre>';
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/a_inkass_init.json', json_encode(['нет группы Инкассации']), FILE_APPEND);
    $USER->logout(); // нет группы Инкассации
}
*/


$arUserGroups = [];
$user_group = \Bitrix\Main\UserGroupTable::getList(array(  //  определяю список пользователей в Инкассации
    'filter' => array('GROUP.ACTIVE'=>'Y', 'GROUP.STRING_ID'=>'inkass'),
    'select' => array('USER_ID', 'GROUP_ID','GROUP_CODE'=>'GROUP.STRING_ID'), // выбираем идентификатор группы и символьный код группы
    //'order' => array('GROUP.C_SORT'=>'ASC'), // сортируем в соответствии с сортировкой групп
));
while ($arGroup = $user_group->fetch()) {
    $arUserGroups[] = $arGroup['USER_ID'];
}
//echo '<pre>';print_r($arUserGroups);echo '</pre>';

$users= [];
$user = \Bitrix\Main\UserTable::getList(array( // Выборка всех авторизовавшихся пользователей Инкассации
    'filter' => array('ID' => $arUserGroups),
    //'select' => array('ID', 'SHORT_NAME', 'LAST_LOGIN', 'DATE_REGISTER'), // выберем идентификатор и генерируемое (expression) поле SHORT_NAME
    'select' => array('*'), //
    'order' => array('LAST_LOGIN' => 'DESC'), // все группы, кроме основной группы администраторов,
    //'limit' => 7
));
while ($arUser = $user->fetch()) {
    $users[] = $arUser;
}
//echo '<pre>';print_r($users);echo '</pre>';
$current_time = time();
//echo '<pre>';print_r($current_time);echo '</pre>';
foreach ($users as $user) {
    //echo '<pre>';print_r($user['LAST_LOGIN']);echo '</pre>';
    if ($user['LAST_LOGIN']) {
        $user_auth_time = $user['LAST_LOGIN']->getTimestamp();
    } else {
        $user_auth_time = $user['DATE_REGISTER']->getTimestamp();
    }
    $period = $current_time - $user_auth_time;
    //echo '<pre>';print_r($user_auth_time);echo '</pre>';
    //echo '<pre>';print_r($period);echo '</pre>';
    if ($period > 1*60) {
        $current_user = \Bitrix\Main\Engine\CurrentUser::get()->getId();
        if ($user['ID'] == $current_user && $current_user != 1) {
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/a_inkass_agent_logout_user.json', json_encode([$period, $user]));
            //$USER->logout();
        }
    }
}

//file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/a_inkass_users_agent.json', json_encode([$users]));
unset($users);
unset($arUserGroups);


//unset($_SESSION['INKASS']);  //  при тестировании

if ($USER->IsAuthorized()) {
    $session_start = time();
    /*
    $sessionPeriod = 100; // длительность сессии в секундах
    if ($_SESSION['INKASS']) {
        if ($_SESSION['INKASS'][$USER->GetID()]) {
            //$session_finish = time();
            //$tdiff = $session_finish - $_SESSION['INKASS'][$USER->GetID()];
            //echo 'diff='.$tdiff;
            //if ($tdiff > $sessionPeriod) { $USER->Logout(); }
        } else {
            $_SESSION['INKASS'][$USER->GetID()] = $session_start;
        }
    } else {
        $_SESSION['INKASS'][$USER->GetID()] = $session_start;
    }*/
    /*
    $session_start = new DateTime();
    if ($_SESSION['INKASS']) {
        if ($_SESSION['INKASS'][$USER->GetID()]) {
            echo '<pre>';print_r('INKASS');echo '</pre>';
            echo '<pre>';print_r($_SESSION['INKASS']);echo '</pre>';
            $session_finish = new DateTime();
            $tdiff = date_diff($_SESSION['INKASS'][$USER->GetID()]['start'], $session_finish);
            //echo $tdiff->format('%R%s secs');
            echo $tdiff;
            //if ($tdiff > $sessionPeriod) { $USER->Logout(); }
        } else {
            $session_finish = $session_finish->add(new DateInterval('PT61S'));
            $_SESSION['INKASS'][$USER->GetID()]['finish'] = $session_finish;
        }
    } else {
        $_SESSION['INKASS'][$USER->GetID()] = $session_start;
        //$session_finish = $session_finish->add(new DateInterval('PT10S'));
        //$_SESSION['INKASS'][$USER->GetID()]['finish'] = $session_finish;
    }
    */
    //echo '<pre>';print_r('INKASS');echo '</pre>';
    //echo '<pre>';print_r($_SESSION['INKASS']);echo '</pre>';
    $var_value = $_SESSION['SESS_AUTH'];
    //echo '<pre>';print_r($var_value);echo '</pre>';

} else {
    LocalRedirect('/inkass/');
}

Asset::getInstance()->addCss("/inkass.service/assets/style.css");
Asset::getInstance()->addCss("/inkass.service/assets/daterangepicker.min.css");
Asset::getInstance()->addJs("/inkass.service/assets/moment.min.js");
Asset::getInstance()->addJs("/inkass.service/assets/daterangepicker.min.js");
Asset::getInstance()->addJs("/inkass.service/assets/jquery.maskedinput.min.js");
Asset::getInstance()->addJs("/inkass.service/assets/script.js");
$session = \Bitrix\Main\Application::getInstance()->getSession();
?>
<?php
//debugg('init');
try {
    //debugg('try');
    if (Loader::IncludeModule($module_id)) {
        try {
            $request = Application::getInstance()->getContext()->getRequest();
            $get = $request->getQueryList();
            $post = $request->getPostList();
            $check = General::check_access($get['h']);
            $check = 1;

            //debugg('$request');
            //debugg($request);
            //print_r('$get=');
            //print_r($get);
            //print_r('$post');
            //print_r($post);

            //debugg(' $check=');
            //debugg($check);

            // www/local/modules/verification.service/views/init/user.php
            // www/local/modules/verification.service/views/user/check.php
            // www/local/modules/verification.service/process/user.php

            switch ($check) {
                case 1:
                    $APPLICATION->IncludeFile("/local/modules/$module_id/views/init/manager.php", array(
                        'module_id' => $module_id,
                        'get' => $get,
                        'post' => $post
                    ));
                    break;
                case 2:
                    $APPLICATION->IncludeFile("/local/modules/$module_id/views/init/user.php", array(
                        'module_id' => $module_id,
                        'hash' => $get['h'],
                        'get' => $get,
                        'post' => $post
                    ));
                    break;
                default:
                    $APPLICATION->IncludeFile("/local/modules/$module_id/views/init/forbidden.php");
                    //LocalRedirect('/inkass/');/*dop*/
            }
        } catch (Exception $e) {
            Logger::write('error', $e->getMessage());
        }
    }
} catch (Exception $e) {
    Logger::write('error', $e->getMessage());
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
