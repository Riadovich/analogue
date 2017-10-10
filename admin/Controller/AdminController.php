<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 09.10.2017
 * Time: 15:45
 */

namespace Admin\Controller;


use System\Controller;
use System\Helper\Redirect;

class AdminController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);

        if(!$this->auth->autorized())
        {
            Redirect::redirect("/admin/login");
        }
    }
}