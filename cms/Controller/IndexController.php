<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 04.10.2017
 * Time: 22:08
 */

namespace Cms\Controller;

class IndexController extends CmsController
{

    public function index(){
        $this->view->render("index", ["data" => "hello world"]);
    }

}