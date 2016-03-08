<?php
/**
 * @title            ICookieSession Interface
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License 3 or later <http://www.gnu.org/licenses/gpl.html>
 * @package          PH7 / CookieSession
 */
declare(strict_types=1);

namespace PH7\CookieSession;

interface ICookieSession
{
    public function get(string $sName, bool $bEscape) : string;
    public function exists($mName) : bool;
    public function remove($mName); // : void return type should be added from PHP 7.1
}