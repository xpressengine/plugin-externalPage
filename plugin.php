<?php
/**
 * ExternalPage plugin
 *
 * @category    ExternalPage
 * @package     ExternalPage
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     LGPL-2.1
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Plugins\Page;

use XeConfig;
use Xpressengine\Plugin\AbstractPlugin;

/**
 * ExternalPage plugin
 *
 * @category    ExternalPage
 * @package     ExternalPage
 */
class ExternalPagePlugin extends AbstractPlugin
{
    /**
     * install
     *
     * @return void
     */
    public function install()
    {
        XeConfig::add('module/externalPage@externalPage', []);
    }

    /**
     * activate
     *
     * @param null $installedVersion installed version
     *
     * @return void
     */
    public function activate($installedVersion = null)
    {
    }

    /**
     * boot
     *
     * @return void
     */
    public function boot()
    {
    }
}
