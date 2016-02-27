<?php
/**
 * @title            Config Class
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2016, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / CookieSession
 */

namespace PH7\CookieSession;

abstract class Config implements IConfig
{
    private $iExpiration = 31536000; // 1 Year
    private $sPrefix = 'pH7Cookie_';
    private $sPath = '/';
    private $sDomain;


    public function getExpiration()
    {
        return $this->iExpiration;
    }

    public function getPrefix()
    {
        return $this->sPrefix;
    }

    public function getPath()
    {
        return $this->sPath;
    }

    public function getDomain()
    {
        if (empty($this->sDomain)) {
            $sDomain = (($_SERVER['SERVER_PORT'] != '80') && ($_SERVER['SERVER_PORT'] != '443')) ?  $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_NAME'];
            return '.' . str_replace('www.', '', $sDomain);
        } else {
            $this->sDomain;
        }
    }

    /**
     * @param int $iExpiration In seconds.
     */
    public function setExpiration(int $iExpiration)
    {
        $this->iExpiration = $iExpiration;
    }

    /**
     * @param string $sPrefix Prefix for the Cookie name.
     */
    public function setPrefix(string $sPrefix)
    {
        $this->sPrefix = $sPrefix;
    }

    /**
     * @param string $sPath Full Path (e.g., /path/to/app/).
     */
    public function setPath(string $sPath)
    {
        return $this->sPath = $sPath;
    }

    /**
     * @param string $sPath Domain name (e.g., mysite.com).
     */
    public function setDomain(string $sDomain)
    {
        $this->sDomain = $sDomain;
    }
}