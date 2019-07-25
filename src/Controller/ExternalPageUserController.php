<?php
/**
 * ExternalPageUserController.php
 *
 * This file is part of the Xpressengine package.
 *
 * PHP version 7
 *
 * @category    ExternalPage
 * @package     Xpressengine\Plugins\ExternalPage
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
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
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
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
