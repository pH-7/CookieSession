<?php
/**
 * @title            Cookie Class
 * @desc             Handler Cookie
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7  / CookieSession / Cookie
 */

namespace PH7\CookieSession\Cookie;

use PH7\CookieSession\Various;

class Cookie extends Config
{
    /**
     * Set a PHP Cookie.
     *
     * @param mixed (array | string) $mName Name of the cookie.
     * @param string $sValue value of the cookie, Optional if the cookie data is in a array.
     * @param int $iTime The time the cookie expires. This is a Unix timestamp.
     * @param bool $bSecure If TRUE cookie will only be sent over a secure HTTPS connection from the client.
     * @return void
     */
    public function set($mName, $sValue = null, $iTime = null, $bSecure = null)
    {
        $iTime = time() + ((int) !empty($iTime) ? $iTime : $this->getExpiration());
        $bSecure = (!empty($bSecure) && is_bool($bSecure)) ? $bSecure : $this->getIsSsl();

        if (is_array($mName)) {
            foreach ($mName as $sN => $sV) {
                $this->set($sN, $sV, $iTime, $bSecure); // Recursive method
            }
        } else {
            $sCookieName = $this->getPrefix() . $mName;

            /* Check if we are not in localhost mode, otherwise may not work. */
            if (!Various::isLocalHost()) {
                setcookie($sCookieName, $sValue, $iTime, $this->getPath(), $this->getDomain(), $bSecure, true);
            } else {
                setcookie($sCookieName, $sValue, $iTime, '/');
            }
        }
    }

    /**
     * Get Cookie.
     *
     * @param string $sName Name of the cookie.
     * @param boolean $bEscape Default TRUE
     * @return string If the cookie exists, returns the cookie with function escape() (htmlspecialchars) if escape is enabled. Empty string value if the cookie does not exist.
     */
    public function get($sName, $bEscape = true)
    {
        $sCookieName = $this->getPrefix() . $sName;
        return (!empty($_COOKIE[$sCookieName]) ? ($bEscape ? Various::escape($_COOKIE[$sCookieName]) : $_COOKIE[$sCookieName]) : '');
    }

    /**
     * Returns a boolean informing if the cookie exists or not.
     *
     * @param mixed (array | string) $mName Name of the cookie.
     * @return boolean
     */
    public function exists($mName)
    {
        $bExists = false; // Default value

        if (is_array($mName)) {
            foreach ($mName as $sName) {
                if (!$bExists = $this->exists($sName)) break; // Recursive method
            }
        } else {
            $bExists = (!empty($_COOKIE[$this->getPrefix() . $mName])) ? true : false;
        }

        return $bExists;
    }

    /**
     * Delete the cookie(s) key if the cookie exists.
     *
     * @param mixed (array | string) $mName Name of the cookie to delete.
     * @return void
     */
    public function remove($mName)
    {
        if (is_array($mName)) {
            foreach ($mName as $sN) {
                $this->remove($sN); // Recursive method
            }
        } else {
            $sCookieName = $this->getPrefix() . $mName;

            // We put the cookie in a table so if the cookie is in the form of multi-dimensional array, it is clear how much is destroyed
            $_COOKIE[$sCookieName] = array();
            // We are asking the browser to delete the cookie
            setcookie($sCookieName);
            // and we delete the cookie value locally to avoid using it by mistake in following our script
            unset($_COOKIE[$sCookieName]);
        }
    }

    private function __clone() {}
}
