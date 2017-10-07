<?php

namespace System\Helper;

/**
 * Class Common
 * @package System\Helper
 * Общий класс
 */

class Common
{

    public static function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public static function getUri()
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        if($position = strpos($pathUrl, '?'))
        {
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }

}