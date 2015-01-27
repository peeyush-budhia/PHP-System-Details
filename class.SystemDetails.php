<?php
/**
 * @package         PHP-Lib
 * @description     Class is used to get the visitor's system details like OS and Browser
 * @copyright       Copyright (c) 2013, Peeyush Budhia
 * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
 */

class SystemDetails
{
    /**
     * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
     * @description     The is used to get the visitor's OS
     * @return string
     *          Return visitor's OS
     */
    function getOS()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown OS Platform";
        $os_array = array(
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }

        return $os_platform;
    }

    /**
     * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
     * @description     The function is used to get the visitor's browser
     * @return string
     *          Return visitor's browser
     */
    function getBrowser()
    {
        static $agent = null;

        if (empty($agent)) {
            $agent = $_SERVER['HTTP_USER_AGENT'];

            if (stripos($agent, 'Firefox') !== false) {
                $agent = 'Firefox';
            } elseif (stripos($agent, 'MSIE') !== false) {
                $agent = 'Internet Explorer';
            } elseif (stripos($agent, 'iPad') !== false) {
                $agent = 'IPAD';
            } elseif (stripos($agent, 'Android') !== false) {
                $agent = 'Android';
            } elseif (stripos($agent, 'Chrome') !== false) {
                $agent = 'Chrome';
            } elseif (stripos($agent, 'Safari') !== false) {
                $agent = 'Safari';
            } elseif (stripos($agent, 'AIR') !== false) {
                $agent = 'AIR';
            } elseif (stripos($agent, 'Fluid') !== false) {
                $agent = 'Fluid';
            }
        }
        return $agent;
    }

    /**
     * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
     * @description     The function is used to get the visitor's processor's architecture
     * @return string
     *          Return visitor's processor's architecture
     */
    function getSysArchitecture()
    {
        $user_machine = php_uname('m');
        $architecture = 'Unknown Architecture';
        $architecture_array = array(
            '/i686/i' => '64 Bit', //Intel
            '/i586/i' => '64 Bit', //Intel
            '/i386/i' => '32 Bit', //Intel
            '/x86_64/i' => '64 Bit', //AMD
            '/x86/i' => '32 Bit', //AMD
        );

        foreach ($architecture_array as $regex => $value) {

            if (preg_match($regex, $user_machine)) {
                $architecture = $value;
            }
        }
        return $architecture;
    }
}