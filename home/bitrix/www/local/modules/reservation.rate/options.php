<?

use Bitrix\Main\LoaderException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\HttpApplication;
use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

$request = HttpApplication::getInstance()->getContext()->getRequest();

$module_id = htmlspecialcharsbx($request["mid"] != "" ? $request["mid"] : $request["id"]);

try {
    Loader::includeModule($module_id);

    $aTabs = array(
        array(
            "DIV" => "edit",
            "TAB" => Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_NAME"),
            "TITLE" => Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_NAME"),
            "OPTIONS" => array(
                Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_COMMON"),
                array(
                    "switch_on",
                    Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_SWITCH_ON"),
                    "Y",
                    array("checkbox")
                ),
                Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_OPEN_BANK"),
                array(
                    "open_bank_mode",
                    Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_OPEN_BANK_MODE"),
                    "N",
                    array("checkbox")
                ),
                array(
                    "open_bank_login",
                    Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_OPEN_BANK_LOGIN"),
                    "",
                    array("text", 40)
                ),
                array(
                    "open_bank_pass",
                    Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_OPEN_BANK_PASS"),
                    "",
                    array("password", 40)
                ),
                Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_SMS"),
                array(
                    "sms_login",
                    Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_SMS_LOGIN"),
                    "",
                    array("text", 40)
                ),
                array(
                    "sms_pass",
                    Loc::getMessage("RESERVATION_RATE_OPTIONS_TAB_SMS_PASS"),
                    "",
                    array("password", 40)
                ),
            )
        )
    );

    $tabControl = new CAdminTabControl(
        "tabControl",
        $aTabs
    );

    $tabControl->Begin(); ?>

    <form action="<? echo($APPLICATION->GetCurPage()); ?>?mid=<? echo($module_id); ?>&lang=<? echo(LANG); ?>"
          method="post">
        <?
        foreach ($aTabs as $aTab) {
            if ($aTab["OPTIONS"]) {
                $tabControl->BeginNextTab();
                __AdmSettingsDrawList($module_id, $aTab["OPTIONS"]);
            }
        }

        $tabControl->Buttons();
        ?>

        <input type="submit" name="apply" value="<? echo(Loc::GetMessage("RESERVATION_RATE_OPTIONS_INPUT_APPLY")); ?>"
               class="adm-btn-save"/>
        <input type="submit" name="default"
               value="<? echo(Loc::GetMessage("RESERVATION_RATE_OPTIONS_INPUT_DEFAULT")); ?>"/>

        <? echo(bitrix_sessid_post()); ?>

    </form>
    <? $tabControl->End();

    if ($request->isPost() && check_bitrix_sessid()) {
        foreach ($aTabs as $aTab) {
            foreach ($aTab["OPTIONS"] as $arOption) {
                if (!is_array($arOption)) {
                    continue;
                }

                if ($arOption["note"]) {
                    continue;
                }

                if ($request["apply"]) {
                    $optionValue = $request->getPost($arOption[0]);
                    if ($arOption[0] == "switch_on") {
                        if ($optionValue == "") {
                            $optionValue = "N";
                        }
                    }

                    Option::set($module_id, $arOption[0],
                        is_array($optionValue) ? implode(",", $optionValue) : $optionValue);
                } elseif ($request["default"]) {
                    Option::set($module_id, $arOption[0], $arOption[2]);
                }
            }
        }
        LocalRedirect($APPLICATION->GetCurPage() . "?mid=" . $module_id . "&lang=" . LANG);
    }
} catch (LoaderException $e) {
    $APPLICATION->ThrowException($e->getMessage());
}