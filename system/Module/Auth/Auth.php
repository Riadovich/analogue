<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 09.10.2017
 * Time: 15:43
 */

namespace System\Module\Auth;

use System\Helper\Session;

class Auth implements AuthInterface
{

    public function autorized()
    {
        if(Session::get("auth") == true){
            return true;
        }
        else{
            return false;
        }
    }

    public function autorize()
    {
        Session::set("auth", true);
    }

    public function unAuthorize()
    {
        Session::delete("auth");
    }


}