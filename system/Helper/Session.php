<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 09.10.2017
 * Time: 15:48
 */

namespace System\Helper;


class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return self::has($key);
    }

    public static function has($key)
    {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : null;
    }

    public static function delete($key)
    {
        if(!empty($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
}