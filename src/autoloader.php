<?php
/**
 * @title            Manual Autoloader File
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License 3 or later <http://www.gnu.org/licenses/gpl.html>
 * @package          PH7 / CookieSession
 */

namespace PH7\CookieSession;

// Autoloading Classes Files
spl_autoload_register(function($sClass)
{
    // Hack to remove namespace and backslash
    $sClass = str_replace(array(__NAMESPACE__ . '\\', '\\'), DIRECTORY_SEPARATOR, $sClass);

    // Get library classes
    if (is_file(dirname(__FILE__) . $sClass . '.php')) {
        require_once dirname(__FILE__) . $sClass . '.php';
    }
});