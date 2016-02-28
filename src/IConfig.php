<?php
/**
 * @title            Config Interface
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / CookieSession
 */

namespace PH7\CookieSession;

interface IConfig
{
    public function getExpiration();
    public function getPrefix();
    public function getPath();
    public function getDomain();
    public function getIsSsl();

    public function setExpiration(int $iExpiration);
    public function setPrefix(string $sPrefix);
    public function setPath(string $sPath);
    public function setDomain(string $sDomain);
    public function setIsSsl(bool $bIsSsl);
}