<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 04.10.2017
 * Time: 22:08
 */
namespace Admin\Controller;

use System\Controller;

class DashboardController extends AdminController
{

    public function index()
    {
        $this->view->render("dashboard");
    }



}