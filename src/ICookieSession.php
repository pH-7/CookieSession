<?php
/**
 * @title            ICookieSession Interface
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License 3 or later <http://www.gnu.org/licenses/gpl.html>
 * @package          PH7 / CookieSession
 */

namespace PH7\CookieSession;

interface ICookieSession
{
    public function get($sName, $bEscape = true);
    public function exists($mName);
    public function remove($mName);
}