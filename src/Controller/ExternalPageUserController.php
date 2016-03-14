<?php
/**
 * ExternalPage User Controller
 *
 * PHP version 5
 *
 * @category    Page
 * @package     Xpressengine\Plugins\ExternalPage\Controller
 * @author      XE Team (develop) <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
namespace Xpressengine\Plugins\ExternalPage\Controller;

use App\Http\Controllers\Controller;
use XePresenter;
use Xpressengine\Config\ConfigManager;
use Xpressengine\Presenter\RendererInterface;
use Xpressengine\Routing\InstanceConfig;
use Xpressengine\Plugins\ExternalPage\Module\ExternalPage;

/**
 * ExternalPage User Controller
 *
 * @category    ExternalPage
 * @package     Xpressengine\Plugins\ExternalPage\Controller
 * @author      XE Team (develop) <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
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
        XePresenter::setModule(ExternalPage::getId());
    }

    /**
     * index
     *
     * @return RendererInterface
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

    protected function getConfigKeyString($instanceId)
    {
        return sprintf('%s.%s.%s', ExternalPage::getId(), $instanceId, 'includePath');
    }
}
