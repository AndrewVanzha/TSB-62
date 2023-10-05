<?php /** @noinspection PhpHierarchyChecksInspection */

use Bitrix\Main\ArgumentNullException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;

Loc::loadMessages(__FILE__);

class reservation_rate extends CModule
{
    public function __construct()
    {
        if (file_exists(__DIR__ . "/version.php")) {

            $arModuleVersion = array();

            include_once(__DIR__ . "/version.php");

            $this->MODULE_ID = str_replace("_", ".", get_class($this));
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
            $this->MODULE_NAME = Loc::getMessage("RESERVATION_RATE_NAME");
            $this->MODULE_DESCRIPTION = Loc::getMessage("RESERVATION_RATE_DESCRIPTION");
            $this->PARTNER_NAME = Loc::getMessage("RESERVATION_RATE_PARTNER_NAME");
            $this->PARTNER_URI = Loc::getMessage("RESERVATION_RATE_PARTNER_URI");
        }

        return false;
    }

    /**
     * ��������� ������
     *
     * @return bool|mixed
     */
    public function DoInstall()
    {
        global $APPLICATION;

        if (CheckVersion(ModuleManager::getVersion("main"), "14.00.00")) {
            $this->InstallFiles();
            $this->InstallDB();

            ModuleManager::registerModule($this->MODULE_ID);

            $this->InstallEvents();
        } else {
            $APPLICATION->ThrowException(
                Loc::getMessage("RESERVATION_RATE_INSTALL_ERROR_VERSION")
            );
        }

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage("RESERVATION_RATE_INSTALL_TITLE") . " \"" . Loc::getMessage("FALBAR_TOTOP_NAME") . "\"",
            __DIR__ . "/step.php"
        );

        return false;
    }

    /**
     * ��������� ������ ������
     *
     * @return bool|void
     */
    public function InstallFiles()
    {
        CopyDirFiles(
            __DIR__ . "/public",
            Application::getDocumentRoot() . "/bitrix/" . $this->MODULE_ID . "/",
            true,
            true
        );

        return true;
    }

    /**
     * ��������� ���� ������
     *
     * @return bool
     */
    public function InstallDB()
    {
        return $this->ImportDB('install');
    }

    /**
     * ������ SQL-���� � ����
     *
     * @param $type
     * @return bool
     */
    private function ImportDB($type)
    {
        global $DB, $APPLICATION;

        $errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"] . "/local/modules/" . $this->MODULE_ID . "/install/db/" . $type . ".sql");

        if ($errors !== false) {
            $APPLICATION->ThrowException(implode("<br>", $errors));
            return false;
        }

        return true;
    }

    /**
     * ��������� �������
     *
     * @return bool|void
     */
    public function InstallEvents()
    {
        return false;
    }

    /**
     * �������� ������
     *
     * @return bool|mixed
     * @throws ArgumentNullException
     */
    public function DoUninstall()
    {
        $this->UnInstallFiles();
        $this->UnInstallDB();
        $this->UnInstallEvents();

        ModuleManager::unRegisterModule($this->MODULE_ID);

        return true;
    }

    /**
     * �������� ������ ������
     *
     * @return bool|void
     */
    public function UnInstallFiles()
    {
        Directory::deleteDirectory(
            Application::getDocumentRoot() . "/bitrix/" . $this->MODULE_ID . "/"
        );

        return false;
    }

    /**
     * �������� ���� ������ ������
     *
     * @return bool|void
     * @throws ArgumentNullException
     */
    public function UnInstallDB()
    {
        Option::delete($this->MODULE_ID);

        return $this->ImportDB('uninstall');
    }

    /**
     * �������� �������
     *
     * @return bool|void
     */
    public function UnInstallEvents()
    {
        return false;
    }
}