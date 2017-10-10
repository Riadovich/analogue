<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 09.10.2017
 * Time: 17:32
 */

namespace System\Helper;


class Redirect
{

    public static function redirect($link)
    {
        header("Location: {$link}");
        exit;
    }

}