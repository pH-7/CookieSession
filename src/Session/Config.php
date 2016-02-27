<?php
/**
 * @title            Config Class
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / CookieSession / Session
 */

namespace PH7\CookieSession\Session;

abstract class Config extends \PH7\CookieSession\Config
{
    private $sCookieName = 'PHS7SESS'; // Default Cookie Name

    public function getCookieName()
    {
        return $this->sCookieName;
    }

    /**
     * @param string $sCookieName Cookie name (e.g., PHS7SESS).
     */
    public function setCookieName(string $sCookieName)
    {
        $this->sCookieName = $sCookieName;
    }
}