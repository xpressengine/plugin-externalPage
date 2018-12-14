<?php
/**
 * ExternalPage.php
 *
 * This file is part of the Xpressengine package.
 *
 * PHP version 5
 *
 * @category    ExternalPage
 * @package     Xpressengine\Plugins\ExternalPage
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        http://www.xpressengine.com
 */

namespace Xpressengine\Plugins\ExternalPage\Module;

use Xpressengine\Menu\AbstractModule;
use View;
use XeDB;
use Xpressengine\Config\ConfigManager;
use Xpressengine\Plugins\ExternalPage\FileFilter;
use Route;

/**
 * ExternalPage
 *
 * @category    ExternalPage
 * @package     Xpressengine\Plugins\ExternalPage
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        http://www.xpressengine.com
 */
class ExternalPage extends AbstractModule
{
    /**
     * @var ConfigManager $configManager
     */
    public $configManager;

    /**
     * ExternalPage constructor.
     */
    public function __construct()
    {
        $this->configManager = app('xe.config');
    }

    /**
     * boot
     *
     * @return void
     */
    public static function boot()
    {
        self::registerInstanceRoute();
    }

    /**
     * Register Plugin Instance Route
     *
     *
     * @return void
     */
    protected static function registerInstanceRoute()
    {
        Route::instance(self::getId(), function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ExternalPageUserController@index']);
        }, ['namespace' => 'Xpressengine\Plugins\ExternalPage\Controller']);
    }

    /**
     * getSettingsURI
     *
     * @return null
     */
    public static function getSettingsURI()
    {
    }

    /**
     * isRouteAble
     *
     * @return bool
     */
    public static function isRouteAble()
    {
        return true;
    }

    /**
     * Return Create Form View
     *
     * @return mixed
     */
    public function createMenuForm()
    {
        $config = $this->configManager->get(self::getId());
        $form = View::file(__DIR__ . '/../../views/menuType/menuCreate.blade.php', [
            'config' => $config,
        ])->render();
        return $form;
    }

    /**
     * Process to Store
     *
     * @param string $instanceId     instance id
     * @param array  $menuTypeParams menu type params
     * @param array  $itemParams     item params
     *
     * @return void
     * @internal param $inputs
     * @throws \Exception
     */
    public function storeMenu($instanceId, $menuTypeParams, $itemParams)
    {
        $filePath = $menuTypeParams['includePath'];
        $this->checkFileSecurity($filePath);
        $configName = $this->getPageConfigKeyString($instanceId);
        $this->configManager->add($configName, $menuTypeParams);
    }

    /**
     * Return Edit Form View
     *
     * @param string $instanceId instance id
     *
     * @return mixed
     */
    public function editMenuForm($instanceId)
    {
        $config = $this->configManager->get($this->getPageConfigKeyString($instanceId));

        $form = View::file(__DIR__ . '/../../views/menuType/menuEdit.blade.php', [
            'instanceId' => $instanceId,
            'config' => $config,
        ])->render();
        return $form;
    }

    /**
     * Process to Update
     *
     * @param string $instanceId     to store instance id
     * @param array  $menuTypeParams for menu type store param array
     * @param array  $itemParams     except menu type param array
     *
     * @return mixed
     * @throws \Exception
     */
    public function updateMenu($instanceId, $menuTypeParams, $itemParams)
    {
        $configName = $this->getPageConfigKeyString($instanceId);

        XeDB::beginTransaction();

        try {
            $affected = $this->configManager->put($configName, $menuTypeParams);
        } catch (\Exception $e) {
            XeDB::rollback();
            throw $e;
        }

        XeDB::commit();
        return $affected;
    }

    /**
     * Process to delete
     *
     * @param string $instanceId instance id
     *
     * @return mixed
     */
    public function deleteMenu($instanceId)
    {
        $configName = $this->getPageConfigKeyString($instanceId);

        $this->configManager->removeByName($configName);
    }

    /**
     * summary
     *
     * @param string $instanceId instance id
     *
     * @return string
     */
    public function summary($instanceId)
    {
        return "이 메뉴를 삭제하여도 연결되어 있는 external php file은 별도로 삭제해 주어야 합니다. ";
    }

    /**
     * getPageConfigKeyString
     *
     * @param string $instanceId instance id
     *
     * @return string
     */
    protected function getPageConfigKeyString($instanceId)
    {
        return sprintf('%s.%s', self::getId(), $instanceId);
    }

    /**
     * checkFileSecurity
     *
     * @param string $filePath file path
     *
     * @return void
     * @throws \Exception
     */
    protected function checkFileSecurity($filePath)
    {
        $validation = FileFilter::check($filePath);
        if (!$validation) {
            throw new \Exception('file validation exception ' . $filePath);
        }
    }

    /**
     * Return URL about module's detail setting
     * getInstanceSettingURI
     *
     * @param string $instanceId instance id
     *
     * @return mixed
     */
    public static function getInstanceSettingURI($instanceId)
    {
        return null;
    }

    /**
     * Get menu type's item object
     *
     * @param string $id item id of menu type
     *
     * @return mixed
     */
    public function getTypeItem($id)
    {
        return null;
    }
}
