<?php
/**
 * @title            ICookieSession Interface
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / CookieSession
 */

namespace PH7\CookieSession;

interface ICookieSession
{
    public function get($sName, $bEscape = true);
    public function exists($mName);
    public function remove($mName);
}