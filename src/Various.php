<?php
/**
 * @title            Various Class
 * @desc             Handler Cookie
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7  / CookieSession
 */

namespace PH7\CookieSession;

class Various
{

    /**
     * Check if the server is in local.
     *
     * @return boolean TRUE if it is in local mode, FALSE if not.
     */
    public static function isLocalHost()
    {
        $sServerName = $_SERVER['SERVER_NAME'];
        $sHttpHost = $_SERVER['HTTP_HOST'];

        return ($sServerName === 'localhost' || $sServerName === '127.0.0.1' || $sHttpHost === 'localhost' || $sHttpHost === '127.0.0.1');
    }

    /**
     * Escape function, uses the native htmlspecialchars()/strip_tags() PHP functions.
     *
     * @param string $sValue
     * @param boolean $bStrip Default: FALSE
     * @return array|string The escaped string.
     */
    public static function escape(string $sValue, bool $bStrip = false)
    {
        return ($bStrip) ? strip_tags($sValue) : htmlspecialchars($sValue, ENT_QUOTES, 'utf-8');
    }

}