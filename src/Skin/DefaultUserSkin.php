<?php
/**
 * DefaultUserSkin.php
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

namespace Xpressengine\Plugins\ExternalPage\Skin;

use Xpressengine\Skin\AbstractSkin;
use View;

/**
 * DefaultUserSkin
 *
 * @category    ExternalPage
 * @package     Xpressengine\Plugins\ExternalPage
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */
class DefaultUserSkin extends AbstractSkin
{
    /**
     * @var string|null
     */
    protected static $type = 'page';

    /**
     * @var string
     */
    protected $frame = '_frame';

    /**
     * render
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $view = View::file($this->getViewFilePath('show'), $this->data);

        return $view;
    }

    /**
     * getViewFilePath
     *
     * @param string $view view file name
     *
     * @return string
     */
    protected function getViewFilePath($view)
    {
        return __DIR__ . '/../../views/defaultSkin/' . $view . '.blade.php';
    }

    /**
     * boot
     *
     * @return void
     */
    public static function boot()
    {
    }

    /**
     * getSettingsURI
     *
     * @return void
     */
    public static function getSettingsURI()
    {
    }
}
