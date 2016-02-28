<?php
/**
 * @title            Session Class
 * @desc             Handler Session
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / CookieSession / Session
 */

namespace PH7\CookieSession\Session;

use PH7\CookieSession\Various;

class Session extends Config
{

    /**
     * Constructor to initialize PHP's session.
     *
     * @param boolean $bDisableSessCache Disable PHP's session cache. Default FALSE
     */
    public function __construct($bDisableSessCache = false)
    {
        if ($bDisableSessCache) {
            session_cache_limiter(false);
        }

        session_name($this->getCookieName());

        /**
         * In localhost mode, security session_set_cookie_params causing problems in the sessions, so we disable this if we are in localhost mode.
         * Otherwise if we are in production mode, we activate this.
         */
        if (!Various::isLocalHost()) {
            $iTime = (int) $this->getExpiration();
            session_set_cookie_params($iTime, $this->getPath(), $this->getDomain(), $this->getIsSsl(), true);
        }

        // Session initialization
        if ('' === session_id()) {
            @session_start();
        }
    }

    /**
     * Set a PHP Session.
     *
     * @param mixed (array | string) $mName Name of the session.
     * @param string $sValue Value of the session, Optional if the session data is in a array.
     * @return void
     */
    public function set($mName, $sValue = null)
    {
        if (is_array($mName)) {
            foreach ($mName as $sName => $sVal) {
                $this->set($sName, $sVal); // Recursive method
            }
        } else {
            $_SESSION[$this->getPrefix() . $mName] = $sValue;
        }
    }

    /**
     * Get Session.
     *
     * @param string $sName Name of the session.
     * @param boolean $bEscape Default TRUE
     * @return string If the session exists, returns the session with function escape() (htmlspecialchars) if escape is enabled. Empty string value if the session does not exist.
     */
    public function get($sName, $bEscape = true)
    {
        $sSessionName = $this->getPrefix() . $sName;
        return (!empty($_SESSION[$sSessionName]) ? ($bEscape ? Various::escape($_SESSION[$sSessionName]) : $_SESSION[$sSessionName]) : '');
    }

    /**
     * Returns a boolean informing if the session exists or not.
     *
     * @param mixed (array | string) $mName Name of the session.
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
            $bExists = (!empty($_SESSION[$this->getPrefix() . $mName])) ? true : false;
        }

        return $bExists;
    }

    /**
     * Delete the session(s) key if the session exists.
     *
     * @param mixed (array | string) $mName Name of the session to delete.
     * @return void
     */
    public function remove($mName)
    {
        if (is_array($mName)) {
            foreach ($mName as $sName) {
                $this->remove($sName); // Recursive method
            }
        } else {
            $sSessionName = $this->getPrefix() . $mName;

            // We put the session in a table so if the session is in the form of multi-dimensional array, it is clear how much is destroyed
            $_SESSION[$sSessionName] = array();
            unset($_SESSION[$sSessionName]);
        }
    }

    /**
     * Session regenerate ID.
     *
     * @return void
     */
    public function regenerateId()
    {
        session_regenerate_id(true);
    }

    /**
     * Destroy all PHP's sessions.
     */
    public function destroy()
    {
        if (!empty($_SESSION)) {
            $_SESSION = array();
            session_unset();
            session_destroy();
        }
    }

    protected function close()
    {
        session_write_close();
    }

    public function __destruct()
    {
        // $this->close();
    }

    private function __clone() {}

}
