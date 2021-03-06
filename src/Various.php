<?php
/**
 * @title            Various Class
 * @desc             Handler Cookie
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License 3 or later <http://www.gnu.org/licenses/gpl.html>
 * @package          PH7  / CookieSession
 */
declare(strict_types=1);

namespace PH7\CookieSession;

class Various
{

    /**
     * Check if the server is in local.
     *
     * @return bool TRUE if it is in local mode, FALSE if not.
     */
    public static function isLocalHost() : bool
    {
        $sServerName = $_SERVER['SERVER_NAME'];
        $sHttpHost = $_SERVER['HTTP_HOST'];

        return ($sServerName === 'localhost' || $sServerName === '127.0.0.1' || $sHttpHost === 'localhost' || $sHttpHost === '127.0.0.1');
    }

    /**
     * Escape function, uses the native htmlspecialchars()/strip_tags() PHP functions.
     *
     * @param string $sValue
     * @param bool $bStrip Default: FALSE
     * @return string The escaped string.
     */
    public static function escape(string $sValue, bool $bStrip = false) : string
    {
        return ($bStrip) ? strip_tags($sValue) : htmlspecialchars($sValue, ENT_QUOTES, 'utf-8');
    }

}