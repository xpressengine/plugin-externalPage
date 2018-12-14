<?php
/**
 * ExternalPageUserController.php
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

namespace Xpressengine\Plugins\ExternalPage\Controller;

use App\Http\Controllers\Controller;
use XePresenter;
use Xpressengine\Config\ConfigManager;
use Xpressengine\Presenter\Presentable;
use Xpressengine\Routing\InstanceConfig;
use Xpressengine\Plugins\ExternalPage\Module\ExternalPage;

/**
 * ExternalPageUserController
 *
 * @category    ExternalPage
 * @package     Xpressengine\Plugins\ExternalPage
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        http://www.xpressengine.com
 */
class ExternalPageUserController extends Controller
{
    /**
     * @var ConfigManager $configManager
     */
    protected $configManager;
    /**
     * @var string default config prefix
     */
    protected $configName = 'external';

    /**
     * ExternalPageUserController constructor.
     */
    public function __construct()
    {
        $this->configManager = app('xe.config');
        XePresenter::setSkinTargetId(ExternalPage::getId());
    }

    /**
     * index
     *
     * @return Presentable
     */
    public function index()
    {
        $instanceConfig = InstanceConfig::instance();
        $instanceId = $instanceConfig->getInstanceId();

        $configName = $this->getConfigKeyString($instanceId);

        $includePath = $this->configManager->getVal($configName);

        return XePresenter::make('show', [
            'includePath' => $includePath
        ]);
    }

    /**
     * @param string $instanceId instance id
     *
     * @return string
     */
    protected function getConfigKeyString($instanceId)
    {
        return sprintf('%s.%s.%s', ExternalPage::getId(), $instanceId, 'includePath');
    }
}
