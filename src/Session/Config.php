<?php
/**
 * @title            Config Class
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License 3 or later <http://www.gnu.org/licenses/gpl.html>
 * @package          PH7 / CookieSession / Session
 */
declare(strict_types=1);

namespace PH7\CookieSession\Session;

abstract class Config extends \PH7\CookieSession\Config
{
    private $sCookieName = 'PHS7SESS'; // Default Cookie Name

    public function getCookieName() : string
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