<?
use Bitrix\Main\Page\Asset;

//if (!$_GET['check_id']) {
//    define("NEED_AUTH", true);
//}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вход в чек-лист инкассатора");
global $USER;
Asset::getInstance()->addCss("/inkass/style.css");
?>
<?php
//if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0) {
//    LocalRedirect($_REQUEST["backurl"]);
//}

if ($_GET['check_id']) : ?>
    <div class="v21-section">
        <div class="v21-container">
            <div class="verification">
                <h1 class="verification-header">Информация успешно отправлена</h1>
                <div class="form-group" style="text-align: center;">
                    <noindex>
                        <div class="aligner" style="margin-top: 64px;">
                            <a href="/inkass/" rel="nofollow" class="button-1 vs-form__button" style="color: #ffffff;">На главную</a>
                        </div>
                    </noindex>
                </div>
            </div>
        </div>
    </div>

<? else: ?>
    <div class="v21-section">
        <div class="v21-container">
            <div class="verification">
                <h1 class="verification-header">Вход в систему</h1>
                <p class="verification-subheader">Введите логин и пароль</p>
                <div class="verification-wrap"-->
                    <? $app = $APPLICATION->IncludeComponent(
                        "bitrix:system.auth.form",
                        "",
                        //"system.auth.authorize",
                        //"inkass",
                        Array(
                            "REGISTER_URL" => "",
                            //"REGISTER_URL" => "/auth/registration.php", /auth/?forgot_password=yes
                            "FORGOT_PASSWORD_URL" => "/auth/?forgot_password=yes",
                            "PROFILE_URL" => "/inkass.service/",
                            "SHOW_ERRORS" => "Y"
                        )
                    );
                    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/a_inkass_auth.json', json_encode([$app]));
                    //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/currency/a_post.json', json_encode($_POST));
                    ?>
                    <?php if(!$USER->IsAuthorized()) : ?>
                        <div class="verification-error verification-error-anim">Ошибка логина или пароля</div>
                    <? endif; ?>
                </div>
            </div>

        </div>
    </div>
    <?php if($USER->IsAuthorized()) {
        //unset($_SESSION['INKASS'][$USER->GetID()]);
        LocalRedirect('/inkass.service/');
    } ?>
<? endif; ?>
<?/*$APPLICATION->IncludeComponent("bitrix:system.auth.confirmation","",Array(
        "USER_ID" => "confirm_user_id",
        "CONFIRM_CODE" => "confirm_code",
        "LOGIN" => "login"
    )
);*/?>
<?
//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/*
// LocalRedirect('/verification.service/');

$APPLICATION->SetTitle("Авторизация");

?>
<p>Вы зарегистрированы и успешно авторизовались.</p>

<p>Используйте административную панель в верхней части экрана для быстрого доступа к функциям управления структурой и информационным наполнением сайта. Набор кнопок верхней панели отличается для различных разделов сайта. Так отдельные наборы действий предусмотрены для управления статическим содержимым страниц, динамическими публикациями (новостями, каталогом, фотогалереей) и т.п.</p>

<p><a href="<?=SITE_DIR?>">Вернуться на главную страницу</a></p>

<?*/?>
<?//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

<?/*?>
    <div class="v21-card-application" id="fBusinessAccountForm">
        <?$APPLICATION->IncludeComponent(
            "webtu:feedback",
            "account_application_new",
            Array(
                "ADMIN_EVENT" => "WEBTU_FEEDBACK_ACCOUNTS_ADMIN",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "COMPONENT_TEMPLATE" => "account_application_new",
                "EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
                "IBLOCK_ID" => "215",  // Заявка на открытие счета
                "PROPERTIES" => array("PHONE","COMPANY_NAME","ORGANIZATION","COMPANY_INN","CURRENCY","FIO","NAME","EMAIL","CITY","FOLDER","REQ_URI","FROM_WHERE","UTM_SOURCE","UTM_MEDIUM","UTM_CAMPAIGN","UTM_TERM","UTM_CONTENT"),
                "SITES" => array(0=>"s1",),
                "USER_EVENT" => "WEBTU_FEEDBACK_ACCOUNTS_USER",
                "UTM" => "150",
            )
        );?>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");*/?>