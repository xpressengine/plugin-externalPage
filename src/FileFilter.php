<?php
/**
 * FileFilter.php
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

namespace Xpressengine\Plugins\ExternalPage;

/**
 * FileFilter
 *
 * @category    ExternalPage
 * @package     Xpressengine\Plugins\ExternalPage
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */
class FileFilter
{
    private static $_block_list = array(
        'exec',
        'system',
        'passthru',
        'show_source',
        'phpinfo',
        'fopen',
        'file_get_contents',
        'file_put_contents',
        'fwrite',
        'proc_open',
        'popen'
    );

    public static function check($file)
    {
        // TODO: 기능개선후 enable

        return true; // disable
        if (!$file || !FileHandler::exists($file)) {
            return true;
        }
        return self::_check($file);
    }

    private static function _check($file)
    {
        if (!($fp = fopen($file, 'r'))) {
            return false;
        }

        $has_php_tag = false;

        while (!feof($fp)) {
            $content = fread($fp, 8192);
            if (false === $has_php_tag) {
                $has_php_tag = strpos($content, '<?');
            }
            foreach (self::$_block_list as $v) {
                if (false !== $has_php_tag && false !== strpos($content, $v)) {
                    fclose($fp);
                    return false;
                }
            }
        }

        fclose($fp);

        return true;
    }
}

/* End of file : UploadFileFilter.class.php */
/* Location: ./classes/security/UploadFileFilter.class.php */
